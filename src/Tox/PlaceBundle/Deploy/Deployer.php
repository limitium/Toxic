<?php

namespace Tox\PlaceBundle\Deploy;

use Tox\ParserBundle\Parser\FileNetwork;
use Tox\ParserBundle\Parser\Request;

use Tox\PlaceBundle\Entity\FtpAccount;
use Tox\SatelliteBundle\Entity\Satellite;

class Deployer {

    private $ftr;
    private $baseDir;
    private $ip;
    private $user;
    private $password;

    public function __construct(FtpAccount $ftp) {
        list($this->ip, $this->baseDir) = explode('@', $ftp->getUrl());
        $this->user = $ftp->getUsername();
        $this->password = $ftp->getPassword();
    }

    public function connect() {
        $this->ftr = ftp_connect($this->ip);
        if (ftp_login($this->ftr, $this->user, $this->password)) {
            ftp_pasv($this->ftr, true);
            ftp_chdir($this->ftr, $this->baseDir);
        }
    }

    public function close() {
        ftp_close($this->ftr);
    }

    private function deletePrevVersion() {
        foreach (ftp_nlist($this->ftr, $this->baseDir) as $file) {
            if ($this->is_dir($file)) {
                if (!in_array($this->getFileName($file), array('.', '..', 'data'))) {
                    $this->deleteDir($file);
                }
            } else {
                ftp_delete($this->ftr, $file);
            }
        }
    }

    private function getFileName($file) {
        $fileName = explode('/', $file);
        return array_pop($fileName);
    }

    private function is_dir($file) {
        return ftp_size($this->ftr, $file) == -1;
    }

    private function deleteDir($dir) {

        foreach (ftp_nlist($this->ftr, $dir) as $file) {
            if (!in_array($this->getFileName($file), array('.', '..'))) {
                if ($this->is_dir($file)) {
                    $this->deleteDir($file);
                } else {
                    ftp_delete($this->ftr, $file);
                }
            }
        }
        ftp_rmdir($this->ftr, $dir);
    }

    public function updateShell() {
        $this->deletePrevVersion();

        $downloader = new Downloader();
        $version = $downloader->getLastVersion();
        $downloader->cleanup();

        $this->uploadShell($downloader, $version);

        $downloader->cleanup(true);

        return $version;
    }

    private function uploadShell(Downloader $downloader, $version) {
        $from = $downloader->getDir() . 'limitium-satellite-' . $version . DIRECTORY_SEPARATOR . 'www';
        $this->copyDir($from, $from);
    }

    private function copyDir($dir, $from) {
        foreach (scandir($dir) as $file) {
            if (in_array($file, array('.', '..'))) {
                continue;
            }
            $file = $dir . DIRECTORY_SEPARATOR . $file;
            $ftpFile = str_replace($from . DIRECTORY_SEPARATOR, $this->baseDir, $file);
            $ftpFile = str_replace(DIRECTORY_SEPARATOR, "/", $ftpFile);
            if (is_dir($file)) {
                ftp_mkdir($this->ftr, $ftpFile);
                $this->copyDir($file, $from);
            } else {
                ftp_put($this->ftr, $ftpFile, $file, FTP_BINARY);
            }
        }
    }

    public function deploy(Satellite $satellite) {
        $satellite->getConfig();
        $satellite->getDomen()->getName();
        $satDir = str_replace('.', '', $satellite->getDomen()->getName());

        @ftp_mkdir($this->ftr, $this->baseDir . "/data");
        @ftp_mkdir($this->ftr, $this->baseDir . "/data/$satDir");
        @ftp_mkdir($this->ftr, $this->baseDir . "/data/$satDir/pages");
        @ftp_mkdir($this->ftr, $this->baseDir . "/data/$satDir/posts");

        $this->putFile($this->baseDir . "/data/$satDir/config.php", "<?php return " . var_export($satellite->getConfig(), true) . ";");
        //@todo: add theme upload;
    }

    private function putFile($file, $content) {
        $fileName = sys_get_temp_dir() . 'ftp_tmp_file';
        file_put_contents($fileName, $content);
        @ftp_delete($this->ftr, $file);
        ftp_put($this->ftr, $file, $fileName, FTP_BINARY);
    }

    public function update(Satellite $satellite) {
        $satDir = str_replace('.', '', $satellite->getDomen()->getName());

        foreach ($satellite->getPosts() as $post) {
            if ($post->getIsPosted()) {
                continue;
            }
            $uploadDir = $this->baseDir . "/data/$satDir/";
            $uploadDir += $post->getIsPage() ? "pages/" : "posts/";
            $this->putFile($uploadDir . $post->getFileName(), "<?php return array('title'=>'" . $post->getTitle() . "','body'=>'" . $post->getBody() . "');");
        }

    }
}
