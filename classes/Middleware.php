<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Middleware
 *
 * @author Sachindu Kavishka
 */
require_once 'DbConnection.php';
class Middleware {
    //put your code here
    public static function generateID($prefix, $table, $column) {
        $conn = DbConnection::getConnection();
        $stmt = $conn->prepare("SELECT $column FROM $table ORDER BY $column DESC LIMIT 1");
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $lastId = $result ? $result["$column"] : $prefix."00";
        $numberID = (int)substr($lastId, 2);
        $numberID++;

        // Convert to string
        $endID = (string) $numberID;
        $newID = $prefix;
        for($i = 0; $i < 16 - strlen($endID); $i++) {
            $newID .= "0";
        }
        $newID .= $endID;

        return $newID;    
    }
}
