<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Movie
 *
 * @author Sachindu Kavishka
 */
require 'DbConnection.php';


class Movie {
    //put your code here
    private $movieID;
    private $name;
    private $duration;
    private $language;
    private $summary;
    private $rating;
    private $imgLink;
    private $coverLink;
    private $genre;
    private $conn;
    
    public function __construct($movieID = null, $name = null, $duration = null, $language = null, $summary = null, $rating = null, $imgLink = null, $coverLink = null, $genre = null) {
        $this->movieID = $movieID;
        $this->name = $name;
        $this->duration = $duration;
        $this->language = $language;
        $this->summary = $summary;
        $this->rating = $rating;
        $this->imgLink = $imgLink;
        $this->coverLink = $coverLink;
        $this->genre = $genre;

        $this->conn = DbConnection::getConnection();
    }


    public function fetchAllData() {
        $stmt = $this->conn->prepare('SELECT * FROM movie WHERE movie_ID = ? ');
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

    
    public function getMovieID() {
        return $this->movieID;
    }

    public function getName() {
        return $this->name;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getLanguage() {
        return $this->language;
    }

    public function getSummary() {
        return $this->summary;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getImgLink() {
        return $this->imgLink;
    }

    public function getCoverLink() {
        return $this->coverLink;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setMovieID($movieID): void {
        $this->movieID = $movieID;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setDuration($duration): void {
        $this->duration = $duration;
    }

    public function setLanguage($language): void {
        $this->language = $language;
    }

    public function setSummary($summary): void {
        $this->summary = $summary;
    }

    public function setRating($rating): void {
        $this->rating = $rating;
    }

    public function setImgLink($imgLink): void {
        $this->imgLink = $imgLink;
    }

    public function setCoverLink($coverLink): void {
        $this->coverLink = $coverLink;
    }

    public function setGenre($genre): void {
        $this->genre = $genre;
    }



}
