<?php
  try {
    $username = "root";
    $password = "";

    $pdo = new PDO('mysql:dbname=pweb2;host=localhost', $username, $password);
  } catch(PDOException $e) {
    echo 'Conexão não realizada. Erro: ' . $e->getMessage();
    exit();
  }
?>