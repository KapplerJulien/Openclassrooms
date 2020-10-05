<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title><?= $title ?></title>
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
                    <a class="nav-link" href="../public/index.php?route=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/index.php?route=post">Post</a>
                </li>
                <?php
                    if(empty($_SESSION['id'])){
                ?>
                            <li class="nav-item"><a class="nav-link" href="../public/index.php?route=connexion"><i></i>Se connecter </a></li>                        
                <?php
                    }else {
                ?>
                            <li class="nav-item"><a class="nav-link" href="../public/index.php?route=deconnexion"><i></i>Se déconnecter </a></li>
                <?php
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="../public/index.php?route=contact">Contact</a>
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
                    <h1> <?php 
                        // var_dump($title);
                        echo $title 
                    ?> 
                    </h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
                </div>
            </div>
            </div>
        </header>

        <div id="content">
            <?= $content ?>
        </div>

        <!-- Footer -->
        <footer>
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
    </body>
</html>