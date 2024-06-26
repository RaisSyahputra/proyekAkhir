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
    public function getLatestSeries($limit)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY created_at DESC LIMIT :limit');
        $this->db->bind(':limit', $limit);
        return $this->db->resultSet();

        
    }
    
    public function getSeriesById($id)
    {
        $this->db->query('
            SELECT series.*, GROUP_CONCAT(genres.name SEPARATOR ", ") AS genre_names
            FROM series
            JOIN series_genres ON series.id_series = series_genres.series_id
            JOIN genres ON series_genres.genre_id = genres.id_genre
            WHERE series.id_series = :id_series
            GROUP BY series.id_series
        ');
        $this->db->bind(':id_series', $id);
        return $this->db->single();
    }

    public function getSeriesFileById($id)
    {
        $this->db->query('SELECT file_path FROM series WHERE id_series = :id_series');
        $this->db->bind(':id_series', $id);

        $row = $this->db->single();

        if ($row) {
            return $row['file_path'];
        } else {
            return false;
        }
    }

    public function deleteSerie($id)
    {
        $this->db->query('DELETE FROM series_genres WHERE series_id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();

        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_series = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    

    
    


}

?>
