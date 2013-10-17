<?php
namespace Core;


/*
 * (c) 2013 Yann Guineau
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class PCache
{
    private $path;
    private $expire;
    private $errors = array();

    public function __construct()
    {
        $this->path =BASE . Core::get()->config['Cache']['dossier']; //APP.DS.Conf::$cache['path'];
        $this->default_expire = 600;
    }

    /**
    * Obtenir le contenu d'un fichier cache.
    * @param $filename Nom du fichier cache
    **/
    public function get($filename = null)
    {
        $filename = str_replace('/', DS, $filename);

        if (!is_dir($this->path) || !is_writable($this->path))
        {
            $this->addError("Cache dir dosen't exist or unable to open it.");
            return false;
        }

        $filepath = $this->path.DS.$filename.'.cache';

        if(!@file_exists($filepath))
        {
            $this->addError("Cache file dosen't exis.");
            return false;
        }

        if(!$fp = @fopen($filepath, "r"))
        {
            $this->addError("Unable to read cache file.");
            return false;
        }

        flock($fp, LOCK_SH);

        if(filesize($filepath) > 0)
        {
            //$contents = fread($fp, filesize($filepath));
            $contents = unserialize(fread($fp, filesize($filepath)));

        }
        else
        {
            $contents = null;
        }

        flock($fp, LOCK_UN);
        fclose($fp);

        if(!empty($contents['__cache_expires']) && $contents['__cache_expires'] < time())
        {
            $this->delete($filename);
            $this->addError("Cache file expired.");
            return false;
        }

        return @$contents['__cache_contents'];
    }

    /**
    * Ecrire un fichier cache.
    * @param $contents  Contenue du cache
    * @param $filename  Nom du fichier cache
    * @param $expires   Date d'expiration du cache
    **/
    public function write($contents = null, $filename = null, $expires = null)
    {
        $contents = array('__cache_contents' => $contents);
        $filename = str_replace('/', DS, $filename);

        if (!is_dir($this->path) || !is_writable($this->path))
        {
            $this->addError("Cache dir dosen't exist or unable to write in.");
            return false;
        }

        $subdirs = explode(DS, $filename);

        if(count($subdirs) > 1)
        {
            array_pop($subdirs);

            $test_path = $this->path.DS.implode(DS, $subdirs);

            if(!@file_exists($test_path))
            {
                if(!mkdir($test_path, 0666, true))
                {
                    $this->addError("Unable to create direcoty: ".$test_path);
                    return false;
                }
            }
        }

        $cache_path = $this->path.DS.$filename.'.cache';

        if(!$fp = @fopen($cache_path, "w"))
        {
            $this->addError("Unable to write Cache file: ".$cache_path);
            return false;
        }

        $contents['__cache_created'] = time();

        if(!empty($expires))
        {
            $contents['__cache_expires'] = $expires + time();
        }
        elseif(!empty($this->default_expire))
        {
            $this->_contents['__cache_expires'] =$this->default_expire + time();
        }

        if(flock($fp, LOCK_EX))
        {
            //fwrite($fp, serialize($contents));
            fwrite($fp,serialize($contents));

            flock($fp, LOCK_UN);
        }
        else
        {
            $this->addError("Cache was unable to secure a file lock for file at: ".$cache_path);
            return false;
        }

        fclose($fp);
        @chmod($cache_path, 0666);

        return true;
    }

    /**
    * Supprime un fichier cache.
    * @param $filename Nom du fichier cache
    **/
    public function delete($filename = null)
    {
        if($filename == null)
        {
            $this->addError("Cache file name is empty.");
            return false;
        }

        $filename = str_replace('/', DS, $filename);
        $file_path = $this->path.DS.$filename.'.cache';

        if(@file_exists($file_path)) unlink($file_path);

        return true;
    }

    /**
    * Renvoi les erreurs dans un tableau.
    **/
    public function errors()
    {
        return $this->errors;
    }

    /**
    * Ajout d'erreur dans le tableau d'erreurs.
    * @param $error Erreur a ajouté (texte)
    **/
    private function addError($error)
    {
        array_push($this->errors, $error);
    }
}