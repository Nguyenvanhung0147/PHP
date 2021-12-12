<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
    <script>
      $("#hide").click(function(){
      $("p").hide();
    });

      $("#hide").click(function(){
      $("p").show();
    });
    </script>
    <style>
        .form-detail {
  padding-top: 50px;
  display: flex;
  align-items: flex-end;
}

.form-detail .control-custom {
  font-size: 14px;
  color: #868686;
  width: 97%;
}

.form-detail .group { 
  position: relative;
}

.form-detail input {
  display: block;
  padding: 14px 0;
  border: none;
  border-bottom: 1px solid #d8d8d8;
  margin-top: 26px;
}

.form-detail textarea {
  display: block;
  border: none;
  border-bottom: 1px solid #d8d8d8;
}

.form-detail label {
  font-size: 14px;
  color: #868686;
  position: absolute;
  pointer-events: none;
  left: 0;
  top: 16px;
  transition: 0.2s ease all; 
  -moz-transition: 0.2s ease all; 
  -webkit-transition: 0.2s ease all;
}

input:focus, 
textarea:focus {
  outline: none;
}

.form-detail .bar { 
  position: relative; 
  display: block; 
  width: 97%; 
}

.bar::before,
.bar::after {
  content:'';
  height: 2px; 
  width: 0;
  bottom: 1px; 
  position: absolute;
  background: #2cb680; 
  transition: 0.2s ease all; 
  -moz-transition: 0.2s ease all; 
  -webkit-transition: 0.2s ease all;
}

.bar::before {
  left:50%;
}

.bar::after {
  right:50%; 
}

.form-detail input:focus ~ .bar::before,
.form-detail input:focus ~ .bar::after,
.form-detail textarea:focus ~ .bar::before,
.form-detail textarea:focus ~ .bar::after {
  width:50%;
}
.form-button {
  margin-top: 20px; 
}

.form-detail input:focus ~ label, 
.form-detail input:valid ~ label,
.form-detail textarea:focus ~ label,
.form-detail textarea:valid ~ label {
  top: -16px;
  color: #2cb680;
}

    </style>
</head>
<body>
<?php
abstract class Nguoi{
  private $maso,$hoten,$ngaysinh,$gioitinh;
  public function setMaso($maso){
		$this->maso=$maso;
	}
	public function getMaso(){
		return $this->maso;
	}
  public function setHoten($hoten){
		$this->hoten=$hoten;
	}
	public function getHoten(){
		return $this->hoten;
	}

  public function setNgaysinh($ngaysinh){
		$this->ngaysinh=$ngaysinh;
	}
	public function getNgaysinh(){
		return $this->ngaysinh;
	}

  public function setGioitinh($gioitinh){
		$this->gioitinh=$gioitinh;
  }
	public function getGioitinh(){
		return $this->gioitinh;
	} 
  abstract public function tinhthuong($a); 
}
class Nhanvienvanphong extends Nguoi{
  public $sonamcongtac,$luongcoban=1000000;
  public $age=0;
  public $tien=0;
  public function setSonamcongtac($sonamcongtac){
		$this->sonamcongtac=$sonamcongtac;
	}
	public function getSonamcongtac(){
		return $this->sonamcongtac;
	}
  function getAge($birthdate = '0000-00-00') {
    if ($birthdate == '0000-00-00') return 'Unknown';
  
    $bits = explode('-', $birthdate);
    $age = date('Y') - $bits[0] - 1;
  
    $arr[1] = 'm';
    $arr[2] = 'd';
  
    for ($i = 1; $arr[$i]; $i++) {
        $n = date($arr[$i]);
        if ($n < $bits[$i])
            break;
        if ($n > $bits[$i]) {
            ++$age;
            break;
        }
    }
    return $age;
  }
  public function tinhthuong($age){
    if(($age>22)&&($age<25))
    {
       return $tien=$this->luongcoban*$this->sonamcongtac*1.1;
    }
    if(($age>25)&&($age<=30))
    {
      return $tien=$this->luongcoban*$this->sonamcongtac*1.2;
    }
    if($age>30)
    {
      return $tien=$this->luongcoban*$this->sonamcongtac;
    }
  }

}
class Nhanvienphucvu extends Nguoi{
  public $chucvu,$songaycong;
  public $tien=0;
  public function setChucvu($chucvu){
		$this->chucvu=$chucvu;
	}
	public function getChucvu(){
		return $this->chucvu;
	}
  public function setSongaycong($songaycong){
		$this->songaycong=$songaycong;
	}
	public function getSongaycong(){
		return $this->songaycong;
	}
  public function tinhthuong($songaycong)
  {
    if($songaycong>=28)
    return $tien=50000;
    else return $tien=40000;
  }
}

$thongbao = NULL;
if(isset($_POST['hthi'])){
  $ma=($_POST['maso']);
  $ten=($_POST['ten']);
  $nsinh=($_POST['ngaysinh']);
	if(isset($_POST['nhanvien']) && ($_POST['nhanvien'])=="vanphong"){
		$vp=new Nhanvienvanphong();
    $vp->setMaso($_POST['maso']);
		$vp->setHoten($_POST['ten']);
    $vp->setGioitinh(isset($_POST['gt']) && ($_POST['gt']));
    $vp->setSonamcongtac($_POST['sonamcongtac']);
		$thongbao=
        "Mã Số :".$vp->getMaso()."\n".
        "Họ và tên :".$vp->getHoten()."\n".
        "Tuổi:".$vp->getAge($_POST['ngaysinh'])." \n".
        "Giới Tính:".$vp->getGioitinh()."\n".
        "Số năm công tác".$vp->getSonamcongtac()."\n".
		 		"Tính thưởng :".$vp->tinhthuong($vp->getAge($_POST['ngaysinh']));
	}
  if(isset($_POST['nhanvien']) && ($_POST['nhanvien'])=="phucvu"){
		$pv=new Nhanvienphucvu();
    $pv->setMaso($_POST['maso']);
		$pv->setHoten($_POST['ten']);
    $pv->setGioitinh(isset($_POST['gt']) && ($_POST['gt']));
    $pv->setNgaysinh($_POST['ngaysinh']);
    $pv->setChucvu($_POST['chucvu']);
    $pv->setSongaycong($_POST['songaycong']);
		$thongbao= 
    "Mã Số :".$pv->getMaso()."\n".
    "Họ và tên :".$pv->getHoten()."\n".
    "Ngày Sinh:".$pv->getNgaysinh()." \n".
    "Giới Tính:".$pv->getGioitinh()."\n".
    "Chức vụ".$pv->getChucvu()."\n".
    "Số ngày công:".$pv->getSongaycong()."\n".
     "Tính thưởng :".$pv->tinhthuong($pv->setSongaycong($_POST['songaycong']));
	}

	
}
?>
<form action="index.php" method="post" name="info">
    <div class="form-detail">
      <div class="form-info col-md-8 col-xs-12">
      <div class="group">      
        <input type="radio" name="nhanvien" value="vanphong" id="A"
					  <?php if(isset($_POST['nhanvien'])&&($_POST['nhanvien'])=="vanphong") echo 'checked'?>/>Nhân viên văn phòng
				  <input type="radio" name="nhanvien" value="phucvu" id="B"
					  <?php if(isset($_POST['nhanvien'])&&($_POST['nhanvien'])=="phucvu") echo 'checked'?>/>Nhân viên phục vụ
        </div>
        <div class="group">      
          <input class="control-custom" type="text" name="maso"/>
          <span class="bar"></span>
          <label>Mã Số</label>
        </div>
        <div class="group">      
          <input class="control-custom" type="text" name="ten"/>
          <span class="bar"></span>
          <label>Họ và tên</label>
        </div>

        <div class="group">      
          <input class="control-custom" type="text" name="ngaysinh"/>
          <span class="bar"></span>
          <label>Ngày sinh</label>
        </div>

        <div class="group">      
        <input type="radio" name="gt" value="Nam" 
					  <?php if(isset($_POST['gt'])&&($_POST['gt'])=="nam") echo 'checked'?>/>Nam
				  <input type="radio" name="gt" value="Nữ"
					  <?php if(isset($_POST['gt'])&&($_POST['gt'])=="nu") echo 'checked'?>/>Nữ
        </div>
       
        <div class="group" id="a">      
          <input class="control-custom" type="text" name="sonamcongtac"/>
          <span class="bar"></span>
          <label>Số năm công tác</label>
        </div>
        <div class="group" id="b">      
          <input class="control-custom" type="text" name="chucvu"/>
          <span class="bar"></span>
          <label>Chức vụ</label>
        </div>
        <div class="group" id="c">      
          <input class="control-custom" type="text" name="songaycong"/>
          <span class="bar"></span>
          <label>Số ngày công</label>
        </div>
      </div>
      <div class="form-message col-md-4 col-xs-12">
        <div class="group">      
          <textarea class="control-custom" rows="10" disabled="disabled" name="thongbao" ><?php echo $thongbao;
          ?></textarea>
          <span class="bar"></span>
         
        </div>
      </div>
    </div>
    <div class="form-button text-center">
      <button class="btn btn-info" type="submit" name='hthi'>Submit</button>
    </div>
</form>      
<script>
 $(document).ready(function(){
  $("#A").click(function(){
    $("#c").hide();
    $("#b").hide();
    $("#a").show();
  });
});
 
$(document).ready(function(){
  $("#B").click(function(){
    $("#a").hide();
    $("#b").show();
    $("#c").show();
  });
});
 

</script>

</body>
</html>