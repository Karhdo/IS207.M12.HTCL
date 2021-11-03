<?php
class Date{
    private $day, $month, $year;

    public function __construct($d, $m, $y) {
        $this->day = $d;
        $this->month = $m;
        $this->year = $y;
    }

    public function findDayOfWeek() {
        $totalDay = $this->day;

        for($i = 1970; $i < $this->year; $i++) {
            if (($i % 100 != 0 && $i % 4 === 0)||($i % 400 == 0)) {
                $totalDay += 366;
            } else {
                $totalDay += 365;
            }
        }

        for($i = 1; $i < $this->month; $i++)
        {
            switch($i) {
                case 1: case 3: case 5: case 7: case 8: case 10: case 12:
                    $totalDay += 31;
                    break;
                case 4: case 6: case 9: case 11:
                    $totalDay += 30;
                    break;
                case 2:
                    if (($nam%100 !== 0 && $nam%4===0) || ($nam%400===0)) {
                        $totalDay += 29;
                    }
                    else {
                        $totalDay += 28;
                    }
            }
        }

        $dayOfWeek = array("thứ 5", "thứ 6", "thứ 7", "chủ nhật", "thứ 2", "thứ 3", "thứ 4");
        return $dayOfWeek[$totalDay % 7 - 1];
    }
}
?>