<?php

$this->title = "Connexion";
$this->userConnect = $userConnect;

?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form id="formulaireConnexion" action="../public/index.php?route=login" method="post" >
                <div class="control-group">
                <?php
                    if(isset($testConnexion['errorLogin'])){ ?>
                        <?= $testConnexion['errorLogin'];
                    } else if(isset($testRegister['register'])){ ?>
                        <?= $testRegister['register'];
                    }
                    // var_dump($_POST['pseudo']);
                    // var_dump($_POST['motdepasse']);
                ?>
                        <div class="form-group floating-label-form-group controls">
                            <label>Pseudo *</label>
                            <input type="text" class="form-control" placeholder="Pseudo" name="pseudo" id="pseudo" required data-validation-required-message="Veuillez entrer votre pseudo.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group floating-label-form-group controls">
                            <label>Mot de passe *</label>
                            <input type="password" class="form-control" placeholder="Mot de passe" name="password" id="password" required data-validation-required-message="Veuillez entrer votre mot de passe.">
                            <p class="help-block text-danger"></p>
                        </div>
                </div>
                <!-- <div class="connexionFausse">
                    Votre pseudo et/ou mot de passe est/sont incorrect.
                </div>  -->
                </br>
                <div class="formConnexionBoutonVal">
                    <input type="submit" class="btn btn-primary" name="valButton" id="valButton" value="Envoyez"> 
                    
                </div>
            </form>
            <form id="formAskRegister" action="../public/index.php?route=register" method="post" >
                <input type="submit" class="btn btn-primary" value="Inscription">
            </form>
        </div>
    </div>
</div>

            


    