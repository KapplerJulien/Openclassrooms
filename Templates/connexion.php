<?php

$this->title = "Connexion";

/**<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Mon blog</title>
        <!-- Bootstrap core CSS 
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

         Custom fonts for this template         <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

         Custom styles for this template 
        <link href="../public/css/clean-blog.min.css" rel="stylesheet"> -->
    </head>

    <body>
        
            
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
            <a class="navbar-brand" href="index.html">Blog Jkappler</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="post.html">Sample Post</a>
                </li>
                <?php
                    if(empty($_SESSION)){
                ?>
                            <li class="nav-item"><a class="nav-link" href="../public/index.php?route=connexion"><i></i>Se connecter </a></li>                        
                <?php
                    }else {
                ?>
                            <li class="nav-item"><a class="nav-link" href="./src/controller/deconnexion.php"><i></i>Se déconnecter </a></li>
                <?php
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                </ul>
            </div>
        </nav>

        <!-- Page Header -->
        <header class="masthead" style="background-image: url('img/home-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
                </div>
            </div>
            </div>
        </header>*/

?>
<?php //$this->session->show('error_login'); ?>
        <form id="formulaireConnexion" action="../public/index.php?route=login" method="post" >
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
            <!-- <div class="connexionFausse">
                Votre pseudo et/ou mot de passe est/sont incorrect.
            </div>  -->
            </br>
            <div class="formConnexionBoutonVal">
                <input type="submit" name="boutonVal" id="boutonVal" value="Envoyez">
            </div>
        </form>

        <a class="nav-link" href="../public/index.php?route=inscription"><i></i>Inscription </a>

<!-- Footer -->
<?php 
/**<footer>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                    <a href="#">
                        <span class="fa-stack fa-lg">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    </li>
                    <li class="list-inline-item">
                    <a href="#">
                        <span class="fa-stack fa-lg">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    </li>
                    <li class="list-inline-item">
                    <a href="#">
                        <span class="fa-stack fa-lg">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
                </div>
            </div>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript 
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

         Custom scripts for this template 
        <script src="../public/js/clean-blog.min.js"></script> -->
    </body>
</html>*/
?>
    