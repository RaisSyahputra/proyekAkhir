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

    // Method untuk mendapatkan akun berdasarkan email
    public function getAccountByEmail($email)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    // Method untuk menambahkan akun baru
    public function addAccount($data) {
        // Prepare the query
        $this->db->query('INSERT INTO accounts (email, password, created_at, role) VALUES (:email, :password, :created_at, :role)');
    
        // Bind values
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':created_at', $data['created_at']);
        $this->db->bind(':role', $data['role']);
    
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    

    // Method untuk login
    // Existing code...

    public function login($email, $password) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
    
        if ($row) {
            if (isset($row['password']) && password_verify($password, $row['password'])) {
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