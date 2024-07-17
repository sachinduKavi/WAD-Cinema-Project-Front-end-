<?php

session_start();
$theaterID = $_SESSION['theater_ID'];

require '../classes/DbConnection.php';
$conn = DbConnection::getConnection();

$movie_file = $_FILES['movie-image'];
$cover_file = $_FILES['cover-image'];
$movieID = $_POST['movie-id'];

if(isset($_POST['name']) && isset($_POST['duration']) && isset($_POST['language']) && isset($_POST['name']) && isset($_POST['summary'])) {
    if(strlen($_POST['name']) > 0 && strlen($_POST['duration']) > 0 && strlen($_POST['language']) > 0 && strlen($_POST['name']) > 0 && strlen($_POST['summary']) > 0 && strlen($_POST['genre']) > 0) {

        if(strlen($_POST['movie-id']) > 0) {
            // This is an update
            // check weather movie image is updated
            echo print_r($movie_file);
            if($movie_file['size'] > 0) {
                $movie_link = uploadImages($movie_file, "movie_imgs");
                $stmt = $conn->prepare('UPDATE movie SET img_link = ? WHERE movie_ID = ?');
                $stmt->execute(array($movie_link, $movieID));
            } 


            // Check whether movie cover is updated
            if($cover_file['size'] > 0) {
                $cover_link = uploadImages($cover_file, "movie_cover");
                $stmt = $conn->prepare('UPDATE movie SET cover_link = ? WHERE movie_ID = ?');
                $stmt->execute(array($cover_link, $movieID));
            } 


            // Updating values in the database 
            $stmt = $conn->prepare("UPDATE movie SET name = ?, duration = ?, language = ?, summary = ?, rating = ?, genre = ? WHERE movie_ID = ?");
            $a = $stmt->execute(array(
                $_POST['name'],
                $_POST['duration'],
                $_POST['language'],
                $_POST['summary'],
                $_POST['rating'],
                $_POST['genre'],
                $_POST['movie-id'],
            ));

            if($a > 0) {
                // Record created successfully 
                header("Location: ../addMovies.php?message=Movie+updated+successfully.&type=success&movieID=$movieID");
            } else {
                header("Location: ../addMovies.php?message=Database+update+error.&type=error&movieID=$movieID");
            }
        }
        
    } else {
        // Some fields are empty
        header("Location: ../addMovies.php?message=Missing+fields+please+fill+all+the+columns&type=warning&movieID=$movieID");
    }


}



// // generate random string
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}


// Upload images to server files
function uploadImages($file, $directory) {
    $file_extension = explode("/", $file['type'])[1];
    $location = "$directory/".getName(16).".$file_extension";
    echo $location;
    return (move_uploaded_file($file['tmp_name'], $location)) 
        ? $location : false;

}