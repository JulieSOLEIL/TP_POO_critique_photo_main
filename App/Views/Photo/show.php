<h1>Détail de la photo</h1>
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="photos/<?= $photo->getName_file() ?>" alt="photo" style="width: 50%"> 
            </div>
            <div clas="col-4">
                <h3><?= $photo->getTitle_photo() ?></h3>
                <hr class="my-4">
                <h4>Poster par : <?= $photo->getPseudo() ?></h4>
                <h4>poster le : <?= $photo->getPost_at() ?></h4>
                <br>
                <?php
                if($connected){
                echo '<form method="post" action="index.php?entity=comment&action=new">';
                echo '<input type="hidden" name="idUser" value="'.$_SESSION['idUser'].'">';
                echo '<input type="hidden" name="idPhoto" value="'.$photo->getId_photo().'">';
                echo '<div class="form-group">
                        <label for="inputText">Votre commentaire</label>
                        <input type="textarea" name="comment" class="form-control" id="inputText" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>';
                }
                ?>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <?php
        foreach ($comments as $comment) {
            echo '<div class="card"><div class="card-header">';
            echo 'Ajouté le : ' . $comment->getCreate_at() . ' par ' . $comment->getPseudo();
            echo '</div><div class="card-body"><blockquote class="blockquote mb-0">';
            echo '<p>' . $comment->getComment() . '</p>';
            echo '</div></div>';
        }
        ?>
    </div>
</div>