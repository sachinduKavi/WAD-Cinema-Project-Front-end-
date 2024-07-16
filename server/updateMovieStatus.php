<?php

require '../classes/DbConnection.php';
$conn = DbConnection::getConnection();

session_start();
// Check whether session is set 
if(!isset($_SESSION['theater_ID'])) {
    header("Location: ../loginPage.php");
}

// Check whether movie id set with the url
if(!isset($_GET['movieID'])) {
    header("Location: ../movieList.php");
}

$movieID = $_GET['movieID'];

$stmt = $conn->prepare('UPDATE movie_time SET active = NOT active WHERE movie_ID = ?');
$stmt->execute(array($movieID));

header("Location: ../listMovies.php?message=Movie+status+successfully+updated.&type=success");
die();