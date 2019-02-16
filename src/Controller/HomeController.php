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
        $this->Auth->allow(['index', 'view']);
    }

    public function index()
    {
        $this->viewBuilder()->setLayout('home');


        $movieGenres = $this->MovieGenres->find('list');
        $mediaTypes = $this->MediaTypes->find('list');

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

        $this->set(compact('movies', 'movieGenres', 'mediaTypes'));
    }
    /**
     * Client View method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $this->viewBuilder()->setLayout('home');

        $movie = $this->Movies->get($id, [
            'contain' => ['MovieGenres', 'MovieMediaTypes', 'MovieMediaTypes.MediaTypes', 'MovieMediaTypes.Movies']
        ]);

        $this->set('movie', $movie);
    }
    public function admin()
    {

        $this->viewBuilder()->setLayout('internal');
        $user = $this->Auth->user();

        $this->set(compact('user'));
    }
}
