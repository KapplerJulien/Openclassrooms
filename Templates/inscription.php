<?php
$this->title = "Inscription"; 

?>



<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
<?php
    if(!isset($testRegister['errorRegister'])){   
?>
        <form method="post" action="../public/index.php?route=register" >
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Nom</label>
                <input type="text" class="form-control" placeholder="Nom" name="nom" id="nom" required data-validation-required-message="Veuillez entrer votre nom.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Prénom</label>
                <input type="text" class="form-control" placeholder="Prénom" name="prenom" id="prenom" required data-validation-required-message="Veuillez entrer votre prénom.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Pseudo</label>
                <input type="text" class="form-control" placeholder="Pseudo" name="pseudo" id="pseudo" required data-validation-required-message="Veuillez entrer votre pseudo.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Mot de passe</label>
                <input type="password" class="form-control" placeholder="Mot de passe" name="password" id="password" required data-validation-required-message="Veuillez entrer votre mot de passe.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="email" name="email" id="email" required data-validation-required-message="Veuillez entrer votre email.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Inscription" id="submit" name="submit">
        </form>
<?php
    } else {
        echo $testRegister['errorRegister'];
        // var_dump($infoRegister);
?>

        <form method="post" action="../public/index.php?route=register" >
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Nom</label>
                <input type="text" class="form-control" placeholder="Nom" name="nom" id="nom" value="<?= $infoRegister->get('nom')?>" required data-validation-required-message="Veuillez entrer votre nom.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Prénom</label>
                <input type="text" class="form-control" placeholder="Prénom" name="prenom" id="prenom" value="<?= $infoRegister->get('prenom')?>" required data-validation-required-message="Veuillez entrer votre prénom.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Pseudo</label>
                <input type="text" class="form-control" placeholder="Pseudo" name="pseudo" id="pseudo" value="<?= $infoRegister->get('pseudo')?>" required data-validation-required-message="Veuillez entrer votre pseudo.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Mot de passe</label>
                <input type="password" class="form-control" placeholder="Mot de passe" name="password" id="password" value="<?= $infoRegister->get('password')?>" required data-validation-required-message="Veuillez entrer votre mot de passe.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="email" name="email" id="email" value="<?= $infoRegister->get('email')?>" required data-validation-required-message="Veuillez entrer votre email.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Inscription" id="submit" name="submit">
        </form>
<?php
    }
?>
            <form id="formAskRegister" action="../public/index.php" method="post" >
                <input type="submit" class="btn btn-primary" value="Retour à l'accueil">
            </form>
        </div>
    </div>
</div>
