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
$modul2 = anti_injection($_GET['modul']);

if ($modul=='hapusevaluasi'){
  	$id = anti_injection($_POST['id']);
  	mysql_query("DELETE FROM evaluasi WHERE id_evaluasi='$id'");
}elseif ($modul=='hapusnievaluasi'){
  	$idne = anti_injection($_POST['idne']);
  	mysql_query("DELETE FROM nilai_evaluasi WHERE id_nilaievaluasi='$idne'");
}elseif ($modul=='tambahevaluasi'){
  	$topik = anti_injection($_POST['topik']);
  	$soal = $_POST['soal'];
  	$jnsevaluasi = anti_injection($_POST['jnsevaluasi']);
  	$aktif = anti_injection($_POST['aktif']);
  	if (empty($topik) || empty($soal) || empty($jnsevaluasi)){
  	        echo "Semua kolom data harus diisi";
  	}else{
  		mysql_query("INSERT INTO evaluasi(topik,soal,jns_evaluasi,aktif) VALUES('$topik','$soal','$jnsevaluasi','$aktif')");
  		echo "Data berhasil diinputkan";
	}
}elseif ($modul=='tambahnievaluasi'){
	$username = anti_injection($_POST['username']);
	$nilai = anti_injection($_POST['nilai']);
	$kelas = anti_injection($_POST['kelas']);
	$jnsnievaluasi = anti_injection($_POST['jnsnievaluasi']);
  	if (empty($username) || empty($nilai) || empty($kelas) || empty($jnsnievaluasi)){
  	        echo "Semua kolom data harus diisi";
  	}else{
  		mysql_query("INSERT INTO nilai_evaluasi(username,nilai_evaluasi,kelas,jns_evaluasi) VALUES('$username','$nilai','$kelas','$jnsnievaluasi')");
  		echo "Data berhasil diinputkan";
	}
}elseif ($modul=='editevaluasi'){
        $idediteva = anti_injection($_POST['idediteva']);
  	$topikedit = anti_injection($_POST['topikedit']);
  	$soaledit = $_POST['soaledit'];
  	$jnsevaluasiedit = anti_injection($_POST['jnsevaluasiedit']);
  	$aktifedit = anti_injection($_POST['aktifedit']);
  	if (empty($topikedit) || empty($soaledit) || empty($jnsevaluasiedit)){
  	        echo "Semua kolom data harus diisi";
  	}else{
  		mysql_query("UPDATE evaluasi SET topik = '$topikedit',soal = '$soaledit',jns_evaluasi = '$jnsevaluasiedit',aktif = '$aktifedit' WHERE id_evaluasi = '$idediteva'");
  		echo "Data berhasil diubah";
	}
}elseif ($modul=='editnievaluasi'){
  	$idene = anti_injection($_POST['idene']);
  	$datane = anti_injection($_POST['datane']);
  	mysql_query("UPDATE nilai_evaluasi SET nilai_evaluasi = '$datane' WHERE id_nilaievaluasi = '$idene'");
}elseif ($modul2=='lihatsoaleva'){
  	$id = anti_injection($_GET['id']);
  	$tampil=mysql_query("SELECT soal FROM evaluasi WHERE id_evaluasi='$id'");
  	$r=mysql_fetch_array($tampil);
  	echo "<p>$r[soal]</p>";
}elseif ($modul=='editsoaleva'){
  	$id = anti_injection($_POST['id']);
  	$tampil=mysql_query("SELECT * FROM evaluasi WHERE id_evaluasi='$id'");
  	$r=mysql_fetch_array($tampil);
  	$topik = "$r[topik]";
  	$soal = "$r[soal]";
  	$jnsevaluasi = "$r[jns_evaluasi]";
  	echo "$topik@$soal@$jnsevaluasi";
}else{
}
?>
<?php
}
?>
