<?php

class Genres_movie_model {
    private $table = 'movie_genres';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    
    }

    public function getGenresById($id)
    {
        $this->db->query('
            SELECT genres.*
            FROM genres
            JOIN movie_genres ON genres.id_genre = movie_genres.genre_id
            WHERE movie_genres.movie_id = :id_movies
        ');
        $this->db->bind(':id_movies', $id);
        return $this->db->resultSet();
    }

    public function getAllGenres()
    {
        $this->db->query('SELECT * FROM genres');
        return $this->db->resultSet();
    }


}