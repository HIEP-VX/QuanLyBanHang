<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <title>Quản lý bán hàng</title>
    <style>
        body {
            height: 100vh;
            background: linear-gradient(to right, #4daf54, #3d8880);
        }
        
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            width: 30%;
            margin: 50px auto;
        }

        label {
            display: block;
            margin: 4px 0;
        }

        input[type="text"] {
            width: 95%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"],
        input[type="reset"] {
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #4CAF50;
            border-radius: 4px;
            cursor: pointer;
        }

        button {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: lightgray;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <button onclick="history.back()"><i style="color: black;font-size: 20px" class="fa-solid fa-chevron-left"></i></button>
    <form action="" method="POST">
        <h1 style="text-align: center;">Thêm dữ liệu</h1>
        <label for="txtma">Mã hàng</label>
        <input type="text" name="txtma" id="txtma">

        <label for="txtten">Tên hàng</label>
        <input type="text" name="txtten" id="txtten">

        <label for="txtNCC">Nhà cung cấp</label>
        <input type="text" name="txtNCC" id="txtNCC">

        <label for="txtGia">Giá</label>
        <input type="text" name="txtGia" id="txtGia">

        <div class="btn">
            <input type="submit" name="btnOK" value="Thêm">
            <input type="reset" name="btnHuy" value="Reset">
        </div>
    </form>
</body>
</html>

<?php
    $conn = mysqli_connect("localhost", "root", "", "qlbh");
    error_reporting(0);
    $masp = $_POST["txtma"];
    $tensp = $_POST["txtten"];
    $NCC = $_POST["txtNCC"];
    $gia = $_POST["txtGia"];

    if (isset($_GET["btnOK"])) {
        $query = "INSERT INTO vanphongpham (mah, tenhang, NCC, gia) VALUES ('$masp', '$tensp', '$NCC', '$gia')";
        $result1 = mysqli_query($conn, $query);
        header("Location: display.php");
    }
?>