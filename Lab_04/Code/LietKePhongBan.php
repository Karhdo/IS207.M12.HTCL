<style>
    body {
        font-size: 18px;
    }

    table {
        width: 200px;
        background-color: #FFC8FF;
        margin: 16px 0;
        font-size: 18px;
    }

    tr:first-child {
        background-color: #C2FFFF;
    }
</style>

<form action="#" method="GET">
    Tên công ty: 
    <select id="company_name" name="company_name" onchange="this.form.submit()">
        <option>Chọn công ty</option>
        <?php
            include "connect.php";
            $rows = $connect->query("SELECT * FROM CONGTY");
            while($row = $rows->fetch_row()) {
                echo "<option value='$row[0]'>".$row[1]."</option>";
            }
            $connect->close();
        ?>
    </select></br>
    </br>Tên chi nhánh
    <select name="branch_name" id="name">
        <?php
            include "connect.php";
            if(isset($_GET["company_name"])) {
                $companyId = $_GET["company_name"];
                $rows = $connect->query("SELECT * FROM CHINHANH WHERE MaCongTy='$companyId'");
                $listBranchName = array();
                while($row = $rows->fetch_row()) {
                    echo "<option value='$row[0]'>".$row[1]."</option>";
                }
            }
            $connect->close();
        ?>
    </select></br></br>
    <input type="submit" name="btn-list" value="Liệt kê">
</form>

<?php
    if(isset($_GET["btn-list"]) && $_GET["btn-list"] == "Liệt kê") {
        include "connect.php";
        $branchId = $_GET["branch_name"];
        $rows = $connect->query("SELECT * FROM PHONGBAN WHERE MaChiNhanh='$branchId'");
        $num = 1;

        if($rows->num_rows > 0) {
            echo "Danh sách các phòng ban trong chi nhánh";
            echo "<table border='1' cellspacing='0'><tr><td>STT</td><td>Tên phòng ban</td></tr>";
            while($row = $rows->fetch_row()) {
                echo "<tr><td>$num</td><td>$row[1]</td></tr>";
                $num++;
            }
            echo "</table>";
        }else {
            echo "Không có phòng ban nào trong chi nhánh";
        }
    }
?>

<script>
    document.getElementById('company_name').value = "<?php echo $_GET['company_name'];?>";
</script>