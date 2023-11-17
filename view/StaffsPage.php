
<?php
$staffs = $_SESSION['staffs'];
?>
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }


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
            background-color: #f2f2f2;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        label {
            color: #555;
            margin-right: 15px;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
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
    <table class="display cell-border" id="data_table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Phòng ban</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($staffs as $each) : ?>
            <tr>
                <td><?=$each->id?></td>
                <td><?=$each->name?></td>
                <td><?=$each->address?></td>
                <td><?=$each->department->name?></td>
                <td><a href="<?=Environment_Config::$rootFolder?>/update-staff?id=<?=$each->id?>">Sửa</a></td>
                <td>
                    <input id="delete-cb-<?=$each->id?>" type="checkbox">
                    <label for="delete-cb-<?=$each->id?>">Chọn xóa</label>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <form id="deleteForm" action="<?=Environment_Config::$rootFolder?>/delete-staffs" method="post">
        <input id="idsInput" hidden="hidden" type="text" name="ids">
        <button type="button" onclick="prepareDelete()">Xóa</button>
    </form>
    <button><a href="<?=Environment_Config::$rootFolder?>/add-staff">Thêm nhân viên</a></button>
</main>
<script>
    function prepareDelete() {
        // Get all checkboxes that are checked
        const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

        // Extract the ids from the checked checkboxes
        const ids = Array.from(checkboxes).map(checkbox => checkbox.id.split('-')[2]);

        // Update the value of the ids input field
        document.getElementById('idsInput').value = ids.join(',');

        // Submit the form
        document.getElementById('deleteForm').submit();
    }
</script>
</body>

</html>
