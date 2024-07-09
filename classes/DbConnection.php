<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of DbConnection
 *
 * @author Sachindu Kavishka
 */
class DbConnection {
    private static $host = "localhost";
    private static $username = "root";
    private static $database = "cinema_db";
    private static $password = "";
    
    
    public static function getConnection() {
        try{
           $conn = new PDO("mysql:host=".self::$host.";dbname=".self::$database.";", self::$username, self::$password);
           return $conn;
        } catch (Exception $ex) {
            echo "Database COnnection error ".$ex;
            die();
        }
        
        
        
    }
}
