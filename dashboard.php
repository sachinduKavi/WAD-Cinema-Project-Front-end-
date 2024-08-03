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
    <link href="css/pannel.css" rel="stylesheet"/>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="./addMovies.php">Add Movies</a></li>
            <li><a href="./listMovies.php">List Movies</a></li>
<!--        <li><a href="#">Orders</a></li>
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
        <div class="cards">
            <div class="card">
                <h3>67</h3>
                <p>Live Movies</p>
            </div>
            <div class="card">
                <h3>88</h3>
                <p>Reservations</p>
            </div>
            <div class="card">
                <h3>99</h3>
                <p>Orders</p>
            </div>
            <div class="card">
                <h3><?php echo $_SESSION['no_seats']; ?></h3>
                <p>Seats</p>
            </div>
        </div>
        <div class="projects" style="margin: 10%">
            <h2>Theater Details</h2>
            <table>
           
                <tbody>
                    <tr>
                        <td>Theater ID</td>
                        <td><?php echo $_SESSION['theater_ID'] ?></td>
                 
                    </tr>
                    <tr>
                        <td>Theater Name</td>
                        <td><?php echo $_SESSION['name'] ?></td>
            
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td><?php echo $_SESSION['location'] ?></td>
          
                    </tr>
                    <tr>
                        <td>Admin Email</td>
                        <td><?php echo $_SESSION['admin_email'] ?>t</td>
                  
                    </tr>
                    
                    <tr>
                        <td>Ticket Price</td>
                        <td>LKR <?php echo $_SESSION['ticket_price'] ?></td>
                  
                    </tr>
                </tbody>
            </table>
        </div>
      
    </div>
</body>
</html>
