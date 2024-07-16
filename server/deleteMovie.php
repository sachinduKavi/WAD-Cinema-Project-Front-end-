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

// Delete values from movie_time tables
$stmt = $conn->prepare('DELETE FROM movie_time WHERE movie_ID = ?');
$stmt->execute(array($movieID));

$stmt = $conn->prepare('DELETE FROM movie_theater WHERE movie_ID = ?');
$stmt->execute(array($movieID));

$stmt = $conn->prepare('DELETE FROM movie WHERE movie_ID = ?');
$stmt->execute(array($movieID));


// Finally redirecting back to the movie list
header("Location: ../listMovies.php?message=Movie+has+been+successfully+removed.&type=success");
die();