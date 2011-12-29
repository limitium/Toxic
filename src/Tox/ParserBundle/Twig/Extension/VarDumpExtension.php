<?php

namespace Tox\ParserBundle\Twig\Extension;

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;

class VarDumpExtension extends \Twig_Extension {

    public function getFilters() {
        return array(
            'var_dump'   => new \Twig_Filter_Method($this, 'var_dump'),
        );
    }

    public function var_dump($sentence) {
        print_r($sentence);
        return "";
    }

    public function getName()
    {
        return 'var_dump_extension';
    }

}
