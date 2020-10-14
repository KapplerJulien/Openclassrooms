<?php

$this->title = "Connexion";

?>

<?php 
    if(isset($testConnexion['errorLogin'])){
        echo $testConnexion['errorLogin'];
    }
?>
        <form id="formulaireConnexion" action="../public/index.php?route=login" method="post" >
            <div class="formConnexionPseudoMdp">
            <?php
                // var_dump($_POST['pseudo']);
                // var_dump($_POST['motdepasse']);
                if(empty($_POST['pseudo']) || empty($_POST['motdepasse'])){
            ?>
                    <label for="pseudo">Votre pseudo :</label> </br>
                    <input type="text" name="pseudo" id="pseudo" required>
                    <br>
                    <label for="motdepasse">Votre mot de passe :</label> </br>
                    <input type="text" name="motdepasse" id="motdepasse" required>
            <?php
                } else {
            ?>
                    <label for="pseudo">Votre pseudo :</label> </br>
                    <input type="text" name="pseudo" id="pseudo" value="<?php echo $_POST['pseudo']?>" required>
                    <br>
                    <label for="motdepasse">Votre mot de passe :</label> </br>
                    <input type="text" name="motdepasse" id="motdepasse" value="<?php echo $_POST['motdepasse']?>" required>
            <?php
                }
            ?>
            </div>
            <!-- <div class="connexionFausse">
                Votre pseudo et/ou mot de passe est/sont incorrect.
            </div>  -->
            </br>
            <div class="formConnexionBoutonVal">
                <input type="submit" name="boutonVal" id="boutonVal" value="Envoyez">
            </div>
        </form>

        <a class="nav-link" href="../public/index.php?route=register"><i></i>Inscription </a>


    