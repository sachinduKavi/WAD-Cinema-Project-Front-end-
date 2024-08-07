<!DOCTYPE html>
<html lang="en">
<?php
require 'classes/Movie.php';

if(isset($_GET['movieID'])) {    
    $movie = new Movie($_GET['movieID']);
    $movie->fetchAllData();    
} else {
    header('Location: Landingpage.php');
}

?>
    
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/MoviePage.css">
    <link rel="stylesheet" href="Footer/Footer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    <section class="header-sec" style='background: url("server/<?php echo $movie->getCoverLink() ?>"); background-size: cover; background-repeat: no-repeat; background-positioin: center;'>
        <div class="nav-div">
            <div class="sec-0">LOGO</div>
            <div class="sec-1">
                <nav class="nav-items">
                    <a href="">Movies</a>
                    <a href="">Contact</a>
                </nav>
            </div>
            <div class="sec-2">
                <div class="sec-1-child"><i class="fa-solid fa-location-dot"></i> Location</div>
                <div class="sec-1-child"><button class="login-btn">Login</button></div>
            </div>
        </div>



        <div class="movie-image-div">
            <div class="part">
                <div class="container-1">
                    <div class="image">
                        <img src="server/<?php echo $movie->getImgLink() ?>" alt="" class="a1">
                    </div>
                </div>
                <div class="container-2">
                    <div class="colum-1"><span class="movie-name"><?php echo $movie->getName() ?></span></div>
                    <div class="colum-2"><span class="language"><?php echo $movie->getLanguage() ?></span></div>
                    <div class="colum-3">
                        <div class="one">Genere</div>
                        <div class="one"><?php echo $movie->getGenre() ?></div>
                   
                    </div>
                    <div class="colum-2"><span class="language"><?php echo $movie->getDuration() ?> Minutes</span></div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <section class="summary-sec">
        <div class="summary">
            <div class="content">
                <div class="container1">
                    <h1>Summary</h1>
                    <p><?php echo $movie->getSummary() ?></p>
                </div>
                <div class="container2">
                    <div class="sec-1-child"><button class="login-btn" onclick="nextPage()">Book</button></div>
                </div>
            </div>
        </div>
    </section>

    <div class="footer-main-div">
        <div class="middle-div">
            <div class="hr-div-left"></div>
            <div class="hr-div"><i class="fa-brands fa-facebook"></i><i class="fa-brands fa-youtube"></i><i
                    class="fa-brands fa-x-twitter"></i></div>
            <div class="hr-div-right"></div>

        </div>
        <div class="container">
            <div class="left-main-conatiner">
                <div class="logo-div">Logo</div>
                <div class="details-div">Please note the following when using our online cinema booking system. Ensure
                    you verify your movie choice, showtime, and preferred seats before confirming your booking. Arrive
                    at the cinema 15 minutes before the show to accommodate check-in and seating. Keep your booking
                    confirmation accessible for entry. Refer to our policy guidelines for changes or cancellations.
                    Bookings are subject to availability and may change without notice. Cancellations and refunds follow
                    our terms. We are not liable for technical issues. Review details before purchase.</div>
            </div>
            <div class="right-main-conatiner">
                <div class="sec1">
                    <p class="footer-heading">About us</p>
                    <p class="footer-parts">Contant</p>
                    <p class="footer-parts">Support</p>
                    <p class="footer-parts">FAQ</p>
                    <p class="footer-parts">Blogs</p>
                    <p class="footer-parts">Terms</p>
                </div>
                <div class="sec1">
                    <p class="footer-heading">Privacy</p>
                    <p class="footer-parts">Help Center</p>
                    <p class="footer-parts">Community</p>
                    <p class="footer-parts">Patner</p>
                </div>
                <div class="sec1">
                    <p class="footer-heading">Advertise</p>
                    <p class="footer-parts">Invester</p>
                    <p class="footer-parts">accessibility</p>
                    <p class="footer-parts">Cookie Policy</p>
                    <p class="footer-parts">Terms of Use</p>
                </div>
            </div>
        </div>
    </div>





</body>
<script>

function nextPage() {
    document.location.href = "TheatreList.php?movieID=<?php echo $movie->getMovieID()?>";
}

</script>

</html>