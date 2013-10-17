<?php

class Helper {

    /**
     * Function pour faire un systeme de pagination
     * */
    public static function Pagination($controller, $action, $page) {

        for ($i = 1; $i <= $page; $i++) {

            $url = self::url($controller, $action, $i);
            echo $output = '<a href="' . $url . '">' . $i . '</a>';
        }
    }

    public static function title($title, $title2 = 'yamisaaf') {
        if (isset($title)) {
            echo $title;
        } else {
            echo $title2;
        }
    }

    /**
     * Function pour ecrire un url exacte
     * */
    public static function url($controller = '', $action = '', $vars = array()) {
        $urls = \Core\Core::get()->config['urlSite'];
        $urls .=$controller;
        if ($action !== '') {
            $urls.='/' . $action;
        }
        if (!empty($vars)) {
            if (is_array($vars))
                $urls.='/' . implode('/', $vars);
            else
                $urls.='/' . $vars;
        }
        return $urls;
    }

    /**
     * Function pour generer directement le lien
     * */
    public static function lien($name, $controller = null, $action = null, $vars = array(), $id = null) {
        $url = self::url($controller, $action, $vars);
        return $output = '<a id="' . $id . '" href="' . $url . '">' . $name . '</a>';
    }

    /**
     * Function pour faire un redirection
     * */
    public function redirect($controller, $action) {


//header('Status: 300 Moved Permanently', false, 300);      
        header('Location:' . self::url($controller, $action));
        exit();
    }

    public function rpg($url) {
        header('Location:' . $url);
        exit();
    }

    public static function base() {
        return \Core\Core::get()->config['urlSite'];
    }

    public static function theme($nametheme) {
        return self::base() . 'app/theme/' . $nametheme . '/';
    }

    public static function coutvip() {
        return \Core\Core::get()->config['coutvip'];
    }

    public static function coutachat() {
        return \Core\Core::get()->config['coutachat'];
    }

    public static function name() {
        return \Core\Core::get()->config['nameServeur'];
    }

    public static function idp() {
        return \Core\Core::get()->config['idp'];
    }

    public static function idd() {
        return \Core\Core::get()->config['idd'];
    }

    public static function rang($rang) {
        switch ($rang) {
            case 0:
                return 'Joueur';
                break;
            case 1:
                return 'Animateur';
                break;
            case 2:
                return 'Moderateur';
                break;
            case 3:
                return 'Maitre du jeu';
                break;
            case 4:
                return 'Administrateur';
                break;
            case 5:
                return 'Fondateur ';
                break;
        }
    }

    public static function ladder($personnage) {
        switch ($personnage) {
            case 1:
                echo "Féca";
                break;
            case 2:
                echo "Osamoda";
                break;
            case 3:
                echo "Enutrof";
                break;
            case 4:
                echo "Sram";
                break;
            case 5:
                echo "Xélor";
                break;
            case 6:
                echo "Ecaflip";
                break;
            case 7:
                echo "Eniripsa";
                break;
            case 8:
                echo "Iop";
                break;
            case 9:
                echo "Crâ";
                break;
            case 10:
                echo "Sadida";
                break;
            case 11:
                echo "Sacrieur";
                break;
            case 12:
                echo "Pandawa";
                break;
            default:
                echo "*";
        }
    }

    public static function vote() {


//return \Core\Core::get()->_loader->loadModel('News')->Vote();
        if (!($cache = \Core\Core::get()->_loader->_class['PCache']->get('home/vote'))) {

            $cache = array('c' => \Core\Core::get()->_loader->loadModel('News')->Vote());
            \Core\Core::get()->_loader->_class['PCache']->write($cache, 'home/vote', 600);
        }
        return $cache;
    }

    public static function connecter() {

        if (!($cache = \Core\Core::get()->_loader->_class['PCache']->get('home/connecter'))) {

            $cache = array('c' => \Core\Core::get()->_loader->loadModel('News')->connecter());
            \Core\Core::get()->_loader->_class['PCache']->write($cache, 'home/connecter', 600);
        }
        return $cache;
//return \Core\Core::get()->_loader->loadModel('News')->connecter();
    }

    public static function numcomments($id) {
        if (!($cache = \Core\Core::get()->_loader->_class['PCache']->get('home/comment/nombre/commentaires' . $id))) {

            $cache = array('c' => \Core\Core::get()->_loader->loadModel('News')->NumNewsComment($id));
            \Core\Core::get()->_loader->_class['PCache']->write($cache, 'home/comment/nombre/commentaires' . $id, 600);
        }
        return$cache['c'];
    }

    public static function alignement($align) {
        switch ($align) {
            case 0:
                echo "Neutre";
                break;
            case 1:
                echo "Bontarien";
                break;
            case 2:
                echo "Brackmarien";
                break;
            case 3:
                echo "Sérianne";
                break;
            default:
                echo "*";
        }
    }

}

