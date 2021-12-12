<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 5 - Đình Chí</title>
    <style type="text/css">
        body{
            font-family: arial;
            /*background-color: LemonChiffon;*/
        }
        table,tr,td{
            border: 1px solid LightSteelBlue;
            border-collapse: collapse;
        }
        td{ 
            padding: 10px 5px;
        }
        thead{
            color: white;
            font-weight: bold;
            background-color: LightSteelBlue;
        }
        fieldset{
            width: 400px;
            background-color: LightSteelBlue;
            color: black;
            margin: 5px;
            border-radius: 15px;
        }
        legend{
            border: 1px solid black;
            background-color: white;
            color: black;
            border-radius: 15px;
            padding: 5px 10px;
        }
        button{
            font-weight: bold;
            padding: 5px 25px;
            cursor: pointer;
            text-align: center;
            color: black;
            background-color: Cornsilk ;
            border-radius: 15px;
        }
        input{
            padding: 5px;
            border-radius: 15px;
        }
    </style>
</head>
<body>
<?php 
    if(isset($_POST['maMH']))
        $maMH = trim($_POST['maMH']);
    else $maMH = "";
    if (isset($_POST['tenMH']))
        $tenMH = trim($_POST['tenMH']);
    else $tenMH = "";
    if (isset($_POST['dvt']))
        $dvt = trim($_POST['dvt']);
    else $dvt = "";
    if (isset($_POST['sl']))
        $sl = trim($_POST['sl']);
    else $sl = "";
    $arr = array();
    $arr = array(
        "A001" => array("Sữa tắm XMen", "Chai 50ml", "50"),
        "A002" => array("Dầu gội Lifeboy", "Chai 50ml", "20"),
        "B001" => array("Dầu ăn cái lân", "Chai 1 lít", "10"),
        "B002" => array("Đường cát", "Kg", "15"),
        "C001" => array("Chén sứ Minh Long", "Bộ 10 cái", "2"),
    );

    $new_arr = array(
        $maMH => array($tenMH, $dvt, $sl)
    );

    if(isset($_POST['them'])){
        $arr = $arr + $new_arr;
        $maMH = $tenMH = $dvt = $sl = "";
    }
 ?>
 <form method="post">
	<center>
     <table>
        <thead>
            <td>Mã mặt hàng</td>
            <td>Tên mặt hàng</td>
            <td>Đơn vị tính</td>
            <td>Số lượng</td>
        </thead>
        <?php 
        foreach ($arr as $khoaChinh => $value) {
            echo "<tr>";
                echo "<td>".$khoaChinh."</td>";
                if(is_string($value))
                    echo "<td>".$value."</td>";
                else{
                    foreach($value as $bangGhi => $v)
                        echo "<td>".$v."</td>";
                }
            echo "</tr>";
        }
         ?>
    </table>
    <br>
    <fieldset>
        <legend>Thêm mặt hàng</legend>

        <table style="border-color: white;">
            <tr>
                <td>Mã mặt hàng:</td>
                <td><input type="text" name="maMH" value="<?php $maMH ?>"></td>
            </tr>
            <tr>
                <td>Tên mặt hàng:</td>
                <td><input type="text" name="tenMH" value="<?php echo $tenMH ?>"></td>
            </tr>
            <tr>
                <td>Đơn vị tính:</td>
                <td><input type="text" name="dvt" value="<?php echo $dvt ?>"></td>
            </tr>
            <tr>
                <td>Số lượng:</td>
                <td><input type="text" name="sl" value="<?php echo $sl ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><button name="them">THÊM</button></td>
            </tr>
        </table>
    </fieldset>    
    </center>
 </form>
</body>
</html>