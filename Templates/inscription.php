<?php
$this->title = "Inscription"; 

?>


<div>

<?php
    if(!isset($testRegister['errorRegister'])){   
?>
        <form method="post" action="../public/index.php?route=inscription">
            <label for="nom">Nom</label><br>
            <input type="text" id="nom" name="nom" required><br>
            <label for="prenom">Prénom</label><br>
            <input type="text" id="prenom" name="prenom" required><br>
            <label for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" required><br>
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password" required><br>
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" required><br>
            <input type="submit" value="Inscription" id="submit" name="submit">
        </form>
<?php
    } else {
        echo $testRegister['errorRegister'];
?>
        <form method="post" action="../public/index.php?route=inscription">
            <label for="nom">Nom</label><br>
            <input type="text" id="nom" name="nom" value="<?php echo $_POST['nom']?>" required><br>
            <label for="prenom">Prénom</label><br>
            <input type="text" id="prenom" name="prenom" value="<?php echo $_POST['prenom']?>" required><br>
            <label for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" value="<?php echo $_POST['pseudo']?>" required><br>
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password" value="<?php echo $_POST['password']?>" required><br>
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" value="<?php echo $_POST['email']?>" required><br>
            <input type="submit" value="Inscription" id="submit" name="submit">
        </form>
<?php
    }
?>

    <a href="../public/index.php">Retour à l'accueil</a>
</div>