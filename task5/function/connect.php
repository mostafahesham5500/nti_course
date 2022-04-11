<?php
    session_start();
    $localhost = "localhost";
    $username = "root";
    $password = "";
    $dpname = "nti";

    $connect = mysqli_connect($localhost,$username,$password,$dpname);

?>