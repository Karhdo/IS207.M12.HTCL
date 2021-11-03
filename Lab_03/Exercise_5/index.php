<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p {
            margin: 0;
        }

        table, td {
            background-color: #CBCBFF;
            border: 1px solid #D754FF;
            border-collapse: collapse;
            padding: 0 8px;
            margin: 0px auto;
        }

        input[type="text"] {
            float: right;
            width: 100px;
            margin: 0 8px;
        }

        .main {
            border: 1px solid black;
            width: 450px;
            padding: 8px 0;
        }

        .header {
            color: blue;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
            text-align: center;
        }

        .calc-ps {
            width: 70px;
            border-radius: 8px;
            margin: 8px 75px;
        }

        .toantu {
            width: 150px;
            border: 1px solid #D754FF;
            padding: 12px 0;
        }

    </style>
</head>
<body>
    <div class="main">
        <header class='header'>Chuơng trình cộng, trừ, nhân, chia hai phân số</header>
        <table>
            <form method='get' action="#">
                <tr>
                    <td>
                            <br>Tử phân số 1<input type="text" name='tuso1'><br><br>
                            Mẫu phân số 1<input type="text" name='mauso1'><br><br>
                            Tử phân số 2<input type="text" name='tuso2'><br><br>
                            Mẫu phân số 2<input type="text" name='mauso2'><br><br>
                            <input class='calc-ps' type="submit" value='=' name='calc'><br>
                            <?php
                            include "phanso.php";

                            if(isset($_GET['calc']) && $_GET['calc'] == '=') {
                                $tuso1 = $_GET['tuso1']; $mauso1 = $_GET['mauso1'];
                                $tuso2 = $_GET['tuso2']; $mauso2 = $_GET['mauso2'];
                                $ps1 =  new PhanSo($tuso1, $mauso1);
                                $ps2 =  new PhanSo($tuso2, $mauso2);

                                if (empty($_GET["toantu"])) {
                                    $toantuErr = "Toan tu is required";
                                } else {
                                    $toantu = $_GET["toantu"];
                                }

                                if(isset($toantuErr)) {
                                    echo "Hãy chọn toán tử cần thực hiện phép tính.";
                                } else {
                                    switch($toantu) {
                                        case '+':
                                            $result = $ps1->congPhanSo($ps2)->donGianPhanSo();
                                            break;
                                        case '-':
                                            $result = $ps1->truPhanSo($ps2)->donGianPhanSo();
                                            break;
                                        case '*':
                                            $result = $ps1->nhanPhanSo($ps2)->donGianPhanSo();
                                            break;
                                        case '/':
                                            $result = $ps1->chiaPhanSo($ps2)->donGianPhanSo();
                                            break;
                                    }
                                    echo "Kết quả: ".$ps1->inPhanSo()." ".$toantu." ".$ps2->inPhanSo()." = ".$result->inPhanSo();
                                }
                            } 
                            ?>
                    </td>
                    <td>
                        <div class="toantu">
                            <p>Phép tính</p>
                            <input type="radio" name='toantu' <?php if (isset($toantu) && $toantu=="+") echo "checked";?> value='+' > + <br>
                            <input type="radio" name='toantu' <?php if (isset($toantu) && $toantu=="-") echo "checked";?> value='-' > - <br>
                            <input type="radio" name='toantu' <?php if (isset($toantu) && $toantu=="*") echo "checked";?> value='*' > * <br>
                            <input type="radio" name='toantu' <?php if (isset($toantu) && $toantu=="/") echo "checked";?> value='/' > / <br>
                        </div>
                    </td>
                </tr>
            </form>
        </table>
    </div>
</body>
</html>