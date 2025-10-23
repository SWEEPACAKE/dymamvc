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

    // Cette fonction est appelée par défaut dans le switch. 
    //Elle demande au modèle d'afficher la liste des articles, puis elle inclut la vue.
    public function afficherIndex() {
        $articles = $this->articleModel->getAllArticles();
        $meta_title = "Accueil";
        require '../app/views/articleList.php';
    }

    // Cette fonction est appelée dans le cas /add du switch. 
    // Elle demande au modèle de gérer l'insertion d'un article
    public function addArticle($articleTitre, $articleContenu) {
        $this->articleModel->requeteInsertArticle($articleTitre, $articleContenu);
        header('Location: /');
    }

    // Cette fonction est appelée dans le cas /delete du switch. 
    // Elle demande au modèle de gérer la suppression d'un article.
    public function deleteArticle($articleId) {
        $this->articleModel->requeteSupprimerArticle($articleId);
        header('Location: /');
    }

    public function afficherFormulaire() {
        $meta_title = "Nouvelle publication";
        require '../app/views/articleForm.php';
    }

}