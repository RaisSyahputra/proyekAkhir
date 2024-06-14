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

    public function upload() {
        session_start();
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            // Check if the request is a POST
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
                    // The file has been uploaded successfully
                    $this->model('Film_model')->addMovie($title, $release_date, 'img/'. $poster_name, 'db/' . $file_name, $duration, $synopsis, $genre_id);
                    header('Location: ' . BASEURL . '/home');
                    exit();
                } else {
                    // The file failed to upload, show an error message
                    echo 'Failed to upload file';
                }
            } else {
                // The request is not a POST, show the upload form
                $this->view('home/upload');
            }

        } else {
            // The user is not an admin, redirect them to a different page
            header('Location: ' . BASEURL . '/home');
            exit();
        }
    }

    public function delete($id) {
        session_start();
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            // Delete the movie
            $this->model('Film_model')->deleteMovie($id);
            // Redirect to the home page
            header('Location: ' . BASEURL . '/home');
            exit();
        } else {
            // The user is not an admin, redirect them to a different page
            header('Location: ' . BASEURL . '/home');
            exit();
        }
    }

    public function edit($id) {
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
                    $this->model('Film_model')->updateFilmById($id, $title, $release_date, 'img/'. $poster_name, 'db/' . $file_name, $duration, $synopsis, $genre_id);
                    header('Location: ' . BASEURL . '/home');
                    exit();
                } else {
                    echo 'Failed to update movie';
                }
            } else {
                $data['movie'] = $this->model('Film_model')->getFilmById($id);
                $this->view('home/edit', $data);
            }
        } else {
            header('Location: ' . BASEURL . '/home');
            exit();
        }
    }

    

}