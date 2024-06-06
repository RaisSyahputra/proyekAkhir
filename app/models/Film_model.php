<?php

class Film_model {
    private $table = 'movies';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    
    }

    public function getAllFilm()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getLatestMovies($limit)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY created_at DESC LIMIT :limit');
        $this->db->bind(':limit', $limit);
        return $this->db->resultSet();

        
    }

}