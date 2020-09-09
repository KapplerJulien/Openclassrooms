<?php

namespace Projet5Oc\src\controller;

use Projet5Oc\src\model\view;
use Projet5Oc\config\Parameter;
use Projet5Oc\src\DAO\UserDAO;
use Projet5Oc\config\Session;
use Projet5Oc\src\DAO\PostDAO;

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

    public function register(Parameter $post)
    {
        // var_dump("test");
        if($post->get('submit')) {
            // var_dump('register dans le if');
            $this->userDAO->register($post);
            $this->session->set('register', 'Votre inscription a bien été effectuée');
            header('Location: ../public/index.php');    
        }
        return $this->view->render('inscription');
    }

    public function login(Parameter $post)
    {
        if($post->get('boutonVal')) {
            $result = $this->userDAO->login($post);
            // var_dump($result['isPasswordValid']);
            if($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Content de vous revoir');
                $this->session->set('id', $result['result']['IdUtilisateur']);
                $this->session->set('pseudo', $post->get('pseudo'));
                // var_dump("je passe ici");
                header('Location: ../public/index.php');
            }
            else {
                // var_dump("je passe là (else)");
                // var_dump([$post->get('pseudo')]);
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
                return $this->view->render('connexion', [
                    'post'=> $post
                ]);
            }
        }
        // var_dump('je sors');
        return $this->view->render('home');
    }
}

?>