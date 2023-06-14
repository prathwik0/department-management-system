<?php
    
    //Connect to server
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password);
    if ($conn) {
        //echo "Connected to server successfully";
    } else {
        die( "Failed To Connect to server ". mysqli_connect_error() );
    }
    
    $selectalreadycreateddatabase = mysqli_select_db($conn, "aiml");
    if ($selectalreadycreateddatabase) {
        //echo "<br /> Existing database selected successfully";
    } else {
        echo "<br /> Selected Database Not Found";
    }
    ?>
