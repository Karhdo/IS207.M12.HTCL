<?php
class book {
    private $bookCode, $bookTitle, $price;
    private $quantity, $publisher;

    public function __construct($code, $title, $price, $quantity, $publisher) {
        $this->bookCode = $code;
        $this->bookTitle = $title;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->publisher = $publisher;
    }

    public function calcMoney() {
        return $this->quantity * $this->price;
    }
}

class novelBook extends book {
    private $status;

    public function __construct($code, $title, $price, $quantity, $publisher, $status) {
        parent::__construct($code, $title, $price, $quantity, $publisher);
        $this->status = $status;
    }

    public function calcMoney() {
        if($this->status == 'old') {
            return parent::calcMoney(); 
        } else {
            return parent::calcMoney() * 0.2;
        }
    }

    public function getKindOfBook() {
        return "Novel Book";
    }
}

class detectiveBook extends book {
    private $tax;

    public function __construct($code, $title, $price, $quantity, $publisher, $tax) {
        parent::__construct($code, $title, $price, $quantity, $publisher);
        $this->tax = $tax;
    }

    public function calcMoney() {
        return parent::calcMoney() + $this->tax;
    }

    public function getKindOfBook() {
        return "Detective Book";
    }
}

$book = array(
    new novelBook("NB001", "The Dead List", 200000, 10, "Trong Khanh", "new"),
    new novelBook("NB002", "The Dead Town", 250000, 20, "Duy Duc", "old"),
    new novelBook("NB003", "Thần Chết Làm Thêm 300 Yên/Giờ", 300000, 5, "Anh Khoa", "old"),
    new novelBook("NB004", "Your Name", 100000, 12, "Trong Khanh", "old"),
    new novelBook("NB005", "Ame Và Yuki", 245000, "50", "Anh Khoa", "new"),
    new detectiveBook("DB001", "The Big Sleep", 90000, 60, "Raymond Chandler", 50000),
    new detectiveBook("DB002", "The Cuckoo's Calling", 70000, 100, "Robert Galbraith", 30000),
    new detectiveBook("DB003", "Silence of the Lambs", 65000, 225, "Thomas Harris", 10000),
    new detectiveBook("DB004", "The Murder at the Vicarage", 99000, 37, "Agatha Christie", 20000),
    new detectiveBook("DB005", "A is For Alibi", 75000, 90, "Sue Grafton", 40000),
);

$numOfNovel = 0; $moneyOfNovel = 0;
$numOfDetective = 0; $moneyOfDetective = 0;

for($i = 0; $i < count($book); $i++) {
    if($book[$i]->getKindOfBook() == "Novel Book") {
        $numOfNovel += 1;
        $moneyOfNovel += $book[$i]->calcMoney();
    } else {
        $numOfDetective += 1;
        $moneyOfDetective += $book[$i]->calcMoney();
    }
}

echo "Number of Novel Book: ".$numOfNovel." - Total money of Novel Book: ".$moneyOfNovel." vnđ";
echo "<br>";
echo "Number of Detective Book: ".$numOfDetective." - Total money of Detective Book: ".$moneyOfDetective." vnđ";
?>