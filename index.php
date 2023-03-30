<?php
include 'db.php';
include 'SELECTstoelnummer.php';
?>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservering</title>
    <link rel="stylesheet" href='style.css'>

</head>
<body>
    <h1>Reserveer een stoel</h1>
    <p>Klik op een beschikbare stoel om deze te reserveren:</p>
    <label for="stoelnummer"></label>

    <?php
    // Loop through the stoelnummers and generate the input fields and images
    while ($row = mysqli_fetch_assoc($result)) {
        $stoelnummer = $row['stoelnummer'];
        $stoelnummerid = $row['id'];
        echo '<div class="seat">';
        echo '<input type="hidden" name="stoelnummerid" value="' . $row['id'] . '">';
        echo '<img src="images/groenestoel.png" alt="Stoel" data-stoelnummer="' . $stoelnummer . '" data-stoelid="'.$stoelnummerid.'">';
        echo '</div>';
    }
    ?>

    <div id="seat-info">
        <h2>Stoel informatie</h2>
        <p id="seat-number"></p>
        <p id="seat-status"></p>
                <form method='POST'>
                Datum: <br>
                <input type="date" name="datum" required><br>
                Begintijd:<br>
                <input type="time" name="begintijd" required><br>
                Eindtijd:<br>
                <input type="time" name="eindtijd" required><br>
                Telefoonnummer:<br>
                <input type="number" name="phonenumber" required><br>
                zeker?<br>
                Ja <input type='checkbox' name="occupied" value="1" required><br>
                <input id="stoelnrid" type="hidden" name="stoelnummerid" value="">

                <button type="submit" name="submit" Placeholder="Reserveren" class="submitbutton">Reserveer</button>

                    <?php
                    if($_SERVER['REQUEST_METHOD']=="POST")
                    {
                    include_once 'insertreservationdata.php';
                    }
                    ?>
    </div>

    <script>
        var seats = document.querySelectorAll('.seat img');

        seats.forEach(function(seat) {
            seat.addEventListener('click', function() {
                var seatNumber = this.dataset.stoelnummer;
                document.querySelector('#seat-number').textContent = 'Stoelnummer: ' + seatNumber;
                document.querySelector('#seat-status').textContent = 'Status: beschikbaar';
                document.querySelector('#seat-info').style.display = 'block';
                document.querySelector('#stoelnrid').value=this.dataset.stoelid;
                

            });
        });
    </script>
  

</body>
</html>