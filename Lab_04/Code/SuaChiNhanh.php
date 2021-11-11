<form action="#" method="GET">
    <table>
        <tr>
            <th colspan="2">Sửa thông tin chi nhánh</th>
        </tr>
        <tr>
            <td>Tên chi nhánh</td>
            <td>
                <select name="branch_name" id="branch_name" onchange="this.form.submit()">
                    <?php
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
            <td>Mã chi nhánh</td>
            <td>
                <?php
                    if(isset($_GET["branch_name"]))  {
                        $branch_id = $_GET["branch_name"];
                        echo "<input name='branch_id' value='$branch_id' type='text' readonly>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Tên chi nhánh</td>
            <td>
                <input type="text" name="new_branch_name">
            </td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>
                <input type="text" name="branch_address">
            </td>
        </tr>
        <tr>
            <td>
                Tên công ty
            </td>
            <td>
                <select id="company_name" name="company_name">
                    <?php
                        include "connect.php";
                        $rows = $connect->query("SELECT * FROM CONGTY");
                        while($row = $rows->fetch_row()) {
                            echo "<option value='$row[0]'>".$row[1]."</option>";
                        }
                        $connect->close();
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th colspan="2">
                <input type="submit" name="btn-update" value="Cập nhập">
            </th>
        </tr>
    </table>
</form>

<?php
    if(isset($_GET["btn-update"]) && $_GET["btn-update"] == "Cập nhập") {
        $branchId = $_GET["branch_name"];
        $newBranchName = $_GET["new_branch_name"];
        $branchAddress = $_GET["branch_address"];
        $companyId = $_GET["company_name"];
        include "connect.php";
        $str = "UPDATE CHINHANH SET TenChiNhanh='$newBranchName', DiaChi='$branchAddress', MaCongTy='$companyId' WHERE MaChiNhanh='$branchId'";

        if($connect->query($str) == true) {
            echo "Cập nhập chi nhánh thành công.";
        }else {
            echo "Cập nhập chi nhánh thất bại.";
        }
    }
?>

<style>
    table {
        width: 400px;
        background-color: #FFC8FF;
        font-size: 18px;
    }

    tr:first-child {
        background-color: #C2FFFF;
    }

    th, td {
        padding: 4px 0;
    }

    input[type="submit"] {
        border-radius: 8px;
    }
</style>

<script>
    document.getElementById('branch_name').value = "<?php echo $_GET['branch_name'];?>";
</script>