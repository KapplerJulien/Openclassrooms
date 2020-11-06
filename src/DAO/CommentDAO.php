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
        $sqlCom = 'select com.IdCommentaire, com.ContenuCommentaire, com.DateCommentaire, user.PseudoUtilisateur, Post.NomPost from Utilisateur as user 
        inner join Commentaire as com on user.IdUtilisateur = com.IdUtilisateur 
        inner join Post on com.IdPost = Post.IdPost 
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
            $sql = 'update Commentaire set IdEtatCommentaire = 1
        where IdCommentaire = '.$commentId.';';
        } else {
            $sql = 'update Commentaire set IdEtatCommentaire = 3
            where IdCommentaire = '.$commentId.';';
        }
        $data = $connexion->query($sql);
        $data->closeCursor();
    }

    public function getArticleComment($articleId){
        $db = new DAO();
        $connexion = $db->getConnection();
        $sql= 'select com.IdCommentaire, com.ContenuCommentaire, com.DateCommentaire, user.PseudoUtilisateur, Post.NomPost from Utilisateur as user
        inner join Commentaire as com on user.IdUtilisateur = com.IdUtilisateur
        inner join Post on com.IdPost = Post.IdPost 
        where com.IdPost ='.$articleId.' and com.IdEtatCommentaire = 1;';
        $data = $connexion->query($sql);
        // var_dump($data);
        foreach ($data as $row){
            // var_dump($row);
            $commentId = $row['IdCommentaire'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $data->closeCursor();
        if(isset($comments)){
            // var_dump($comments);
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
            $sql = 'select COUNT(IdCommentaire) as sumComment from Commentaire where IdEtatCommentaire = 2; ';
        } else {
            $sql = 'select COUNT(com.IdCommentaire) as sumComment from Commentaire as com 
            inner join Post on com.IdPost = Post.IdPost
            where Post.IdPost ='.$articleId.' and com.IdEtatCommentaire = 1; ';
        }
        // var_dump($sql);
        $data = $connexion->query($sql);
        $result = $data->fetch();
        $data->closeCursor();
        return $result;
    }
    
    public function addCom($post, $articleId, $userId){
        // var_dump($post->get('message'));
        $db = new DAO();
        $connexion = $db->getConnection();
        $date = date('Y-m-d');
        $sql = 'INSERT INTO Commentaire (ContenuCommentaire, DateCommentaire, IdEtatCommentaire, IdUtilisateur, IdPost) 
        VALUES ("'.$post->get('message').'","'.$date.'",2,'.$userId.','.$articleId.');';
        // var_dump($sql);
        $data = $connexion->query($sql);
        $data->closeCursor();
    }

}