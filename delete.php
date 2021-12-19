<?php

    include("connect.php");

    $delete = "DELETE FROM defter WHERE id=".(int)$_GET['id'];
    $deleted = mysqli_query($connect,$delete);

    if($deleted) {
        header("location:main.php");
    }

?>