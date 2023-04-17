<?php
class Account_activities {
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
        $stmt = $this->p_connexion->prepare("SELECT * FROM `account_activities` 
        INNER JOIN `activities` ON `activities`.`activity_id` = `account_activities`.`activity_id` 
        INNER JOIN `account_types` ON `account_types`.`type_id` = `account_activities`.`type_id`");
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    public function closeConnexion() {
        $this->p_connexion = null;
    }
}