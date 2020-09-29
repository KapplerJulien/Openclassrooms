<?php

namespace Projet5Oc\src\DAO;

use Projet5Oc\src\model\Post;

class PostDAO extends DAO
{
    private function buildObject($row)
    {
        $article = new Post();
        $article->setId($row['IdPost']);
        $article->setTitle($row['NomPost']);
        $article->setContent($row['ContenuPost']);
        $article->setAuthor($row['AuteurPost']);
        $article->setCreatedAt($row['DateCreationPost']);
        return $article;
    }

    public function getArticles()
    {
        $db = new DAO();
        $connexion = $db->getConnection();
        $sql = 'SELECT IdPost, NomPost, ContenuPost, AuteurPost, DateCreationPost FROM post ORDER BY IdPost DESC;';
        $result = $connexion->query($sql);
        $articles = [];
        foreach ($result as $row){
            $articleId = $row['IdPost'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $articles;
    }

    public function getArticle($articleId)
    {
        $db = new DAO();
        $connexion = $db->getConnection();
        $sql = 'SELECT IdPost, NomPost, ContenuPost, AuteurPost, DateCreationPost FROM post WHERE idPost ='.$articleId.';';
        // var_dump($sql);
        $result = $connexion->query($sql);
        $article = [];
        foreach ($result as $row){
            $articleId = $row['IdPost'];
            $article[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $article;
    }

    public function getArticleAuteur($idAuteur)
    {
        $db = new DAO();
        $connexion = $db->getConnection();
        $sql = 'SELECT IdPost, NomPost, ContenuPost, AuteurPost, DateCreationPost FROM post where IdUtilisateur = '.$idAuteur.' ORDER BY IdPost DESC;';
        $result = $connexion->query($sql);
        $articles = [];
        foreach ($result as $row){
            $articleId = $row['IdPost'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $articles;
    }

    public function ajouterArticle($post, $idAuteur){
        $db = new DAO();
        $connexion = $db->getConnection();
        $sqlAuteurPost = 'select NomUtilisateur from utilisateur where IdUtilisateur ='.$idAuteur.';';
        $dataAuteurPost = $connexion->query($sqlAuteurPost);
        $auteurPost = $dataAuteurPost->fetch();
        // var_dump($auteurPost);
        $date = date('Y-m-d');
        $sql = 'INSERT INTO post ( NomPost, ChapoPost, ContenuPost, AuteurPost, DateCreationPost, DateDerniereModifPost, IdUtilisateur) 
        VALUES ("'.$post->get('titre').'","'.$post->get('chapo').'","'.$post->get('contenu').'","'.$auteurPost['NomUtilisateur'].'","'.$date.'","'.$date.'",'.$idAuteur.');';
        // var_dump($sql);
        $data = $connexion->query($sql);
    }

    public function suppressionArticle($articleId){
        $db = new DAO();
        $connexion = $db->getConnection();
        $sql = 'delete from post where IdPost = '.$articleId.';';
        $data = $connexion->query($sql);
    }

    public function modifArticle($post, $articleId){
        $db = new DAO();
        $connexion = $db->getConnection();
        $date = date('Y-m-d');
        $sql = 'update post set NomPost = "'.$post->get('titre').'", ChapoPost = "'.$post->get('chapo').'", ContenuPost = "'.$post->get('contenu').'", AuteurPost = "'.$post->get('auteur').'", DateDerniereModifPost = "'.$date.'"
        where IdPost = '.$articleId.';';
        $data = $connexion->query($sql);
    }

    public function getArticleModifAuteur($articleId){
        $db = new DAO();
        $connexion = $db->getConnection();
        $sql = 'SELECT IdPost, NomPost, ChapoPost, ContenuPost, AuteurPost FROM post where IdPost = '.$articleId.';';
        // var_dump($sql);
        $data = $connexion->query($sql);
        $result = $data->fetch();
        $data->closeCursor();
        return $result;
    }

    public function addCom($post, $articleId, $idUser){
        // var_dump($post->get('message'));
        $db = new DAO();
        $connexion = $db->getConnection();
        $date = date('Y-m-d');
        $sql = 'INSERT INTO commentaire (ContenuCommentaire, DateCommentaire, IdEtatCommentaire, IdUtilisateur, IdPost) 
        VALUES ("'.$post->get('message').'","'.$date.'",2,'.$idUser.','.$articleId.');';
        // var_dump($sql);
        $data = $connexion->query($sql);
    }

    
}