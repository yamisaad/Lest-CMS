<?php

namespace Core\mvc;

abstract Class Controller {

    /**
     * function permet d'avoir directement a la class
     * */
    public function __get($nameClass) {
        if (isset(\Core\Core::get()->_loader->_class[$nameClass])) {
            return \Core\Core::get()->_loader->_class[$nameClass];
        } else {

            throw new \Exception("la class n'est pas instancier ou n'existe pas", 1);
            return false;
        }
    }

    public function loadModel($name) {

        return \Core\Core::get()->_loader->loadModel($name);
    }

}