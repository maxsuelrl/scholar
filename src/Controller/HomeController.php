<?php

namespace App\Controller;

class HomeController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash');
    }

    public function index()
    {
    }
}
