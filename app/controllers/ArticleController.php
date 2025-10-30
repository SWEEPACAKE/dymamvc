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
    public function addArticle($articleTitre, $articleContenu, $articlePhotoIntro) {
        // On vérifie si le fichier uploadé est bien une image
        // En testant si son type MIME commence par "image/"
        if(substr($articlePhotoIntro['type'], 0, 6) == "image/") {
            // Cas où l'on a bien uploadé une image

            // On copie le fichier depuis la mémoire du serveur 
            // vers un emplacement physique
            move_uploaded_file($articlePhotoIntro['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/images/" . $articlePhotoIntro['name']);

            // Puis on récupère son nom pour construire 
            // le chemin vers ce fichier
            $cheminDefinitif = "/images/" . $articlePhotoIntro['name'];
        } else {
            // Cas où l'on a uploadé autre chose qu'une image, 
            // ou alors rien du tout donc on laisse le chemin à NULL
            $cheminDefinitif = NULL;
        }
        $this->articleModel->requeteInsertArticle($articleTitre, $articleContenu, $cheminDefinitif);
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