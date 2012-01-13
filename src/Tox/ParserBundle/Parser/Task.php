<?php

namespace Tox\ParserBundle\Parser;

class Task {
    private $url;
    private $regexp;
    private $result;

    public function __construct($url, $regexp) {
        $this->url = $url;
        $this->regexp = $regexp;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getRegexps() {
        return $this->regexp;
    }

    public function getResult() {
        return $this->result;
    }

    public function setResult($result) {
        $this->result = $result;
    }
}
