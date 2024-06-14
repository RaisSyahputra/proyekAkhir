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

    public function play($id)
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
        $this->view('series/play', $data);
        $this->view('templates/footer');
        $filePath = $this->model('Series_model')->getSeriesFileById($id);
        if ($filePath) {
            // File found, play the movie
            $data['file_path'] = $filePath;
            $this->view('series/play', $data);
        } else {
            // File not found, redirect to error page or show error message
            header('Location: ' . BASEURL . '/error');
        }
    }

    public function delete($id) {
        session_start();
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            // Delete the movie
            $this->model('Series_model')->deleteSerie($id);
            // Redirect to the home page
            header('Location: ' . BASEURL . '/home');
            exit();
        } else {
            // The user is not an admin, redirect them to a different page
            header('Location: ' . BASEURL . '/home');
            exit();
        }
    }

    public function update($id) {
        session_start();
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $release_date = $_POST['release_date'];
                $poster = $_FILES['poster'];
                $file = $_FILES['file_path'];
                $duration = $_POST['duration'];
                $synopsis = $_POST['synopsis'];
                $genre_id = $_POST['genre_id'];
    
                $poster_dir = $_SERVER['DOCUMENT_ROOT'] . '/proyekAkhir/public/img/';
                $file_dir = $_SERVER['DOCUMENT_ROOT'] . '/proyekAkhir/public/db/';
    
                $poster_name = uniqid() . basename($poster['name']);
                $file_name = uniqid() . basename($file['name']);
    
                $poster_path = $poster_dir . $poster_name;
                $file_path = $file_dir . $file_name;
    
                if (move_uploaded_file($poster['tmp_name'], $poster_path) && move_uploaded_file($file['tmp_name'], $file_path)) {
                    $this->model('Film_model')->updateMovie($id, $title, $release_date, 'img/'. $poster_name, 'db/' . $file_name, $duration, $synopsis, $genre_id);
                    header('Location: ' . BASEURL . '/home');
                    exit();
                } else {
                    echo 'Failed to update movie';
                }
            } else {
                $data['movie'] = $this->model('Film_model')->getMovieById($id);
                $this->view('home/update', $data);
            }
        } else {
            header('Location: ' . BASEURL . '/home');
            exit();
        }
    }



}