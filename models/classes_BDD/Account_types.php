<?php
class Account_types {
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
        $stmt = $this->p_connexion->prepare("SELECT * FROM `account_types`");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectById($type_id) {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `account_types` WHERE `type_id` = ?");
        $stmt->execute([$type_id]);

        return $stmt->fetch();
    }

    public function selectByName($type_name) {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `account_types` WHERE `type_name` = ?");
        $stmt->execute([$type_name]);

        return $stmt->fetch();
    }

    // ADD
    public function add($type_name) {
        $stmt = $this->connexion->prepare("INSERT INTO `account_types`(`type_name`) VALUES (?)");
        $stmt->execute([$type_name]);
        
        $this->p_data[`type_id`] = $this->connexion->lastInsertId();
        $this->p_data['type_name'] = $type_name;
        
        return true;
    }
    
    // UPDATE
    public function update($type_id, $type_name) {
        $stmt = $this->connexion->prepare("UPDATE `account_types` SET `type_name`= ? WHERE `type_id` = ?");
        $stmt->execute([$type_name, $type_id]);
        
        $this->p_data[`type_id`] = $type_id;
        $this->p_data['type_name'] = $type_name;
        
        return true;
    }
    
    // DELETE
    public function delete($type_id) {
        $stmt = $this->connexion->prepare("DELETE FROM `account_types` WHERE `type_id` = ?");
        $stmt->execute([$type_id]);
        
        return true;
    }
    
    public function closeConnexion() {
        $this->p_connexion = null;
    }
}