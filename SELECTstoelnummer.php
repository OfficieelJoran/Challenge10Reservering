<?php
include 'db.php';
// query schrijven voor alle producten
$sql = 'SELECT id, stoelnummer FROM stoelnummers';

$result = mysqli_query($conn, $sql);


?>

