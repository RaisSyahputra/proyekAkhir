<?php

class Series_model {
    private $table = 'series'; // Nama tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Method untuk mendapatkan semua data series
    public function getAllSeries()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    // Method lainnya sesuai kebutuhan dapat ditambahkan di sini

}

?>
