<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?=Environment_Config::$rootFolder?>/view/fragment/header.css">
    <link rel="stylesheet" href="<?=Environment_Config::$rootFolder?>/view/fragment/sidebar.css">
    <title>Nhân viên phòng ban</title>

    <style>
        /* Add your inline CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        label {
            color: #555;
            margin-right: 15px;
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
<?php
include_once __DIR__."/fragment/header.php";
include_once __DIR__."/fragment/sidebar.php";
?>
<main>
    <form action="<?=Environment_Config::$rootFolder?>/staffs" method="get">
        <h2>Chọn trường tìm kiếm:</h2>
        <input type="radio" id="id" name="attribute" value="id">
        <label for="id">Mã số nhân viên</label><br>
        <input type="radio" name="attribute" id="name" checked="checked" value="name">
        <label for="name">Tên nhân viên</label><br>
        <input type="radio" name="attribute" id="address" value="address">
        <label for="address">Địa chỉ</label><br>

        <input type="text" name="search-key" id="search-key" placeholder="Nhập từ khóa tìm kiếm">
        <label for="search-key">Từ khóa tìm kiếm</label>
        <input type="submit">
    </form>
</main>
</body>

</html>
