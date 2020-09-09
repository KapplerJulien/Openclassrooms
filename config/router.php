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
                elseif($route === 'inscription'){
                    $this->frontController->register($this->request->getPost());                    
                } elseif($route === 'login'){
                    $this->frontController->login($this->request->getPost());
                } elseif($route === 'home'){
                    $this->frontController->home();
                } elseif($route === 'deconnexion'){
                    $this->frontController->deconnexion();
                } elseif($route === 'post'){
                    $this->frontController->post();
                } else {
                    // $this->frontController->home();
                    $this->errorController->errorNotFound();
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            // var_dump($route);
            // var_dump('errorServer');
            // var_dump($_SESSION);
            $this->errorController->errorServer();
            // $this->frontController->home();
        }
    }
}

?>