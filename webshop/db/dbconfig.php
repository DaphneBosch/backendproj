<?php

DEFINE("USER", "root");
DEFINE("PASSWORD", "");
try {
  $connection = new PDO("mysql:host=localhost;dbname=webshopback", USER, PASSWORD);
  $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $e->getMessage();
  echo "Could not connect to database";
}

?>
