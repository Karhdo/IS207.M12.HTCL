<form method="GET" action="#">
    <table border="1" cellspacing="0">
        <tr>
            <td>Tên cần tìm</td>
            <td><input type="input" name="ten"></td>
        </tr>
        <tr>
            <td colspan='2' align="center">
                <input type="Submit" value="Tìm" name="Submit">
            </td>
        </tr> 
    </table>
</form>

<?php 
    if(isset($_GET['Submit'])&&($_GET['Submit']=="Tìm")) {
        include "connect.php";
        $tennhanvien= $_GET['ten'];
        $str = "select * from NHANVIEN where TenNhanVien='$tennhanvien'"; 
        $result = $connect->query($str);
        if($result->num_rows > 0) {
            $row = $result->fetch_row();
            echo "<h3>Mã nhân viên tìm thấy:$row[0]</h3>"; 
            echo "<h3>tên nhân viên tìm thấy:$row[1]</h3>";
        } else {
            echo "Tìm không thấy"; 
        }
        $connect->close(); 
    }
?>