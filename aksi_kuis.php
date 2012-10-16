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

if ($modul=='hapustopik'){
  	$id = anti_injection($_POST['id']);
  	mysql_query("DELETE FROM topik_kuis WHERE id_topik='$id'");
}elseif ($modul=='hapuskuis'){
  	$idk = anti_injection($_POST['idk']);
  	mysql_query("DELETE FROM kuis WHERE id_kuis='$idk'");
}elseif ($modul=='hapusnikuis'){
  	$idnk = anti_injection($_POST['idnk']);
  	mysql_query("DELETE FROM nilai_kuis WHERE id_nilaikuis='$idnk'");
}elseif ($modul=='caritopik'){
        $tampilctk=mysql_query("SELECT * FROM topik_kuis WHERE aktif='Y' ORDER BY id_topik DESC");
        while($rctk=mysql_fetch_array($tampilctk)){
        	echo "<option value='$rctk[topik]'>$rctk[topik]</option>";
	}
}elseif ($modul=='tambahtopik'){
  	$topik = anti_injection($_POST['topikkuis']);
  	$aktif = anti_injection($_POST['aktiftopik']);
  	if (empty($topik)){
  	        echo "Semua kolom data harus diisi";
  	}else{
  		mysql_query("INSERT INTO topik_kuis(topik,aktif) VALUES('$topik','$aktif')");
  		echo "Data berhasil diinputkan";
	}
}elseif ($modul=='tambahkuis'){
	$topik = anti_injection($_POST['topikkuis3']);
	$pertanyaan = anti_injection($_POST['pertanyaan']);
	$pilihana = anti_injection($_POST['pilihana']);
	$pilihanb = anti_injection($_POST['pilihanb']);
	$pilihanc = anti_injection($_POST['pilihanc']);
	$pilihand = anti_injection($_POST['pilihand']);
	$jawaban = anti_injection($_POST['jawaban']);
  	if (empty($topik) || empty($pertanyaan) || empty($pilihana) || empty($pilihanb) || empty($pilihanc) || empty($pilihand) || empty($jawaban)){
  	        echo "Semua kolom data harus diisi";
  	}else{
  		mysql_query("INSERT INTO kuis(topik,pertanyaan,pilihan_a,pilihan_b,pilihan_c,pilihan_d,jawaban) VALUES('$topik','$pertanyaan','$pilihana','$pilihanb','$pilihanc','$pilihand','$jawaban')");
  		echo "Data berhasil diinputkan";
	}
}elseif ($modul=='edittopik'){
  	$idet = anti_injection($_POST['idet']);
  	$dataet = anti_injection($_POST['dataet']);
  	$dataet2 = anti_injection($_POST['dataet2']);
  	mysql_query("UPDATE topik_kuis SET topik = '$dataet',aktif = '$dataet2' WHERE id_topik = '$idet'");
}elseif ($modul=='editsoalkuis'){
  	$id = anti_injection($_POST['id']);
  	$tampil=mysql_query("SELECT * FROM kuis WHERE id_kuis='$id'");
  	$r=mysql_fetch_array($tampil);
	$pertanyaan = $r[pertanyaan];
	$pilihana = $r[pilihan_a];
	$pilihanb = $r[pilihan_b];
	$pilihanc = $r[pilihan_c];
	$pilihand = $r[pilihan_d];
	$jawaban = $r[jawaban];
  	echo "$pertanyaan@$pilihana@$pilihanb@$pilihanc@$pilihand@$jawaban";
}elseif ($modul=='editkuis'){
        $ideditkuis = anti_injection($_POST['ideditkuis']);
	$topik = anti_injection($_POST['etopikkuis2']);
	$pertanyaan = anti_injection($_POST['epertanyaan']);
	$pilihana = anti_injection($_POST['epilihana']);
	$pilihanb = anti_injection($_POST['epilihanb']);
	$pilihanc = anti_injection($_POST['epilihanc']);
	$pilihand = anti_injection($_POST['epilihand']);
	$jawaban = anti_injection($_POST['ejawaban']);
  	if (empty($topik) || empty($pertanyaan) || empty($pilihana) || empty($pilihanb) || empty($pilihanc) || empty($pilihand) || empty($jawaban)){
  	        echo "Semua kolom data harus diisi";
  	}else{
  		mysql_query("UPDATE kuis SET topik = '$topik',pertanyaan = '$pertanyaan',pilihan_a = '$pilihana',pilihan_b = '$pilihanb',pilihan_c = '$pilihanc',pilihan_d = '$pilihand',jawaban = '$jawaban' WHERE id_kuis = '$ideditkuis'");
  		echo "Data berhasil diubah";
	}
}elseif ($modul2=='lihatsoalkuis'){
  	$idlk = anti_injection($_GET['idlk']);
  	$tampil=mysql_query("SELECT * FROM kuis WHERE id_kuis='$idlk'");
  	$r=mysql_fetch_array($tampil);
  	echo "<p>$r[pertanyaan]<div style='margin-top:-15px; padding-left:30px;'>a. $r[pilihan_a]<br />b. $r[pilihan_b]<br />c. $r[pilihan_c]<br />d. $r[pilihan_d]</div></p>";
}else{
}
?>
<?php
}
?>
