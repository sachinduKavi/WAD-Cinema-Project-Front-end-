<!DOCTYPE html>


<?php 
session_start();
// Checck whether session is set 
if(!isset($_SESSION['theater_ID'])) {
    header("Location: loginPage.php");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link href="css/pannel.css" rel="stylesheet"/>
    <link href="css/add-movie.css" rel="stylesheet"/>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="./dashboard.php">Dashboard</a></li>
            <li><a href="#">Add Movies</a></li>
            <li><a href="#">List Movies</a></li>
   
        </ul>
    </div>
    <div class="content add-movie">
        <div class="header">
            <div class="title" style="margin-left: 5%;"><h2><?php echo $_SESSION['name']; ?></h2></div>
            <div class="user-info">
                <img src="img/profile-circle.svg" alt="User" width="40" height="40">
                <div><?php echo $_SESSION['admin_email'] ?></div>
            </div>
        </div>

        <div class="row save-btn-row">
            <button class="save-btn">SAVE</button>
        </div>
      
        <div class="row">
            <div class="column movie-col">
                <div class="movie-image">

                </div>
                <input type="file" accepts='image/*'>
            </div>

            <div class="column">
                <div class="min-column">
                <label for="">Movie Name</label>
                <input type="text">
                </div>
                
                <div class="min-column">
                <label for="">Duration</label>
                <input type="number">
                </div>


                <div class="row" style='justify-content: start'>
                    <div class="min-column">
                    <label for="">Language</label>
                    <input type="text">
                    </div>

                    <div class="min-column" style='margin-left: 20px'>
                        <div class="min-column">
                        <label for="">Duration</label>
                        <input type="number" style='width: 100px'>
                        </div>
                    </div>
                </div>
                



                <div class="min-column">
                <label for="">Summary</label>
                <textarea type="text" rows='8'></textarea>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="column cover-column">
                <label for="" style='align-self: start'>Cover Image</label>
                <div class="cover-image"></div>
            </div>
        </div>
      
    </div>
    
    
</body>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
