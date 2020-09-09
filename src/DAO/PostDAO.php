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
        $sql = 'SELECT IdPost, NomPost, ContenuPost, AuteurPost, DateCreationPost FROM post ORDER BY IdPost DESC';
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
        $sql = 'SELECT id, title, content, author, createdAt FROM article WHERE id = ?';
        return $this->createQuery($sql, [$articleId]);
    }
}