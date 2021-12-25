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
                <th class="title" colspan="2">Thêm phòng ban</th>
            </tr>
            <tr>
                <td>Mã phong ban</td>
                <td><input name="room_id" type="text"></td>
            </tr>
            <tr>
                <td>Tên phòng ban</td>
                <td><input name="room_name" type="text"></td>
            </tr>
            <tr>
                <td>Tên chi nhánh</td>
                <td>
                    <select name="branch_name">
                        <?php
                            include "connect.php";
                            $rows = $connect->query("SELECT * FROM CHINHANH");
                            $listBranchName = array();
                            while($row = $rows->fetch_row()) {
                                if(!in_array($row[1], $listBranchName)) {
                                    echo "<option value='$row[0]'>".$row[1]."</option>";
                                    array_push($listBranchName, $row[1]);
                                }
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
            $roomId = $_GET["room_id"];
            $roomName = $_GET["room_name"];
            $branchName = $_GET["branch_name"];
            include "connect.php";
            $str = "INSERT INTO PHONGBAN VALUES ('$roomId', '$roomName', '$branchName')";

            if($connect->query($str) == true) {
                echo "Thêm phòng ban THÀNH CÔNG.";
            }else {
                echo "Thêm phòng ban THẤT BẠI";
            }

            $connect->close();
        }
    ?>
</body>
</html>