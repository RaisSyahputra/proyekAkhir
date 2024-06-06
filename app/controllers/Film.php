<?php

class Film extends Controller {

    public function index()
    {
        $data['movies'] = $this->model('Film_model')->getAllFilm();
        $this->view('templates/header');
        $this->view('film/index', $data);
        $this->view('templates/footer');
    }
    
    public function page()
    {
        $this->view('film/page');

    }
}