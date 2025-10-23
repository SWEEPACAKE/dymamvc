<?php
// app/models/Article.php
class Article {
    protected $db;

    public function __construct() {
        
    }

    public function setDb($value) {
        $this->db = $value;
    }

    public function getAllArticles() {
        $stmt = $this->db->prepare("SELECT * FROM article");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function requeteInsertArticle($articleTitre, $articleContenu) {
        $stmt = $this->db->prepare("INSERT INTO article  (titre, contenu) VALUES (:titre, :contenu)");
        $stmt->bindParam(':titre', $articleTitre);
        $stmt->bindParam(':contenu', $articleContenu);
        $stmt->execute();
    }

    public function requeteSupprimerArticle($articleId) {
        $stmt = $this->db->prepare("DELETE FROM article WHERE id = :id");
        $stmt->bindParam(':id', $articleId);
        $stmt->execute();
    }

}