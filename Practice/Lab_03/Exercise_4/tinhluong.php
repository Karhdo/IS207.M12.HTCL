<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    input {
        margin: 4px 0;
    }

    .main {
        border: 1px solid black;
        width: 300px;
        padding: 4px;
        background-color: #FF9600;
        font-size: 16px;
        font-weight: 600;
    }
</style>
<body>
    <div class="main">
        <form method="GET" acction="#">
            Mã nhân viên 
            <input name="maNV" style="margin-left: 32px;" type="text" value="<?php echo isset($_GET['maNV']) ? $_GET['maNV'] : '' ?>"><br>
            Tên nhân viên 
            <input name="tenNV" style="margin-left: 27px;" type="text" value="<?php echo isset($_GET['tenNV']) ? $_GET['tenNV'] : '' ?>"><br>
            Số ngày làm việc 
            <input name="songayLV" style="margin-left: 7px;" type="text" value="<?php echo isset($_GET['songayLV']) ? $_GET['songayLV'] : '' ?>"><br>
            Lương ngày 
            <input name='luongngayLV' style="margin-left: 39px;" type="text" value="<?php echo isset($_GET['luongngayLV']) ? $_GET['luongngayLV'] : '' ?>"><br>
            Nhân viên quản lý 
            <input style="margin-left: 12px;" type="checkbox" name='check-ql'><br>
            <input style="border-radius: 8px; border: 0.5px solid black" type="submit" value="Lương tháng" name='calc-luong'><br>
        <form method="get" acction="#">
    </div>

    <?php
    include "nhanvien.php";
    if(isset($_GET['calc-luong']) && $_GET['calc-luong'] == "Lương tháng") {
        $ma = $_GET['maNV'];
        $ten = $_GET['tenNV'];
        $songay = $_GET['songayLV'];
        $luongngay = $_GET['luongngayLV'];
        if(isset($_GET['check-ql'])) {
            $nv = new nhanvienQL();
            $nv->Gan($ma, $ten, $songay, $luongngay);
        } else {
            $nv = new nhanvien();
            $nv->Gan($ma, $ten, $songay, $luongngay);
        }
        $nv->InNhanVien();
        echo "Lương tháng: ".$nv->TinhLuong();
    }
    ?>
</body>
</html>