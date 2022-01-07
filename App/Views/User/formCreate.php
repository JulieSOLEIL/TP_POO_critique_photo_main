<h1>Remplissez ce formulaire</h1>
<div class="alert alert-primary" role="alert"><?= $error; ?></div>
<div>
    <form method="post" action="index.php?entity=user&action=new">
  <div class="form-group">
    <label for="inputPseudo">Votre pseudo : </label>
    <input type="text" name="pseudo" class="form-control" id="inputPseudo" aria-descrinputEmail1ibedby="emailHelp" required>
  </div>
  <div class="form-group">
    <label for="inputEmail">Votre mail</label>
    <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" required>
  </div>
  <div class="form-group">
    <label for="inputPassword">Votre mot de passe</label>
    <input type="password" name="psw" class="form-control" id="inputPassword" required>
  </div>
  <button type="submit" class="btn btn-primary">Soumettre</button>
</form>    
