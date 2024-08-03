<?php


require '../classes/DbConnection.php';
$conn = DbConnection::getConnection();
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
// Check whether both user email and user password is present
if(isset($_POST['email']) && isset($_POST['password']) && strlen($_POST['email']) > 0) {
    $userEmail = $_POST['email'];
    $password = $_POST['password'];
    
  
    
    // Get password for relevenet email
    $stmt = $conn->prepare("SELECT * FROM theater WHERE admin_email = ?");
    
    $stmt->bindParam(1, $userEmail);
    $stmt->execute();
    
    $passResult = $stmt->fetch(PDO::FETCH_ASSOC);
    echo print_r($passResult);
    if(password_verify($password, $passResult['admin_pass'])) {
        // Password verified 
        session_start();
        
        $_SESSION['theater_ID'] = $passResult['theater_ID'];
        $_SESSION['name'] = $passResult['name'];
        $_SESSION['location'] = $passResult['location'];
        $_SESSION['no_seats'] = $passResult['no_seats'];
        $_SESSION['ticket_price'] = $passResult['ticket_price'];
        $_SESSION['admin_email'] = $passResult['admin_email'];
        
        
        
        // Setting user token 
        setcookie("user_token", json_encode($passResult), time()+86400, '/');
        
        
        echo "Password verified";
        header("Location: ../dashboard.php");
        
    } else {
        header("Location: ../loginPage.php?message=invalidPass");
    }
    
    
    
} else {
    header("location: ../loginPage.php?message=missingValue");
}

