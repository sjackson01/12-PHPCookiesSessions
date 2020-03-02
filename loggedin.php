<?php # Script 12.4 - loggedin.php
// The user is redirected here from login.php

session_start();

// If no cookie is present, redirect the user:
if (!isset($_SESSION['user_id'])){

    // Need the functions
    require('inc/login_function.inc.php');
    redirect_user();

}

// Set the page title and include the HTML header:
$page_title= 'Logged In!';
include('inc/header.php');

// Print a customized message: 
echo "<h1>Logged In!</h1>
      <p> You are now logged in,{$_SESSION['first_name']}!</p>
      <p><a href=\"logout.php\">Logout</a></p>";

include('inc/footer.php');      