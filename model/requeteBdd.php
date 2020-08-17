<?php
function requeteBdd($message) {
    $bdd = new PDO('mysql:host=localhost;dbname=basededonneesP4oc;charset=utf8', 'root', '');
    // var_dump($message);
    $reponse = $bdd->query($message);
    // var_dump($reponse);

    return $reponse;
}

?>