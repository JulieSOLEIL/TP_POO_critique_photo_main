<h1>Identifiez-vous</h1>
<div class="alert alert-primary" role="alert"><?= $error; ?></div>
<div>
    <form method="post" action="index.php?entity=user&action=check">
        <div class="form-group">
            <label for="inputEmail1">Email address</label>
            <input type="email" value="<?= $email; ?>" name="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="inputPassword1">Password</label>
            <input type="password" name="psw" class="form-control" id="inputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>    

</div>
