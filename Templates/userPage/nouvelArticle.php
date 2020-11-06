<?php
$this->title = "Nouvel article"; 
$this->userConnect = $userConnect;

?>


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form id="formulaireNouvelArticle" action="../public/index.php?route=addArticle" method="post" >
                
                <div class="form-group floating-label-form-group controls">
                        <label>Titre : </label>
                        <input type="text" class="form-control" placeholder="Titre" name="title" id="title" required data-validation-required-message="Veuillez entrer votre titre.">
                        <p class="help-block text-danger"></p>
                </div>
                <div class="form-group floating-label-form-group controls">
                        <label>Chapo : </label>
                        <input type="text" class="form-control" placeholder="Chapo" name="header" id="header" required data-validation-required-message="Veuillez entrer votre chapo.">
                        <p class="help-block text-danger"></p>
                </div>
                <div class="form-group floating-label-form-group controls">
                        <label>Contenu : </label>
                        <textarea class="form-control" name="content" id="content" cols="40" rows="10" aria-invalid="false">Contenu de l'article.</textarea>
                        <p class="help-block text-danger"></p>
                </div>
                <div class="formNouvelArticleBoutonVal">
                    <input type="submit" class="btn btn-primary" name="valButton" id="valButton" value="Envoyez">
                </div>
            </form>
        </div>
    </div>
</div>
