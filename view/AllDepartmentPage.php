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
    <title>Tất cả phòng ban</title>
    <style>
        /* Add your inline CSS styles here */
        /*body {*/
        /*    font-family: 'Arial', sans-serif;*/
        /*    background-color: #f0f0f0;*/
        /*    margin: 0;*/
        /*    padding: 0;*/
        /*}*/

        /*main {*/
        /*    margin: 20px;*/
        /*}*/

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>
<?php
include_once __DIR__."/fragment/header.php";
include_once __DIR__."/fragment/sidebar.php";
?>
<main>
<table class="display cell-border" id="data_table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Tên phòng ban</th>
        <th scope="col">Mô tả</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($allDepartment as $each) : ?>
            <tr>
                <td><?=$each->id?></td>
                <td><?=$each->name?></td>
                <td><?=$each->description?></td>
                <td><a href="<?=Environment_Config::$rootFolder?>/staffs?attribute=deptId&search-key=<?=$each->id?>">Xem nhân viên phòng ban</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</main>
</body>

</html>