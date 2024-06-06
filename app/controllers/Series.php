<?php

class Series extends Controller{

    public function index (){

        $data['series'] = $this->model('Series_model')->getAllSeries();
        $this->view('templates/header');
        $this->view('series/index', $data);
        $this->view('templates/footer');
        

    }

}