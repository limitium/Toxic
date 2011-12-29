<?php

namespace Tox\ParserBundle\Parser;

abstract class Network {

    /**
     * @abstract
     * @param Request $request
     * @return string
     */
    abstract public function get(Request $request);
}
