<?php

namespace Tox\ParserBundle\Parser;

class FileNetwork extends Network {

    public function get(Request $request) {
        return file_get_contents($request->getUrl());
    }
}
