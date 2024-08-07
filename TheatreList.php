<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    require_once 'classes/Movie.php';
    require 'classes/Theater.php';

    if (isset($_GET['movieID'])) {
        $movie = new Movie($_GET['movieID']);
        $movie->fetchAllData();

        $theaterArray = Theater::loadAllTheaters();

        $_SESSION['movie'] = $movie->extractJSON();
    } else {
        header('Location: Landingpage.php');
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/TheatreList.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
              integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
              crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    </head>


    <body>
        <section class="header-sec" style='background: url("server/<?php echo $movie->getCoverLink() ?>"); background-size: cover; background-repeat: no-repeat; background-positioin: center;'>
            <div class="nav-div">
                <div class="sec-0"><img src="images/1.png" alt="" class="logo"></div>
                <div class="sec-1">
                    <nav class="nav-items">
                        <a href="">Movies</a>
                        <a href="">Contact</a>
                    </nav>
                </div>
                <div class="sec-2">
                    <div class="sec-1-child"><button class="login-btn">Login</button></div>
                </div>
            </div>


            <div class="movie-image-div" >
                <div class="part">
                    <div class="container-1">

                    </div>
                    <div class="container-2" 
                         style="
                         padding-left: 20px;
                         width: 700px;
                         margin: 0;
                         color: white;
                         display: flex;
                         flex-direction: column;
                         height: fit-content;
                         border-radius: 10px;
                         background-color: #00000090;
                         ">

                        <div class="colum-1"><span class="movie-name"><?php echo $movie->getName() ?></span></div>
                        <div class="colum-2"><span class="language"><?php echo $movie->getLanguage() ?></span></div>

                        <div class="du">
                            <div class="colum-3">
                                <div class="one"><?php echo $movie->getGenre() ?></div>
                            </div>
                            <span class="language"><?php echo $movie->getDuration() ?> Minutes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="date-order">
        <section class="summary-sec">
            <div class="top">
                <button class="day" id="day01" onclick="daySelection('<?php echo date("Y-m-d"); ?>', 'day01')">
                    <?php echo date('Y-m-d'); ?>
                </button>

                <button class="day" id="day02" onclick="daySelection('<?php echo date("Y-m-d", strtotime("+1 day")); ?>', 'day02')">
                    <?php echo date('Y-m-d', strtotime("+1 day")); ?>
                </button>

                <button class="day" id="day03" onclick="daySelection('<?php echo date("Y-m-d", strtotime("+2 day")); ?>', 'day03')">
                    <?php echo date('Y-m-d', strtotime("+2 day")); ?>
                </button>

                <button class="day" id="day04" onclick="daySelection('<?php echo date("Y-m-d", strtotime("+3 day")); ?>', 'day04')">
                    <?php echo date('Y-m-d', strtotime("+3 day")); ?>
                </button>
            </div>
        </section>
    </div>

    <section class="theatre">
        <?php
        foreach ($theaterArray as $theater) {
            ?>

            <div class="theatre-name">
                <img src="images/Theatre Mask.png" alt="">
                <div class="name">
                    <h3><?php echo $theater->getName() ?></h3>
                    <h4><?php echo $theater->getLocation() ?></h4>
                </div>
                <button class="time" onclick='nextPage("<?php echo $theater->getTheaterID() ?>", "10:30AM")'>
                    10:30 AM
                </button>
                <button class="time" onclick="nextPage('<?php echo $theater->getTheaterID() ?>', '4:00PM')">   
                    4.00 PM
                </button>
            </div>

        <?php } ?>

    </section>

    <section class="book">
        <div class="sec-1-child"><button class="login-btn">Book</button></div>
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

    <input type="hidden" value="" id="selectedDate"/>





</body>
<script>
    let selection = ""
    function daySelection(selectedDay, id) {
        selection = selectedDay
        console.log(selectedDay)
        let dayClass = document.getElementsByClassName('day');
        for (let i = 0; i < dayClass.length; i++) {
            dayClass[i].style.backgroundColor = 'white';
        }
        console.log(id)
        document.getElementById(id).style.backgroundColor = 'green';
        document.getElementById('selectedDate').value = selectedDate;
        toastr.info('Day Selected')
    }

    function nextPage(theaterID, time) {
        if (selection.length > 0)
            document.location.href = "Seatselection.php?theaterID=" + theaterID + "&date=" + selection + "&time=" + time
        else
            window.alert("Please chose a prefered date")
    }

</script>
</html>