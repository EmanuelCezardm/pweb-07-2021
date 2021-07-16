<?php
    $hostname = "localhost";
    $db = "pweb2";
    $username = "root";
    $password = "";

    $conn = new mysqli($hostname, $username, $password, $db);

    if ($conn->connect_error) {
      die("Conexão não realizada: " . $conn->connect_error);
    }
?>