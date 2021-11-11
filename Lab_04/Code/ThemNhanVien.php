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
        width: 400px;
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
                <th class="title" colspan="2">Thêm nhân viên</th>
            </tr>
            <tr>
                <td>Tên chi nhánh</td>
                <td>
                    <select name="branch_name" id="name" onchange="this.form.submit()">
                        <?php
                            echo "<option>Chọn chi nhánh</option>";
                            include "connect.php";
                            $rows = $connect->query("SELECT * FROM CHINHANH");
                            $listBranchName = array();
                            while($row = $rows->fetch_row()) {
                                echo "<option value='$row[0]'>".$row[1]."</option>";
                            }
                            $connect->close();
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tên phòng ban</td>
                <td>
                    <select name="room_name">
                        <?php
                            if(isset($_GET["branch_name"])) {
                                include "connect.php";
                                $branchName = $_GET["branch_name"];
                                $rows = $connect->query("SELECT * FROM PHONGBAN WHERE MaChiNhanh='$branchName'");
                                $listRoomName = array();
                                while($row = $rows->fetch_row()) {
                                    echo "<option value='$row[0]'>".$row[1]."</option>";
                                }
                                $connect->close();
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mã nhân viên</td>
                <td><input name="staff_id" type="text"></td>
            </tr>
            <tr>
                <td>Tên nhân viên</td>
                <td><input name="staff_name" type="text"></td>
            </tr>
            <tr>
                <td>Lương</td>
                <td><input name="staff_wage" type="text"></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td><input name="staff_sex" type="checkbox"></td>
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
            $roomName = $_GET["room_name"];
            $staffId = $_GET["staff_id"];
            $staffName = $_GET["staff_name"];
            $staffWage = $_GET["staff_wage"];
            $staffSex = isset($_GET["staff_wage"]) ? 1 : 0;
            include "connect.php";
            $str = "INSERT INTO NHANVIEN VALUES ('$staffId', '$staffName', '$staffWage', '$staffSex', '$roomName')";

            if($connect->query($str) == true) {
                echo "Thêm chi nhánh THÀNH CÔNG.";
            }else {
                echo "Thêm chi nhánh THẤT BẠI";
            }

            $connect->close();
        }
    ?>
</body>
<script type="text/javascript">
    document.getElementById('name').value = "<?php echo $_GET['branch_name'];?>";
</script>
</html>