<?php
include('includes/header.inc.php');    
?>
<div class="container my-3">
<h1 class="text-center">Nouvelle publication</h1>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <form method="POST" action="/add">
                <input class="form-control" type="text" name="articleTitre" placeholder="Titre du nouvel article"/><br>
                <textarea class="form-control" name="articleContenu" placeholder="Contenu du nouvel article"></textarea><br>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>
<?php
include('includes/footer.inc.php'); 