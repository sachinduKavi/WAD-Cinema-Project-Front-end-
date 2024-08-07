<?php

require 'DbConnection.php';

class Movie
{
    private $movieID;
    private $name;
    private $duration;
    private $language;
    private $summary;
    private $rating;
    private $imgLink;
    private $coverLink;
    private $genre;
    public $conn = null;
    private $active;

    
    
    public function __construct($movieID = null, $name = null, $duration = null, $language = null, $summary = null, $rating = null, $imgLink = null, $coverLink = null, $genre = null, $active = null) {
        $this->movieID = $movieID;
        $this->name = $name;
        $this->duration = $duration;
        $this->language = $language;
        $this->summary = $summary;
        $this->rating = $rating;
        $this->imgLink = $imgLink;
        $this->coverLink = $coverLink;
        $this->genre = $genre;
        $this->active = $active;
   

        $this->conn = DbConnection::getConnection();
    }
    
    public function extractJSON() {
        return json_encode(array(
            "movieID" => $this->movieID,
            "name"=> $this->name,
            "duration"=> $this->duration,
            "language"=> $this->language,
            "summary"=> $this->summary,
            "rating" => $this->rating,
            "imgLink"=> $this->imgLink,
            "coverLink"=> $this->coverLink,
            "genre"=> $this->genre,
            "active"=> $this->active
        ));
    }
    
    

    public static function getTheaterID() {
        return isset($_SESSION['theater_ID']) ? $_SESSION['theater_ID'] : null;
    }

    public function fetchAllData()
    {
        $stmt = $this->conn->prepare('SELECT * FROM movie WHERE movie_ID = ?');
        $stmt->execute(array($this->movieID));

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $result['name'];
        $this->duration = $result['duration'];
        $this->language = $result['language'];
        $this->summary = $result['summary'];
        $this->rating = $result['rating'];
        $this->imgLink = $result['img_link'];
        $this->coverLink = $result['cover_link'];
        $this->genre = $result['genre'];
    }

    public static function loadAllMovies($theaterID)
    {
        $stmt = DbConnection::getConnection()->prepare('SELECT movie.movie_ID, name, duration, language, summary, rating, img_link, cover_link, genre FROM movie INNER JOIN movie_theater ON movie_theater.movie_ID = movie.movie_ID WHERE theater_ID = ? ORDER BY movie.movie_ID DESC');
        $stmt->execute(array($theaterID));

        $results = $stmt->fetchAll();

        $movieList = array();
        foreach ($results as $row) {
            $movieList[] = (new Movie(
                $row['movie_ID'],
                $row['name'],
                $row['duration'],
                $row['language'],
                $row['summary'],
                $row['rating'],
                $row['img_link'],
                $row['cover_link'],
                $row['genre']
            ));
        }

        return $movieList;
    }
    
    
    public static function loadActiveMovie($connection) {
        $movieArray = array();
        $stmt = $connection->prepare("SELECT DISTINCT movie.movie_ID, img_link FROM movie JOIN movie_time ON movie.movie_ID = movie_time.movie_ID WHERE active = '1'");
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
        foreach($results as $record) {
            $movieArray[] = new Movie(
                    $record['movie_ID'],
                    null,
                    null,
                    null,
                    null,
                    null,
                    $record['img_link'],
                    null,
                    null,
                    null
            );
            
        }
        
        return $movieArray;
    }
    
    
    public static function loadInactiveMovies($connection) {
        $movieArray = array();
        $stmt = $connection->prepare("SELECT DISTINCT movie.movie_ID, img_link FROM movie JOIN movie_time ON movie.movie_ID = movie_time.movie_ID WHERE active = '0'");
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
        foreach($results as $record) {
            $movieArray[] = new Movie(
                    $record['movie_ID'],
                    null,
                    null,
                    null,
                    null,
                    null,
                    $record['img_link'],
                    null,
                    null,
                    null
            );
            
        }
        
        return $movieArray;
    }

    public function loadMovieStatus() {
        $stmt = $this->conn->prepare('SELECT active from movie_time WHERE movie_ID = ? AND theater_ID = ? LIMIT 1');
        $stmt->execute(array($this->movieID, Movie::getTheaterID()));

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['active'];
    }

    
    
    public function getActive() {
        return $this->active;
    }
    
    
    public function setActive($active) {
        $this->active = $active;
    }
    
    public function getMovieID() {
        return $this->movieID;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getImgLink()
    {
        return $this->imgLink;
    }

    public function getCoverLink()
    {
        return $this->coverLink;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function setMovieID($movieID): void
    {
        $this->movieID = $movieID;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setDuration($duration): void
    {
        $this->duration = $duration;
    }

    public function setLanguage($language): void
    {
        $this->language = $language;
    }

    public function setSummary($summary): void
    {
        $this->summary = $summary;
    }

    public function setRating($rating): void
    {
        $this->rating = $rating;
    }

    public function setImgLink($imgLink): void
    {
        $this->imgLink = $imgLink;
    }

    public function setCoverLink($coverLink): void
    {
        $this->coverLink = $coverLink;
    }

    public function setGenre($genre): void
    {
        $this->genre = $genre;
    }

    public function getTicketPrice($theaterID)
    {
        $conn = DbConnection::getConnection();
        $stmt = $conn->prepare('SELECT ticket_price FROM theater WHERE theater_ID = ?');
        $stmt->execute(array($theaterID));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['ticket_price'];
    }



    public function insertUserDetails($userID, $userName, $contactNumber, $nic, $email, $movieTimeID)
    {
        try {
            $stmt = $this->conn->prepare('INSERT INTO user_details (user_ID, user_name, contact_number, nic, email, movie_timeID) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute(array($userID, $userName, $contactNumber, $nic, $email, $movieTimeID));
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
