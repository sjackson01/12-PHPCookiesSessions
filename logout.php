<?php # Script 12.6  - logout.php
// This page lets the user logout.

session_start(); // Access the existing session

// If no session is present, redirect the user:
if (!isset($_SESSION['user_id'])){

    // Need the function: 
    require('includes/login_function.inc.php');
    redirect_user();

    } else {

      $_SESSION = []; // Clear the variables.
      session_destroy(); // Destroy the session iteself
      setcookie('PHPSESSID', '', time()-3600, '/', 0,0);    
        
}

// Set the page title and include the HTML header:
$page_title ='Logged Out!';
include('inc/header.php');

// Print a customized message
echo "<h1>Logged Out</h1>";
echo 'You are now logged out.';

include('inc/footer.php');


