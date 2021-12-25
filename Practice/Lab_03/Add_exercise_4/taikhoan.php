<?php
class TaiKhoan {
    private $soTK, $tenTK, $soTien;

    public function Gan() {
        $this->soTK = '';
        $this->tenTK = '';
        $this->soTien = 0;
    }

    public function __construct($so, $ten, $tien) {
        $this->soTK = $so;
        $this->tenTK = $ten;
        $this->soTien = $tien;
    }

    public function inTaiKhoan() {
        echo "Số Tài Khoản: ".$this->soTK."</br>";
        echo "Tên Tài Khoản: ".$this->tenTK."</br>";
        echo "Số Tiền: ".$this->soTien." USD</br>";
    }

    public function napTien($tienNap) {
        if ($tienNap < 0) {
            return false;
        } else {
            $this->soTien += $tienNap;
            return true;
        }
    }

    public function rutTien($tienRut) {
        if ($tienRut < 0 || $tienRut > $this->soTien) {
            return false;
        } else {
            $this->soTien -= $tienRut + $tienRut*0.01;
            return true;
        }
    }
}

$taiKhoan = new TaiKhoan("01234523234", "Đỗ Trọng Khánh", '3000');
$taiKhoan->inTaiKhoan();

if ($taiKhoan->napTien(1000)) {
    echo "</br>Nạp tiền thành công.</br>";
    $taiKhoan->inTaiKhoan();
} else {
    echo "</br>Số tiền nạp không hợp lệ, vui lòng thử lại.</br>";
}

if ($taiKhoan->rutTien(500)) {
    echo "</br>Rút tiền thành công.</br>";
    $taiKhoan->inTaiKhoan();
} else {
    echo "</br>Số tiền rút không hợp lệ, vui lòng thử lại.</br>";
}
?>
