<?php

namespace Tox\ParserBundle\Parser;

class Parser {
    const FILENETWORK = "FileNetwork";

    private $network;

    public function __construct() {
        $this->network = new FileNetwork();
    }

    /**
     * @param Task $task
     * @return Task
     */
    public function execute(Task $task) {
        $request = new Request($task->getUrl());

        $content = $this->network->get($request);

        if (!preg_match('!\S!u', $content)) {
            $content = iconv('WINDOWS-1251', 'UTF-8', $content);
        }

        $regs = $task->getRegexps();
        if (is_array($regs)) {
            $result = array();
            foreach ($regs as $k => $reg) {
                $result[$k] = $this->getMatches($reg, $content);
            }
        } else {
            $result = $this->getMatches($regs, $content);
        }


        $task->setResult($result);
        return $task;
    }

    private function getMatches($reg, $content) {
        $matches = array();
        preg_match_all($reg, $content, $matches);
        return $matches[1];
    }
}
