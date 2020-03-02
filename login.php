<?php # Script 12.3 - login.php
// This page processes the login form submission.
// Upon succesful login, the user is redirected.
// Two included files are necessary.
// Send NOTHING to the web browser prior to the setcookie() lines!

// Check if the form has been submitted 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // For processing the login
    require('inc/login_function.inc.php');

    // Need the database connection:
    require('mysqli_connect.php');

    // Check the login: 
    list($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);

    if ($check) {

        // Set session data:
        session_start();
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['first_name'] = $data['first_name'];

        // Store HTTP_USER_AGENT
        $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);

        // Redirect:
        redirect_user('loggedin.php');
    }else{
        
        // Assign $data to $errors for error reproting
        // in the loginpage.inc.php file. 
        $errors = $data;

    }

    mysqli_close($dbc);
} // End of main submit conditional

// Create the page
include('inc/login_page.inc.php');


