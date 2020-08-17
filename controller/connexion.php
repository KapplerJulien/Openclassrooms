<?php 
include '../model/connexion.php';

if(empty($_POST)){
    include '../view/connexion.php';
} else {
    if($_POST['pseudo']=='' && $_POST['motdepasse']==''){
        include '../view/connexion.php';
    } else {
        $recupBdd = connexion($_POST['pseudo'], $_POST['motdepasse']);
        // var_dump($recupBdd);
        if(empty($recupBdd)) {
            include '../view/connexion.php';
        } else {
            $idUtilisateur = $recupBdd['idUtilisateur'];
            $idTypeUtilisateur = $recupBdd[$idUtilisateur]['idTypeUtilisateur'];
            $_SESSION['idUtilisateur'] = $idUtilisateur;
            $_SESSION[$idUtilisateur]['idTypeUtilisateur'] = $idTypeUtilisateur;
            // var_dump($_SESSION[$idUtilisateur]['idTypeUtilisateur']);
            include '../index.php';
        }
    }
}
?>