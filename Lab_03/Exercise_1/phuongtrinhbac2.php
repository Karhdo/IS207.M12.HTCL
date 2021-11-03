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
    <form method="GET" action="#">
        <table>
            <tr>
                <td>Hệ số a</td>
                <td><input type="input" name="hs_a" value="<?php echo isset($_GET['hs_a']) ? $_GET['hs_a'] : '' ?>"></td>   
            </tr>
            <tr>
                <td>Hệ số b</td>
                <td><input type="input" name="hs_b" value="<?php echo isset($_GET['hs_b']) ? $_GET['hs_b'] : '' ?>"></td>   
            </tr>
            <tr>
                <td>Hệ số c</td>
                <td><input type="input" name="hs_c" value="<?php echo isset($_GET['hs_c']) ? $_GET['hs_c'] : '' ?>"></td>   
            </tr>
            <tr>
                <th colspan='2'><input type="Submit" value="Giải" name="Submit"></th>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
    if(isset($_GET['Submit']) && ($_GET['Submit'] == "Giải")) {
        $heSo_a = $_GET['hs_a'];
        $heSo_b = $_GET['hs_b'];
        $heSo_c = $_GET['hs_c'];
        $denta = ($heSo_b**2) - 4*$heSo_a*$heSo_c;
        if($denta < 0) {
            echo "Phương trình vô nghiệm.";
        } else if($denta == 0) {
            $x1 = -($heSo_b) / (2*$heSo_a);
            echo "Phương trình có nhiệm kép.<br>";
            echo "x1 = x2 = ".$x1;
        } else {
            $x1 = (-$heSo_b + sqrt($denta)) / (2*$heSo_a);
            $x2 = (-$heSo_b - sqrt($denta)) / (2*$heSo_a);
            echo "Phương trình có 2 nghiệm phân biệt.<br>";
            echo "x1 = ".$x1." và x2 = ".$x2;
        }
    }
?>