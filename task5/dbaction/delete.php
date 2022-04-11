<?php 
    include "../function/connect.php";
    $num = $_GET['id'];
    $item = "DELETE FROM users WHERE  id = $num";
    mysqli_query($connect,$item);
    header("location:../showallusers.php");
?>