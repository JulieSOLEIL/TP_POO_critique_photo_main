<h1>Les photos</h1>
<div class="row flex">

    <?php
    foreach ($photos as $photo) {
        echo '<div class="col-4">
            <div class="card">';
        echo '<img src="photos/' . $photo->getName_file() . '" class="card-img-top" alt="photo" style="width: 10rem; margin: 5px auto">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $photo->getTitle_photo() . '</h5>';
        echo '<p class="card-text">';
        echo '<h3>postée par : ' . $photo->getPseudo() . '</h3>';
        echo '<h3>date : ' . $photo->getPost_at() . '</h3>';
        echo '</p>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '<a href="index.php?entity=photo&action=show&id=' . $photo->getId_photo() . '" class="btn btn-primary">Voir</a>';

        echo '<div class="float-right" data-id-photo="' . $photo->getId_photo() . '">
            <i class="fa fa-thumbs-up" data-like="1" onclick="like(event)"></i>
            <span> ' . $photo->getNbr_like() . ' </span>
            <i class="fa fa-thumbs-down" data-like="-1" onclick="like(event)"></i>
        </div>';

        echo '</div>
            </div>
        </div>';
    }
    ?>
</div>
        
<script>
    liked = false;
    function like(ev) {
        divLike = ev.target.parentElement;
        let valLike = ev.target.dataset.like;
        let idPhoto = ev.target.parentElement.dataset.idPhoto;
        // alert(valLike);

        url = 'index.php?entity=photo&action=like';

        $.ajax({
            method: "POST",
            url: url,
            data: {id_photo: idPhoto, val_like: valLike}
        })
        .done(function (reponse){
            //alert(reponse.nbrLike);
            $(divLike).children('span').html(reponse.nbrLike);
        });
    }
</script>