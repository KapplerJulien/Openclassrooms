<?php

namespace Projet5Oc\src\DAO;

use Projet5Oc\src\model\Comment;

class CommentDAO extends DAO
{
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['IdCommentaire']);
        $comment->setContent($row['ContenuCommentaire']);
        $comment->setAuthor($row['PseudoUtilisateur']);
        $comment->setCreatedAt($row['DateCommentaire']);
        $comment->setPostName($row['NomPost']);
        return $comment;
    }

    public function getComWaiting(){
        $db = new DAO();
        $connexion = $db->getConnection();
        $sqlCom = 'select com.IdCommentaire, com.ContenuCommentaire, com.DateCommentaire, user.PseudoUtilisateur, post.NomPost from utilisateur as user 
        inner join commentaire as com on user.IdUtilisateur = com.IdUtilisateur 
        inner join post on com.IdPost = post.IdPost 
        where com.IdEtatCommentaire = 2; ';
        $data = $connexion->query($sqlCom);
        // var_dump($data->fetch());
        foreach ($data as $row){
            // var_dump($row);
            $commentId = $row['IdCommentaire'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $data->closeCursor();
        if(isset($comments)){
            return $comments;
        } else {
            $comments['errorComment'] = 'Aucun commentaire à modifier';
            return $comments;
        }
        
        // var_dump($comments);
        
    }

    public function setCommentType($post, $commentId){
        $db = new DAO();
        $connexion = $db->getConnection();
        if($post->get('validationButton')){
            $sql = 'update commentaire set IdEtatCommentaire = 1
        where IdCommentaire = '.$commentId.';';
        } else {
            $sql = 'update commentaire set IdEtatCommentaire = 3
            where IdCommentaire = '.$commentId.';';
        }
        $data = $connexion->query($sql);
        $data->closeCursor();
    }

    public function getArticleComment($articleId){
        $db = new DAO();
        $connexion = $db->getConnection();
        $sql= 'select com.IdCommentaire, com.ContenuCommentaire, com.DateCommentaire, user.PseudoUtilisateur, post.NomPost from utilisateur as user
        inner join commentaire as com on user.IdUtilisateur = com.IdUtilisateur
        inner join post on com.IdPost = post.IdPost 
        where com.IdPost ='.$articleId.' and com.IdEtatCommentaire = 1;';
        $data = $connexion->query($sql);
        foreach ($data as $row){
            // var_dump($row);
            $commentId = $row['IdCommentaire'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $data->closeCursor();
        if(isset($comments)){
            return $comments;
        } else {
            $comments['errorComment'] = 'Aucun commentaire sur cet article.';
            return $comments;
        }
    }

    public function getSumComment($type, $articleId){
        $db = new DAO();
        $connexion = $db->getConnection();
        if($type === 'comWaiting'){
            $sql = 'select COUNT(IdCommentaire) as sumComment from commentaire where IdEtatCommentaire = 2; ';
        } else {
            $sql = 'select COUNT(com.IdCommentaire) as sumComment from commentaire as com 
            inner join post on com.IdPost = post.IdPost
            where post.IdPost ='.$articleId.' and com.IdEtatCommentaire = 1; ';
        }
        // var_dump($sql);
        $data = $connexion->query($sql);
        $result = $data->fetch();
        $data->closeCursor();
        return $result;
    }

}