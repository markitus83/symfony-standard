<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 9/07/15
 * Time: 17:56
 */

namespace AppBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AppCommand extends ContainerAwareCommand
{
    public function configure()
    {
        $this
            ->setName('demo:listProducers')
            ->setDescription('List producers');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager();

        //$list = $em->getRepository('AppBundle:Producer')->findAll();
        $list = $this
            ->getContainer()
            ->get('cinephile')
            ->listProducers();

        if( $list ){
            foreach($list as $producer)
                $output->writeln($producer->getName());
        }
    }
}