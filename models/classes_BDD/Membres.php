<?php
class Membres {
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
        $stmt = $this->p_connexion->prepare("SELECT * FROM ``");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectById($id) {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `` WHERE `id` = ?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function selectByEmail($email) {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `` WHERE `email` = ?");
        $stmt->execute([$email]);

        return $stmt->fetch();
    }

    // ADD
    public function add($nom, $prenom, $email) {
        $stmt = $this->connexion->prepare("INSERT INTO ``(`nom`, `prenom`, `email`) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email]);
        
        $this->p_data['id'] = $this->connexion->lastInsertId();
        $this->p_data['nom'] = $nom;
        $this->p_data['prenom'] = $prenom;
        $this->p_data['email'] = $email;
        
        return true;
    }
    
    // UPDATE
    public function update($id, $nom, $prenom, $email) {
        $stmt = $this->connexion->prepare("UPDATE `` SET `nom`= ?,`prenom`= ?,`email`= ? WHERE `id` = ?");
        $stmt->execute([$nom, $prenom, $email, $id]);
        
        $this->p_data['id'] = $id;
        $this->p_data['nom'] = $nom;
        $this->p_data['prenom'] = $prenom;
        $this->p_data['email'] = $email;
        
        return true;
    }
    
    // DELETE
    public function delete($id) {
        $stmt = $this->connexion->prepare("DELETE FROM `` WHERE `id` = ?");
        $stmt->execute([$id]);
        
        return true;
    }
    
    public function closeConnexion() {
        $this->p_connexion = null;
    }
}