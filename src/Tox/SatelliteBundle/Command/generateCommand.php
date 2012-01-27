<?php

namespace Tox\SatelliteBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\DependencyInjection\Loader;

use Doctrine\ORM\Query\ResultSetMapping;

use Tox\ParserBundle\Entity\Content;
use Tox\SatelliteBundle\Entity\Satellite;
use Tox\SatelliteBundle\Entity\Post;

class GenerateCommand extends ContainerAwareCommand {
    protected function configure() {
        $this
            ->setName('satellite:update')
            ->setDescription('update satellite task');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $start = new \DateTime("now");

        $em = $this->getContainer()->get('doctrine')->getEntityManager();

        $satellites = $em->getRepository('ToxSatelliteBundle:Satellite')->findAll();


        foreach ($em->getRepository('ToxParserBundle:Content')->findAll() as $content) {
            $post = new Post();
            foreach ($content->getMeta() as $meta) {
                if ($meta->getPatternType()->getName() == 'title') {
                    $post->setTitle($meta->getData());
                    $post->setFileName($this->slug($meta->getData()));
                }
                if ($meta->getPatternType()->getName() == 'content') {
                    $post->setBody($meta->getData());
                }
            }
            $post->setContent($content);
            $content->addPost($post);
            $post->setIsPage(false);
            $post->setIsPosted(false);

            $sat = $satellites[rand(0, sizeof($satellites) - 1)];
            $sat->addPost($post);
            $post->setSatellite($sat);

            $em->persist($post);
        }

        $em->flush();



        $interval = $start->diff(new \DateTime('now'));

        $output->writeln('Done in ' . $interval->format('%H:%i:%s'));
    }

    private function slug($str) {


        $from = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
        $to = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'J', 'Z', 'I', 'I', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'CH', 'SH', 'SH', '', 'I', '', 'E', 'U', 'YA', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'j', 'z', 'i', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sh', '', 'i', '', 'e', 'u', 'ya');
        $str = str_replace($from, $to, $str);

        $str = strtolower(trim($str));

        $str = preg_replace('/[^а-яa-z0-9-]/', '-', $str);
        $str = preg_replace('/-+/', "-", $str);

        if ($str[0] == '-') {
            $str = substr($str, 1);
        }
        if ($str[strlen($str) - 1] == '-') {
            $str = substr($str, 0, -1);
        }
        return trim($str);
    }
}