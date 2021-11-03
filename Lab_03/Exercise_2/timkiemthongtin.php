<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <form method="get" acction="#">
        Nhập tên cần tìm <input type="text" name="tencantim"> <input type="Submit" name="Tim" value="Tìm theo tên"><br><br>
        Tuổi <input type="text" name="tuoi"> <input type="Submit" name="Timtuoi" value="Tìm theo tuổi"><br><br>
        <input type="Submit" name="Them" value="Thêm">
        <input type="Submit" name="Xoa" value="Xoá">
    </form>
</body>
</html>

<?php
    function printArray($array) {
        foreach($array as $ten => $tuoi) {
            echo $ten." ".$tuoi." tuổi.<br>";
        }
    }

    function findName($array, $str) {
        foreach($array as $ten => $tuoi) {
            if ($ten == $str) {
                return true;
            }
        }
        return false;
    }

    function printNamesOlderThan20 ($array) {
        foreach($array as $ten => $tuoi) {
            if($tuoi > 20) {
                echo $ten." ".$tuoi." tuổi.<br>";
            }
        }
    }
    
    function sortByAge ($array) {
        return asort($array);
    }

    function addFriend($array, $name, $age) {
        $array[$name] = $age;
        return $array;
    }

    function findAge($array, $age) {
        foreach($array as $ten => $tuoi) {
            if ($tuoi == $age) {
                return true;
            }
        }
        return false;
    }

    function deleteName ($array, $str) {
        foreach($array as $ten => $tuoi) {
            if ($ten == $str) {
                unset($array[$ten]);
                return $array;
            }
        }
        return false;
    }

    $ban=array("Tuấn"=>21,"Tú"=>19,"Tâm"=>22,"Tùng"=>20);

    if(isset($_GET['Tim']) && $_GET['Tim'] == 'Tìm theo tên') {
        $name = $_GET['tencantim'];
        if(findName($ban, $name) == true) {
            echo "Tìm thấy tên ".$name." trong mảng.<br>";
        } else {
            echo "Không tìm thấy tên trong mảng.<br>";
        }
        echo "<h3>Xuất mảng</h3>";
        printArray($ban);
    }

    if(isset($_GET['Them']) && $_GET['Them'] == 'Thêm') {
        $name = $_GET['tencantim'];
        $age = $_GET['tuoi'];
        $ban = addFriend($ban, $name, $age);
        echo "<h3>Xuất mảng</h3>";
        printArray($ban);
    }

    if(isset($_GET['Timtuoi']) && $_GET['Timtuoi'] == 'Tìm theo tuổi') {
        $age = $_GET['tuoi'];
        if(findAge($ban, $age) == true) {
            echo "Nguời ".$age." tuổi có trong mảng.<br>";
        } else {
            echo "Không tìm thấy tên trong mảng.<br>";
        }
        echo "<h3>Xuất mảng</h3>";
        printArray($ban);
    }

    if(isset($_GET['Xoa']) && $_GET['Xoa'] == 'Xoá') {
        $name = $_GET['tencantim'];
        if(deleteName($ban, $name) == false) {
            echo "Không tìm thấy tên ".$name." trong mảng.<br>";
        } else {
            echo "Xoá thành công.<br>";
            echo "<h3>Xuất mảng</h3>";
            printArray($ban);
        }
    }
?>