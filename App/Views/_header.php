<header>
    <div class="row">
        <div class="col-8">
            <h1>Critique de photo</h1>
        </div>
        <div class="col-4">
            <h5>Date : <?= date('d-m-Y');?></h5>
            <?php
            if(!$connected) {
                echo '<a href="index.php?entity=user&action=connect" class="btn btn-primary"><i class="fa fa-sign-in-alt"></i> Se connecter</a>';
                echo '<br><span>Pas encore utilisateur </span><a href="index.php?entity=user&action=create" class="btn btn-secondary">Créer un compte</a>';
                
            } else {
                echo '<h5>Bonjour '.$_SESSION['pseudo'].'</h5>';
                echo '<a href="index.php?entity=user&action=disconnect" class="btn btn-primary">Déconnexion</a>';
            }
            ?>
        </div>
    </div>
</header>