<?php
session_start();
error_reporting(0);
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  header('location:selamatdatang');
}
else{
?>
<link rel="stylesheet" href="theme/skin/functional.css" type="text/css" />
<script language="javascript" type="text/javascript" src="theme/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="theme/js/flowplayer.min.js"></script>
<?php
include "config/koneksi.php";
$tampilkbmsiswa=mysql_query("SELECT * FROM kbm WHERE aktif='Y'");
$rkbmsw=mysql_fetch_array($tampilkbmsiswa);
$tampilkbmsiswa4=mysql_query("SELECT * FROM media_kbm WHERE topik='$rkbmsw[topik]'");
echo "<div style='width:540px;height:380px;'>";
while ($rkbmsw4=mysql_fetch_array($tampilkbmsiswa4)){
	echo "<div class='flowplayer' data-swf='flowplayer.swf' data-ratio='0.417'>
      		<video>
         		<source type='video/mp4' src='http://localhost/virtualweb/datakbm/$rkbmsw4[media]'/>
      		</video>
      		</div>";
}
echo "</div>";
?>
<?php
}
?>
