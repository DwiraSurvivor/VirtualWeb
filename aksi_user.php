<?php
session_start();
error_reporting(0);
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  header('location:selamatdatang');
}
else{
?>
<?php
  include "config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
$modul = anti_injection($_POST['modul']);

if ($modul=='hapususer'){
  	$id = anti_injection($_POST['id']);
  	mysql_query("DELETE FROM user WHERE id_user='$id'");
}elseif ($modul=='tambahuser'){
  	$username = anti_injection($_POST['usernameuser']);
  	$password = md5($_POST['passworduser']);
  	$namalengkap = anti_injection($_POST['namalengkapuser']);
  	$kelas = anti_injection($_POST['kelasuser']);
  	$level = "user";
  	$aktif = anti_injection($_POST['aktifuser']);
  	if (empty($username) || empty($password) || empty($namalengkap) || empty($kelas) || empty($aktif)){
  	        echo "Semua kolom data harus diisi";
  	}else{
  		mysql_query("INSERT INTO user(username,password,nama_lengkap,kelas,level,aktif) VALUES('$username','$password','$namalengkap','$kelas','$level','$aktif')");
  		echo "Data berhasil diinputkan";
	}
}elseif ($modul=='edituser'){
  	$id = anti_injection($_POST['id']);
  	$password = $_POST['datapuser'];
  	$namalengkap = anti_injection($_POST['datanuser']);
  	$kelas = anti_injection($_POST['datakuser']);
  	$aktif = anti_injection($_POST['dataauser']);
  	if (empty($namalengkap) || empty($kelas) || empty($aktif)){
  	}else{
  	        if ($password==''){
  	        	mysql_query("UPDATE user SET nama_lengkap = '$namalengkap',kelas = '$kelas',aktif = '$aktif' WHERE id_user = '$id'");
		}else{
		        $password2 = md5($_POST['datapuser']);
  			mysql_query("UPDATE user SET password = '$password2',nama_lengkap = '$namalengkap',kelas = '$kelas',aktif = '$aktif' WHERE id_user = '$id'");
		}
	}
}else{
}
?>
<?php
}
?>
