<?php

$connection = mysqli_connect('localhost', 'root', 'root', 'pairsdb');

if (!$connection) {
  die("Database connection failed." . mysqli_error($connection));
}