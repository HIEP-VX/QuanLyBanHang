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
    <?php
        error_reporting(0);
        $conn = mysqli_connect("localhost", "root", "", "qlbh");
        $masp = $_GET["txtma"];
        $str = "select * from vanphongpham where mah = '$masp'";
        $result = mysqli_query($conn, $str);
        while($row = mysqli_fetch_row($result)){
            $masp = $row[0];
            $tenh = $row[1];
            $ncc = $row[2];
            $dongia = $row[3];
        }
    ?>
    <button onclick="history.back()"><i style="color: black;font-size: 20px" class="fa-solid fa-chevron-left"></i></button>
    <form action="" method="get">
        <h1 style="text-align: center;">Cập nhật dữ liệu</h1>
        <label for="txtma">Mã hàng</label>
        <input type="text" name="txtma" id="txtma" value = "<?php echo $masp; ?>" readonly>

        <label for="txtten">Tên hàng</label>
        <input type="text" name="txtten" id="txtten" value = "<?php echo $tenh; ?>">

        <label for="txtNCC">Nhà cung cấp</label>
        <input type="text" name="txtNCC" id="txtNCC" value = "<?php echo $ncc; ?>">

        <label for="txtGia">Giá</label>
        <input type="text" name="txtGia" id="txtGia" value = "<?php echo $dongia; ?>">

        <div class="btn">
            <input type="submit" name="btnOK" value="Cập nhật">
        </div>
    </form>

    <?php
        error_reporting(0);
        $conn = mysqli_connect("localhost", "root", "", "qlbh");
        $mah = $_GET["txtma"];
        $tenh = $_GET["txtten"];
        $ncc = $_GET["txtNCC"];
        $dongia = $_GET["txtGia"];
        if (isset($_GET["btnOK"])) {
            $str = "update vanphongpham set tenhang = '$tenh', NCC = '$ncc', gia = '$dongia' where mah = '$mah'";
            $result = mysqli_query($conn, $str);
            header("Location: display.php");
        }
    ?>
</body>
</html>