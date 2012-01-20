<?php

namespace Tox\SatelliteBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\DependencyInjection\Loader;

use Doctrine\ORM\Query\ResultSetMapping;


class UpdateCommand extends ContainerAwareCommand {
    protected function configure() {
        $this
            ->setName('satellite:update')
            ->setDescription('update satellite task');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $start = new \DateTime("now");

        $interval = $start->diff(new \DateTime('now'));

        $output->writeln('Done in ' . $interval->format('%H:%i:%s'));
    }

}