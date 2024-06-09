<?php

class Login extends Controller {
    private $accountModel;

    public function __construct() {
        $this->accountModel = $this->model('Accounts_model');
    }

    public function index() {
        // Check if user is already logged in
        session_start();
        if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
            // User is logged in, redirect to home page
            header('Location: ' . BASEURL . '/home');
            exit();
        } else {
            // User is not logged in, show login page
            $this->view('login/index');
        }
    }

    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Prepare data for login
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password'])
            ];

            // Attempt to login
            $loggedInUser = $this->accountModel->login($data['email'], $data['password']);

            if ($loggedInUser) {
                // User logged in successfully
                session_start();
                $_SESSION['user_id'] = $loggedInUser['account_id']; 
                $_SESSION['user_email'] = $loggedInUser['email']; 
                // Redirect to a specific page
                header('Location: ' . BASEURL . '/home');
                exit();
            } else {
                // Login failed
                // Load the login view with an error message
                $data['login_err'] = 'Invalid email or password';
                $this->view('login/index', $data);
            }
        } else {
            // Load the login view
            $this->view('login/index');
        }
    }

    public function logout() {
        // Start session
        session_start();
    
        // Unset all session variables
        $_SESSION = array();
    
        // Destroy the session
        session_destroy();
    
        // Redirect to login page
        header('Location: ' . BASEURL . '/login');
        exit();
    }
}