<?php

error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$database = "reserveringdb";

$conn = new mysqli($servername, $username, $password, $database);

if(!$conn){ 
    echo 'connectie error:' . mysqli_connect_error();
  }