<?php

namespace Core;

class Route {

    public static $_urlRoute = array();
    public static $_DefaultUrl = array();

    public function getUrl($pathUrl) {

        $data = explode('/', $pathUrl);



        if (!empty($data[0]))
            self::$_urlRoute['Controller'] = $data[0];
        else
            self::$_urlRoute['Controller'] = self::$_DefaultUrl['Controller'];
        if (!empty($data[1]))
            self::$_urlRoute['Action'] = $data[1];
        else
            self::$_urlRoute['Action'] = self::$_DefaultUrl['Action'];


        if (count($data) > 2) {
            self::$_urlRoute['params'] = array_slice($data, 2);
        } else {
            self::$_urlRoute['params'] = self::$_DefaultUrl['params'];
        }


        return self::$_urlRoute;
        //print_r(self::$_urlRoute);
    }

    public function call_params() {
        //Core::debug(self::$_urlRoute);

        $loadClass = Core::get()->_loader->loadController(self::$_urlRoute['Controller']);
        if (!method_exists($loadClass, self::$_urlRoute['Action'])) {
            throw new \Exception(" la method  : " . self::$_urlRoute['Action'] . " n'existe pas", 1);
            exit();
        }
        call_user_func_array(array($loadClass, self::$_urlRoute['Action']), self::$_urlRoute['params']);
        // Core::debug(self::$_urlRoute);
    }

    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    public static function PathUrl() {

        if (empty($_SERVER['PATH_INFO']))
            return null;
        else
            return ltrim($_SERVER['PATH_INFO'], '/');
    }

    public function setAction($var) {

        if (is_string($var)) {
            return $var;
        } else {
            return false;
        }
    }

    public function setController($var) {

        if (is_string($var)) {
            return $var;
        } else {
            return false;
        }
    }

    public function getController() {
        return self::$_urlRoute['Controller'];
    }

    public function getMethod() {
        return self::$_urlRoute['Action'];
    }

    public function getParams() {
        return self::$_urlRoute['params'];
    }

}

