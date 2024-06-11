<?php

class Home extends Controller{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_email'])) {
            // User is not logged in, redirect to login page
            header('Location: ' . BASEURL . '/login');
            exit();
        }
        // Mengambil data dari film dan series
        $data['movies'] = $this->model('Film_model')->getAllFilm();
        $data['series'] = $this->model('Series_model')->getAllSeries();
        $data['latest_movies'] = $this->model('Film_model')->getLatestMovies(4);
        
        
        $this->view('templates/header');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        session_start();
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_email'])) {
            // User is not logged in, redirect to login page
            header('Location: ' . BASEURL . '/login');
            exit();
        }
        $data['movies'] = $this->model('Film_model')->getFilmById($id);

        $this->view('templates/header');
        $this->view('film/detail', $data);
        $this->view('templates/footer');
    }

    public function upload()
    {
        session_start();
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_email'])) {
            // User is not logged in, redirect to login page
            header('Location: ' . BASEURL . '/login');
            exit();
        }


        $this->view('home/upload');
    }

    public function edit()
    {
        session_start();
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_email'])) {
            // User is not logged in, redirect to login page
            header('Location: ' . BASEURL . '/login');
            exit();
        }


        $this->view('home/edit');
    }
}