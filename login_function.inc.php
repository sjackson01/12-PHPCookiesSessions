<?php #script 12.2 - login_function.inc.php
// This page defines two functions used by the login/logout process.container

/* This function determines the absolute URL and redirects the user there.
 * The function takes one argument: the page  to be redireced to.
 * The argument defaults to index.php.
 */ 

function redirect_user($page = 'index.php'){

    // Start defining the URL
    // URL is http:// plus the host name plus the current directory:
    $url = 'http://' . $_SERVER['HTTP_HOST']
                     . dirname($_SERVER['PHP_SELF']);
 

    // Remove any trailing slashes:
    $url = rtrim($url,'/\\');
    
    // Add the page:
    $url .= '/' . $page;

    // Redirect the user: 
    header("Location: $url");
    exit(); // Quit the script
}

 
 
