<?php

namespace Projet5Oc\src\controller;

use Projet5Oc\src\model\View;
use Projet5Oc\config\Parameter;
use Projet5Oc\src\DAO\UserDAO;
use Projet5Oc\config\Session;
use Projet5Oc\src\DAO\PostDAO;
use Projet5Oc\src\DAO\CommentDAO;

class FrontController extends Controller
{
    protected $view;
    public $userDAO;
    public $session;

    public function __construct()
    {
        $this->view = new View();
        $this->userDAO = new UserDAO();
        $this->session = new Session($_SESSION);
        $this->postDAO = new PostDAO();
        $this->commentDAO = new CommentDAO();
    }

    public function home()
    {
        // require 'C:\wamp64\www\Projet5Oc/Templates/home.php';
        $testConnect = $this->session->get('id');
        if($testConnect === null){
            $userConnect = ' ';
        } else {
            $userConnect = 'connect';
        }
        return $this->view->render('home', 'mainPage', [
            'userConnect' => $userConnect
        ]);
    }

    public function articles()
    {
        // require 'C:\wamp64\www\Projet5Oc/Templates/home.php';
        $articles = $this->postDAO->getArticles();
        $testConnect = $this->session->get('id');
        if($testConnect === null){
            $userConnect = ' ';
        } else {
            $userConnect = 'connect';
        }
        return $this->view->render('post', 'mainPage', [
            'articles' => $articles,
            'userConnect' => $userConnect
        ]);
    }

    public function account(){
        $idTypeUser = $this->session->get('typeUser');
        $userConnect = 'connect';
        if($idTypeUser == 2){
            // echo('Je passe dans le if IdType');
            $authorAccount = $this->userDAO->getAuthorAccount($this->session->get('id'));
            $articlesId = $this->postDAO->getArticleAuthor($this->session->get('id'));
            return $this->view->render('auteur', 'userPage', [
            'articlesId' => $articlesId,
            'authorAccount' => $authorAccount,
            'userConnect' => $userConnect
            ]);
        } else {
            // echo('Je passe dans le else IdType');
            $waitingComments = $this->commentDAO->getComWaiting();
            // var_dump($commentaireAttente);
            return $this->view->render('administrateur', 'adminPage', [
                'comments' => $waitingComments,
                'userConnect' => $userConnect
            ]);
        }
    }

    public function connexion()
    {
        $testConnect = $this->session->get('id');
        if($testConnect === null){
            $userConnect = ' ';
        } else {
            $userConnect = 'connect';
        }
        // require 'C:\wamp64\www\Projet5Oc/Templates/connexion.php';
        return $this->view->render('connexion', 'userPage', [
            'userConnect' => $userConnect
        ]);
    }

    public function deconnexion(){
        session_destroy();
        $userConnect = ' ';
        return $this->view->render('home', 'mainPage', [
            'userConnect' => $userConnect,
        ]);
    }

    public function contact(){
        $testConnect = $this->session->get('id');
        if($testConnect === null){
            $userConnect = ' ';
        } else {
            $userConnect = 'connect';
        }
        return $this->view->render('contact', 'mainPage', [
            'userConnect' => $userConnect
        ]);
    }

    public function article($articleId){
        $article = $this->postDAO->getArticle($articleId);
        $userId = $this->session->get('id');
        $comments = $this->commentDAO->getArticleComment($articleId);
        $sumComment = $this->commentDAO->getSumComment('postComment',$articleId);
        if(isset($userId)){
            $connect = True;
        } else {
            $connect = False;
        }
        return $this->view->render('article', 'mainPage', [
            'article' => $article,
            'connect' => $connect,
            'comments' => $comments,
            'sumComment' => $sumComment
        ]);
    }     

    public function register(Parameter $post)
    {
        // var_dump("test");
        $testConnect = $this->session->get('id');
        if($testConnect === null){
            $userConnect = ' ';
        } else {
            $userConnect = 'connect';
        }
        if($post->get('submit')) {
            $verifPseudo = $this->userDAO->verifPseudo($post);
            if($verifPseudo){
                // var_dump('register dans le if');
                $this->userDAO->register($post);
                $this->session->set('register', 'Votre inscription a bien été effectuée.');
                header('Location: ../public/index.php'); 
                return $this->view->render('inscription', 'userPage', [
                    'userConnect' => $userConnect
                ]);
            } else {
                $testRegister['errorRegister'] = "Le pseudo est déjà utilisé, veuillez en choisir un autre.";
                return $this->view->render('inscription', 'userPage', [
                    'testRegister' => $testRegister,
                    'userConnect' => $userConnect,
                    'infoRegister' => $post
                ]);
            }               
        }
        return $this->view->render('inscription', 'userPage', [
            'userConnect' => $userConnect
        ]);
        
    }

    public function login(Parameter $post)
    {
        $idTypeUser = 0;
        if($post->get('boutonVal')) {
            $result = $this->userDAO->login($post);
            // var_dump($result['isPasswordValid']);
            if($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Content de vous revoir');
                $this->session->set('id', $result['result']['IdUtilisateur']);
                $this->session->set('pseudo', $post->get('pseudo'));
                $this->session->set('typeUser', $result['IdTypeUtilisateur']);
                // var_dump("je passe ici");
                $idTypeUser = $result['IdTypeUtilisateur'];
                //echo($result['IdTypeUtilisateur']);
                // header('Location: ../public/index.php');
            }
            else {
                // var_dump("je passe là (else)");
                // var_dump([$post->get('pseudo')]);
                $userConnect = 'noConnect';
                $errorLogin['errorLogin'] = 'Le pseudo et/ou le mot de passe sont incorrects.';
                return $this->view->render('connexion', 'userPage', [
                    'post'=> $post,
                    'testConnexion' => $errorLogin,
                    'userConnect' => $userConnect
                ]);
            }
        }
        // var_dump('je sors');
        // echo($idTypeUtilisateur);
        $userConnect = 'connect';
        if($idTypeUser == 2){
            //  echo('Je passe dans le if IdType');
            $authorAccount = $this->userDAO->getAuthorAccount($this->session->get('id'));
            // var_dump($this->session->get('id'));
            // var_dump($authorAccount);
            $articlesId = $this->postDAO->getArticleAuthor($this->session->get('id'));
            return $this->view->render('auteur', 'userPage', [
            'articlesId' => $articlesId,
            'authorAccount' => $authorAccount,
            'userConnect' => $userConnect
            ]);
        } else {
            // echo('Je passe dans le else IdType');
            $waitingComments = $this->commentDAO->getComWaiting();
            $sumComment = $this->commentDAO->getSumComment('comWaiting',' ');
            // var_dump($commentaireAttente);
            return $this->view->render('administrateur', 'adminPage', [
                'comments' => $waitingComments,
                'sumComment' => $sumComment,
                'userConnect' => $userConnect
            ]);
        }
    }

    public function pageAddArticle(){
        $userConnect = 'connect';
        return $this->view->render('nouvelArticle', 'userPage', [
            'userConnect' => $userConnect
        ]);
    }

    public function addArticle(Parameter $post){
        // var_dump("test");
        if($post->get('boutonVal')) {
            // echo('register dans le if');
            $this->postDAO->addArticle($post, $this->session->get('id'));
            // $this->session->set('register', 'Votre inscription a bien été effectuée');
            // header('Location: ../public/index.php');    
        }
        $authorAccount = $this->userDAO->getAuthorAccount($this->session->get('id'));
        $articlesId = $this->postDAO->getArticleAuthor($this->session->get('id'));
        $userConnect = 'connect';
        return $this->view->render('auteur', 'userPage', [
            'articlesId' => $articlesId,
            'authorAccount' => $authorAccount,
            'userConnect' => $userConnect
        ]);
    }

    public function remArticle($articleId){
        $remArticle = $this->postDAO->remArticle($articleId);
        $authorAccount = $this->userDAO->getAuthorAccount($this->session->get('id'));
        $articlesId = $this->postDAO->getArticleAuthor($this->session->get('id'));
        $userConnect = 'connect';
        return $this->view->render('auteur', 'userPage', [
            'articlesId' => $articlesId,
            'authorAccount' => $authorAccount,
            'userConnect' => $userConnect
        ]);
    }

    public function pageEditArticle($articleId){
        $articlesId = $this->postDAO->getEditArticle($articleId);
        // var_dump($articlesId);
        $userConnect = 'connect';
        return $this->view->render('modifPost', 'userPage', [
            'articlesId' => $articlesId,
            'userConnect' => $userConnect
        ]);
    }

    public function editArticle($post, $articleId){
        $editArticle = $this->postDAO->editArticle($post, $articleId);
        $authorAccount = $this->userDAO->getAuthorAccount($this->session->get('id'));
        $articlesId = $this->postDAO->getArticleAuthor($this->session->get('id'));
        $userConnect = 'connect';
        return $this->view->render('auteur', 'userPage', [
            'articlesId' => $articlesId,
            'authorAccount' => $authorAccount,
            'userConnect' => $userConnect
        ]);
    }

    public function commentArticle($post, $articleId){
        if($post->get('boutonVal')) {
            // var_dump($post);
            $ajout = $this->postDAO->addCom($post, $articleId, $this->session->get('id'));
            $article = $this->postDAO->getArticle($articleId);
            $comments = $this->commentDAO->getArticleComment($articleId);
            $connect = True;
            return $this->view->render('article', 'mainPage', [
                'article' => $article,
                'connect' => $connect,
                'comments' => $comments
            ]);
        }
    }

    public function editUser($post){
        if($post->get('validationButton')){
            $editUser = $this->userDAO->setUser($post, $this->session->get('id'));
            $authorAccount = $this->userDAO->getAuthorAccount($this->session->get('id'));
            $articlesId = $this->postDAO->getArticleAuthor($this->session->get('id'));
            $userConnect = 'connect';
            return $this->view->render('auteur', 'userPage', [
            'articlesId' => $articlesId,
            'authorAccount' => $authorAccount,
            'userConnect' => $userConnect
            ]);
        }
        $authorAccount = $this->userDAO->getAuthorAccount($this->session->get('id'));
        $userConnect = 'connect';
        // var_dump($compteAuteur);
        return $this->view->render('changeUser', 'userPage', [
            'users' => $authorAccount,
            'userConnect' => $userConnect
        ]);
    }
}

?>