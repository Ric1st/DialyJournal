<?php 
    date_default_timezone_set('Asia/Jakarta');

    $servername = "localhost";
    $login = "root";
    $password = "";
    $dbname = "webdailyjournal";

    $conn = new mysqli($servername,$login,$password,$dbname);
    if(!$conn){
        die ("Connection Error! " . $conn->connect_error);
    }

    echo "<script>console.log('Connection Success!');</script>";
?>