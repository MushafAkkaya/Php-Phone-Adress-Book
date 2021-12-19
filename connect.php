<?php

    $connect = mysqli_connect("localhost","root","","telefon");

    if(!$connect) {
        die("Database connection failed! Error info: ".mysqli_connect_error());
    }

?>