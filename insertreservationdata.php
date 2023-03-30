<?php
include 'db.php';


$result = mysqli_query($conn, $sql);

// while ($row = mysqli_fetch_assoc($result)) {
//     $stoelnummerid = $row['id'];
// }

$stoelnummerid = $_POST['stoelnummerid'];
$datum = $_POST['datum'];
$begintijd = $_POST['begintijd'];
$eindtijd = $_POST['eindtijd'];
$phonenumber = $_POST['phonenumber'];
$occupied = $_POST['occupied'];



mysqli_query($conn, "INSERT INTO reserveren (stoelnummerid, datum, begintijd, eindtijd, phonenumber, occupied)
 VALUES ('$stoelnummerid', '$datum', '$begintijd', '$eindtijd', '$phonenumber', '$occupied')");