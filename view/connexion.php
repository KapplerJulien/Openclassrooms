<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="" />
        <title>Blog</title>
    </head>

    <body>
        
        <header class="navHeader">
            <div class="sectionMenu">
                <nav class="menu">
                    <ul>
        <?php
            if(empty($_SESSION)){
        ?>
                        <li><a href="./controller/connexion.php"><i></i>Se connecter </a></li>
                    
        <?php
            }else {
        ?>
                        <li><a href="./controller/deconnexion.php"><i></i>Se déconnecter </a></li>
        <?php
            }
        ?>
                    </ul>    
                </nav>
            </div>
        </header>

        <form id="formulaireConnexion" action="../controller/connexion.php" method="post" >
            <div class="formConnexionPseudoMdp">
            <?php
                // var_dump($_POST['pseudo']);
                // var_dump($_POST['motdepasse']);
                if(empty($_POST['pseudo']) || empty($_POST['motdepasse'])){
            ?>
                    <label for="pseudo">Votre pseudo :</label> </br>
                    <input type="text" name="pseudo" id="pseudo">
                    <br>
                    <label for="motdepasse">Votre mot de passe :</label> </br>
                    <input type="text" name="motdepasse" id="motdepasse">
            <?php
                } else {
            ?>
                    <label for="pseudo">Votre pseudo :</label> </br>
                    <input type="text" name="pseudo" id="pseudo" value="<?php echo $_POST['pseudo']?>">
                    <br>
                    <label for="motdepasse">Votre mot de passe :</label> </br>
                    <input type="text" name="motdepasse" id="motdepasse" value="<?php echo $_POST['motdepasse']?>">
            <?php
                }
            ?>
            </div>
            <div class="connexionFausse">
                Votre pseudo et/ou mot de passe est/sont incorrect.
            </div>
            </br>
            <div class="formConnexionBoutonVal">
                <input type="submit" name="boutonVal" id="boutonVal" value="Envoyez">
            </div>
        </form>

    </body>
</html>
    