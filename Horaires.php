<?php
class Horaires {
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
        $stmt = $this->p_connexion->prepare("SELECT * FROM `horaires`");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectById($id) {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `horaires` WHERE `id` = ?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    // ADD
    public function add($nom, $heure_debut, $heure_fin) {
        $stmt = $this->connexion->prepare("INSERT INTO `horaires`(`nom`, `heure_debut`, `heure_fin`) VALUES (?,?,?)");
        $stmt->execute([$nom, $heure_debut, $heure_fin]);
        
        $this->p_data['id'] = $this->connexion->lastInsertId();
        $this->p_data['nom'] = $nom;
        $this->p_data['heure_debut'] = $heure_debut;
        $this->p_data['heure_fin'] = $heure_fin;
        return true;
    }
    
    // UPDATE
    public function update($id, $nom, $heure_debut, $heure_fin) {
        $stmt = $this->connexion->prepare("UPDATE `horaires` SET `id`= ?,`heure_debut`= ?,`heure_fin`= ? WHERE `id` = ?");
        $stmt->execute([$nom, $id]);
        
        $this->p_data['id'] = $id;
        $this->p_data['nom'] = $nom;
        $this->p_data['heure_debut'] = $heure_debut;
        $this->p_data['heure_fin'] = $heure_fin;
        
        return true;
    }
    
    // DELETE
    public function delete($id) {
        $stmt = $this->connexion->prepare("DELETE FROM `horaires` WHERE `id` = ?");
        $stmt->execute([$id]);
        
        return true;
    }
    
    public function closeConnexion() {
        $this->p_connexion = null;
    }
}