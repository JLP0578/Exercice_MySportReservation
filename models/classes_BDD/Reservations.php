<?php
class Reservations {
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
        $stmt = $this->p_connexion->prepare("SELECT * FROM `reservations` 
        INNER JOIN `users` ON `users`.`user_id` = `reservations`.`user_id` 
        INNER JOIN `classes` ON `classes`.`class_id` = `reservations`.`class_id` 
        INNER JOIN `activities` ON `activities`.`activity_id` = `reservations`.`activity_id`");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectById($reservation_id) {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `reservations` WHERE `reservation_id` = ?");
        $stmt->execute([$reservation_id]);

        return $stmt->fetch();
    }

    // ADD
    public function add($user_id, $class_id, $activity_id, $reservation_date) {
        $stmt = $this->connexion->prepare("INSERT INTO `reservations`(`user_id`, `class_id`, `activity_id` , `reservation_date`) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user_id, $class_id, $activity_id]);
        
        $this->p_data[`reservation_id`] = $this->connexion->lastInsertId();
        $this->p_data['user_id'] = $user_id;
        $this->p_data['class_id'] = $class_id;
        $this->p_data['activity_id'] = $activity_id;
        $this->p_data['reservation_date'] = $reservation_date;
        
        return true;
    }
    
    // UPDATE
    public function update($reservation_id, $user_id, $class_id, $activity_id, $reservation_date) {
        $stmt = $this->connexion->prepare("UPDATE `reservations` SET `user_id`= ?,`class_id`= ?,`activity_id`= ?, `reservation_date`= ? WHERE `reservation_id` = ?");
        $stmt->execute([$user_id, $class_id, $activity_id, $reservation_id]);
        
        $this->p_data[`reservation_id`] = $reservation_id;
        $this->p_data['user_id'] = $user_id;
        $this->p_data['class_id'] = $class_id;
        $this->p_data['activity_id'] = $activity_id;
        $this->p_data['reservation_date'] = $reservation_date;
        
        return true;
    }
    
    // DELETE
    public function delete($reservation_id) {
        $stmt = $this->connexion->prepare("DELETE FROM `reservations` WHERE `reservation_id` = ?");
        $stmt->execute([$reservation_id]);
        
        return true;
    }
    
    public function closeConnexion() {
        $this->p_connexion = null;
    }
}