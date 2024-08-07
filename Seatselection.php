<!DOCTYPE html>
<html lang="en">
  <head>
      
      <?php
      require 'classes/Theater.php';
      
      session_start();
      if($_SESSION['movie']) {
         $movie = json_decode($_SESSION['movie']);
         
         // Loading theater details
         if(isset($_GET['theaterID'])) {
             $theater = new Theater($_GET['theaterID']);
             $theater->fetchTheater();
             
             $_SESSION['theater'] = $theater->extractJSON();
         }
         
      } else {
          header("Location: LandingPage.php");
      }
      
      if($_GET['date'] && $_GET['time']) {
          $date = $_GET['date'];
          $time = $_GET['time'];
          $_SESSION['date'] = $date;
          $_SESSION['time'] = $time;
      }
      
      
      ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/Seatselection.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="seat-selection-main-div">
      <section class="header-sec" style='background: url("server/<?php echo $movie->coverLink ?>"); background-size: cover; background-repeat: no-repeat; background-positioin: center;'>
        <div class="nav-div">
          <div class="sec-0">LOGO</div>
          <div class="sec-1">
            <nav class="nav-items">
              <a href="">Trailer</a>
              <a href="">Movies</a>
              <a href="">Contact</a>
              <a href="">Offers</a>
            </nav>
          </div>
          <div class="sec-2">
            <div class="sec-1-child">
                <i class="fa-solid fa-location-dot"></i> <?php echo $theater->getName() ?>
            </div>
            <div class="sec-1-child">
              <button class="login-btn">Login</button>
            </div>
          </div>
        </div>

        <div class="movie-image-div">
          <div class="container-1">
            <div class="colum-1"><span class="movie-name"><?php echo $movie->name ?></span></div>
            <div class="colum-2"><span class="language"><?php echo $movie->language ?></span></div>
            <div class="colum-3">
              <div class="one">Genere</div>
              <div class="one"><?php echo $movie->genre ?></div>
         
            </div>
          </div>
          <div class="container-2">
           
            
          </div>
        </div>
      </section>

      <div class="movie-details-top-div">
        <div class="date-div"><?php echo $date ?></div>
        <div class="thetre-name-div">
            <span class="theatre-name"><?php echo $theater->getName() ?></span>
        </div>
        <div class="time-div"><?php echo $time ?></div>
      </div>
     
        <div class="screen-container">
          <div class="theater-screen"></div>
          <div class="seat-container">
            <div class="sec-top">
              <div class="child-div">
                <div class="child-div-top">
                  <div class="seat-box-booked"></div>
                  <span id="span">Booked</span>
                </div>
                <div class="child-div-top">
                  <div class="seat-box-available"></div>
                  <span id="span">Available</span>
                </div>
              </div>
            </div>
            <div class="sec-bottom">
              <div class="coloum">
                <div class="row" id="letter"></div>
                <div class="row" id="letter">A</div>
                <div class="row" id="letter">B</div>
                <div class="row" id="letter">C</div>
                <div class="row" id="letter">D</div>
                <div class="row" id="letter">E</div>
                <div class="row" id="letter">F</div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter">G</div>
                <div class="row" id="letter">H</div>
                <div class="row" id="letter">I</div>
                <div class="row" id="letter">J</div>
                <div class="row" id="letter"></div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">1</div>
                <div class="row" name="a1" value="a1" onclick="addSeat('a1')">
                  a1
                </div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" name="f1" value="f1" onclick="addSeat('f1')" id="f1" >f1</div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter">1</div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">2</div>
                <div class="row" name="a2" value="a2" onclick="addSeat('a2')" id="a21">a2</div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" name="f2" value="f2" onclick="addSeat('f2')" id="f2">f2</div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter">2</div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">3</div>
                <div class="row" name="a3" value="a3" onclick="addSeat('a3')" id="a3">a3</div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" name="f3" value="f3" onclick="addSeat('f3')" id="f3">f3</div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter">3</div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">4</div>
                <div class="row" name="a4" value="a4" onclick="addSeat('a4')" id="a4">a4</div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" name="e4" value="e4" onclick="addSeat('e4')" id="e4">e4</div>
                <div class="row" name="f4" value="f4" onclick="addSeat('f4')" id="f4">f4</div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter">4</div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">5</div>
                <div class="row" name="a5" value="a5" onclick="addSeat('a5')" id="a5">a5</div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" id="letter"></div>
                <div class="row" name="e5" value="e5" onclick="addSeat('e5')" id="e5">e5</div>
                <div class="row" name="f5" value="f5" onclick="addSeat('f5')" id="f5">f5</div>
                <div class="row" id="letter"></div>
                <div class="row" name="g5" value="g5" onclick="addSeat('g5')" id="g5">g5</div>
                <div class="row" name="h5" value="h5" onclick="addSeat('h5')" id="h5">h5</div>
                <div class="row" name="i5" value="i5" onclick="addSeat('i5')" id="i5">i5</div>
                <div class="row" name="j5" value="j5" onclick="addSeat('j5')" id="j5">j5</div>
                <div class="row" id="letter">5</div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">6</div>
                <div class="row" name="a6" value="a6" onclick="addSeat('a6')" id="a6">a6</div>
                <div class="row" name="b6" value="b6" onclick="addSeat('b6')" id="b6">b6</div>
                <div class="row" name="c6" value="c6" onclick="addSeat('c6')" id="c6">c6</div>
                <div class="row" name="d6" value="d6" onclick="addSeat('d6')" id="d6">d6</div>
                <div class="row" name="e6" value="e6" onclick="addSeat('e6')" id="e6">e6</div>
                <div class="row" name="f6" value="f6" onclick="addSeat('f6')" id="f6">f6</div>
                <div class="row" id="letter"></div>
                <div class="row" name="g6" value="g6" onclick="addSeat('g6')" id="g6">g6</div>
                <div class="row" name="h6" value="h6" onclick="addSeat('h6')" id="h6">h6</div>
                <div class="row" name="i6" value="i6" onclick="addSeat('i6')" id="i6">i6</div>
                <div class="row" name="j6" value="j6" onclick="addSeat('j6')" id="j6">j6</div>
                <div class="row" id="letter">6</div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">7</div>
                <div class="row" name="a7" value="a7" onclick="addSeat('a7')" id="a7">a7</div>
                <div class="row" name="b7" value="b7" onclick="addSeat('b7')" id="b7">b7</div>
                <div class="row" name="c7" value="c7" onclick="addSeat('c7')" id="c7">c7</div>
                <div class="row" name="d7" value="d7" onclick="addSeat('d7')" id="d7">d7</div>
                <div class="row" name="e7" value="e7" onclick="addSeat('e7')" id="e7">e7</div>
                <div class="row" name="f7" value="f7" onclick="addSeat('f7')" id="f7">f7</div>
                <div class="row" id="letter"></div>
                <div class="row" name="g7" value="g7" onclick="addSeat('g7')" id="g7">g7</div>
                <div class="row" name="h7" value="h7" onclick="addSeat('h7')" id="h7">h7</div>
                <div class="row" name="i7" value="i7" onclick="addSeat('i7')" id="i7">i7</div>
                <div class="row" name="j7" value="j7" onclick="addSeat('j7')" id="j7">j7</div>
                <div class="row" id="letter">7</div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">8</div>
                <div class="row" name="a8" value="a8" onclick="addSeat('a8')" id="a8">a8</div>
                <div class="row" name="b8" value="b8" onclick="addSeat('b8')" id="b8">b8</div>
                <div class="row" name="c8" value="c8" onclick="addSeat('c8')" id="c8">c8</div>
                <div class="row" name="d8" value="d8" onclick="addSeat('d8')" id="d8">d8</div>
                <div class="row" name="e8" value="e8" onclick="addSeat('e8')" id="e8">e8</div>
                <div class="row" name="f8" value="f8" onclick="addSeat('f8')" id="f8">f8</div>
                <div class="row" id="letter"></div>
                <div class="row" name="g8" value="g8" onclick="addSeat('g8')" id="g8">g8</div>
                <div class="row" name="h8" value="h8" onclick="addSeat('h8')" id="h8">h8</div>
                <div class="row" name="i8" value="i8" onclick="addSeat('i8')" id="i8">i8</div>
                <div class="row" name="j8" value="j8" onclick="addSeat('j8')" id="j8">j8</div>
                <div class="row" id="letter">8</div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">9</div>
                <div class="row" name="a9" value="a9" onclick="addSeat('a9')" id="a9">a9</div>
                <div class="row" name="b9" value="b9" onclick="addSeat('b9')" id="a9">b9</div>
                <div class="row" name="c9" value="c9" onclick="addSeat('c9')" id="c9">c9</div>
                <div class="row" name="d9" value="d9" onclick="addSeat('d9')" id="d9">d9</div>
                <div class="row" name="e9" value="e9" onclick="addSeat('e9')" id="e9">e9</div>
                <div class="row" name="f9" value="f9" onclick="addSeat('f9')" id="f9">f9</div>
                <div class="row" id="letter"></div>
                <div class="row" name="g9" value="g9" onclick="addSeat('g9')" id="g9">g9</div>
                <div class="row" name="h9" value="h9" onclick="addSeat('h9')" id="h9">h9</div>
                <div class="row" name="i9" value="i9" onclick="addSeat('i9')" id="i9">i9</div>
                <div class="row" name="j9" value="j9" onclick="addSeat('j9')" id="j9">j9</div>
                <div class="row" id="letter">9</div>
              </div>
              <div class="coloum">  
                <div class="row" id="letter">10</div>
                <div class="row" name="a10" value="a10" onclick="addSeat('a10')" id="a10">a10</div>
                <div class="row" name="b10" value="b10" onclick="addSeat('b10')" id="b10">b10</div>
                <div class="row" name="c10" value="c10" onclick="addSeat('c10')" id="c10">c10</div>
                <div class="row" name="d10" value="d10" onclick="addSeat('d10')" id="d10">d10</div>
                <div class="row" name="e10" value="e10" onclick="addSeat('e10')" id="e10" >e10</div>
                <div class="row" name="f10" value="f10" onclick="addSeat('f10')" id="f10">f10</div>
                <div class="row" id="letter"></div>
                <div class="row" name="g10" value="g10" onclick="addSeat('g10')" id="g10">g10</div>
                <div class="row" name="h10" value="h10" onclick="addSeat('h10')" id="h10">h10</div>
                <div class="row" name="i10" value="i10" onclick="addSeat('i10')" id="i10">i10</div>
                <div class="row" name="j10" value="j10" onclick="addSeat('j10')" id="j10">j10</div>
                <div class="row" id="letter">10</div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">11</div>
                <div class="row" name="a11" value="a11" onclick="addSeat('a11')" id="a11" >a11</div>
                <div class="row" name="b11" value="b11" onclick="addSeat('b11')" id="b11">b11</div>
                <div class="row" name="c11" value="c11" onclick="addSeat('c11')" id="c11">c11</div>
                <div class="row" name="d11" value="d11" onclick="addSeat('d11')" id="d11">d11</div>
                <div class="row" name="e11" value="e11" onclick="addSeat('e11')" id="e11">e11</div>
                <div class="row" name="f11" value="f11" onclick="addSeat('f11')" id="f11">f11</div>
                <div class="row" id="letter"></div>
                <div class="row" name="g11" value="g11" onclick="addSeat('g11')" id="g11">g11</div>
                <div class="row" name="h11" value="h11" onclick="addSeat('h11')" id="h11">h11</div>
                <div class="row" name="i11" value="i11" onclick="addSeat('i11')" id="i11">i11</div>
                <div class="row" name="j11" value="j11" onclick="addSeat('j11')" id="j11">j11</div>
                <div class="row" id="letter">11</div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">12</div>
                <div class="row" name="a12" value="a12" onclick="addSeat('a12')" id="a12">a12</div>
                <div class="row" name="b12" value="b12" onclick="addSeat('b12')" id="b12">b12</div>
                <div class="row" name="c12" value="c12" onclick="addSeat('c12')" id="c12">c12</div>
                <div class="row" name="d12" value="d12" onclick="addSeat('d12')" id="d12">d12</div>
                <div class="row" name="e12" value="e12" onclick="addSeat('e12')" id="e12">e12</div>
                <div class="row" name="f12" value="f12" onclick="addSeat('f12')" id="f12">f12</div>
                <div class="row" id="letter"></div>
                <div class="row" name="g12" value="g12" onclick="addSeat('g12')" id="g12">g12</div>
                <div class="row" name="h12" value="h12" onclick="addSeat('h12')" id="h12">h12</div>
                <div class="row" name="i12" value="i12" onclick="addSeat('i12')" id="i12">i12</div>
                <div class="row" name="j12" value="j12" onclick="addSeat('j12')" id="j12">j12</div>
                <div class="row" id="letter">12</div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">13</div>
                <div class="row" name="a13" value="a13" onclick="addSeat('a13')" id='a13'>a13</div>
                <div class="row" name="b13" value="b13" onclick="addSeat('b13')" id="b13">b13</div>
                <div class="row" name="c13" value="c13" onclick="addSeat('c13')" id="c13">c13</div>
                <div class="row" name="d13" value="d13" onclick="addSeat('d13')" id="d13">d13</div>
                <div class="row" name="e13" value="e13" onclick="addSeat('e13')" id="e13">e13</div>
                <div class="row" name="f13" value="f13" onclick="addSeat('f13')" id="f13">f13</div>
                <div class="row" id="letter"></div>
                <div class="row" name="g13" value="g13" onclick="addSeat('g13')" id="g13">g13</div>
                <div class="row" name="h13" value="h13" onclick="addSeat('h13')" id="h13">h13</div>
                <div class="row" name="i13" value="i13" onclick="addSeat('i13')" id="i13">i13</div>
                <div class="row" name="j13" value="j13" onclick="addSeat('j13')" id="j13">j13</div>
                <div class="row" id="letter">13</div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">14</div>
                <div class="row" name="a14" value="a14" onclick="addSeat('a14')" id="a14">a14</div>
                <div class="row" name="b14" value="b14" onclick="addSeat('b14')" id="b14">b14</div>
                <div class="row" name="c14" value="c14" onclick="addSeat('c14')" id="c14">c14</div>
                <div class="row" name="d14" value="d14" onclick="addSeat('d14')" id="d14">d14</div>
                <div class="row" name="e14" value="e14" onclick="addSeat('e14')" id="e14">e14</div>
                <div class="row" name="f14" value="f14" onclick="addSeat('f14')" id="f14">f14</div>
                <div class="row" id="letter"></div>
                <div class="row" name="g14" value="g14" onclick="addSeat('g14')" id="g14">g14</div>
                <div class="row" name="h14" value="h14" onclick="addSeat('h14')" id="h14">h14</div>
                <div class="row" name="i14" value="i14" onclick="addSeat('i14')" id="i14">i14</div>
                <div class="row" name="j14" value="j14" onclick="addSeat('j14')" id="j14">j14</div>
                <div class="row" id="letter">14</div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">15</div>
                <div class="row" name="a15" value="a15" onclick="addSeat('a15')" id="a15">a15</div>
                <div class="row" name="b15" value="b15" onclick="addSeat('b15')" id="b15">b15</div>
                <div class="row" name="c15" value="c15" onclick="addSeat('c15')" id="c15">c15</div>
                <div class="row" name="d15" value="d15" onclick="addSeat('d15')" id="d15">d15</div>
                <div class="row" name="e15" value="e15" onclick="addSeat('e15')" id="e15">e15</div>
                <div class="row" name="f15" value="f15" onclick="addSeat('f15')" id="f15">f15</div>
                <div class="row" id="letter"></div>
                <div class="row" name="g15" value="g15" onclick="addSeat('g15')" id="g15">g15</div>
                <div class="row" name="h15" value="h15" onclick="addSeat('h15')" id="h15">h15</div>
                <div class="row" name="i15" value="i15" onclick="addSeat('i15')" id="i15">i15</div>
                <div class="row" name="j15" value="j15" onclick="addSeat('j15')" id="j15">j15</div>
                <div class="row" id="letter">15</div>
              </div>
              <div class="coloum">
                <div class="row" id="letter">16</div>
                <div class="row" name="a16" value="a16" onclick="addSeat('a16')" id="a16">a16</div>
                <div class="row" name="b16" value="b16" onclick="addSeat('b16')"id="b16">b16</div>
                <div class="row" name="c16" value="c16" onclick="addSeat('c16')" id="c16">c16</div>
                <div class="row" name="d16" value="d16" onclick="addSeat('d16')" id="d16">d16</div>
                <div class="row" name="e16" value="e16" onclick="addSeat('e16')" id="e16">e16</div>
                <div class="row" name="f16" value="f16" onclick="addSeat('f16')" id="f16">f16</div>
                <div class="row" id="letter"></div>
                <div class="row" name="g16" value="g16" onclick="addSeat('g16')" id="g16">g16</div>
                <div class="row" name="h16" value="h16" onclick="addSeat('h16')" id="h16">h16</div>
                <div class="row" name="i16" value="i16" onclick="addSeat('i16')" id="i16">i16</div>
                <div class="row" name="i17" value="i17" onclick="addSeat('j16')" id="j16">j16</div>
                <div class="row" id="letter">16</div>
              </div>
            </div>
          </div>
           <form action="booking.php" method="post">
          <input type='hidden' id='seat-array' name='seats' value='default'/>
          <div class="btn-div"><input type='submit' name='auth' value='Book Movie'/></div>
           </form>
        </div>

      <!-- ---------------footer part----------------- -->

      <div class="footer-main-div">
        <div class="middle-div">
          <div class="hr-div-left"></div>
          <div class="hr-div">
            <i class="fa-brands fa-facebook"></i
            ><i class="fa-brands fa-youtube"></i
            ><i class="fa-brands fa-x-twitter"></i>
          </div>
          <div class="hr-div-right"></div>
        </div>
        <div class="container">
          <div class="left-main-conatiner">
            <div class="logo-div">Logo</div>
            <div class="details-div">
              Please note the following when using our online cinema booking
              system. Ensure you verify your movie choice, showtime, and
              preferred seats before confirming your booking. Arrive at the
              cinema 15 minutes before the show to accommodate check-in and
              seating. Keep your booking confirmation accessible for entry.
              Refer to our policy guidelines for changes or cancellations.
              Bookings are subject to availability and may change without
              notice. Cancellations and refunds follow our terms. We are not
              liable for technical issues. Review details before purchase.
            </div>
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
    </div>
    <script>
      let seatList = [];
  
      function addSeat(seatNo) {
          let status = true
        for(element of seatList) {
            if(element === seatNo) {
                status = false
                break
            }
        }
        
        if(status){
            seatList.push(seatNo)
        } else {
            seatList.pop(seatNo)
        }
        
        // Change it to default background color 
        let rowClass = document.getElementsByClassName('row')
        for(element of rowClass) {
           
            if(element.id != 'letter')
            element.style.backgroundColor = "gray";
        }
        
        for(element of seatList) {
            document.getElementById(element).style.backgroundColor = "green"
        }
            
        document.getElementById('seat-array').value = seatList
        console.log(seatList);
      }
      
      
       function nextPage() {
           console.log('next page')
           window.location.href = "booking.php"
       }
    </script>
  </body>
</html>     
