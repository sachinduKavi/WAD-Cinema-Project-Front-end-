<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine.</title>
    <link rel="stylesheet" href="Header/Header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Footer/Footer.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>
<?php
    require 'classes/Movie.php';
    require_once 'classes/DbConnection.php';
    
    
    $activeMovies = Movie::loadActiveMovie(DbConnection::getConnection());
    $inactiveMovies = Movie::loadInactiveMovies(DbConnection::getConnection());
//    echo print_r($activeMovies);

?>


<body>
    <section class="header-sec" style='background: url(images/movie.jpg);'>
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
        <div style="color: white; 
             align-items: center; 
             justify-content: center; 
             text-align: center; 
             display: flex; 
             flex-direction: column;
             width: 70%;
             height: fit-content;
             border-radius: 10px;
             background-color: #00000090;
             margin-top: 250px;">
            
            <h1 style="font-size: 100px; font-weight: 500; ">Welcome to Cine</h1>
                <h3 style="font-size: 50px; font-weight: 500; ">All Movie</h3>
                <h4 style="font-size: 30px; font-weight: 500; ">in one hand</h4>
            </div>
    </section>
    <section class="body">
        <div class="container1">
            <div class="text-container">
                <h1>New release</h1>
            </div>
            <div class="image-container">
                <div class="images">
                    
                    <?php
                    foreach($activeMovies as $movie) {
                      
                    
                    ?>
                    <a href='MoviePage.php?movieID=<?php echo $movie->getMovieID() ?>'>
                    <img src="server/<?php echo $movie->getImgLink() ?>" alt="Image 1">
                    </a>
                    <?php }?>
                    <!-- Add more images as needed -->
                </div>
            </div>

            <div class="text-container">
                <h1>Old release</h1>
            </div>
            <div class="image-container">
                <div class="images">
                    <?php
                    foreach($inactiveMovies as $movie) {
                      
                    
                    ?>
                    <img src="server/<?php echo $movie->getImgLink() ?>" alt="Image 1">
                    
                    <?php }?>
                
                    <!-- Add more images as needed -->
                </div>
            </div>
        </div>

        <div class="container2">
            <div class="faq">
                <div class="faq-contain">
                        <h3>Frequently Asked Questions</h3>
                        <br />
                        <h4>Find answers to common questions and concerns.</h4>
                        <br />
                </div>
                <hr/>
                <div class="faq-contain1">
                    <h5>How does it work?</h5>
                    <p>
                        Users select movie, showtime, seats, pay online. System confirms booking via email or SMS. Arrive, 
                        show confirmation, enjoy movie.
                    </p>
        
                    <hr/>
        
                    <h5>Can I search by location?</h5>
                    <p>
                        Absolutely! Our online cinema booking system allows you to search for movies by location. 
                        Simply enter your preferred location or choose from a list of nearby cinemas to find available screenings.
                    </p>
                    <hr/>
        
                    <h5>Is my personal data safe?</h5>
                    <p>
                        Yes, your personal data is secure. We use encryption and strict privacy measures to protect your 
                        information and comply with privacy regulations to ensure responsible handling of your data.
                    </p>
                    <hr/>
                </div>
        
                <div class="faq-contain">
                        <h3>Still have questions?</h3>
                        <br />
                        <h4>Contact our support team for further assistance</h4>
                        <br />
                        <button class="button">Contact</button>
                </div>
                
                
            </div>
        </div>
        <script src="script.js"></script>
    </section>
    
    
    
    <section class="footer">
        <div class="footer-main-div">
            <div class="middle-div">
                <div class="hr-div-left"></div>
                <div class="hr-div"><i class="fa-brands fa-facebook"></i><i class="fa-brands fa-youtube"></i><i class="fa-brands fa-x-twitter"></i></div>
                <div class="hr-div-right"></div>
                
            </div>
            <div class="container">
                <div class="left-main-conatiner">
                    <div class="logo-div">Logo</div>
                    <div class="details-div">Please note the following when using our online cinema booking system. Ensure you verify your movie choice, showtime, and preferred seats before confirming your booking. Arrive at the cinema 15 minutes before the show to accommodate check-in and seating. Keep your booking confirmation accessible for entry. Refer to our policy guidelines for changes or cancellations. Bookings are subject to availability and may change without notice. Cancellations and refunds follow our terms. We are not liable for technical issues. Review details before purchase.</div>
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
    </section>
</body>

</html>