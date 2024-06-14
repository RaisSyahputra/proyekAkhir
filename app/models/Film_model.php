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

    public function getFilmFileById($id)
    {
        $this->db->query('SELECT file_path FROM movies WHERE id_movies = :id_movies');
        $this->db->bind(':id_movies', $id);

        $row = $this->db->single();

        if ($row) {
            return $row['file_path'];
        } else {
            return false;
        }
    }

    public function addMovie($title, $release_date, $poster, $file_path, $duration, $synopsis, $genre_ids)
    {
        // Insert into movies table
        $this->db->query('INSERT INTO movies (title, release_date, poster, file_path, duration, synopsis) VALUES (:title, :release_date, :poster, :file_path, :duration, :synopsis)');
        $this->db->bind(':title', $title);
        $this->db->bind(':release_date', $release_date);
        $this->db->bind(':poster', $poster);
        $this->db->bind(':file_path', $file_path);
        $this->db->bind(':duration', $duration);
        $this->db->bind(':synopsis', $synopsis);
        $this->db->execute();

        // Get the id of the inserted movie
        $movie_id = $this->db->lastInsertId();

        // Insert into movie_genres table
        foreach ($genre_ids as $genre_id) {
            $this->db->query('INSERT INTO movie_genres (movie_id, genre_id) VALUES (:movie_id, :genre_id)');
            $this->db->bind(':movie_id', $movie_id);
            $this->db->bind(':genre_id', $genre_id);
            $this->db->execute();
        }

        return $movie_id;
    }

    public function deleteMovie($id)
    {
        $this->db->query('DELETE FROM movie_genres WHERE movie_id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();

        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_movies = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function updateFilmById($id, $title, $release_date, $poster, $file_path, $duration, $synopsis, $genre_ids) {
        // Update movies table
        $this->db->query('UPDATE movies SET title = :title, release_date = :release_date, poster = :poster, file_path = :file_path, duration = :duration, synopsis = :synopsis WHERE id_movies = :id_movies');
        $this->db->bind(':id_movies', $id);
        $this->db->bind(':title', $title);
        $this->db->bind(':release_date', $release_date);
        $this->db->bind(':poster', $poster);
        $this->db->bind(':file_path', $file_path);
        $this->db->bind(':duration', $duration);
        $this->db->bind(':synopsis', $synopsis);
        $this->db->execute();
        
    
        // Delete existing genres
        $this->db->query('DELETE FROM movie_genres WHERE movie_id = :movie_id');
        $this->db->bind(':movie_id', $id);
        $this->db->execute();
    
        // Insert new genres
        foreach ($genre_ids as $genre_id) {
            $this->db->query('INSERT INTO movie_genres (movie_id, genre_id) VALUES (:movie_id, :genre_id)');
            $this->db->bind(':movie_id', $id);
            $this->db->bind(':genre_id', $genre_id);
            $this->db->execute();
        }
    
        return $id;
    }

    public function getGenresById($id)
    {
        $this->db->query('
            SELECT genres.*
            FROM genres
            WHERE genres.id_genre = :id_genre
        ');
        $this->db->bind(':id_genre', $id);
        return $this->db->resultSet();
    }



}