<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=Environment_Config::$rootFolder?>/view/fragment/header.css">
    <link rel="stylesheet" href="<?=Environment_Config::$rootFolder?>/view/fragment/sidebar.css">
    <title>Đăng Nhập</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        main {
            margin: 20px;
        }

        .form_container {
            width: 300px;
            margin: 0 auto;
        }

        .login_title {
            text-align: center;
            color: #333;
        }

        .input_container {
            border: 1px solid #ddd;
            padding: 10px;
            margin-top: 20px;
            background-color: #fff;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .input_error {
            color: red;
        }

        .submit_button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .submit_button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
<?php
include_once __DIR__."/fragment/header.php";
include_once __DIR__."/fragment/sidebar.php";
?>
<main>
    <form action="<?=Environment_Config::$rootFolder?>/login" class="form_container" method="post">
        <h2 class="login_title"> Đăng Nhập </h2>
        <fieldset class="input_container">
            <label for="email">Tên đăng nhập:</label>
            <input id="email-input" type="text" name="username">
            <span id="email-error" class="input_error"></span>
            <br>

            <label for="password">Mật khẩu:</label>
            <input id="password-input" type="password" name="password">
            <span id="password-error" class="input_error"></span>
            <br>

            <br>
        </fieldset>

        <button type="submit" class="submit_button">Đăng Nhập</button>
    </form>
</main>
</body>