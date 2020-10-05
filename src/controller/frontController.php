<?php

namespace Projet5Oc\src\controller;

use Projet5Oc\src\model\view;
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
        return $this->view->render('home');
    }

    public function post()
    {
        // require 'C:\wamp64\www\Projet5Oc/Templates/home.php';
        $articles = $this->postDAO->getArticles();
        return $this->view->render('post', [
            'articles' => $articles
        ]);
    }

    public function connexion()
    {
        // require 'C:\wamp64\www\Projet5Oc/Templates/connexion.php';
        return $this->view->render('connexion');
    }

    public function deconnexion(){
        return $this->view->render('deconnexion');
    }

    public function contact(){
        return $this->view->render('contact');
    }

    public function article($articleId){
        $article = $this->postDAO->getArticle($articleId);
        $idUtilisateur = $this->session->get('id');
        $comments = $this->commentDAO->getArticleComment($articleId);
        if(isset($idUtilisateur)){
            $connect = True;
        } else {
            $connect = False;
        }
        return $this->view->render('article', [
            'article' => $article,
            'connect' => $connect,
            'comments' => $comments
        ]);
    }     

    public function register(Parameter $post)
    {
        // var_dump("test");
        if($post->get('submit')) {
            $verifPseudo = $this->userDAO->verifPseudo($post);
            if($verifPseudo){
                // var_dump('register dans le if');
                $this->userDAO->register($post);
                $this->session->set('register', 'Votre inscription a bien été effectuée');
                header('Location: ../public/index.php'); 
                return $this->view->render('inscription');
            } else {
                $testRegister['errorRegister'] = "Le pseudo est déjà utilisé, veuillez en choisir un autre.";
                return $this->view->render('inscription',[
                    'testRegister' => $testRegister
                ]);
            }               
        }
        return $this->view->render('inscription');
        
    }

    public function login(Parameter $post)
    {
        $idTypeUtilisateur = 0;
        if($post->get('boutonVal')) {
            $result = $this->userDAO->login($post);
            // var_dump($result['isPasswordValid']);
            if($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Content de vous revoir');
                $this->session->set('id', $result['result']['IdUtilisateur']);
                $this->session->set('pseudo', $post->get('pseudo'));
                // var_dump("je passe ici");
                $idTypeUtilisateur = $result['IdTypeUtilisateur'];
                //echo($result['IdTypeUtilisateur']);
                // header('Location: ../public/index.php');
            }
            else {
                // var_dump("je passe là (else)");
                // var_dump([$post->get('pseudo')]);
                $errorLogin['errorLogin'] = 'Le pseudo et/ou le mot de passe sont incorrects';
                return $this->view->render('connexion', [
                    'post'=> $post,
                    'testConnexion' => $errorLogin
                ]);
            }
        }
        // var_dump('je sors');
        // echo($idTypeUtilisateur);
        if($idTypeUtilisateur == 2){
            // echo('Je passe dans le if IdType');
            $compteAuteur = $this->userDAO->getCompteAuteur($this->session->get('id'));
            $articlesId = $this->postDAO->getArticleAuteur($this->session->get('id'));
            return $this->view->render('auteur', [
            'articlesId' => $articlesId,
            'compteAuteur' => $compteAuteur
            ]);
        } else {
            // echo('Je passe dans le else IdType');
            $commentaireAttente = $this->commentDAO->getComWaiting();
            // var_dump($commentaireAttente);
            return $this->view->render('administrateur', [
                'comments' => $commentaireAttente
            ]);
        }
    }

    public function nouvelArticle(){
        return $this->view->render('nouvelArticle');
    }

    public function ajoutArticle(Parameter $post){
        // var_dump("test");
        if($post->get('boutonVal')) {
            // echo('register dans le if');
            $this->postDAO->ajouterArticle($post, $this->session->get('id'));
            // $this->session->set('register', 'Votre inscription a bien été effectuée');
            // header('Location: ../public/index.php');    
        }
        $compteAuteur = $this->userDAO->getCompteAteur($this->session->get('id'));
        $articlesId = $this->postDAO->getArticleAuteur($this->session->get('id'));
        return $this->view->render('auteur', [
            'articlesId' => $articlesId,
            'compteAuteur' => $compteAuteur
        ]);
    }

    public function suppressionArticle($articleId){
        $suppression = $this->postDAO->suppressionArticle($articleId);
        $compteAuteur = $this->userDAO->getCompteAteur($this->session->get('id'));
            $articlesId = $this->postDAO->getArticleAuteur($this->session->get('id'));
            return $this->view->render('auteur', [
            'articlesId' => $articlesId,
            'compteAuteur' => $compteAuteur
        ]);
    }

    public function pageModifArticle($articleId){
        $articlesId = $this->postDAO->getArticleModifAuteur($articleId);
        // var_dump($articlesId);
        return $this->view->render('modifPost', [
            'articlesId' => $articlesId
        ]);
    }

    public function modifArticle($post, $articleId){
        $modif = $this->postDAO->modifArticle($post, $articleId);
        $compteAuteur = $this->userDAO->getCompteAteur($this->session->get('id'));
        $articlesId = $this->postDAO->getArticleAuteur($this->session->get('id'));
        return $this->view->render('auteur', [
            'articlesId' => $articlesId,
            'compteAuteur' => $compteAuteur
        ]);
    }

    public function commentaireArticle($post, $articleId){
        if($post->get('boutonVal')) {
            // var_dump($post);
            $ajout = $this->postDAO->addCom($post, $articleId, $this->session->get('id'));
            $article = $this->postDAO->getArticle($articleId);
            $comments = $this->commentDAO->getArticleComment($articleId);
            $connect = True;
            return $this->view->render('article', [
                'article' => $article,
                'connect' => $connect,
                'comments' => $comments
            ]);
        }
    }

    public function changeUser($post){
        if($post->get('validationButton')){
            $changeUser = $this->userDAO->setUser($post, $this->session->get('id'));
            $compteAuteur = $this->userDAO->getCompteAuteur($this->session->get('id'));
            $articlesId = $this->postDAO->getArticleAuteur($this->session->get('id'));
            return $this->view->render('auteur', [
            'articlesId' => $articlesId,
            'compteAuteur' => $compteAuteur
            ]);
        }
        $compteAuteur = $this->userDAO->getCompteAuteur($this->session->get('id'));
        var_dump($compteAuteur);
        return $this->view->render('changeUser', [
            'users' => $compteAuteur
        ]);
    }
}

?>