<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .main {
            border: 1px solid black;
            padding: 8px;
            width: 550px;
        }
    </style>
</head>
<body>
    <div class="main">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            Từ ngày 
            <input type="date" name="from-date" value="<?php echo isset($_POST['from-date']) ? $_POST['from-date'] : '' ?>"> 
            đến ngày 
            <input type="date" name="to-date" onchange="this.form.submit();" value="<?php echo isset($_POST['to-date']) ? $_POST['to-date'] : '' ?>">
            <?php
            include "ngay.php";
            if(isset($_POST["to-date"])) {
                $fromDate = explode("-",$_POST["from-date"]);
                $toDate = explode("-",$_POST["to-date"]);
    
                $day_1 = new Date($fromDate[2], $fromDate[1], $fromDate[0]);
                $day_2 = new Date($toDate[2], $toDate[1], $toDate[0]);

                $totalDay = $day_1->distanceBetweenTwoDays($day_2);
    
                echo "là ".$totalDay." ngày.";
            }
            ?>
        </form>
    </div>
</body>
</html>