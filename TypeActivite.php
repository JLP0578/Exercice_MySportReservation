<?php
class TypeActivite {
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
        $stmt = $this->p_connexion->prepare("SELECT * FROM `types_activites`");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectById($id) {
        $stmt = $this->p_connexion->prepare("SELECT * FROM `types_activites` WHERE `id` = ?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    // ADD
    public function add($nom) {
        $stmt = $this->connexion->prepare("INSERT INTO `types_activites`(`nom`) VALUES (?)");
        $stmt->execute([$nom]);
        
        $this->p_data['id'] = $this->connexion->lastInsertId();
        $this->p_data['nom'] = $nom;
        return true;
    }
    
    // UPDATE
    public function update($id, $nom) {
        $stmt = $this->connexion->prepare("UPDATE `types_activites` SET `nom`= ? WHERE `id` = ?");
        $stmt->execute([$nom, $id]);
        
        $this->p_data['id'] = $id;
        $this->p_data['nom'] = $nom;
        
        return true;
    }
    
    // DELETE
    public function delete($id) {
        $stmt = $this->connexion->prepare("DELETE FROM `types_activites` WHERE `id` = ?");
        $stmt->execute([$id]);
        
        return true;
    }
    
    public function closeConnexion() {
        $this->p_connexion = null;
    }
}