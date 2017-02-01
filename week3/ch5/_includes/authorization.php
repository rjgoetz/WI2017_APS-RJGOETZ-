<?php
  $username = 'admin';
  $password = 'password';

  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] != $username || $_SERVER['PHP_AUTH_PW'] != $password) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Top Cars"');
    exit('<h2>Top Cars</h2>Sorry, you must enter a valid user name and password to access this page.');
  }
?>
