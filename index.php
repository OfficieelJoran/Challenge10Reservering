<?php
include 'db.php';
include 'SELECTstoelnummer.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservering</title>
    <style>
        .seat {
            display: inline-block;
            margin: 10px;
        }
        #seat-info {
            position: fixed;
            top: 0;
            right: 0;
            width: 300px;
            height: 100%;
            background-color: #fff;
            display: none;
        }
    </style>
</head>
<body>
    <h1>Reserveer een stoel</h1>
    <p>Klik op een beschikbare stoel om deze te reserveren:</p>
    <label for="stoelnummer">Select a stoelnummer:</label>

    <?php
    // Loop through the stoelnummers and generate the input fields and images
    while ($row = mysqli_fetch_assoc($result)) {
        $stoelnummer = $row['stoelnummer'];
        echo '<div class="seat">';
        echo '<input type="hidden" name="stoelnummer[]" value="' . $stoelnummer . '">';
        echo '<img src="images/groenestoel.png" alt="Stoel" data-stoelnummer="' . $stoelnummer . '">';
        echo '</div>';
    }
    ?>

    <div id="seat-info">
        <h2>Stoel informatie</h2>
        <p id="seat-number"></p>
        <p id="seat-status"></p>
    </div>

    <script>
        var seats = document.querySelectorAll('.seat img');

        seats.forEach(function(seat) {
            seat.addEventListener('click', function() {
                var seatNumber = this.dataset.stoelnummer;
                document.querySelector('#seat-number').textContent = 'Stoelnummer: ' + seatNumber;
                document.querySelector('#seat-status').textContent = 'Status: beschikbaar';
                document.querySelector('#seat-info').style.display = 'block';
            });
        });
    </script>
</body>
</html>