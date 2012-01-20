<?php
namespace Tox\ParserBundle\Parser;

use Tox\ParserBundle\Parser\Parser;
use Tox\ParserBundle\Parser\Task;

class Imager {

    public static function get($q) {
        $url = "http://images.google.com/search?tbm=isch&hl=EN&source=hp&biw=1797&bih=911&q=" . urlencode($q);
        $task = new Task($url, "/imgurl=(.+?)&/ims");
        $parser = new Parser();
        $parser->execute($task);
        $imgs = $task->getResult();
        return $imgs[rand(0, sizeof($imgs) - 1)];

    }
}
