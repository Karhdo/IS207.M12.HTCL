<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
        border: 3px solid #D392FF;
        background-color: #FFC8FF;
        width: 400px;
        font-size: 18px;
    }

    .header {
        background-color: #C2FFFF;
    }

    input[type="submit"] {
        border-radius: 8px;
    }

    input[type="text"] {
        width: 250px;
    }
</style>
<body>
    <form action="#" method="GET">
        <table>
            <tr>
                <td colspan="2" class="header">Thêm công ty</td>
            </tr>
            <tr>
                <td>Mã công ty</td>
                <td><input name="company_id" type="text"></td>
            </tr>
            <tr>
                <td>Tên công ty</td>
                <td><input name="company_name" type="text"></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input name="company_address" type="text"></td>
            </tr>
            <tr>
                <th colspan="2">
                    <input name="btn-add" type="submit" value="Thêm">
                    <input name="btn-reset" type="submit" value="Reset">
                </th>
            </tr>
        </table>
    </form>
    <?php
        if(isset($_GET["btn-add"]) && ($_GET["btn-add"]=="Thêm")) {
            include "connect.php";
            $companyId = $_GET["company_id"];
            $companyName = $_GET["company_name"];
            $companyAddress = $_GET["company_address"];
            $str = "insert into CONGTY values ('$companyId', '$companyName', '$companyAddress')";

            if($connect->query($str) == true) {
                echo "Thêm công ty thành công.";
            } else {
                echo "Thêm KHÔNG thành công.";
            }
            $connect->close();
        }
    ?>
</body>
</html>