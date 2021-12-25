<?php
class Date{
    private $day, $month, $year;

    public function __construct($d, $m, $y) {
        $this->day = $d;
        $this->month = $m;
        $this->year = $y;
    }

    public function nextDate() {
        $result = new Date($this->day, $this->month, $this->year);
        $numDayOfMonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        if ($this->year % 400 == 0 || ($this->year % 4 == 0 && $this->year % 100 != 0)) {
            $numDayOfMonth[1] = 29;
        }
        $result->day++;
        if ($result->day > $numDayOfMonth[$result->month - 1]) {
            $result->day = 1;
            $result->month++;
            if ($result->month > 12) {
                $result->month = 1;
                $result->year++;
            }
        }
        return $result->day."-".$result->month."-".$result->year;
    }
}
?>