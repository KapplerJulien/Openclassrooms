<?php

namespace Projet5Oc\src\model;

class View
{
    private $file;
    private $title;
    private $userConnect;

    public function render($template, $folder, $data = [])
    {
        $this->file = 'C:\wamp64\www\Projet5Oc/Templates/'.$folder.'/'.$template.'.php';
        // var_dump($this->title);
        $content  = $this->renderFile($this->file, $data);
        $view = $this->renderFile('C:\wamp64\www\Projet5Oc/Templates/paramPage/base.php', [
            'title' => $this->title,
            'userConnect' => $this->userConnect,
            'content' => $content
        ]);
        // var_dump($view);
        echo $view;
    }

    private function renderFile($file, $data)
    {
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        header('Location: index.php?route=notFound');
    }
}