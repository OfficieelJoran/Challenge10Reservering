<?php
include 'db.php';
// query schrijven voor alle producten
$sql = 'SELECT id, stoelnummer FROM stoelnummers';

$result = mysqli_query($conn, $sql);

// Check if the 'id' parameter exists in the POST request
if (isset($_POST['id'])) {
    // Sanitize and validate the input data
    $stoelnummerid = mysqli_real_escape_string($conn, $_POST['id']);
}

?>

