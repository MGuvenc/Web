<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "urunyonetim";
    //Bağlantı
    $conn = new mysqli($servername, $username, $password, $database);
    //Kontrol
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>