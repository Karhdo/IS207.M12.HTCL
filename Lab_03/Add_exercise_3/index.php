<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table, tr, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .btn-submit {
        text-align: center;
    }

    .main {
        border: 1px solid black;
        padding: 8px;
        width: 240px;
    }

    .main table {
        margin: 0 auto;
    }
</style>
<body>
    <div class="main">
        <form method='GET' action="#">
            <table>
                <tr>
                    <td>Ngày</td>
                    <td><input name='input-day' type="text" value="<?php echo isset($_GET['input-day']) ? $_GET['input-day'] : '' ?>"></td>
                </tr>
                <tr>
                    <td>Tháng</td>
                    <td><input name='input-month' type="text" value="<?php echo isset($_GET['input-month']) ? $_GET['input-month'] : '' ?>"></td>
                </tr>
                <tr>
                    <td>Năm</td>
                    <td><input name='input-year' type="text" value="<?php echo isset($_GET['input-year']) ? $_GET['input-year'] : '' ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" class='btn-submit'>
                        <input type="submit" name="In-thu" value='In thứ'>
                    </td>
                </tr>
            </table>
        </form>
        <?php
        include "ngay.php";
        if (isset($_GET['In-thu']) && $_GET['In-thu'] == 'In thứ') {
            $day = $_GET['input-day']; $month = $_GET['input-month']; $year = $_GET['input-year'];
            $date = new Date($day, $month, $year);
            $dayOfWeek = $date->findDayOfWeek();
            echo $dayOfWeek." ngày ".$day." tháng ".$month." năm ".$year;
        }
        ?>
    </div>
</body>
</html>