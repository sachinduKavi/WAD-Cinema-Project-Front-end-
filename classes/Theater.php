<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Theater
 *
 * @author Sachindu Kavishka
 */
require_once 'DbConnection.php';
require 'Middleware.php';

class Theater {
    //put your code here
    private $theaterID;
    private $name;
    private $location;
    private $noSeats;
    private $ticketPrice;
    private $adminEmail;
    private $adminPass;
    
    private $conn;
    
    public function __construct($theaterID, $name = null, $location = null, $noSeats = null, $ticketPrice = null, $adminEmail = null, $adminPass = null) {
        $this->theaterID = $theaterID;
        $this->name = $name;
        $this->location = $location;
        $this->noSeats = $noSeats;
        $this->ticketPrice = $ticketPrice;
        $this->adminEmail = $adminEmail;
        $this->adminPass = $adminPass;
        
        $this->conn = DbConnection::getConnection();
    }
    
    
    // Register new theater 
    public function theaterRegister() {
        // Generating new theater ID
        $theaterID = Middleware::generateID('TH', 'theater','theater_ID');
        $stmt = $this->conn->prepare("INSERT INTO theater (theater_ID, name, location, no_seats, ticket_price, admin_email, admin_pass) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute(array(
            $theaterID,
            $this->name,
            $this->location,
            $this->noSeats,
            $this->ticketPrice,
            $this->adminEmail,
            password_hash($this->adminPass, PASSWORD_DEFAULT)
        )) > 0;
    }
    
    public function extractJSON() {
        return json_encode(array(
            "theaterID" => $this->theaterID,
            "name" => $this->name,
            "location" => $this->location,
            "noSeats" => $this->noSeats,
            "ticketPrice" => $this->ticketPrice,
            "adminEmail" => $this->adminEmail
        ));
    }
    
    
    public function fetchTheater() {
        $stmt = $this->conn->prepare("SELECT * FROM theater WHERE theater_ID = ?");
        $stmt->execute(array($this->theaterID));
        
        $result = $stmt->fetch();
        
        if($result) {
            $this->theaterID = $result['theater_ID'];
            $this->name = $result['name'];
            $this->location = $result['location'];
            $this->noSeats = $result['no_seats'];
            $this->ticketPrice = $result['ticket_price'];
            $this->theaterID = $result['admin_email'];
        }
    }
    
    public static function loadAllTheaters() {
        $connection = DbConnection::getConnection();
        $stmt = $connection->prepare("SELECT * FROM theater");
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $theaterArray = array();
        $counter = 0;
        foreach($results as $record) {
            $counter++;
            $theaterArray[] = (new Theater(
                    $record['theater_ID'],
                    $record['name'],
                    $record['location'],
                    $record['no_seats'],
                    $record['admin_email'],
                    null
            ));
        }
        return $theaterArray;
    }
    
    
    // Getters and setters
    public function getTheaterID() {
        return $this->theaterID;
    }

    public function getName() {
        return $this->name;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getNoSeats() {
        return $this->noSeats;
    }

    public function getTicketPrice() {
        return $this->ticketPrice;
    }

    public function getAdminEmail() {
        return $this->adminEmail;
    }

    public function getAdminPass() {
        return $this->adminPass;
    }

    public function setTheaterID($theaterID): void {
        $this->theaterID = $theaterID;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setLocation($location): void {
        $this->location = $location;
    }

    public function setNoSeats($noSeats): void {
        $this->noSeats = $noSeats;
    }

    public function setTicketPrice($ticketPrice): void {
        $this->ticketPrice = $ticketPrice;
    }

    public function setAdminEmail($adminEmail): void {
        $this->adminEmail = $adminEmail;
    }

    public function setAdminPass($adminPass): void {
        $this->adminPass = $adminPass;
    }



    
}
