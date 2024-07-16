<?php

session_start();
$theaterID = $_SESSION['theater_ID'];

require '../classes/DbConnection.php';
$conn = DbConnection::getConnection();

$movie_file = $_FILES['movie-image'];
$cover_file = $_FILES['cover-image'];


echo print_r($_POST)."<br>";


if(isset($_POST['name']) && isset($_POST['duration']) && isset($_POST['language']) && isset($_POST['name']) && isset($_POST['summary']) && isset($_POST['time-array'])) {
    if(strlen($_POST['name']) > 0 && strlen($_POST['duration']) > 0 && strlen($_POST['language']) > 0 && strlen($_POST['name']) > 0 && strlen($_POST['summary']) > 0 && strlen($_POST['time-array'] > 0 && strlen($_POST['genre'])) > 0) {
        // Check whether image files are available
        if($movie_file['size'] > 0 && $cover_file['size'] > 0) {

            echo print_r($movie_file);
            // Images are ready to upload 
            $movie_link = uploadImages($movie_file, "movie_imgs");
            $cover_link = uploadImages($cover_file, "movie_cover");

            if($movie_link && $cover_link) {
                // Both images uploaded successfully 
                $movieID = generateID("MV", "movie", "movie_ID");
                echo "Movie ID".$movieID;
                // Creating database record 
                $stmt = $conn->prepare('INSERT INTO movie(movie_ID, name, duration, language, summary, rating, img_link, cover_link, genre) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
                $a = $stmt->execute(array(
                    $movieID,
                    $_POST['name'],
                    $_POST['duration'],
                    $_POST['language'],
                    $_POST['summary'],
                    $_POST['rating'],
                    $movie_link,
                    $cover_link,
                    $_POST['genre']
                ));

                // Updating movie theater table
                $stmt = $conn->prepare('INSERT INTO movie_theater(movie_ID, theater_ID) VALUES (?, ?)');
                $stmt->execute(array($movieID, $theaterID));

                // Updating movie time tables
                $timeArray = explode(',', $_POST['time-array']);
                foreach($timeArray as $time) {
                    $movieTimeID = generateID('MT', 'movie_time', 'movie_timeID');
                    $stmt = $conn->prepare('INSERT INTO movie_time(movie_timeID, movie_ID, theater_ID, time, active) VALUES(?, ?, ?, ?,?)');
                    $stmt->execute(array(
                        $movieTimeID,
                        $movieID,
                        $theaterID,
                        $time,
                        1
                    ));
                }

                




                echo $a;
                if($a > 0) {
                    header("Location: ../addMovies.php?message=Movie+added+successfully+to+the+database.&type=success&movieID=$movieID");
                } else {
                    header("Location: ../addMovies.php?message=Failed+to+proceed+request.&type=error");
                }

            } else {
                // Upload error
                header("Location: ../addMovies.php?message=Upload+error+please+try+again+later.&type=error");
            }
            
        } else {
            // Images are not set properly 
            header("Location: ../addMovies.php?message=Please+select+valid+image+files&type=error");
        }


    } else {
        header("Location: ../addMovies.php?message=Missing+fields+please+fill+all+the+columns&type=error");
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



function generateID($prefix, $table, $column) {
    global $conn;
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


// Upload images to server files
function uploadImages($file, $directory) {
    $file_extension = explode("/", $file['type'])[1];
    $location = "$directory/".getName(16).".$file_extension";
    echo $location;
    return (move_uploaded_file($file['tmp_name'], $location)) 
        ? $location : false;

}

