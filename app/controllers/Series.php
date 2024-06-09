<?php

class Series extends Controller{

    public function index (){
        session_start();
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_email'])) {
            // User is not logged in, redirect to login page
            header('Location: ' . BASEURL . '/login');
            exit();
        }
        $data['series'] = $this->model('Series_model')->getAllSeries();
        

        $this->view('templates/header');
        $this->view('series/index', $data);
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
        $data['series'] = $this->model('Series_model')->getSeriesById($id);
        $data['latest_series'] = $this->model('Series_model')->getLatestSeries(8);

        $this->view('templates/header');
        $this->view('series/detail', $data);
        $this->view('templates/footer');
    }

}