<?php

class Home extends Controller{
    public function index()
    {
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

        $data['movies'] = $this->model('Film_model')->getFilmById($id);

        $this->view('templates/header');
        $this->view('film/detail', $data);
        $this->view('templates/footer');
    }
}