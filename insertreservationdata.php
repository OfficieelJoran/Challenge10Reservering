<?php
include 'SELECTstoelnummer.php';

$idstoelnummer = $_POST['stoelnummerid'];
$stoelnummerid = $idstoelnummer;

$datum = $_POST['datum'];
$begintijd = $_POST['begintijd'];
$eindtijd = $_POST['eindtijd'];
$phonenumber = $_POST['phonenumber'];
$occupied = $_POST['occupied'];

mysqli_query($conn, "INSERT INTO reserveren (stoelnummerid, datum, begintijd, eindtijd, phonenumber, occupied) VALUES ('$stoelnummerid', '$datum', '$begintijd', '$eindtijd', '$phonenumber', '$occupied')");