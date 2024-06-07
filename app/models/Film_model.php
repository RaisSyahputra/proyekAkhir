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

    public function getFilmById($id)
    {
        $this->db->query('
            SELECT movies.*, GROUP_CONCAT(genres.name SEPARATOR \', \') AS genre_names
            FROM movies 
            JOIN movie_genres ON movies.id_movies = movie_genres.movie_id
            JOIN genres ON movie_genres.genre_id = genres.id_genre
            WHERE id_movies = :id_movies
            GROUP BY movies.id_movies
        ');
        $this->db->bind(':id_movies', $id);
        return $this->db->single();
    }
    
    

}