<?php

namespace Projet5Oc\src\model;

class View
{
    private $file;
    private $title;

    public function render($template, $data = [])
    {
        $this->file = 'C:\wamp64\www\Projet5Oc/Templates/'.$template.'.php';
        $content  = $this->renderFile($this->file, $data);
        $view = $this->renderFile('C:\wamp64\www\Projet5Oc/Templates/base.php', [
            'title' => $this->title,
            'content' => $content
        ]);
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