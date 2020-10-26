<?php
$this->title = "Contact"; 
$this->userConnect = $userConnect;

?>



<!-- <form method="get" class="formulaireContact">
    <div class="formContactNom">
        <label for="nom">Votre nom *</label>
        <input type="text" name="nom" id="nom" required>
   </div>
    <div class="formContactAdresse">
        <label for="adresse">Votre adresse *</label>
        <input type="text" name="adresse" id="adresse" required>
    </div>
    <div class="formContactObjet">
        <label for="objet">L'objet</label>
        <input type="text" name="objet" id="objet">
    </div>
    <div class="formContactMessage">
        <label for="message">Votre message</label>
        <textarea name="message" id="message" cols="40" rows="10" aria-invalid="false"> </textarea>
    </div>
    
    <div class="formContactBoutonVal">
        <input type="button" name="boutonVal" id="boutonVal" value="Envoyez">
    </div>
</form> -->

<!-- Main Content -->
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Utilisez le formulaire de messagerie juste en dessous pour envoyer un message au support qui vous répondront le plus vite possible!</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Votre nom *</label>
                <input type="text" class="form-control" placeholder="Nom" id="name" required data-validation-required-message="Veuillez entrer votre nom.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Votre adresse mail *</label>
                <input type="email" class="form-control" placeholder="Adresse mail" id="email" required data-validation-required-message="Veuillez entrer votre adresse mail.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Objet *</label>
                <input type="text" class="form-control" placeholder="Objet" id="object" required data-validation-required-message="Veuillez entrer l'objet de votre message.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Veuillez entrer un message."></textarea>
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <br>
            <div class="formContactCGC">
                <input type="checkbox" name="CGC" id="CGC" required>
                <label for="CGC">Accepter les <a href="#">conditions gérérale de confidentialité.</a></label>
            </div>
            <div class="champsObl">* Champs obligatoire.</div>
            <div id="success"></div>
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
        </form>
      </div>
    </div>
  </div>

  <hr>