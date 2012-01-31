<?php

namespace Tox\PlaceBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\DependencyInjection\Loader;

use Doctrine\ORM\Query\ResultSetMapping;

use  Tox\PlaceBundle\Deploy\Deployer;

class DeployCommand extends ContainerAwareCommand {


    protected function configure() {
        $this
            ->setName('place:deploy')
            ->setDescription('deploy satellite task')
            ->addArgument('shell', InputArgument::OPTIONAL, 'with shell?');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $start = new \DateTime("now");
        //        $withShell = $input->getArgument('shell');

        $em = $this->getContainer()->get('doctrine')->getEntityManager();

        $ftp = $em->getRepository('ToxPlaceBundle:FtpAccount')->find(4);
        $dep = new Deployer($ftp);
        $dep->connect();
        //        $version = $dep->updateShell();
        //        $ftp->setShellVersion($version);

        foreach ($em->getRepository('ToxSatelliteBundle:Satellite')->findAll() as $satellite) {

            //            $dep->deploy($satellite);
                        $dep->update($satellite);

//            foreach ($satellite->getPosts() as $post) {
//                $b = '';
//                $c = $post->getContent();
//                if ($c) {
//                    foreach ($post->getContent()->getMeta() as $m) {
//                        if ($m->getPatternType()->getName() == 'content') {
//                            $b = $m->getData();
//                        }
//                    }
//                    $b = str_replace('||', '', strip_tags($b));
//                } else {
//                    $b = $post->getBody();
//                }
//                foreach ($post->getImages() as $i) {
//                    $b = "<img src='/img/" . $i->getName() . "' />" . $b;
//                }
//                $post->setBody($b);
//                $post->setIsPosted(false);
//            }
        }

        $dep->close();

        $em->flush();
        $interval = $start->diff(new \DateTime('now'));

        $output->writeln('Done in ' . $interval->format('%H:%i:%s'));
    }


}
