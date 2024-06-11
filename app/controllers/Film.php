<?php

class Film extends Controller {

    public function index()
    {
        session_start();
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_email'])) {
            // User is not logged in, redirect to login page
            header('Location: ' . BASEURL . '/login');
            exit();
        }

        $data['movies'] = $this->model('Film_model')->getAllFilm();
        $data['latest_movies'] = $this->model('Film_model')->getLatestMovies(4);
        $this->view('templates/header');
        $this->view('film/index', $data);
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
        $data['latest_movies'] = $this->model('Film_model')->getLatestMovies(8);

        $this->view('templates/header');
        $this->view('film/detail', $data);
        $this->view('templates/footer');
    }

    public function play($id)
    {
        session_start();
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_email'])) {
            // User is not logged in, redirect to login page
            header('Location: ' . BASEURL . '/login');
            exit();
        }
    

        $data['movies'] = $this->model('Film_model')->getFilmById($id);
        $data['latest_movies'] = $this->model('Film_model')->getLatestMovies(8);

        $this->view('templates/header');
        $this->view('film/play', $data);
        $this->view('templates/footer');
        $filePath = $this->model('Film_model')->getFilmFileById($id);
        if ($filePath) {
            // File found, play the movie
            $data['file_path'] = $filePath;
            $this->view('film/play', $data);
        } else {
            // File not found, redirect to error page or show error message
            header('Location: ' . BASEURL . '/error');
            exit();
        }
    }
}