<?php
  include 'includes/db.php';
  $errorMessage = null;

  if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $email = mysqli_real_escape_string($connection, $email);

    $user_query = "SELECT username FROM users";
    $select_user_query = mysqli_query($connection, $user_query);

    while ($row = mysqli_fetch_array($select_user_query)) {
      $db_username = $row['username'];
    }

    if ($username === $db_username) {
      $errorMessage = 'Username already exists, try again!';
      echo "<style>#errorID {padding: 20px; }</style>";
    }
    else {

      $hashFormat = "$2y$10$";
      $salt = "niitilenwxtcrpyuxajccs";

      $hashAndSalt = $hashFormat . $salt;

      $password = crypt($password, $hashAndSalt);

      $query = "INSERT INTO users(username, email, password)";
      $query .= "VALUES('$username', '$email', '$password')";
      $result = mysqli_query($connection, $query);

      if(!$result) {
        die ("Registration failed. Information: " . mysqli_error($connection));
      }
      header ('Location: login.php');

    }

  }
  $title = "Register";
include 'includes/header.php'
?>
<body>
  <form class="login" action="register.php" method="post">
    <h1>Registrera!</h1>
    <input type="text" name="username" placeholder="Användarnamn" required>
    <input type="email" name="email" placeholder="E-Mail" required>
    <input type="password" name="password" placeholder="Lösenord" required>
    <input class="submit" type="submit" name="submit" value="Registrera">
  </form>
  <div class="errorMessage">
    <?php echo $errorMessage; ?>
  </div>

</body>
</html>