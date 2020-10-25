<?php

namespace Projet5Oc\config;
use Projet5Oc\src\controller\FrontController;
use Projet5Oc\src\controller\ErrorController;
use Exception;

class Router
{
    private $frontController;
    private $errorController;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();
    }

    public function run()
    {
        $route = $this->request->getGet()->get('route');

        try{
            if(isset($route))
            {
                if($route === 'connexion'){
                    $this->frontController->connexion();
                }
                elseif($route === 'register'){
                    $this->frontController->register($this->request->getPost());                    
                } elseif($route === 'login'){
                    $this->frontController->login($this->request->getPost());
                } elseif($route === 'home'){
                    $this->frontController->home();
                } elseif($route === 'deconnexion'){
                    $this->frontController->deconnexion();
                } elseif($route === 'post'){
                    $this->frontController->post();
                } elseif($route === 'auteur'){
                    $this->frontController->auteur();
                } elseif($route === 'contact'){
                    $this->frontController->contact();
                } elseif($route === 'article'){
                    $this->frontController->article($this->request->getGet()->get('articleId'));
                } elseif($route === 'pageAddArticle'){
                    $this->frontController->pageAddArticle();
                } elseif($route === 'addArticle'){
                    $this->frontController->addArticle($this->request->getPost());
                } elseif($route === 'remArticle'){
                    $this->frontController->remArticle($this->request->getGet()->get('articleId'));
                } elseif($route === 'pageEditArticle'){
                    // var_dump($this->request->getGet()->get('articleId'));
                    $this->frontController->pageEditArticle($this->request->getGet()->get('articleId'));
                } elseif($route === 'editArticle'){
                    $this->frontController->editArticle($this->request->getPost(), $this->request->getGet()->get('articleId'));
                } else {
                    $this->errorController->errorNotFound();
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            // var_dump($_SESSION);
            $this->errorController->errorServer();
        }
    }
}

?>