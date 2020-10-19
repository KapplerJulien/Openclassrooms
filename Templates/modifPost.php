<?php
$this->title = "Modif post"; 
$this->userConnect = $userConnect;

?>




        <?php

                // var_dump($articlesId);
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <form id="formulaireModifArticle" action="../public/index.php?route=editArticle&articleId=<?= htmlspecialchars($articlesId['IdPost']);?>" method="post" >
                                <div class="form-group floating-label-form-group controls">
                                    <label>Titre : </label>
                                    <input type="text" class="form-control" placeholder="Titre" name="titre" id="titre" value="<?= htmlspecialchars($articlesId['NomPost']); ?>" required data-validation-required-message="Veuillez entrer votre titre.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group floating-label-form-group controls">
                                    <label>Chapo : </label>
                                    <input type="text" class="form-control" placeholder="Titre" name="chapo" id="chapo" value="<?= htmlspecialchars($articlesId['ChapoPost']); ?>" required data-validation-required-message="Veuillez entrer votre chapo.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group floating-label-form-group controls">
                                    <label>Auteur : </label>
                                    <input type="text" class="form-control" placeholder="Titre" name="auteur" id="auteur" value="<?= htmlspecialchars($articlesId['AuteurPost']); ?>" required data-validation-required-message="Veuillez entrer votre auteur.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group floating-label-form-group controls">
                                    <label>Contenu : </label>
                                    <textarea class="form-control" name="contenu" id="contenu" cols="40" rows="10" aria-invalid="false" ><?= htmlspecialchars($articlesId['ContenuPost']); ?></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="formModifArticleBoutonVal">
                                    <input type="submit" class="btn btn-primary" name="boutonVal" id="boutonVal" value="Envoyez">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
                <?php
        
            ?>        

        