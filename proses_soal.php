<?php
session_start();
error_reporting(0);
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  header('location:selamatdatang');
}
else{
include "config/koneksi.php";
?>
<?php
$modul = $_GET['modul'];
if ($modul=='ambilsoal'){
$topik = $_GET['topik'];
$data = mysql_query("SELECT * FROM kuis WHERE topik='$topik' ORDER BY id_kuis ASC");

$json = '{"soal":[ ';
while($x = mysql_fetch_array($data)){
    $json .= '{';
    $json .= '"id":"'.$x['id_kuis'].'",
        "topik":"'.htmlspecialchars($x['topik']).'",
        "pertanyaan":"'.htmlspecialchars($x['pertanyaan']).'",
        "a":"'.$x['pilihan_a'].'",
        "b":"'.$x['pilihan_b'].'",
        "c":"'.$x['pilihan_c'].'",
        "d":"'.$x['pilihan_d'].'",
        "jawaban":"'.$x['jawaban'].'"
    },';
}
$json = substr($json,0,strlen($json)-1);
$json .= ']';

$json .= '}';
echo $json;
}elseif ($modul=='nilaiakhir'){
$topik = $_GET['topik'];
	echo "<h4><u>Hasil Kuis Anda : </u></h4><br />";
	$jumlahbenar = 0;
	$i = 1;
	foreach($_POST['pilihan'] as $key => $value){
    	if($value == $_POST['jawaban'][$key]){
        	$j = "benar";
        	$jumlahbenar++;
    	}else{
        	$j = "<font color='red'>salah</font>";
    	}
    	echo "No $i : $value ($j)<br />";
    	$i++;
	}
	$carijml=mysql_query("SELECT * FROM kuis WHERE topik='$topik'");
	$cjml=mysql_num_rows($carijml);
	$nilaikuisakhir=$jumlahbenar*100;
	$nilaikuisakhir2=$nilaikuisakhir/$cjml;
	$cariskuis3=mysql_query("SELECT * FROM nilai_kuis WHERE username='$_SESSION[namauser]' AND topik='$topik'");
        $csk3=mysql_num_rows($cariskuis3);
        if ($csk3 > 0){
                echo "Anda Telah Mengikuti Kuis Saat Ini.....";
	}else{
		mysql_query("INSERT INTO nilai_kuis(username,nilai_kuis,kelas,topik) VALUES('$_SESSION[namauser]','$nilaikuisakhir2','$_SESSION[kelasuser]','$topik')");
		echo "<br />Jumlah Benar = $jumlahbenar<br />Nilai Kuis = $nilaikuisakhir2";
	}
}else{
}
?>
<?php
}
?>
