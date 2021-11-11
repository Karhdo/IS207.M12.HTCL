<form action="#" method="GET">
    Tên công ty: 
    <select name="company_name">
        <?php
            include "connect.php";
            $rows = $connect->query("SELECT * FROM CONGTY");
            while($row = $rows->fetch_row()) {
                echo "<option value='$row[0]'>".$row[1]."</option>";
            }
            $connect->close();
        ?>
    </select></br>
    <input style="margin: 16px 0; width: 50px; border-radius: 8px" type="submit" name="btn-del" value="Xoá">
</form>

<?php
    if(isset($_GET["btn-del"]) && $_GET["btn-del"] == "Xoá") {
        $companyId = $_GET["company_name"];
        include "connect.php";
        $branchIds = $connect->query("SELECT MaChiNhanh FROM CHINHANH WHERE MaCongTy='$companyId'");

        while($branchId = $branchIds->fetch_row()) {
            $romIds = $connect->query("SELECT MaPhong FROM PHONGBAN WHERE MaChiNhanh='$branchId[0]'");
            // Xoá nhân viên của mỗi phòng
            while($romId = $romIds->fetch_row()) {
                $connect->query("DELETE FROM NHANVIEN WHERE MaPhong='$romId[0]'");
            }
            // Xoá phòng ban của mỗi chi nhánh
            $connect->query("DELETE FROM PHONGBAN WHERE MaChiNhanh='$branchId[0]'");
        }

        // Xoá chi nhánh của công ty
        $connect->query("DELETE FROM CHINHANH WHERE MaCongTy='$companyId'");
        // Xoá công ty
        if($connect->query("DELETE FROM CONGTY WHERE MaCongTy='$companyId'") == true) {
            echo "Xoá công ty thành công."."</br>";
        }else {
            echo "Xoá công ty thất bại."."</br>";
        }
        $connect->close();
    }
?>