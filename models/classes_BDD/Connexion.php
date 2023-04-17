<?php
class Connexion {
    private static $instances = array();

    private function __construct() {}

    public static function getInstance($user) {
        if (!isset(self::$instances[$user])) {
            require __DIR__.'/../../config.php';
            $configuration = $config[$user];
            $p_host = $configuration['host'];
            $p_dbname = $configuration['dbname'];
            $p_user = $configuration['username'];
            $p_password = $configuration['password'];
            $p_dsn = "mysql:host=$p_host;dbname=$p_dbname;charset=utf8mb4";

            try {
                self::$instances[$user] = new PDO($p_dsn, $p_user, $p_password);
                self::$instances[$user]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Erreur de connexion : ' . $e->getMessage();
                die();
            }
        }

        return self::$instances[$user];
    }

    public static function close($user) {
        if (isset(self::$instances[$user])) {
            self::$instances[$user] = null;
        }
    }
}
/* HOW USE CONNEXION
$connexion = Connexion::getInstance('admin');
$user = new Users($connexion);
$user_1 = $user->selectById(1);
Connexion::close('admin');
d($user_1["user_id"]);
 */