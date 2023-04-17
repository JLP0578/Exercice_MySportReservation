<?php
class Activities {
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
        $stmt = $this->p_connexion->prepare("SELECT * FROM `activities`");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectById($activity_id) {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `activities` WHERE `activity_id` = ?");
        $stmt->execute([$activity_id]);

        return $stmt->fetch();
    }

    public function selectByName($activity_name) {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `activities` WHERE `activity_name` = ?");
        $stmt->execute([$activity_name]);

        return $stmt->fetch();
    }

    // ADD
    public function add($activity_name, $description, $duration) {
        $stmt = $this->connexion->prepare("INSERT INTO `activities`(`activity_name`, `description`, `duration`) VALUES (?, ?, ?)");
        $stmt->execute([$activity_name, $description, $duration]);
        
        $this->p_data[`activity_id`] = $this->connexion->lastInsertId();
        $this->p_data['activity_name'] = $activity_name;
        $this->p_data['description'] = $description;
        $this->p_data['duration'] = $duration;
        
        return true;
    }
    
    // UPDATE
    public function update($activity_id, $activity_name, $description, $duration) {
        $stmt = $this->connexion->prepare("UPDATE `activities` SET `activity_name`= ?,`description`= ?,`duration`= ? WHERE `activity_id` = ?");
        $stmt->execute([$activity_name, $description, $duration, $activity_id]);
        
        $this->p_data[`activity_id`] = $activity_id;
        $this->p_data['activity_name'] = $activity_name;
        $this->p_data['description'] = $description;
        $this->p_data['duration'] = $duration;
        
        return true;
    }
    
    // DELETE
    public function delete($activity_id) {
        $stmt = $this->connexion->prepare("DELETE FROM `activities` WHERE `activity_id` = ?");
        $stmt->execute([$activity_id]);
        
        return true;
    }
    
    public function closeConnexion() {
        $this->p_connexion = null;
    }
}