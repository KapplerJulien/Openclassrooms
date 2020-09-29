<?php
$this->title = "Inscription"; 

?>


<div>
    <form method="post" action="../public/index.php?route=inscription">
        <label for="nom">Nom</label><br>
        <input type="text" id="nom" name="nom"><br>
        <label for="prenom">Prénom</label><br>
        <input type="text" id="prenom" name="prenom"><br>
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="email">Email</label><br>
        <input type="text" id="email" name="email"><br>
        <input type="submit" value="Inscription" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>