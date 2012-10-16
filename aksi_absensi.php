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
  include "config/library.php";
  include "config/fungsi_indotgl.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
$modul = anti_injection($_POST['modul']);

if ($modul=='hapus'){
  	$id = anti_injection($_POST['id']);
  	mysql_query("DELETE FROM absensi WHERE id_absensi='$id'");
}elseif ($modul=='tambahdata'){
  	$username = anti_injection($_POST['username']);
  	$kelas = anti_injection($_POST['kelas']);
  	$hari = anti_injection($_POST['harihuruf']);
  	$tanggal=$_POST[tahun].'-'.$_POST[bulan].'-'.$_POST[hari];
  	$keterangan = anti_injection($_POST['keterangan']);
  	if (empty($username) || empty($kelas) || empty($hari) || empty($keterangan)){
  	        echo "Semua kolom data harus diisi";
  	}else{
  		mysql_query("INSERT INTO absensi(username,kelas,hari,tanggal,keterangan) VALUES('$username','$kelas','$hari','$tanggal','$keterangan')");
  		echo "Data berhasil diinputkan";
	}
}elseif ($modul=='tambahdatasiswa'){
	$username = anti_injection($_SESSION['namauser']);
	$kelas = anti_injection($_SESSION['kelasuser']);
	$hari = $hari_ini;
	$tanggal = $thn_sekarang.'-'.$bln_sekarang.'-'.$tgl_skrg;
	$keterangan = "Hadir";
 	mysql_query("INSERT INTO absensi(username,kelas,hari,tanggal,keterangan) VALUES('$username','$kelas','$hari','$tanggal','$keterangan')");
}elseif ($modul=='editdata'){
  	$ide = anti_injection($_POST['ide']);
  	$data = anti_injection($_POST['data']);
  	mysql_query("UPDATE absensi SET keterangan = '$data' WHERE id_absensi = '$ide'");
}else{
}
?>
<?php
}
?>
