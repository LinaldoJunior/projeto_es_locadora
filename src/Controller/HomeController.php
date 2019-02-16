<?php

namespace App\Controller;
use App\Controller\AppController;

class HomeController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Movies');
        $this->loadModel('MovieGenres');
        $this->loadModel('MovieMediaTypes');
        $this->loadModel('MediaTypes');
        $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);
        $this->loadComponent('Auth');
        $this->Auth->allow(['index']);
    }

    public function index()
    {
        $this->viewBuilder()->setLayout('home');


        $movieGenres = $this->MovieGenres->find('list');
        $mediaTypes = $this->MediaTypes->find('list');

//        $movieMediaTypes = $this->MovieMediaTypes

            $movies = $this->paginate($this->MovieMediaTypes
            ->find('search', ['search' => $this->request->getQuery()])
            ->contain([
                'Movies', 'Movies.MovieGenres', 'MediaTypes'
            ])
            ->where([
                'Movies.active' => true
            ])
            ->order(
                ['Movies.id' => 'DESC']));

//        $this->paginate = [
//            'contain' => ['MovieGenres']
//        ];
//        $movies = $this->paginate($this->Movies);


//        $movies = $this->paginate($this->Movies
//            ->find('search', ['search' => $this->request->getQuery()])
//            ->contain([
//                'MovieGenres',
//            ])
//            ->where([
//                'Movies.active' => true
//            ])
//            ->order(
//                ['Movies.id' => 'DESC']));

//        $this->paginate = [
//            'contain' => ['MovieGenres']
//        ];
//        $movies = $this->paginate($this->Movies);

        $this->set(compact('movies', 'movieGenres', 'mediaTypes'));
    }
    public function admin()
    {

        $this->viewBuilder()->setLayout('internal');
        $user = $this->Auth->user();

        $this->set(compact('user'));
    }
}
