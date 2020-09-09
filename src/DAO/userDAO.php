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
        VALUES ("","","","",0,0,05000,"",0000000000,"",true,"'.$post->get('pseudo').'" ,"'.$post->get('password').'" ,2)';
        var_dump($sql);
        $data = $connexion->query($sql);
    }

    public function login(Parameter $post)
    {
        $db = new DAO();
        $connexion = $db->getConnection();
        $sql = 'Select IdUtilisateur, MdpUtilisateur from utilisateur where pseudoUtilisateur ="'.$post->get('pseudo').'"';
        $data = $connexion->query($sql);
        $result = $data->fetch();
        // var_dump($result);
        // var_dump($post->get('motdepasse'));
        if($post->get('motdepasse') === $result['MdpUtilisateur']){
            $isPasswordValid = true;
        }
        // $isPasswordValid = password_verify($post->get('motdepasse'), $result['MdpUtilisateur']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }
}