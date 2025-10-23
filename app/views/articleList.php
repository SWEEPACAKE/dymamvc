<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des Articles</title>
    </head>
    <body>
        <h1>Liste des Articles</h1>
        <ul>
            <?php 
            foreach ($articles as $article) { 
                ?>
                <li>
                    <?= htmlspecialchars($article['titre']); ?>
                    <p><?= htmlspecialchars($article['contenu']) ?></p>
                    <a href="/delete?id_article=<?= $article['id'] ?>">Supprimer</a>
                </li>
                <?php 
            }
            ?>
        </ul>
        <form method="POST" action="/add">
            <input type="text" name="articleTitre" placeholder="Titre du nouvel article"/><br>
            <textarea name="articleContenu" placeholder="Contenu du nouvel article"></textarea><br>
            <button type="submit">Envoyer</button>
        </form>
    </body>
</html>