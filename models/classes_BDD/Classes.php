<?php
class Classes {
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
        $stmt = $this->p_connexion->prepare("SELECT * FROM `classes`");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectById($class_id) {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `classes` WHERE `class_id` = ?");
        $stmt->execute([$class_id]);

        return $stmt->fetch();
    }

    public function selectByActivityId($activity_id) {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `classes` WHERE `activity_id` = ?");
        $stmt->execute([$activity_id]);

        return $stmt->fetch();
    }

    // ADD
    public function add($activity_id, $start_time, $end_time, $available_spots) {
        $stmt = $this->connexion->prepare("INSERT INTO `classes`(`activity_id`, `start_time`, `end_time` , `available_spots`) VALUES (?, ?, ?, ?)");
        $stmt->execute([$activity_id, $start_time, $end_time]);
        
        $this->p_data[`class_id`] = $this->connexion->lastInsertId();
        $this->p_data['activity_id'] = $activity_id;
        $this->p_data['start_time'] = $start_time;
        $this->p_data['end_time'] = $end_time;
        $this->p_data['available_spots'] = $available_spots;
        
        return true;
    }
    
    // UPDATE
    public function update($class_id, $activity_id, $start_time, $end_time, $available_spots) {
        $stmt = $this->connexion->prepare("UPDATE `classes` SET `activity_id`= ?,`start_time`= ?,`end_time`= ?, `available_spots`= ? WHERE `class_id` = ?");
        $stmt->execute([$activity_id, $start_time, $end_time, $class_id]);
        
        $this->p_data[`class_id`] = $class_id;
        $this->p_data['activity_id'] = $activity_id;
        $this->p_data['start_time'] = $start_time;
        $this->p_data['end_time'] = $end_time;
        $this->p_data['available_spots'] = $available_spots;
        
        return true;
    }
    
    // DELETE
    public function delete($class_id) {
        $stmt = $this->connexion->prepare("DELETE FROM `classes` WHERE `class_id` = ?");
        $stmt->execute([$class_id]);
        
        return true;
    }
    
    public function closeConnexion() {
        $this->p_connexion = null;
    }
}