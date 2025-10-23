<?php
// app/models/Article.php
class Article {
    // On prépare un attribut protégé $db pour accueillir la connexion à la base de données.
    protected $db;

    public function __construct() {
        
    }

    // Ce setter, appelé dans le constructeur du contrôleur, définit la connexion à la base de données
    public function setDb($value) {
        $this->db = $value;
    }

    // Cette fonction permet de lister tous les articles de la base
    public function getAllArticles() {
        $stmt = $this->db->prepare("SELECT * FROM article");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cette fonction permet d'insérer un article dans la base à l'aide des données passées par le contrôleur
    public function requeteInsertArticle($articleTitre, $articleContenu) {
        $stmt = $this->db->prepare("INSERT INTO article  (titre, contenu) VALUES (:titre, :contenu)");
        $stmt->bindParam(':titre', $articleTitre);
        $stmt->bindParam(':contenu', $articleContenu);
        $stmt->execute();
    }

    // Cette fonction permet de gérer la suppression d'un article en base, grâce à l'ID d'un article
    public function requeteSupprimerArticle($articleId) {
        $stmt = $this->db->prepare("DELETE FROM article WHERE id = :id");
        $stmt->bindParam(':id', $articleId);
        $stmt->execute();
    }

}