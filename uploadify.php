<?php
include "config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
$modul = anti_injection($_POST['modul']);
$tampil = mysql_query("SELECT * FROM kbm WHERE aktif='Y'");
$r = mysql_fetch_array($tampil);
$topik = $r['topik'];
if ($modul=='uploadmodul'){
$targetFolder = 'datakbm/';
$verifyToken = md5('unique_salt' . $_POST['timestamp']);
if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$nameFile = $_FILES['Filedata']['name'];
	$targetFile = $targetFolder . $_FILES['Filedata']['name'];
	$fileTypes = array('jpg','jpeg','gif','png','html','txt','pdf','mp3','mp4','flv','avi');
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		mysql_query("INSERT INTO modul_kbm(topik,modul) VALUES('$topik','$nameFile')");
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
}elseif ($modul=='uploadsource'){
$targetFolder = 'datakbm/';
$verifyToken = md5('unique_salt' . $_POST['timestamp']);
if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$nameFile = $_FILES['Filedata']['name'];
	$targetFile = $targetFolder . $_FILES['Filedata']['name'];
	$fileTypes = array('jpg','jpeg','gif','png','html','txt','pdf','mp3','mp4','flv','avi');
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		mysql_query("INSERT INTO source_kbm(topik,source) VALUES('$topik','$nameFile')");
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
}elseif ($modul=='uploadmedia'){
$targetFolder = 'datakbm/';
$verifyToken = md5('unique_salt' . $_POST['timestamp']);
if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$nameFile = $_FILES['Filedata']['name'];
	$targetFile = $targetFolder . $_FILES['Filedata']['name'];
	$fileTypes = array('jpg','jpeg','gif','png','html','txt','pdf','mp3','mp4','flv','avi');
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		mysql_query("INSERT INTO media_kbm(topik,media) VALUES('$topik','$nameFile')");
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
}else{
}
?>
