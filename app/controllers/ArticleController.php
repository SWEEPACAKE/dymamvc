<?php
// On inclut le modèle
require_once '../app/models/Article.php';

class ArticleController {

    private $articleModel;

    // Puis lorsque l'on instancie le contrôleur, on lui passe la connexion à la BDD
    // Il va lui-même passer la balle à la base de données. 
    public function __construct($database) {
        $this->articleModel = new Article();
        $this->articleModel->setDb($database);
    }

    public function afficherIndex() {
        $articles = $this->articleModel->getAllArticles();
        require '../app/views/articleList.php';
    }

    public function addArticle($articleTitre, $articleContenu) {
        $this->articleModel->requeteInsertArticle($articleTitre, $articleContenu);
        header('Location: /');
    }

    public function deleteArticle($articleId) {
        $this->articleModel->requeteSupprimerArticle($articleId);
        header('Location: /');
    }

}