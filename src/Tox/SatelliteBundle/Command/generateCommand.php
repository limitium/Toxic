<?php

namespace Tox\SatelliteBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\DependencyInjection\Loader;

use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\EntityManager;

use Tox\ParserBundle\Entity\Content;
use Tox\ParserBundle\Parser\Imager;

use Tox\SatelliteBundle\Entity\Satellite;
use Tox\SatelliteBundle\Entity\Post;
use Tox\SatelliteBundle\Entity\Image;


class GenerateCommand extends ContainerAwareCommand {
    protected function configure() {
        $this
            ->setName('satellite:update')
            ->setDescription('update satellite task');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $start = new \DateTime("now");

        $em = $this->getContainer()->get('doctrine')->getEntityManager();

        $rsm = new ResultSetMapping;
        $rsm->addEntityResult('ToxParserBundle:Content', 'c');
        $rsm->addFieldResult('c', 'id', 'id');

        $query = $em->createNativeQuery("SELECT c.id FROM Content c
            WHERE c.id NOT IN(SELECT content_id FROM post WHERE content_id IS NOT NULL)", $rsm);
        $contents = $query->getResult();

        $satellites = $em
            ->getRepository('ToxSatelliteBundle:Satellite')->findAll();

        foreach ($contents as $content) {
            $post = new Post();
            foreach ($content->getMeta() as $meta) {
                if ($meta->getPatternType()->getName() == 'title') {
                    $post->setTitle($meta->getData());
                    $post->setFileName($this->slug($meta->getData()));
                }
                if ($meta->getPatternType()->getName() == 'content') {
                    $b = str_replace('||','',strip_tags($meta->getData()));
                    $post->setBody($b);
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
            $this->addImage($post, $em);
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

    private function addImage(Post $post, EntityManager $em) {
        $imageName = $this->getImage($post);
        if ($imageName) {
            $post->setBody("<img src='/images/$imageName' />" . $post->getBody());
            $image = new Image();
            $image->setName($imageName);
            $image->setPost($post);
            $post->addImage($image);
            $em->persist($image);
        }
    }

    private function getImage(Post $post) {
        $kernel = $this->getApplication()->getKernel();
        $imageDir = $kernel->getRootDir() . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $post->getSatellite()->getDomen()->getName() . DIRECTORY_SEPARATOR;
        @mkdir($imageDir, 0777, true);
        $imgUrl = Imager::get($post->getTitle());
        $imgName = explode('/', $imgUrl);
        $imgName = array_pop($imgName);
        $imgExt = explode('.', $imgName);
        $imgExt = array_pop($imgExt);
        $imgNameLocal = md5($post->getTitle()) . ".$imgExt";
        if (in_array($imgExt, array('jpg', 'jpeg', 'png', 'gif'))) {
            $imgData = @file_get_contents($imgUrl);
            if ($imgData) {
                file_put_contents($imageDir . $imgNameLocal, $imgData);
                return $imgNameLocal;
            }
        }
    }


}