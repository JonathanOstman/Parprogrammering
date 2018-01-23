<?php
session_start();

$title = "Start";
include 'includes/header.php'
?>
<body>
  <?php if($_SESSION['username']) : ?>
    <?php header('Location: booking-menu.php'); ?>
  <?php else : ?>
  <a class="welcome" href="login.php">Logga in!</a>
  <a class="welcome" href="register.php">Registrera!</a>
  <?php endif; ?>
</body>
</html>