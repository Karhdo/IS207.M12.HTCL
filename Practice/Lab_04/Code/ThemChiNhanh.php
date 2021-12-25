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
        border: 2px solid #B57EE2;
        background-color: #E2ADDF;
        width: 350px;
    }

    th, td {
        padding: 4px;
    }

    .title {
        background-color: #A8DDDD;
    }

    input[type="text"] {
        width: 200px;
    }

    input[type="submit"] {
        border-radius: 8px;
    }
</style>
<body>
    <form action="#" method="GET">
        <table>
            <tr>
                <th class="title" colspan="2">Thêm chi nhánh</th>
            </tr>
            <tr>
                <td>Mã chi nhánh</td>
                <td><input name="branch_id" type="text"></td>
            </tr>
            <tr>
                <td>Tên chi nhánh</td>
                <td><input name="branch_name" type="text"></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input name="branch_address" type="text"></td>
            </tr>
            <tr>
                <td>Tên công ty</td>
                <td>
                    <select name="companny_name">
                        <?php
                            include "connect.php";
                            $rows = $connect->query("SELECT * FROM CONGTY");
                            while($row = $rows->fetch_row()){
                                echo "<option value='$row[0]'>".$row[1]."</option>";
                            }
                            $connect->close();
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="submit" name='btn_add' value="Thêm">
                    <input type="submit" name='btn_reset' value="Reset">
                </th>
            </tr>
        </table>
    </form>
    <?php 
        if(isset($_GET["btn_add"]) && $_GET["btn_add"] == "Thêm") {
            $branchId = $_GET["branch_id"];
            $branchName = $_GET["branch_name"];
            $branchAddress = $_GET["branch_address"];
            $compannyName = $_GET["companny_name"];
            include "connect.php";
            $str = "INSERT INTO CHINHANH VALUES ('$branchId', '$branchName', '$branchAddress', '$compannyName')";

            if($connect->query($str) == true) {
                echo "Thêm chi nhánh THÀNH CÔNG.";
            }else {
                echo "Thêm chi nhánh THẤT BẠI";
            }

            $connect->close();
        }
    ?>
</body>
</html>