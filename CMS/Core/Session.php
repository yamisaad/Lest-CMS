<?php

/**
 * Class qui gere la gestion des Sessions
 * */
class Session {

    private static $_sessionStart = false;

    /**
     * Function permet de faire un session_start et en pas repeter a chaque fois
     * */
    public static function Start() {
        if (self::$_sessionStart == false) {
            session_start();
            self::$_sessionStart = true;
        }
    }

    /**
     * Function qui enregistre la session
     * */
    public static function set($key, $value) {

        $_SESSION[$key] = $value;
    }

    /**
     * Function qui apelle la session(elle peux étre  multi dimentionelle)
     * */
    public static function get($key, $secondKey = false) {
        if ($secondKey == true) {
            if (isset($_SESSION[$key][$secondKey])) {
                $_SESSION[$key][$secondKey];
            }
        } else {

            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            }
        }
        return false;
    }

    /**
     * Detruire la session
     * */
    public static function destroy() {


        session_unset();
        session_destroy();
    }

    /**
     * Filter si le membre est logger
     * */

    /**
     * debug de session
     * */
    public static function display() {

        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
    }

}