<?php

namespace App\Controller;
use App\Controller\AppController;

class HomeController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Movies');
    }

    public function index()
    {
        $this->viewBuilder()->setLayout('home');
        $this->paginate = [
            'contain' => ['MovieGenres']
        ];
        $movies = $this->paginate($this->Movies);

        $this->set(compact('movies'));
    }
}
