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
    </body>
</html>