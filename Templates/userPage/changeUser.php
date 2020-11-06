<?php
$this->title = "Modification compte"; 
$this->userConnect = $userConnect;

?>

<?php
    foreach ($users as $user){
?>  
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <form id="formulaireModifArticle" action="../public/index.php?route=editUser" method="post" >
                        <div class="form-group floating-label-form-group controls">
                            <label>Nom : </label>
                            <input type="text" class="form-control" placeholder="Nom" name="name" id="name" value="<?= htmlspecialchars($user['NomUtilisateur']); ?>" required data-validation-required-message="Veuillez entrer votre nom.">
                            <p class="help-block text-danger"></p>
                        </div> 
                        <div class="form-group floating-label-form-group controls">
                            <label>Prénom: </label>
                            <input type="text" class="form-control" placeholder="Prénom" name="lastName" id="lastName" value="<?= htmlspecialchars($user['PrenomUtilisateur']); ?>" required data-validation-required-message="Veuillez entrer votre prénom.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group floating-label-form-group controls">
                            <label>Code postale: </label>
                            <input type="text" class="form-control" placeholder="Code postale" name="postCode" id="postCode" value="<?= htmlspecialchars($user['CodePostaleUtilisateur']); ?>" required data-validation-required-message="Veuillez entrer votre code postale.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group floating-label-form-group controls">
                            <label>Ville: </label>
                            <input type="text" class="form-control" placeholder="Ville" name="town" id="town" value="<?= htmlspecialchars($user['VilleUtilisateur']); ?>" required data-validation-required-message="Veuillez entrer votre ville.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group floating-label-form-group controls">
                            <label>Email: </label>
                            <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="<?= htmlspecialchars($user['MailUtilisateur']); ?>" required data-validation-required-message="Veuillez entrer votre email.">
                            <p class="help-block text-danger"></p>
                        </div>                                                
                        <div class="formChangeUserValButton">
                            <input type="submit" class="btn btn-primary" name="validationButton" id="validationButton" value="Envoyez">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
?>