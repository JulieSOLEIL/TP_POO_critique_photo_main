<h1>Vos photos</h1>
<a class="btn btn-secondary" href="index.php?entity=photo&action=listphotopdf">Sauvegarder en PDF</a>
<div class="row flex">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Nom du fichier</th>
                <th scope="col">Date</th>
                <th scope="col">Nombre de like</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($photos as $photo) {
                echo <<<TR
                    <tr>
                    <th scope="row">{$photo->getTitle_photo()}</th>
                    <td>{$photo->getName_file()}</td>
                    <td>{$photo->getPost_at()}</td>
                    <td>{$photo->getNbr_like()}</td>
                    </tr>
                TR;
            }
            ?>
        </tbody>
    </table>


</div>