<?php

namespace Tox\PlaceBundle\Deploy;

use Tox\ParserBundle\Parser\FileNetwork;
use Tox\ParserBundle\Parser\Request;

class Downloader {

    private $zip_dir;
    private $zip_file = "sattelite.zip";

    public function __construct() {
        $this->zip_dir = "c:\\WebServers\\sattelite\\";
        $this->network = new FileNetwork();
    }


    public function getLastVersion() {
        $this->download();
        $this->unzip();
        $satDir = scandir($this->zip_dir);
        $satDir = $satDir[2];
        $version = explode('-', $satDir);
        return $version[2];
    }

    private function download() {
        $zipData = $this->network->get(new Request('https://github.com/limitium/satellite/zipball/master'));
        $zipFile = $this->zip_dir . $this->zip_file;
        @mkdir($this->zip_dir, 0777, true);
        file_put_contents($zipFile, $zipData);
    }

    private function unzip() {
        $zip = zip_open($this->zip_dir . $this->zip_file);
        while ($zip_entry = zip_read($zip)) {
            zip_entry_open($zip, $zip_entry);
            if (substr(zip_entry_name($zip_entry), -1) == '/') {
                $zdir = substr(zip_entry_name($zip_entry), 0, -1);
                @mkdir($this->zip_dir . $zdir, 0777, true);
            } else {
                $name = $this->zip_dir . zip_entry_name($zip_entry);
                file_put_contents($name, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)), zip_entry_filesize($zip_entry));
            }
            zip_entry_close($zip_entry);
        }
        zip_close($zip);
    }

    public function cleanup($all = false) {
        @unlink($this->zip_dir . $this->zip_file);
        if ($all) {
            $this->deleteDir($this->zip_dir);
        }
    }

    private function deleteDir($dir) {
        foreach (scandir($dir) as $file) {
            if (in_array($file, array('.', '..'))) {
                continue;
            }
            $file = $dir . DIRECTORY_SEPARATOR . $file;
            if (is_dir($file)) {
                $this->deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dir);
    }

    public function getDir(){
        return $this->zip_dir;
    }

}
