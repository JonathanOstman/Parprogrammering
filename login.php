<?php
  include 'includes/db.php';
  session_start();

  $errorMessage = "";
  $db_username = "";
  $db_password = "";

  if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);


    $user_query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $user_query);

    if (!$select_user_query) {
      die("Query failed");
    }

    while ($row = mysqli_fetch_array($select_user_query)) {
      $db_id = $row['id'];
      $db_username = $row['username'];
      $db_password = $row['password'];
    }
    $password = crypt($password, $db_password);

    if ($username === $db_username && $password === $db_password) {
      $_SESSION['id'] = $db_id;
      $_SESSION['username'] = $db_username;
      header("Location: index.php");
    }
    else {
      $errorMessage = "Wrong username/password, try again!";
      echo "<style>#errorID {padding: 20px; }</style>";
    }


  }
  $title = "Login";
  include 'includes/header.php'
?>
<body>
  <form class="login" action="login.php" method="post">
    <h1>Logga in!</h1>
    <input type="text" name="username" placeholder="Användarnamn">
    <input type="password" name="password" placeholder="Lösenord">
    <input class="submit" type="submit" name="submit" value="Logga in">
  </form>
  <div class="errorMessage" id="errorID">
    <?php echo $errorMessage; ?>
  </div>
</body>
</html>