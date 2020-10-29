<?php

namespace Projet5Oc\src\controller;

use Projet5Oc\src\model\View;
use Projet5Oc\config\Parameter;
use Projet5Oc\config\Session;
use Projet5Oc\src\DAO\CommentDAO;

class BackController extends Controller
{
    protected $view;
    public $session;

    public function __construct()
    {
        $this->view = new View();
        $this->session = new Session($_SESSION);
        $this->commentDAO = new CommentDAO();
    }

    public function changeCommentType($post, $idComment){
        $changeType = $this->commentDAO->setCommentType($post, $idComment);
        $commentaireAttente = $this->commentDAO->getComWaiting();
        $sumComment = $this->commentDAO->getSumComment('comWaiting',' ');
        // var_dump($commentaireAttente);
        return $this->view->render('administrateur', 'adminPage', [
            'comments' => $commentaireAttente,
            'sumComment' => $sumComment
        ]); 
    }
}   

?>