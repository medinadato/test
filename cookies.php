<?php
ini_set('display_error', 1);

// Setting a cookie in PHP is easy
//set_cookie('name', 'value', time()+10, null, null, false, true);
setcookie('name_of_my_cookie', 'value_of_my_cookie');

 
// Name is what your cookie will be stored as.
// Value is the value that will be stored in your cookie.
// Expiration is when your cookie will expire (delete).
// Path is the path on the server the cookie will be available to.
// Domain is the domain that the cookie is available to.  (Note: www.example.com counts www as a subdomain of example.com)
// Secure is if the cookie will be only transferred over a secure connection SSL.
// HTTP_only will send the cookie only through HTTP protocol.  (Note: only available for PHP 5.2 +, and on certain browsers)
 