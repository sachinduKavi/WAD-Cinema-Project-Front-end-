<?php
// Include necessary files and start session
require './classes/Movie.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
echo print_r($_POST)." ".print_r($_SESSION);
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['auth'])) {
    $name = $_POST['name'];
    $contactNumber = $_POST['contactNumber'];
    $nic = $_POST['nic'];
    $email = $_POST['email'];
    $movieTimeID = $_SESSION['movie_timeID']; // Assume this is set somewhere in your application

    // Generate a unique user ID
    $userID = uniqid('user_', true);

    // Create Movie object and insert user details
    $movie = new Movie();
    $success = $movie->insertUserDetails($userID, $name, $contactNumber, $nic, $email, $movieTimeID);

    if ($success) {
        echo "<script>alert('Booking successful');</script>";
    } else {
        echo "<script>alert('Booking failed');</script>";
    }
}

// Assume $_SESSION['seats'] is already set somewhere in your application
$seats = isset($_POST['seats']) ? $_POST['seats'] : ['A1', 'A2', 'A3'];
$seatCount = count($seats);
$seatNames = implode(', ', $seats);

// Assume the theater ID is stored in the session
$sessionTheater = $_SESSION['theater'];
$theaterID = $sessionTheater->;

// Create a Movie object and fetch the ticket price for the current theater
$price = new Movie();
$selectedPrice = $price->getTicketPrice($theaterID);

$subTotal = $seatCount * $selectedPrice;
$handlingFee = $subTotal * 0.05;
$total = $subTotal + $handlingFee;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Summary</title>
    <link rel="stylesheet" href="./css/booking.css">
</head>

<body>
    <div class="container_ticket">
        <div class="left">
            <p class="disclaimer">
                <strong>Disclaimer</strong><br>
                The information provided on our website is for general informational purposes only. While we strive to ensure the accuracy of the information, we do not guarantee its completeness, reliability, or accuracy. The schedules, showtimes, and movie details are subject to change without notice.
            </p>
            <p class="policy">
                <strong>Policy</strong><br>
                We collect personal information that you voluntarily provide to us when you register on the website, purchase tickets, or contact us. This may include your name, email address, phone number, and payment information.
            </p>
        </div>
        <div class="right">
            <div class="booking-summary">
                <h2><strong>Booking Summary</strong></h2>
                <p class="booking-detail">
                    <span><strong>Tickets</strong></span>
                    <span id="seatCount"><?= $seatCount ?> Tickets</span>
                </p>
                <p class="booking-detail">
                    <span id="seatNames"><strong>Seat no: <?= $seatNames ?></strong></span>
                </p>
                <p class="booking-detail">
                    <span><strong>Sub Total</strong></span>
                    <span id="subTotal"><strong>LKR <?= number_format($subTotal, 2) ?></strong></span>
                </p>
                <p class="booking-detail">
                    <span>Internet handling fee (5%)</span>
                    <span id="handlingFee">LKR <?= number_format($handlingFee, 2) ?></span>
                </p>
                <hr>
                <p class="booking-detail">
                    <span><strong>Total</strong></span>
                    <span id="Total"><strong>LKR <?= number_format($total, 2) ?></strong></span>
                </p>
                <button id="proceedButton" onclick="showPopup()">Proceed</button>
            </div>
        </div>
    </div>

    <!-- Popup Form -->
    <div id="popupForm" class="popup-form">
        <div class="popup-content">
            <span class="close" onclick="hidePopup()">&times;</span>
            <h2>Booking Details</h2>
            <form id="bookingForm" method="post" action="">
                <!-- <label for="name">Name:</label> -->
                <input type="text" id="name" name="name" placeholder="Name" required>

                <!-- <label for="contactNumber">Contact Number:</label> -->
                <input type="text" id="contactNumber" name="contactNumber" placeholder="Contact Number" required>

                <!-- <label for="nic">NIC:</label> -->
                <input type="text" id="nic" name="nic" placeholder="NIC" required>

                <!-- <label for="email">Email:</label> -->
                <input type="email" id="email" name="email" placeholder="email" required>

                <button type="submit" id="bookNowButton">Book Now</button>
            </form>
        </div>
    </div>

    <script>
        function showPopup() {
            document.getElementById('popupForm').style.display = 'block';
        }

        function hidePopup() {
            document.getElementById('popupForm').style.display = 'none';
        }
    </script>
</body>

</html>