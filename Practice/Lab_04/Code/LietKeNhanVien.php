<?php
    include "connect.php";
    $sql = "select * from NHANVIEN";
    $result = $connect->query($sql);
    echo "<table border='1' cellspacing='0'>";
    echo "<tr><th>Mã nhân viên</th><th>Tên nhân viên</th><th>Lương tháng</th><th>Giới tính</th><th>Chức năng</th></tr>"; 
    if ($result->num_rows > 0) {
        while($row = $result->fetch_row()) {
            echo "<tr><td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "<td><a href='XoaNhanVien.php?manhanvien=$row[0]' class='Xoa'>Xóa</a>";
            echo "<a href='SuaNhanVien.php?manhanvien=$row[0]' class='View'>View</a></td></tr>";
        } 
    } else {
        echo "Không có dòng nào";
    }
    $connect->close(); 
?>