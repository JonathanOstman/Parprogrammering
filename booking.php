<?php

  session_start();

  if(!$_SESSION['username']) {
    die("You dont have access to this page!");
  }
  $title = "Bokning";

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title ?></title>
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/booking.css">
</head>
<body>
<form class="booking" action="booking-table.php" method="post">
  <h1>Destination</h1>
  <select class="destination" name="destination">
    <?php
      $destinations = array("Grekland", "Spanien", "Amerika", "Sverige", "Thailand", "Cypern", "Kanarieöarna", "England");

      foreach ($destinations as $place) {
        echo "<option value=".$place.">".$place."</option>";
      }
    ?>
  </select>
  <h1>Antal resenärer</h1>
  <select name="persons">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
  </select>

  <h1>Startdatum</h1>
  <input type="date" name="startDate" class="unstyled" required>

  <h1>Returdatum</h1>
  <input type="date" name="returnDate" class="unstyled" required>

  <input class="login" type="submit" name="submit" value="Skicka">

</form>
 <div class="bookingbutton"><a href="booking-menu.php">Tillbaka till menyn</a></div>

</body>
</html>