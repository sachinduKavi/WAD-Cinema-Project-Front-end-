<!DOCTYPE html>


<?php 
require 'classes/Movie.php';
session_start();
// Checck whether session is set 
if(!isset($_SESSION['theater_ID'])) {
    header("Location: loginPage.php");
}

// Load all the movies
$movieList = Movie::loadAllMovies($_SESSION['theater_ID']); 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="css/pannel.css" rel="stylesheet"/>
    <link href="css/movie-list.css" rel="stylesheet"/>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="./dashboard.php">Dashboard</a></li>
            <li><a href="./addMovies.php">Add Movies</a></li>
            <li><a href="./listMovies.php">List Movies</a></li>
<!--            <li><a href="#">Orders</a></li>
            <li><a href="#">Inventory</a></li>
            <li><a href="#">Accounts</a></li>
            <li><a href="#">Tasks</a></li>-->
        </ul>
    </div>
    <div class="content">
        <div class="header">
            <div class="title" style="margin-left: 5%;"><h2><?php echo $_SESSION['name']; ?></h2></div>
            <div class="user-info">
             
                <img src="img/profile-circle.svg" alt="User" width="40" height="40">
                       
                <div><?php echo $_SESSION['admin_email'] ?></div>
            </div>
        </div>
         
    </div>

    <div class="movie-container">

        <?php
            $counter = 0;
            foreach($movieList as $movie) {
                $counter++;
        
        ?>
            
            <div class="movie-banner">
                <div class="cols" style='flex-basis: calc(3%)'>
                    <h3><?php echo $counter?>.</h3>
                </div>

                <div class="cols" style='flex-basis: calc(46%)'>
                <a href="./addMovies.php?movieID=<?php echo $movie->getMovieID() ?>">
                    <h4><?php echo $movie->getName() ?></h4>
                </a>
                </div>


                <div class="cols" style='flex-basis: calc(15%)'>
                    <h4>Rating: <?php echo $movie->getRating() ?></h4>
                </div>

                <div class="cols" style='flex-basis: calc(15%)'>
                    <h4><?php echo $movie->getGenre() ?></h4>
                </div>

                <div class="cols" style='flex-basis: calc(10%)'>
                    <h4>ACTIVE</h4>
                </div>


                <div class="cols" style='flex-basis: calc(10%); align-items: flex-end'>
                    <img src="img/Delete.png" alt="delete-icon" width='25px'>
                </div>
        
            </div>
            

        <?php
            }
        ?>


    </div>
</body>
</html>
