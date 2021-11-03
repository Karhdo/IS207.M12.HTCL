<?php
class Date{
    private $day, $month, $year;

    public function __construct($d, $m, $y) {
        $this->day = $d;
        $this->month = $m;
        $this->year = $y;
    }

    public function distanceBetweenTwoDays($day) {
        $totalDay = $day->day - $this->day;

        for ($yearFromDay = $this->year; $yearFromDay < $day->year; $yearFromDay++) {
            if ($this->year % 400 == 0 || ($this->year % 4 == 0 && $this->year % 100 != 0)) {
                $totalDay += 366;
            } else {
                $totalDay += 365;
            }
        }

        $dayOfMonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        if ($this->year % 400 == 0 || ($this->year % 4 == 0 && $this->year % 100 != 0)) {
            $dayOfMonth[1] = 29;
        }

        if ($this->month > $day->month) {
            for ($i = $day->month; $i < $this->month; $i++) {
                $totalDay -= $dayOfMonth[$i-1];
            }
        }
        
        if ($this->month < $day->month) {
            for ($i = $this->month; $i < $day->month; $i++) {
                $totalDay += $dayOfMonth[$i-1];
            }
        }

        return $totalDay;
    }
}
?>