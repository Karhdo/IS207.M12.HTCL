<form action="#" method="GET">
    <?php
        $manhanvien = $_GET['manhanvien'];
        include "connect.php";
        $sql = "SELECT * FROM NHANVIEN WHERE MaNhanVien='$manhanvien'"; 
        if ($connect->query($sql) == true) {
            $rows = $connect->query($sql);
            $row = $rows->fetch_row();
            echo "<table border='2' cellspacing='0'>";
            echo "<tr>"."<td>Mã nhân viên</td>"."<td><input type='text' name='staff_id' value='$row[0]' readonly/></td>"."</tr>";
            echo "<tr>"."<td>Tên nhân viên</td>"."<td><input type='text' name='staff_name' value='$row[1]'/></td>"."</tr>";
            echo "<tr>"."<td>Lương tháng</td>"."<td><input type='text' name='staff_wage' value='$row[2]'/></td>"."</tr>";

            // Checkbox Gioi Tinh
            echo "<tr>"."<td>Giới tính</td>"."<td><input type='checkbox' name='staff_sex'";
            if($row[3] == 1) {
                echo "checked";
            }
            echo "/></td></tr>";

            // DropBox Phong Ban
            echo "<tr>"."<td>Mã phòng ban</td>"."<td><select name='rom_Id'>";
            $romsID = $connect->query("SELECT * FROM PHONGBAN");
            while($romID =  $romsID->fetch_row()) {
                echo "<option value='$romID[0]'>".$romID[0]."</option>";
            }
            echo "</select></td></tr>";

            echo "<tr>"."<th colspan='2'><input value='Cập nhập' type='submit' name='btn-submit'/></th>"."</tr>";
            echo "</table>";
        } else {
            echo "Error deleting record: " . $connect->error;
        }
        $connect->close();
    ?>
</form>

<?php
    if(isset($_GET["btn-submit"]) && $_GET["btn-submit"] == "Cập nhập") {
        include "connect.php";
        $staffId = $_GET["staff_id"];
        $staffName = $_GET["staff_name"];
        $staffWage = $_GET["staff_wage"];
        $staffSex = isset($_GET["staff_sex"]) ? 1 : 0;
        $romId = $_GET["rom_Id"];

        $str = "UPDATE NHANVIEN SET TenNhanVien='$staffName', LuongThang='$staffWage', GioiTinh='$staffSex', MaPhong='$romId' WHERE MaNhanVien='$staffId'";

        if($connect->query($str) == true) {
            header("Location: LietKeNhanVien.php");
        } else{
            echo "Cập nhập THẤT BẠI.";
        }
    }
?>