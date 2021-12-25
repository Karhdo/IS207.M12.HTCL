<?php
class nhanvien {
    private $ma, $ten, $songay, $luongngay;

    // public function __construct($ma, $ten, $songay, $luongngay) {
    //     $this->ma = $ma;
    //     $this->ten = $ten;
    //     $this->songay = $songay;
    //     $this->luongngay = $luongngay;
    // }

    public function Gan($ma, $ten, $songay, $luongngay) {
        $this->ma = $ma;
        $this->ten = $ten;
        $this->songay = $songay;
        $this->luongngay = $luongngay;
    }

    public function InNhanVien() {
        echo "Mã nhân viên: ".$this->ma."<br>";
        echo "Tên nhân viên: ".$this->ten."<br>";
        echo "Số ngày làm việc: ".$this->songay."<br>";
        echo "Lương ngày: ".$this->luongngay."<br>";
    }

    public function TinhLuong() {
        return $this->songay * $this->luongngay;
    }
}

class nhanvienQL extends nhanvien {
    private $phucap = 2000;

    public function InNhanVien() {
        parent::InNhanVien();
        echo "Phụ cấp: ".$this->phucap."<br>";
    }

    public function TinhLuong() {
        return parent::TinhLuong() + $this->phucap;
    }
}
?>