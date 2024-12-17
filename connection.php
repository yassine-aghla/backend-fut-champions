<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "fut_champions";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }
  
?>