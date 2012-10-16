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

if ($modul=='hapuskbm'){
  	$id = anti_injection($_POST['id']);
  	mysql_query("DELETE FROM kbm WHERE id_kbm='$id'");
}elseif ($modul=='hapusmodul'){
  	$idm = anti_injection($_POST['idm']);
  	$hapusfile = $_POST['hapusfile'];
  	mysql_query("DELETE FROM modul_kbm WHERE id_modul='$idm'");
  	unlink("datakbm/$hapusfile");
}elseif ($modul=='hapussource'){
  	$ids = anti_injection($_POST['ids']);
  	$hapusfile2 = $_POST['hapusfile2'];
  	mysql_query("DELETE FROM source_kbm WHERE id_source='$ids'");
  	unlink("datakbm/$hapusfile2");
}elseif ($modul=='hapusmedia'){
  	$idmd = anti_injection($_POST['idmd']);
  	$hapusfile3 = $_POST['hapusfile3'];
  	mysql_query("DELETE FROM media_kbm WHERE id_media='$idmd'");
  	unlink("datakbm/$hapusfile3");
}elseif ($modul=='tambahkbm'){
  	$topik = anti_injection($_POST['topikkbmt']);
  	$aktif = anti_injection($_POST['aktifkbmt']);
  	if (empty($topik)){
  	        echo "Semua kolom data harus diisi";
  	}else{
  		mysql_query("INSERT INTO kbm(topik,aktif) VALUES('$topik','$aktif')");
  		echo "Data berhasil diinputkan";
	}
}elseif ($modul=='editkbm'){
  	$idkbm = anti_injection($_POST['idkbm']);
  	$datatopikkbm = anti_injection($_POST['datatopikkbm']);
  	$dataaktifkbm = anti_injection($_POST['dataaktifkbm']);
  	mysql_query("UPDATE kbm SET topik = '$datatopikkbm',aktif = '$dataaktifkbm' WHERE id_kbm = '$idkbm'");
}else{
}
?>
<?php
}
?>
