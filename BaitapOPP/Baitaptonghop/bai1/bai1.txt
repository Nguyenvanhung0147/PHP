<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 1 - lab 5</title>
	<style type="text/css">
		form{
			display: flex;
		 	justify-content: center;
		}
		fieldset {
			background-color: Beige;
			color: black;
			border-radius: 15px;
			width: 45%;
		}
		legend {
		  	background-color: SeaGreen;
		  	color: white;
			padding: 5px 10px;
		  	border: 1px solid black;
	    	border-radius: 15px;
	    	box-shadow: 0 3px #999;
		}
		button{
		    padding: 5px 25px;
		    cursor: pointer;
		    text-align: center;
		    color: white;
		    background-color: SeaGreen ;
		    border-radius: 15px;
		    box-shadow: 0 3px #999;
		}
		input,textarea{
			color: DarkGreen;
			background-color: Snow; 
			border-radius: 15px;
			border: 1px solid gray;
			padding: 5px;
			margin: 3px;
		}
	</style>
</head>
<body>
<?php 
	abstract class Hinh{
		protected $ten, $dodai;
		public function setTen($ten){
			$this->ten=$ten;
		}
		public function getTen(){
			return $this->ten;
		}
		public function setDodai($doDai){
			$this->dodai=$doDai;
		}
		public function getDodai(){
			return $this->dodai;
		}
		abstract public function tinh_CV();
		abstract public function tinh_DT();
	}
	class HinhTron extends Hinh{
		const PI=3.14;
		function tinh_CV(){
			return round($this->dodai[0]*2*self::PI ,2);
		}
		function tinh_DT(){
			return round(pow($this->dodai[0],2)*self::PI ,2);
		}
	}
	class HinhVuong extends Hinh{
		public function tinh_CV(){
			return $this->dodai[0]*4;
		}
		public function tinh_DT(){
			return pow($this->dodai[0],2);
		}
	}
	class TamGiacDeu extends Hinh{
		public function tinh_CV(){
			return round($this->dodai[0] * 3, 2);
		}
		public function tinh_DT(){
			return round(pow($this->dodai[0],2)*sqrt(3)/4, 2);
		}
	}
	class TamGiacThuong extends Hinh{
		public function tinh_CV(){
			return round(array_sum($this->dodai),2);
		}
		public function tinh_DT(){
			$p = array_sum($this->dodai);
			return round(sqrt($p * ($p - $this->dodai[0]) * ($p - $this->dodai[1]) * ($p - $this->dodai[2])), 2);
		}
	}
	class HinhChuNhat extends Hinh{
		public function tinh_CV(){
			return round(($this->dodai[0] + $this->dodai[1]) * 2, 2);
		}
		public function tinh_DT(){
			return round(($this->dodai[0] * $this->dodai[1]), 2);
		}
	}
	$str = NULL;
	if(($_SERVER['REQUEST_METHOD'] == 'POST')){
		if(isset($_POST['hinh'])){
			$hinh = $_POST['hinh'];
			$ten = trim($_POST['ten']);
			$dodai = trim($_POST['dodai']);
			$arr = explode(",", $dodai);
			$flag = true;
			// kiểm tra các phần tử <= 0
			foreach ($arr as $a) {
				if($a <= 0){
					$flag = false;
					break;
				}
			}
			// nếu đầu vào đều dương
			if($flag == true){
				switch ($hinh) {
					case 'hv':
						if(count($arr) == 1){
							$hv=new HinhVuong();
							$hv->setTen($ten);
							$hv->setDodai($arr);
							$str= "Diện tích hình vuông ".$hv->getTen()." là : ".$hv->tinh_DT()." \n".
							 		"Chu vi của hình vuông ".$hv->getTen()." là : ".$hv->tinh_CV();
						}else $str = "Bạn chỉ cần nhập 1 giá trị cạnh hình vuông.";
						break;
					case 'ht':
						if(count($arr) == 1){
							$ht=new HinhTron();
							$ht->setTen($ten);
							$ht->setDodai($arr);
							$str= "Diện tích hình tròn ".$ht->getTen()." là : ".$ht->tinh_DT()." \n".
							 		"Chu vi của hình tròn ".$ht->getTen()." là : ".$ht->tinh_CV();
						}else $str = "Bạn chỉ cần nhập 1 giá trị bán kính hình tròn.";
						break;
					case 'tgd':
						if(count($arr) == 1){
							$tgd=new TamGiacDeu();
							$tgd->setTen($ten);
							$tgd->setDodai($arr);
							$str= "Diện tích hình tam giác đều ".$tgd->getTen()." là : ".$tgd->tinh_DT()." \n".
							 		"Chu vi của hình tam giác đều ".$tgd->getTen()." là : ".$tgd->tinh_CV();
						}else $str = "Bạn chỉ cần nhập 1 giá trị cạnh hình tam giác đều.";
						break;
					case 'tgt':
						if(count($arr) == 3){
							$tgt=new TamGiacThuong();
							$tgt->setTen($ten);
							$tgt->setDodai($arr);
							$str= "Diện tích hình tam giác thường ".$tgt->getTen()." là : ".$tgt->tinh_DT()." \n".
							 		"Chu vi của hình tam giác thường ".$tgt->getTen()." là : ".$tgt->tinh_CV();
						}else $str = "Bạn phải nhập 3 giá trị tương ứng với 3 cạnh tam giác.";
						break;
					case 'hcn':
						if(count($arr) == 2){
							$hcn=new HinhChuNhat();
							$hcn->setTen($ten);
							$hcn->setDodai($arr);
							$str= "Diện tích hình chữ nhật ".$hcn->getTen()." là : ".$hcn->tinh_DT()." \n".
							 		"Chu vi của hình chữ nhật ".$hcn->getTen()." là : ".$hcn->tinh_CV();
						}else $str = "Bạn phải nhập 2 giá trị tương ứng với chiều dài, chiều rộng hình chữ nhật.";
						break;
				}
			}
			else $str = "Các giá trị độ dài phải là số dương.";
		}else $str = "Bạn chưa chọn hình.";
	}
 ?>
<form action="" method="post">
<fieldset>
	<legend>Tính chu vi và diện tích các hình đơn giản</legend>
	<table border='0'>
		<tr>
			<td>Chọn hình</td>
			<td>
				<input type="radio" name="hinh" value="hv"
				<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="hv") echo 'checked'?>/>Hình vuông
				<input type="radio" name="hinh" value="ht" <?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="ht") echo 'checked'?>/>Hình tròn
				<input type="radio" name="hinh" value="tgd" <?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="tgd") echo 'checked'?>/>Tam giác đều
				<input type="radio" name="hinh" value="tgt" <?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="tgt") echo 'checked'?>/>Tam giác thường
				<input type="radio" name="hinh" value="hcn" <?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="hcn") echo 'checked'?>/>Hình chữ nhật
			</td>
		</tr>
		<tr>
			<td>Nhập tên:</td>
			<td><input type="text" style="width:100%" name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>" required/></td>
		</tr>
		<tr>
			<td>Nhập độ dài:</td>
			<td><input type="text" style="width:100%" name="dodai" value="<?php if(isset($_POST['dodai'])) echo $_POST['dodai'];?>" pattern="[0-9,.]*" required/></td>
		</tr>
		<tr>
			<td>Kết quả:</td>
			<td><textarea name="ketqua" style="width:100%" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><button value="tinh">TÍNH</button></td>
		</tr>
	</table>
</fieldset>
</form>
</body>
</html>