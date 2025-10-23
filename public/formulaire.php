<?php
// Inclusions des constantes DB, DB_HOST etc... pour authentifier la connexion à la base
require_once '../config/database.php';
$database = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB, DB_USER, DB_PASSWORD);
// on inclus notre contrôleur
require_once '../app/controllers/ArticleController.php';
$controller = new ArticleController($database);

$controller->afficherFormulaire();