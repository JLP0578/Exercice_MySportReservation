<?php
class Connexion {
    private static $instances = array();

    private function __construct() {}

    public static function getInstance($user)
    {
        if (!isset(self::$instances[$user])) {
            require_once "../../config.php";
            $config = $config[$user];
            $p_host = $config['host'];
            $p_dbname = $config['dbname'];
            $p_user = $config['username'];
            $p_password = $config['password'];
            $p_dsn = "mysql:host=$p_host;dbname=$p_dbname;charset=utf8mb4";

            try {
                self::$instance = new PDO($p_dsn, $p_user, $p_password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Erreur de connexion : ' . $e->getMessage();
                die();
            }
        }

        return self::$instances[$user];
    }
}