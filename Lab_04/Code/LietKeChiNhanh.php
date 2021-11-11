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
        background-color: #D392FF;
    }

    input[type="submit"] {
        border-radius: 8px;
        margin: 8px 0;
    }
</style>
<body>
    <form action="#" method="GET">
        Tên công ty: 
        <select name="company_id">
            <?php
                include "connect.php";
                $rows = $connect->query("SELECT * FROM CONGTY");
                while ($row = $rows->fetch_row()) {
                    echo "<option value='$row[0]'>".$row[1]."</option>";
                }
            ?>
        </select></br>
        <input type="submit" value="Liệt kê" name="btn-submit">
    </form>
</body>
</html>

<?php
    echo "Danh sách các chi nhánh";
    if (isset($_GET["btn-submit"]) && ($_GET["btn-submit"] == "Liệt kê")) {
        include "connect.php";
        $companyName = $_GET["company_id"];
        $sql = "select * from CHINHANH where MaCongTy='$companyName'";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            echo "<table border='1' cellspacing='0'>";
            echo "<tr><th>STT</th><th>Mã chi nhánh</th><th>Tên chi nhánh</th></tr>"; 
            $stt=1;
            while($row = $result->fetch_row()) {
                echo "<tr>"; echo"<td>$stt</td><td>$row[0]</td><td>$row[1]</td>";
                echo "</tr>";
                $stt++; 
            }
        }else {
            echo "Không có dòng nào";
        }
        $connect->close();
    }
?>