<?php

namespace Tox\ParserBundle\Parser;

class Parser {
    const FILENETWORK = "FileNetwork";

    private $network;

    public function __construct() {
        $this->network = new FileNetwork();
    }

    public function execute(Task $task) {
        $request = new Request($task->getUrl());
        $matches = array();
        preg_match_all($task->getRegexp(), $this->network->get($request), $matches);
        $task->setResult($matches);
    }
}
