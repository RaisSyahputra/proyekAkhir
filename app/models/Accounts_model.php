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

    




}

?>
