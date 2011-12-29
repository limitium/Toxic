<?php

namespace Tox\ParserBundle\Parser;

class Request {
    private $headers;
    private $cookies;
    private $method = 'get';
    private $url;

    public function __construct($url) {
        $this->url = $url;
    }

    public function setCookies($cookies) {
        $this->cookies = $cookies;
    }

    public function getCookies() {
        return $this->cookies;
    }

    public function setHeaders($headers) {
        $this->headers = $headers;
    }

    public function getHeaders() {
        return $this->headers;
    }

    public function setMethod($method) {
        $this->method = $method;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getUrl() {
        return $this->url;
    }
}
