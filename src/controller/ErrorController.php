<?php

namespace Projet5Oc\src\controller;

use Projet5Oc\config\Session;
use Projet5Oc\src\model\View;

class ErrorController extends Controller
{
    protected $view;
    public $session;

    public function __construct()
    {
        $this->view = new View();
        $this->session = new Session($_SESSION);
    }

    public function errorNotFound()
    {
        $testConnect = $this->session->get('id');
        if($testConnect === null){
            $userConnect = ' ';
        } else {
            $userConnect = 'connect';
        }
        return $this->view->render('error_404', 'errorPage', [
            'userConnect' => $userConnect
        ]);
        // require '../templates/error_404.php';
    }

    public function errorServer()
    {
        $testConnect = $this->session->get('id');
        if($testConnect === null){
            $userConnect = ' ';
        } else {
            $userConnect = 'connect';
        }
        return $this->view->render('error_500', 'errorPage', [
            'userConnect' => $userConnect
        ]);
        // require '../templates/error_500.php';
    }
}

?>