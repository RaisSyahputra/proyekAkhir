<?php

class Film extends Controller {

    public function index()
    {
        $data['movies'] = $this->model('Film_model')->getAllFilm();
        $data['latest_movies'] = $this->model('Film_model')->getLatestMovies(4);
        $this->view('templates/header');
        $this->view('film/index', $data);
        $this->view('templates/footer');
    }
    
    public function detail($id)
    {
        $data['movies'] = $this->model('Film_model')->getFilmById($id);
        $data['latest_movies'] = $this->model('Film_model')->getLatestMovies(8);

        $this->view('templates/header');
        $this->view('film/detail', $data);
        $this->view('templates/footer');
    }
}