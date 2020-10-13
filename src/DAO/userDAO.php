<?php

namespace Projet5Oc\src\DAO;

use Projet5Oc\config\Parameter;

class UserDAO extends DAO
{
    public function register(Parameter $post)
    {
        $db = new DAO();
        $connexion = $db->getConnection();
        $sql = 'INSERT INTO Utilisateur ( NomUtilisateur, PrenomUtilisateur, AdresseUtilisateur, Adresse2Utilisateur, EtageUtilisateur, NumBatimentUtilisateur, CodePostaleUtilisateur, VilleUtilisateur, TelUtilisateur, MailUtilisateur, VerifMailUtilisateur, PseudoUtilisateur, MdpUtilisateur, IdTypeUtilisateur) 
        VALUES ("'.$post->get('nom').'","'.$post->get('prenom').'","","",0,0,05000,"",0000000000,"'.$post->get('email').'",true,"'.$post->get('pseudo').'" ,"'.password_hash($post->get('password'),PASSWORD_BCRYPT).'" ,2);';
        // var_dump($sql);
        $data = $connexion->query($sql);
        $data->closeCursor();
    }

    public function verifPseudo(Parameter $post){
        $db = new DAO();
        $connexion = $db->getConnection();
        $sql = 'select IdUtilisateur from utilisateur where PseudoUtilisateur = "'.$post->get('pseudo').'";';
        $data = $connexion->query($sql);
        $result = $data->fetch();
        $data->closeCursor();
        // var_dump($result);
        if($result){
            return False;
        } else {
            return True;
        }
    }

    public function login(Parameter $post)
    {
        $db = new DAO();
        $connexion = $db->getConnection();
        $sql = 'Select IdUtilisateur, MdpUtilisateur, IdTypeUtilisateur from utilisateur where pseudoUtilisateur ="'.$post->get('pseudo').'";';
        $data = $connexion->query($sql);
        $result = $data->fetch();
        //var_dump($result);
        //var_dump($post->get('motdepasse'));
        /**if($post->get('motdepasse') === $result['MdpUtilisateur']){
            $isPasswordValid = true;
        } else {
            $isPasswordValid = false;
        }*/
        $userTypeId = $result['IdTypeUtilisateur'];
        $isPasswordValid = password_verify($post->get('motdepasse'), $result['MdpUtilisateur']);
        $data->closeCursor();
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid,
            'IdTypeUtilisateur' => $userTypeId
        ];
    }

    public function getAuthorAccount($userId){
        $db = new DAO();
        $connexion = $db->getConnection();
        $sql = 'Select NomUtilisateur, PrenomUtilisateur, CodePostaleUtilisateur, VilleUtilisateur, MailUtilisateur from utilisateur where IdUtilisateur = '.$userId.';';
        // var_dump($sql);
        $data = $connexion->query($sql);
        // var_dump($data->fetch());
        $result = $data->fetch();
        $data->closeCursor();
        return [
            'result' => $result
        ];
    }

    public function setUser($post, $id){
        $db = new DAO();
        $connexion = $db->getConnection();
        $sql = 'update Utilisateur set NomUtilisateur = "'.$post->get('nom').'", PrenomUtilisateur = "'.$post->get('prenom').'", CodePostaleUtilisateur = '.$post->get('codePostale').', VilleUtilisateur = "'.$post->get('ville').'", MailUtilisateur = "'.$post->get('email').'"
        where IdUtilisateur = '.$id.';';
        // var_dump($sql);
        $data = $connexion->query($sql);
        $data->closeCursor();
    }
}