<?php
    $manhanvien = $_GET['manhanvien'];
    include "connect.php";
    $sql = "DELETE FROM NHANVIEN WHERE MaNhanVien='$manhanvien'"; 
    if ($connect->query($sql) == true) {
        echo "Xóa thành công";
    } else {
        echo "Error deleting record: " . $connect->error;
    }
    $connect->close();
?>