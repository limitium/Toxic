<?php

namespace Tox\ParserBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\DependencyInjection\Loader;

use Doctrine\ORM\Query\ResultSetMapping;

use Tox\ParserBundle\Entity\Source;
use Tox\ParserBundle\Entity\Content;
use Tox\ParserBundle\Entity\MetaData;
use Tox\ParserBundle\Entity\Rule;
use Tox\ParserBundle\Parser\Task;
use Tox\ParserBundle\Parser\Parser;

class ParseCommand extends ContainerAwareCommand {
    protected function configure() {
        $this
            ->setName('parser:execute')
            ->setDescription('Parse it all!');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $start = new \DateTime("now");
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $rrRepo = $em->getRepository('ToxParserBundle:RawResult');


        $rsm = new ResultSetMapping;
        $rsm->addEntityResult('ToxParserBundle:Source', 's');
        $rsm->addEntityResult('ToxParserBundle:Schedule', 'sc');
        $rsm->addEntityResult('ToxParserBundle:RawResult', 'r');
        $rsm->addFieldResult('s', 'id', 'id');
        $rsm->addFieldResult('s', 'parsed_at', 'parsed_at');
        $rsm->addFieldResult('s', 'url', 'url');

        $query = $em->createNativeQuery("SELECT s.id,s.url,s.parsed_at FROM Source s
            INNER JOIN Schedule sc ON sc.id = s.schedule_id
            WHERE IF(parsed_at IS NULL,TRUE,TIME_TO_SEC(TIMEDIFF('" . $start->format("Y-m-d H:i:s") . "',s.parsed_at)) > sc.timeout)
            GROUP BY s.id", $rsm);

        $parser = new Parser();
        foreach ($query->getResult() as $source) {

            $output->writeln(sprintf('  > parsing %s', $source->getUrl()));

            $postTask = $parser->execute(new Task($source->getUrl(), $source->getRule('post')->getPattern()));

            foreach ($postTask->getResult() as $postUrl) {
                $postUrl = "http://" . $source->getDomen() . $postUrl;

                if ($rrRepo->findOneByUrl($postUrl)) {
                    $output->writeln(sprintf('  > already parsed %s', $postUrl));
                    continue;
                }

                $output->writeln(sprintf('  > get post at %s', $postUrl));

                $regs = array();
                foreach ($source->getRules() as $rule) {
                    if (!in_array($rule->getType()->getName(), array('list', 'post'))) {
                        $regs[$rule->getType()->getName()] = $rule->getPattern();
                    }
                }
                $data = $parser->execute(new Task($postUrl, $regs))->getResult();

                $content = new Content();
                $content->setSource($source);
                $content->setUrl($postUrl);
                $content->setCreatedAt(new \DateTime("now"));

                $em->persist($content);
                foreach ($data as $type => $meta) {
                    $data = implode('||', $meta);
                    if ($data) {
                        $metaData = new MetaData();
                        $metaData->setContent($content);
                        $metaData->setData($data);
                        $metaData->setPatternType($source->getRule($type)->getType());
                        $em->persist($metaData);
                    } else {
                        $output->writeln(sprintf('  >   has empty %s', $type));
                    }
                }
            }

            $source->setParsedAt(new \DateTime("now"));
        }
        $em->flush();

        $interval = $start->diff(new \DateTime('now'));

        $output->writeln('Done in ' . $interval->format('%H:%i:%s'));
    }

}