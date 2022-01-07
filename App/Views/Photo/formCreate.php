<h1>Informations sur la photo</h1>

<div>
    <form enctype="multipart/form-data" method="post" action="index.php?entity=photo&action=new">
        <div class="form-group">
            <label for="inputTitle">Titre de la photo : </label>
            <input type="text" name="photoName" required class="form-control" id="inputTitle" aria-descrinputEmail1ibedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="inputFile">Votre image</label>
            <input type="file" name="fileName" required accept="image/*" class="form-control" id="inputFile" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>    
</div>