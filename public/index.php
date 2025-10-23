<?php
// Inclusions des constantes DB, DB_HOST etc... pour authentifier la connexion à la base
require_once '../config/database.php';
$database = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB, DB_USER, DB_PASSWORD);
// on inclus notre contrôleur
require_once '../app/controllers/ArticleController.php';
$controller = new ArticleController($database);
// On "casse" l'URL demandée pour être sûr de n'avoir que le chemin et pas les paramètres. Exemple : "/delete?id_article=2" deviendra "/delete"
$request_uri = explode("?", $_SERVER['REQUEST_URI']);
// Ici on utilise un switch pour dispatcher les différentes routes : 
// Chaque action sur ce projet enverra une différente donnée en URI
// Qui, elle-même, entraînera une action différente du contrôleur à chaque fois
switch($request_uri[0]) {
    case "/delete":
        // Cas où l'URI  est /delete
        $controller->deleteArticle($_GET['id_article']);
        break;
    case "/add" : 
        // Cas où l'URI  est /add
        $controller->addArticle($_POST['articleTitre'], $_POST['articleContenu']);
        break;
    default: 
        // Comportement par défaut
        $controller->afficherIndex();
        break;
}