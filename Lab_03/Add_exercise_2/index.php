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

        #year {
            width: 50px;
        }

        .btn-next {
            margin: 8px 0;
            border: 0.5px solid black;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php
    function getDropBoxDay($month, $year) {
        $option = '<select name="day" id="day">'; //Nho dong the
        $numDayOfMonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        if ($year % 400 == 0 || ($year % 4 == 0 && $year % 100 != 0)) {
            $numDayOfMonth[1] = 29;
        }
        for ($i = 1; $i <= $numDayOfMonth[$month - 1]; $i++) {
            $option .= '<option value="'.$i.'">'.$i.'</option>';
        }
        $option .= "</select>";

        return $option;
    }
    ?>

    <div class="main">
        <form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
            Tháng
            <select name="month" id='month'>
                <option value="1" <?php if(!empty($_GET['month']) && $_GET['month'] == 1) echo 'selected'; ?> >1</option>
                <option value="2" <?php if(!empty($_GET['month']) && $_GET['month'] == 2) echo 'selected'; ?> >2</option>
                <option value="3" <?php if(!empty($_GET['month']) && $_GET['month'] == 3) echo 'selected'; ?> >3</option>
                <option value="4" <?php if(!empty($_GET['month']) && $_GET['month'] == 4) echo 'selected'; ?> >4</option>
                <option value="5" <?php if(!empty($_GET['month']) && $_GET['month'] == 5) echo 'selected'; ?> >5</option>
                <option value="6" <?php if(!empty($_GET['month']) && $_GET['month'] == 6) echo 'selected'; ?> >6</option>
                <option value="7" <?php if(!empty($_GET['month']) && $_GET['month'] == 7) echo 'selected'; ?> >7</option>
                <option value="8" <?php if(!empty($_GET['month']) && $_GET['month'] == 8) echo 'selected'; ?> >8</option>
                <option value="9" <?php if(!empty($_GET['month']) && $_GET['month'] == 9) echo 'selected'; ?> >9</option>
                <option value="10" <?php if(!empty($_GET['month']) && $_GET['month'] == 10) echo 'selected'; ?> >10</option>
                <option value="11" <?php if(!empty($_GET['month']) && $_GET['month'] == 11) echo 'selected'; ?> >11</option>
                <option value="12" <?php if(!empty($_GET['month']) && $_GET['month'] == 12) echo 'selected'; ?> >12</option>
            </select>
            Năm
            <input type="text" name="year" id="year" value="<?php echo isset($_GET['year']) ? $_GET['year'] : '' ?>" onchange="this.form.submit();">
            Ngày
            <?php
            if(isset($_GET["year"])) {
                $month =  $_GET["month"];
                $year = $_GET["year"];
                echo getDropBoxDay($month, $year);
            } 
            ?>
            </br><input type="submit" class='btn-next' name="NextDay" value='Next'>
        </form>
        <?php
        include "ngay.php";
        if (isset($_GET["NextDay"]) && $_GET["NextDay"] == "Next") {
            $day = $_GET["day"]; $month = $_GET["month"]; $year = $_GET["year"];
            $date = new Date($day, $month, $year);
            $nextDate = explode("-", $date->nextDate());
            echo "Ngày kế tiếp của ngày ".$day." tháng ".$month." năm ".$year." là ngày ".$nextDate[0]." tháng ".$nextDate[1]." năm ".$nextDate[2];
        }
        ?>
    </div>
</body>
</html>