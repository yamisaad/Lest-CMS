<?php

namespace Core;

class Core {

    public $_loader;
    public $config;
    public $vars = array();
    private static $instance;

    public function __construct() {
        self::$instance = $this;
        require CORE . 'Helper' . EXT;
        require LIBRARY . 'Captcha' . EXT;
        $this->config = require BASE . 'config' . DS . 'config' . EXT;

        require CORE . 'Loader' . EXT;

        $this->_loader = new Loader();
//$this->_loader->loadClass('Output','Core\\');
        Route::$_DefaultUrl = array(
            'Controller' => $this->config['routerDefault']['Controller'],
            'Action' => $this->config['routerDefault']['Action'],
            'params' => array(),
        );
    }

    public function __get($nameClass) {
        if (isset($this->_loader->_class[$nameClass])) {
            return $this->_loader->_class[$nameClass];
        } else {

            throw new Exception("la class n'est pas instancier ou n'existe pas", 1);
            return false;
        }
    }

    public function run() {


        $this->_loader->Compement();
// $this->_loader->_class['Route']->test();
        $this->Route->getUrl(Route::PathUrl());
        $this->Route->call_params();
    }

    public static function get() {
        return self::$instance;
    }

    public static function debug($array) {
        echo "<pre>";
        print_r($array);
        echo "<pre>";
    }

}