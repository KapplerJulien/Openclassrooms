<?php
// require 'C:\wamp64\www\Projet5Oc\config/dev.php';
require 'C:\wamp64\www\Projet5Oc\vendor/autoload.php';
require 'C:\wamp64\www\Projet5Oc\Templates/paramPage/css.html';

session_start();
$router = new \Projet5Oc\config\Router();
$router->run();

/**try{
    if(isset($_GET['route']))
    {
        if($_GET['route'] === 'connexion'){
            require '../Templates/connexion.php';
        }
        else{
            echo 'page inconnue';
        }
    }
    else{
        require 'C:/wamp64/www/Projet5Oc/Templates/home.php';
    }
}
catch (Exception $e)
{
    echo 'Erreur';
}*/
?>



