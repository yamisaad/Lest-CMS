<?php

namespace Core\mvc;

Class Model {

    private static $instance;
    protected $db;

    public function __construct() {
        /* try {

          if(self::$instance === null){
          $this->db = new \PDO('mysql:host=' . \Core\Core::get()->config['dbDefault']['host'] . ';dbname=' . \Core\Core::get()->config['dbDefault']['database'] . '', '' .  \Core\Core::get()->config['dbDefault']['username'] . '', '' .  \Core\Core::get()->config['dbDefault']['password'] . '');
          $this->db->query('SET NAMES utf8');
          self::$instance = true;

          }

          } catch (PDOException $e) {
          echo 'Le probléme est sur la base de donnée veuillez revoir la configuration';
          } */
        try {

            $this->db = new \PDO('mysql:host=' . \Core\Core::get()->config['dbDefault']['host'] . ';dbname=' . \Core\Core::get()->config['dbDefault']['database'] . '', '' . \Core\Core::get()->config['dbDefault']['username'] . '', '' . \Core\Core::get()->config['dbDefault']['password'] . '');
            $this->db->query('SET NAMES utf8');
        } catch (PDOException $e) {
            echo 'Le probléme est sur la base de donnée veuillez revoir la configuration';
        }
    }

}

