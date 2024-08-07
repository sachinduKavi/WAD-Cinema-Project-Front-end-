<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once '../classes/Theater.php';

echo print_r($_POST);

// Check whether all the values are present 
if(!empty($_POST['theatername']) && !empty($_POST['location'])  && !empty($_POST['noseats']) && !empty($_POST['ticket-price']) && !empty($_POST['password']) && !empty($_POST['email']))  {

    // Creating theater instant
    $theater = new Theater(null,
            $_POST['theatername'],
            $_POST['location'],
            $_POST['noseats'],
            $_POST['ticket-price'],
            $_POST['email'],
            $_POST['password']
    );

    if($theater->theaterRegister()) {
        // Insertion success
        header('Location: ../loginPage.php?message=Registration+success&type=success');
        exit();
    } else {
        // Data insertion failed
        header('Location: ../loginPage.php?message=Registration+failed&type=error');
        exit();
    }



} else {
    // Something went wrong
    header('Location: ../register01.php');
}