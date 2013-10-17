<?php

namespace Core;

/**
 * Class permet de charger d'autre class(par exemple : Controller,model,library...)
 * */
class Loader {

    public $_class = array();

    public function __construct() {
        spl_autoload_register(array($this, 'autoload'));
    }

    public function Compement() {
        $this->loadClass('Route', 'Core\\');
        $this->loadClass('Output', 'Core\\');
        $this->loadClass('Cache', 'Core\\');
        $this->loadClass('PCache', 'Core\\');
        $this->loadClass('Model', 'Core\\mvc\\');
        $this->loadClass('basemvc', 'Core\\mvc\\');

//   $this->loadClass('Controller','Core\\mvc\\');
    }

    /**
     * Function permet de inclure directement le fichier avec l'aide des namespace
     * (et elle est accoupler avec sql_autoload_register)
     * */
    public function autoload($className) {
        $path = str_replace('\\', DS, $className);
        $this->incFile($path . EXT);
    }

    /**
     * Function permet de verifier l'inclusion et inclure
     * */
    public function incFile($inc) {

        if (array_search($inc, get_included_files())) {
            return true;
        } else {

            if (file_exists($inc)) {
                include_once $inc;
                return true;
            } else {

                throw new \Exception("Fichier que vous demander n'existe pas", 1);
                exit();
            }
        }
    }

    public function item($name) {
        
    }

    /**
     * Function permet de charger des classes et le stocker dans la variable $_class
     * */
    public function loadClass($name, $namespace = null) {

        $ucfirst = ucfirst($name);
        $namespace .=ucfirst($name);
        if (isset($this->_class[$ucfirst])) {
            return false;
        }
        $class = new $namespace;

        $this->_class[$ucfirst] = &$class;
    }

    /**
     * Funhction permet de charger les controllers
     * */
    public function loadController($nameController) {

        $name = ucfirst($nameController);
        $name.='Controller';
        $this->incFile(CONTROLLER . $name . EXT);
        $class = new $name;
        return $this->_class['Controllers'] = &$class;
    }

    /**
     * Function permet de charger un model
     * */
    public function loadModel($model) {
        $name = ucfirst($model);
        $name.='Model';
        $this->incFile(MODEL . $name . EXT);
        return $this->_class['Models'] = new $name();
    }

    /**
     * Function permet de charger les library
     * */
    public function library($class = '') {

        if (is_array($class)) {

            foreach ($class as $c) {

                $this->library($class);
            }
            return;
        }
        if (is_null($class) || isset($this->_class[$class])) {
            return false;
        }
        $this->incFile(LIBRARY . $class . EXT);
        return $this->_class['library'] = new $class();
    }

    /**
     * Function permet de recuperer une classe
     * */
    public function getClass($name) {
        if (isset($this->_class[$name])) {
            return $this->_class[$name];
        }
    }

    public function loadHelper($helper) {
        $name = ucfirst($helper);
        $name.='Helper';
        $this->incFile(HELPER . $name . EXT);
        return $this->_class['Helpers'] = new $name();
    }

    /**
     * Function permet de verifier si la class est instancier
     * */
    public function isLoad($class) {
        if (isset($this->_class[$class])) {
            return $this->_class[$class];
        } else {
            return false;
        }
    }

}

