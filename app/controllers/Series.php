<?php

class Series extends Controller{

    public function index (){

        $data['series'] = $this->model('Series_model')->getAllSeries();
        

        $this->view('templates/header');
        $this->view('series/index', $data);
        $this->view('templates/footer');
        

    }

    public function detail($id)
    {
        $data['series'] = $this->model('Series_model')->getSeriesById($id);
        $data['latest_series'] = $this->model('Series_model')->getLatestSeries(8);

        $this->view('templates/header');
        $this->view('series/detail', $data);
        $this->view('templates/footer');
    }

}