<?php
include('includes/header.inc.php');    
?>
<div class="container my-3">
<h1 class="text-center">Nouvelle publication</h1>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <form method="POST" action="/add" enctype="multipart/form-data">
                <input class="form-control" type="text" name="articleTitre" placeholder="Titre du nouvel article"/><br>
                <textarea class="form-control" name="articleContenu" placeholder="Contenu du nouvel article"></textarea><br>

                <input type="file" id="photo_intro" name="photo_intro" class="d-none"/>
                <label for="photo_intro" class="btn btn-sm btn-primary">Photo d'intro</label>
                <div class="thumbnail">
                    <img src="" class="img-fluid"/>
                    <div id="img-name"></div>
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>
<?php
include('includes/footer.inc.php');
?>
<script>
    $(function() {
        $('#photo_intro').on('change', function() {
            if(this.files && this.files[0]) {
                // Ici, on sait qu'on a un fichier
                // Donc on crée un lecteur
                var lecteur = new FileReader();
                // On prépare un évènement sur notre lecteur
                // Pour lui dire de changer l'attribut src
                // De notre image
                lecteur.onload = function(event) {
                    $('.thumbnail img').attr('src', event.target.result);
                };
                // Puis enfin, on déclenche notre évènement : 
                lecteur.readAsDataURL(this.files[0]);

                var filename = this.files[0].name;
                if(filename.length > 10) {
                    var extension = filename.split('.').pop();
                    var nomSeul = filename.split('.').slice(0, -1).join('.');
                    var nomAAfficher = nomSeul.substring(0, 10) + "..." + extension;
                } else {
                    var nomAAfficher = filename;
                }
                $('#img-name').html(nomAAfficher);

            }
        });
    });
</script>