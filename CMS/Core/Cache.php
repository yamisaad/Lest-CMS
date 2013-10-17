<?php

namespace Core;

/**
 * Class permet de gerer le Cache (j'ai repris et améliorer de mon ancien mvc)
 * */
Class Cache {

    public $chemin;
    public $path;
    public $content;
    public $buffer;
    public $time;
    public $temps;

    public function write($cachename, $content = null) {

        $this->path = BASE . Core::get()->config['Cache']['dossier'];
        $this->chemin = BASE . Core::get()->config['Cache']['dossier'] . DS . $cachename . Core::get()->config['Cache']['extention'];
        /* if(file_exists($this->chemin)){
          throw new Exception("Fichier deja existant");

          } */
        if (!is_dir($this->path) && !is_writable($this->path)) {
            mkdir(dirname($this->path), 0777, true);
            throw new Exception("Dosser innexistant ou innacecible");
            return false;
        }
        return file_put_contents($this->chemin, serialize($content));
    }

    public function read($cachename) {
        $this->path = BASE . Core::get()->config['Cache']['dossier'];
        $this->chemin = BASE . Core::get()->config['Cache']['dossier'] . DS . $cachename . Core::get()->config['Cache']['extention'];
        $this->time = @(time() - filemtime($this->chemin)) / 60;
        if (!is_dir($this->path) && !is_readable($this->chemin)) {
            throw new Exception("Dossier innexistant ou le fichier ne peux pas étre lis");
        }

        if (!file_exists($this->chemin)) {
            //throw new Exception("Cache n'existe pas");
            return false;
        }

        if ($this->time > Core::get()->config['Cache']['time']) {
            //Core::get()->config['Cache']['time']
            if (file_exists($this->chemin)) {

                unlink($this->chemin);
                // unset($this->chemin);
                return false;
            }
        }
        return unserialize(file_get_contents($this->chemin));
    }

    public function startCache($cachename) {

        if ($this->content = $this->read($cachename)) {
            echo $this->content;
            $this->buffer = false;
            return true;
        }
        ob_start();
        $this->buffer = $cachename;
    }

    public function endCache() {

        if (!$this->buffer) {
            return false;
        }
        $this->content = ob_get_clean();
        echo $this->content;
        $this->write($this->buffer, $this->content);
    }

    public function deleteCache($cachename) {
        $this->chemin = BASE . Core::get()->config['Cache']['dossier'] . DS . $cachename . Core::get()->config['Cache']['extention'];
        $this->path = BASE . Core::get()->config['Cache']['dossier'];
        if (file_exists($this->chemin) && is_dir($this->path)) {
            unlink($this->chemin);
        }
    }

    public function _hash($cachename) {
        return sha1($cachename);
    }

}

