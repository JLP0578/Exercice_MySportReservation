<?php
class Users {
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
        $stmt = $this->p_connexion->prepare("SELECT * FROM `users`");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectById($user_id) {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `users` WHERE `user_id` = ?");
        $stmt->execute([$user_id]);

        return $stmt->fetch();
    }

    public function authentification($email, $password) {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `users` WHERE `email` = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    public function selectByEmail($email) {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `users` WHERE `email` = ?");
        $stmt->execute([$email]);

        return $stmt->fetch();
    }

    // ADD
    public function add($username, $email, $password) {
        $stmt = $this->connexion->prepare("INSERT INTO `users`(`username`, `email`, `password`) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $password]);
        
        $this->p_data[`user_id`] = $this->connexion->lastInsertId();
        $this->p_data['username'] = $username;
        $this->p_data['email'] = $email;
        $this->p_data['password'] = $password;
        
        return true;
    }
    
    // UPDATE
    public function update($user_id, $username, $email, $password) {
        $stmt = $this->connexion->prepare("UPDATE `users` SET `username`= ?,`email`= ?,`password`= ? WHERE `user_id` = ?");
        $stmt->execute([$username, $email, $password, $user_id]);
        
        $this->p_data[`user_id`] = $user_id;
        $this->p_data['username'] = $username;
        $this->p_data['email'] = $email;
        $this->p_data['password'] = $password;
        
        return true;
    }
    
    // DELETE
    public function delete($user_id) {
        $stmt = $this->connexion->prepare("DELETE FROM `users` WHERE `user_id` = ?");
        $stmt->execute([$user_id]);
        
        return true;
    }
    
    public function closeConnexion() {
        $this->p_connexion = null;
    }
}