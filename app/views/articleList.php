<?php
include('includes/header.inc.php');    
?>
<div class="container my-3">
    <div class="d-flex justify-content-lg-between align-items-center mb-4">
        <h1>Liste des Articles</h1>
        <a href="/formulaire.php" class="btn btn-primary">
            Publier un nouvel article
        </a>
    </div>
    <div class="row">
        <?php 
        // Grâce à la variable $articles, définie dans la fonction afficherIndex() du contrôleur
        // On peut afficher la liste des articles
        foreach ($articles as $article) { 
            ?>
            <div class="col-12 col-md-6 col-lg-4 my-3">
                <div class="article text-center p-4">
                    <?= htmlspecialchars($article['titre']); ?>
                    <p><?= htmlspecialchars($article['contenu']) ?></p>
                    <a class="btn btn-sm btn-danger" href="/delete?id_article=<?= $article['id'] ?>">Supprimer</a>
                </div>
            </div>
            <?php 
        }
        ?>
    </div>
</div>
<?php
include('includes/footer.inc.php');  