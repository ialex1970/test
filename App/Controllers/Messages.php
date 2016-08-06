<?php

namespace App\Controllers;

use App\Exceptions\Core;
use App\View;

class Messages
{
    protected $view;

    /**
     * Messages constructor.
     */
    public function __construct()
    {
        $this->view = new View();
    }
    
    protected function actionIndex()
    {
        $this->view->title = 'Пираты';
        // $this->view->news = \App\Models\Message::findAll();
        echo $this->view->display(__DIR__ . '/../templates/index.php');
    }
}

