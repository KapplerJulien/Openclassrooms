<?php
include '../model/requeteBdd.php';

function connexion($pseudo, $motdepasse) {
    $requete = 'Select idUtilisateur, idTypeUtilisateur from utilisateur where pseudoUtilisateur ="'.$pseudo.'"and mdpUtilisateur ="'.$motdepasse.'"';
    $recupBdd = requeteBdd($requete);
    $reponse = array();
    while($donnees = $recupBdd->fetch()){
        // var_dump($donnees);
        $donneesIdUtilisateur = $donnees['idUtilisateur'];
        $donneesIdTypeUtilisateur = $donnees['idTypeUtilisateur'];
        $reponse['idUtilisateur'] = $donneesIdUtilisateur;
        $reponse[$donneesIdUtilisateur]['idTypeUtilisateur'] = $donneesIdTypeUtilisateur;
    }
    $recupBdd->closeCursor();
    // var_dump($reponse);
    // var_dump('Select idUtilisateur from utilisateur where pseudoUtilisateur ="'.$pseudo.'"and mdpUtilisateur ="'.$motdepasse.'"');
    return $reponse;
}

?>