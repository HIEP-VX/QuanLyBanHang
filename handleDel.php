<?php
    error_reporting(0);
    $conn = mysqli_connect("localhost", "root", "", "qlbh");
    $masp = $_GET["txtma"];
    
    $query = "delete from vanphongpham where mah = '$masp'";
    $del = mysqli_query($conn, $query);

    header("Location: display.php");
?>