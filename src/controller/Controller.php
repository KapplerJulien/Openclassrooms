<?php

namespace Projet5Oc\src\controller;

use Projet5Oc\config\Request;
use Projet5Oc\src\DAO\UserDAO;
use Projet5Oc\src\model\View;

abstract class Controller
{
    protected $userDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;

    public function __construct()
    {

        $this->userDAO = new UserDAO();
        $this->view = new View();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();

    }

    public function testConnect(){
        $testConnect = $this->session->get('id');
        if($testConnect === null){
            $userConnect = 'disconnect';
        } else {
            $userConnect = 'connect';
        }
        return $userConnect;
    }
}

?>