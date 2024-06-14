<?php

class Accounts_model {
    private $table = 'accounts'; // Nama tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Method untuk mendapatkan semua data akun
    public function getAllAccounts()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }


    // Method untuk login

    public function login($email, $password) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
    
        if ($row) {
            if (isset($row['password']) && password_verify($password, $row['password'])) {
                $_SESSION['role'] = $row['role'];
                return $row;
            } else {
                return false; // Password does not match
            }
        } else {
            return false; // Email not found
        }
        
    }

}

?>