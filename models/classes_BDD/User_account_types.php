<?php
class User_account_types {
    private $p_data;
    private $p_connexion;

    public function __construct(PDO $connexion) {
        $this->p_data = [];
        $this->p_connexion = $connexion;
    }

    // GET & SET
    public function __get($key) {
        if (array_key_exists($key, $this->p_data)) {
            return $this->p_data[$key];
        }
    }

    public function __set($key, $value) {
        $this->p_data[$key] = $value;
    }

    // SELECTS
    public function selectAll() {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `user_account_types` 
        INNER JOIN `users` ON `users`.`user_id` = `user_account_types`.`user_id` 
        INNER JOIN `account_types` ON `account_types`.`type_id` = `user_account_types`.`type_id`");
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    public function closeConnexion() {
        $this->p_connexion = null;
    }
}