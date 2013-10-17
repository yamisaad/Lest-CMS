<?php

namespace Core;

class Output {

    private $_vars = array();

    /**
     * function permet de passer une vus
     * */
    public function view($chemin, $vars = array(), $layout = 'default') {
        extract($vars); // variable a extraire
        $files = VIEW . $chemin . EXT;
        if (!file_exists($files)) {
            exit("le chemin de la vue est introuvable");
        }
        ob_start();
        require $files;
        $content = ob_get_clean();

        foreach ($this->_vars as $key => $value) {

            $content = preg_replace('#\{' . $key . '\}#', $value, $content);
        }

        $content = preg_replace_callback('#(\[%if(.*)\])#isu', function($match) {
                    return $match[0];
                }, $content);

        $content = preg_replace_callback('#(\[%else:\])#isu', function($match) {
                    return $match[0];
                }, $content);
        // $content = preg_replace_callback('#\[%(endif;)\$]#',function($match){ return $match[1];},$content);

        $content = preg_replace_callback('#(\[%endif;\])#isu', function($match) {
                    $match[0];
                }, $content);
        $content = str_replace('[%', '<?php', $content);
        $content = str_replace(']', '?>', $content);


        require LAYOUT . $layout . EXT;
    }

    /**
     * function d'enregister une variable et sa valeur dans la variable $_vars
     * */
    public function vars($var) {

        foreach ($var as $key => $value) {

            $this->_vars[$key] = $value;
        }
    }

    /**
     * function permet d'avoir le contenu d'un fichier
     * */
    public function parseTemplate($chemin) {

        $content = file_get_contents($chemin);
    }

    /**
     * function permet d'indiquer que c'est une erreur 404
     * */
    public function e404() {
        header('HTTP/1.1 404 Not Found');
        $this->view('404');
    }

    /**
     * function permet d'indiquer que c'est une erreur 403
     * */
    public function e403() {
        header('HTTP/1.1 403 Not Found');
        $this->view('403');
    }

    /**
     * function permet de rediriger et faire un message de succes
     * */
    public function success($title, $message) {
        $this->view("Helper::url('account','success')", array(
            'titre' => $title,
            'message' => $message
        ));
    }

    /**
     * function permet de rediriger et faire un message de erreur
     * */
    public function error($image, $title, $message, $controller = '', $method = '') {
        $this->view('statuts/error', array(
            'image' => $image,
            'titre' => $title,
            'message' => $message,
            'controller' => $controller,
            'method' => $method
        ));
    }

}