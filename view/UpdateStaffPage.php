<?php
$staff = $_SESSION['staff'];
$allDepartments = $_SESSION['all-departments'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=Environment_Config::$rootFolder?>/view/fragment/header.css">
    <link rel="stylesheet" href="<?=Environment_Config::$rootFolder?>/view/fragment/sidebar.css">
    <title>Sửa thông tin nhân viên</title>
</head>

<body>
<?php
include_once __DIR__."/fragment/header.php";
include_once __DIR__."/fragment/sidebar.php";
?>
<main>
    <h2>Sửa thông tin nhân viên</h2>

    <!-- insert form -->
    <form action="<?=Environment_Config::$rootFolder?>/update-staff" method="post">
        <input type="text" name="id" id="id" hidden="hidden" value="<?=$staff->id?>">

        <label for="name">Tên Nhân viên</label>
        <input type="text" name="name" id="name" value="<?=$staff->name?>">
        <br>

        <label for="address">Địa chỉ</label>
        <input type="text" name="address" id="address" value="<?=$staff->address?>">
        <br>


        <label for="dept-id">Phòng ban</label>
        <select type="number" name="dept-id" id="dept-id">
            <?php
                foreach ($allDepartments as $each) {
                    echo "<option value=\"$each->id\" ";
                    echo ($each->id === $staff->deptId)?"selected=\"selected\"":"";
                    echo ">$each->name</option>";
                }
            ?>
        </select>
    </form>
</main>
</body>

</html>