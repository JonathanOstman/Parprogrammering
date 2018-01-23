<?php
  function getTravel() {
    global $connection;

    $userID = $_SESSION['id'];

    $query = "SELECT * FROM travels WHERE user_id = $userID";

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result)) {
      echo "
          <tr>
            <td>" . $row['destination'] . "</td>
            <td>" . $row['people'] . "</td>
            <td>" . $row['startDate'] . "</td>
            <td>" . $row['returnDate'] . "</td>
          </tr>
";
    }
  }


?>