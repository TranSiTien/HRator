<?php
    $allDepartment = $_SESSION['all-departments'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=Environment_Config::$rootFolder?>/view/fragment/header.css">
    <link rel="stylesheet" href="<?=Environment_Config::$rootFolder?>/view/fragment/sidebar.css">
    <title>Thêm nhân viên</title>
</head>



<body>
<?php
include_once __DIR__."/fragment/header.php";
include_once __DIR__."/fragment/sidebar.php";
?>

<!-- insert form -->
<main>
    <h2 style="color: blue; text-align: center;">Thêm nhân viên</h2>
    <form action="<?=Environment_Config::$rootFolder?>/add-staff" method="post">

        <label for="name" style="font-weight: bold;">Tên Nhân viên</label>
        <input type="text" name="name" id="name" style="width: 200px;">
        <br>

        <label for="address" style="font-weight: bold;">Địa chỉ</label>
        <input type="text" name="address" id="address" style="width: 200px;">
        <br>

        <label for="dept-id" style="font-weight: bold;">Phòng ban</label>
        <select name="dept-id" id="dept-id" style="width: 200px;">
            <?php
            foreach ($allDepartment as $each) {
                echo "<option value=\"$each->id\">$each->name</option>";
            }
            ?>
        </select>
        <br>
        <button type="submit" style="background-color: green; color: white; padding: 5px 10px;">Xác nhận</button>

    </form>
</main>
</body>

</html>