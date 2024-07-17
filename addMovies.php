<!DOCTYPE html>


<?php 
require './classes/Movie.php';
session_start();
// Check whether session is set 
if(!isset($_SESSION['theater_ID'])) {
    header("Location: loginPage.php");
}

if(isset($_GET['message'])) {
    $message = $_GET['message'];
} else {
    $message = "";
}

if(isset($_GET['type'])) {
    switch($_GET['type']) {
        case 'error':
            $color = 'red';
            break;
        case 'success':
            $color = '#28a745';
            break;
        case 'warning':
            $color = '#FFA500';
            break;
        default:
            $color = 'transparent';
    }
} else {
    $color = "transparent";
}


if(isset($_GET['movieID'])) {
    $movie = new Movie($_GET['movieID']);
    $movie->fetchAllData();
    $server='server/updateMovie.php';
    
}else {
    $movie = null;
    $server = "server/saveMovie.php";
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
            <li><a href="./addMovies.php">Add Movies</a></li>
            <li><a href="./listMovies.php">List Movies</a></li>
   
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
        <form action='<?php echo $server ?>' method='post' enctype="multipart/form-data">

        <div class="row save-btn-row">
            <div class="error-row" style='border: <?php echo "2px solid ".$color?>'>
                <h4 style='color: <?php echo $color?>'><?php echo $message ?></h4>
            </div>

            <button class="save-btn" type='submit'>SAVE</button>
        </div>
      
        <div class="row">
            <div class="column movie-col">
                <div class="movie-image" id='movie-image-display'
                style="<?php echo $movie != null ?"background: url('server/" . $movie->getImgLink() . "'); background-position: center; background-size: cover;": '' ?>">
                
                   
                </div>
                <input type="file" accepts='image/*' name='movie-image' onchange="movieImageChange()" id='movie-image'/>
            </div>

            <div class="column">
                <div class="min-column">
                <label for="">Movie Name</label>
                <input type="text" name='name' value='<?php echo $movie != null? $movie->getName() :'' ?>'>
                </div>

                <div class="row" style='justify-content: start'>
                    <div class="min-column" style='margin-right: 20px'>
                    <label for="">Duration</label>
                    <input type="number" name='duration' style='width: 200px' value='<?php echo $movie != null? $movie->getDuration() :'' ?>'> 
                    </div>

                    <div class="min-column">
                    <label for="">Genre</label>
                    <input type="text" name='genre' style='width: 200px' value='<?php echo $movie != null? $movie->getGenre() :'' ?>'>
                    </div>
                </div>
                


                <div class="row" style='justify-content: start'>
                    <div class="min-column">
                    <label for="">Language</label>
                    <input type="text" name='language' value='<?php echo $movie != null? $movie->getLanguage() :'' ?>'>
                    </div>

                    <div class="min-column" style='margin-left: 20px'>
                        <div class="min-column">
                        <label for="">Rating</label>
                        <input type="number" style='width: 100px' name='rating' value='<?php echo $movie != null? $movie->getRating() :'' ?>'>
                        </div>
                    </div>
                </div>
                



                <div class="min-column">
                <label for="">Summary</label>
                <textarea type="text" rows='8' name='summary'><?php echo $movie != null? $movie->getSummary() :'' ?></textarea>
                </div>
            </div>
        </div>

        <div class="time-slot-row">
            <input type="time" id='time-slot'>
            <input type="text" id='time-array' style='visibility:hidden; width:20px;' name='time-array'>
            <input type="text" id='' style='visibility:hidden; width:20px;' name='movie-id' value='<?php echo $movie != null? $movie->getMovieID() :'' ?>'>
            
            <button class='btn' type='button' onclick='addTimeSlot()'>ADD</button>

            <h4 id='display'></h4>
        </div>

        <div class="row">

            <div class="column cover-column">
                <label for="" style='align-self: start'>Cover Image</label>
                <div class="cover-image" id='cover-image-display'
                style="<?php echo $movie != null ?"background: url('server/" . $movie->getCoverLink() . "'); background-position: center; background-size: cover;": '' ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <input type="file" accepts='image/*' name='cover-image' id='cover-image'>
        </div>
      </form>
    </div>
    
    
</body>

<script>
    let timeList = []

    function addTimeSlot() {
        const time = document.getElementById('time-slot').value
        timeList.push(time)

        document.getElementById('time-slot').value = ""

        document.getElementById('display').innerHTML = timeList
        
        document.getElementById('time-array').value = timeList
        console.log('time array', timeList)
    }

    document.getElementById('movie-image').addEventListener('change', (e) => {
        document.getElementById('movie-image-display').style.background = `url(${URL.createObjectURL(e.target.files[0])})`
        document.getElementById('movie-image-display').style.backgroundPosition = `center`
        document.getElementById('movie-image-display').style.backgroundSize = `cover`
    })

    document.getElementById('cover-image').addEventListener('change', (e) => {
        document.getElementById('cover-image-display').style.background = `url(${URL.createObjectURL(e.target.files[0])})`
        document.getElementById('cover-image-display').style.backgroundPosition = `center`
        document.getElementById('cover-image-display').style.backgroundSize = `cover`
    })

  

</script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
