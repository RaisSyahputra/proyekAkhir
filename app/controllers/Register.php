<?php

class Register extends Controller {
    private $accountModel; // Define accountModel as a property

    public function __construct() {
        $this->accountModel = $this->model('Accounts_model'); // Instantiate Accounts_model in the constructor
    }

    public function index() {
        $this->view('register/index');
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST);

            // Prepare data for account creation
            $data = [
                'email' => trim(($_POST['email'])),
                'password' => password_hash(trim($_POST['password']), PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'role' => 'user'
            ];


            // Attempt to create the account
            $result = $this->accountModel->addAccount($data);
            if ($result === true) {
                // Redirect to login page
                header('Location: ' . BASEURL . '/login');
                exit;
            } else {
                // Redirect to register page
                header('Location: ' . BASEURL . '/register');
                exit;
            }
        } 
        
    }

    
}

?>