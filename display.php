<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Quản lý bán hàng</title>
    <style>
        body {
            height: 100vh;
            background: linear-gradient(to right, #4daf54, #3d8880);
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: goldenrod;
            font-weight: 700;
        }

        tr { background-color: #f2f2f2; }

        .topnav input[type=text] {
            padding: 4px;
            font-size: 17px;
            outline: none;
        }

        .topnav .search-container button {
            padding: 5px 9px;
            background: #ddd;
            margin-top: 4px;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .custom-container {
            display: inline-block;
            border-radius: 5px;
            background-color: lightgray;
            padding: 5px;
        }

        .custom-link {
            color: black;
            text-decoration: none;
        }

        .custom-link:hover { text-decoration: underline; }

        .btn-add button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
            margin-bottom: 2px;
        }

        .main {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <h1><center>Danh sách sản phẩm</center></h1>
    <div class="main">
        <div class="btn-add">
            <button><a class="custom-link" href="design.php">Thêm mới dữ liệu</a></button>
        </div>
        <div class="topnav">
            <div class="search-container">
                <form action="" method="get">
                    <input type="text" placeholder="Search.." name="tensp">
                    <button type="submit" name="btnOK"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <?php
        error_reporting(0);
        $conn = mysqli_connect("localhost", "root", "", "qlbh");
        if (isset($_GET["btnOK"])) {
            $tensp = $_GET["tensp"];
            $str = "SELECT * FROM vanphongpham where NCC like '%$tensp%'";
        } else {
            $str = "SELECT * FROM vanphongpham";
        }

        $result = mysqli_query($conn, $str);
        echo '<table border="1">
                <tr>
                    <th>Mã hàng</th>
                    <th>Tên hàng</th>
                    <th>Nhà cung cấp</th>
                    <th>Đơn giá</th>
                    <th>Thao tác</th>
                </tr>';

        while ($row = mysqli_fetch_row($result)) {
            echo '<tr>
                    <td>' . $row[0] . '</td>
                    <td>' . $row[1] . '</td>
                    <td>' . $row[2] . '</td>
                    <td>' . $row[3] . '</td>
                    <td><div class="custom-container"><a class="custom-link" href="handleDel.php?txtma=' . $row[0] . '">Xóa</a> | <a class="custom-link" href="handleUpdate.php?txtma=' . $row[0] . '">Sửa</a></div></td>
                </tr>';
        }
        echo '</table>';
        mysqli_close($conn);
    ?>
</body>
</html>