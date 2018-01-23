<?php
session_start();

include 'includes/functions.php';

$connection = mysqli_connect('localhost','admin','vl0YGFs6wEnRrxbl','pairsdb');

if(!$connection) {
  die('Database connection failed');
}

$userID = $_SESSION['id'];
if (isset($_POST['submit'])) {


  $destination = $_POST['destination'];
  $persons = $_POST['persons'];
  $startDate = $_POST['startDate'];
  $returnDate = $_POST['returnDate'];


  $query ="INSERT INTO travels( destination, people, startDate, returnDate, user_id) ";
  $query .= "VALUES('$destination', '$persons', '$startDate', '$returnDate', '$userID')";

  $result = mysqli_query($connection, $query);

  if(!$result) {
    die("Registration failed! Information: " . mysqli_error($connection));
  }

}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Flight info</title>
<link rel="stylesheet" href="css/booking-table.css">
</head>
<body>
  <table>
    <tr>
      <th>Destination</th>
      <th>Antal personer</th>
      <th>Startdatum</th>
      <th>Returdatum</th>
    </tr>
    <?php getTravel(); ?>
  </table>
  <div class="bookingbutton">
    <a href="booking.php">Boka en ny resa!</a>
  </div>

</body>
</html>