<?php

  require_once 'Conf.php';

class Model {

    private static $pdo = NULL;

    public static function init() {
        $password = Conf::getPassword();
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();

        try{
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
                     array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
          } catch(PDOException $e) {
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo $e->getMessage(); // affiche un message d'erreur
            die();
          }
    }


    public static function getPDO() {
        if (is_null($pdo)) {
            self::init();
        }
        return self::$pdo;
    } 

}

?>