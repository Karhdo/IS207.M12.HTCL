<?php
class PhanSo {
    private $tuSo, $mauSo;
    public function __construct($ts, $ms) {
        $this->tuSo = $ts;
        $this->mauSo = $ms;
    }

    public function congPhanSo ($ps) {
        $result = new PhanSo(1, 1);
        $result->tuSo = ($this->tuSo * $ps->mauSo) + ($ps->tuSo * $this->mauSo);
        $result->mauSo = $this->mauSo * $ps->mauSo;
        return $result;
    }

    public function truPhanSo ($ps) {
        $result = new PhanSo(1, 1);
        $result->tuSo = ($this->tuSo * $ps->mauSo) - ($ps->tuSo * $this->mauSo);
        $result->mauSo = $this->mauSo * $ps->mauSo;
        return $result;
    }

    public function nhanPhanSo ($ps) {
        $result = new PhanSo(1, 1);
        $result->tuSo = $this->tuSo * $ps->tuSo;
        $result->mauSo = $this->mauSo * $ps->mauSo;
        return $result;
    }

    public function chiaPhanSo ($ps) {
        $result = new PhanSo(1, 1);
        $result->tuSo = $this->tuSo * $ps->mauSo;
        $result->mauSo = $this->mauSo * $ps->tuSo;
        return $result;
    }

    public function donGianPhanSo () {
        if($this->tuSo == 0) {
            return $this;
        }

        $result = new PhanSo(1, 1);
        $result->tuSo = $this->tuSo;
        $result->mauSo = $this->mauSo;

        $a = abs($result->tuSo);
        $b = abs($result->mauSo);
        while ($a != $b) {
            if($a > $b) {
                $a = $a - $b;
            }
            else {
                $b = $b - $a;
            }
        }

        $result->tuSo = $result->tuSo / $a;
        $result->mauSo = $result->mauSo / $a;

        return $result;
    }

    public function inPhanSo() {
        if(($this->tuSo == 1 && $this->mauSo == 1) || ($this->tuSo == 0) ||  ($this->tuSo > 1 && $this->mauSo == 1)) {
            return $this->tuSo;
        }
        else {
            return $this->tuSo."/".$this->mauSo;
        }
    }
}
?>