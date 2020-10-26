<?php

namespace Projet5Oc\src\model;

class Comment
{

    private $id;
    private $content;
    private $author;
    private $createdAt;
    private $postName;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getPostName()
    {
        return $this->postName;
    }

    public function setPostName($postName)
    {
        $this->postName = $postName;
    }

}