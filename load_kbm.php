<?php
session_start();
error_reporting(0);
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  header('location:selamatdatang');
}
else{
include "config/koneksi.php";
?>
<script language="javascript" type="text/javascript" src="theme/js/jquery.alerts.js"></script>
<script language="javascript">
$(document).ready( function() {
	$(".editkbm").click(function(){
	        var id = $(this).attr("id");
		$('#datakbm'+id).hide();
		$('#datakbmb'+id).show();
		$('#aktifkbm'+id).hide();
		$('#aktifkbmb'+id).show();
		$('#aksikbm'+id).hide();
		$('#aksikbmb'+id).show();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".updatekbm").click(function(){
		var idkbm = $(this).attr("id");
		var datatopikkbm = $('#datatopikkbm'+idkbm).val();
		var dataaktifkbm = $('#dataaktifkbm'+idkbm).val();
		var modul = "editkbm";
		var dataString = 'idkbm=' + idkbm + '&modul=' + modul + '&datatopikkbm=' + datatopikkbm + '&dataaktifkbm=' + dataaktifkbm;
		var parent = $(this).parent();
	$.ajax({
		type: "POST",
		url: "aksi_kbm.php",
		data: dataString,
		cache: false,
		success: function(html){
			$('.window_isidata2').html('');
			$('.window_isidata2').load('load_kbm.php');
		}
	});
		return false;
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".hapusmodul").click(function(){

		var idm = $(this).attr("id");
		var hapusfile = $('.hapusfile').attr("id");
		var modul = "hapusmodul";
		var dataString = 'idm=' + idm + '&modul=' + modul + '&hapusfile=' + hapusfile;
		var parent = $(this).parent();

		jConfirm('Apakah anda yakin akan menghapus modul ini?', 'Konfirmasi Penghapusan',
		function(r){
			if(r==true){
	$.ajax({
		type: "POST",
		url: "aksi_kbm.php",
		data: dataString,
		cache: false,
		success: function(){
			$('#trkbmm'+idm).slideUp('slow', function() {$(this).remove();});
			$('.window_isidata2').html('');
			$('.window_isidata2').load('load_kbm.php');
		}
	});
	}
	});
		return false;
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".hapussource").click(function(){

		var ids = $(this).attr("id");
		var hapusfile2 = $('.hapusfile2').attr("id");
		var modul = "hapussource";
		var dataString = 'ids=' + ids + '&modul=' + modul + '&hapusfile2=' + hapusfile2;
		var parent = $(this).parent();

		jConfirm('Apakah anda yakin akan menghapus source ini?', 'Konfirmasi Penghapusan',
		function(r){
			if(r==true){
	$.ajax({
		type: "POST",
		url: "aksi_kbm.php",
		data: dataString,
		cache: false,
		success: function(){
			$('#trkbms'+ids).slideUp('slow', function() {$(this).remove();});
			$('.window_isidata2').html('');
			$('.window_isidata2').load('load_kbm.php');
		}
	});
	}
	});
		return false;
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".hapusmedia").click(function(){

		var idmd = $(this).attr("id");
		var hapusfile3 = $('.hapusfile3').attr("id");
		var modul = "hapusmedia";
		var dataString = 'idmd=' + idmd + '&modul=' + modul + '&hapusfile3=' + hapusfile3;
		var parent = $(this).parent();

		jConfirm('Apakah anda yakin akan menghapus media ini?', 'Konfirmasi Penghapusan',
		function(r){
			if(r==true){
	$.ajax({
		type: "POST",
		url: "aksi_kbm.php",
		data: dataString,
		cache: false,
		success: function(){
			$('#trkbmmd'+idmd).slideUp('slow', function() {$(this).remove();});
			$('.window_isidata2').html('');
			$('.window_isidata2').load('load_kbm.php');
		}
	});
	}
	});
		return false;
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#accordion-js').find('h2').click(function(){
	    $(this).next().slideToggle();
	}).next().hide();
});
</script>
            <?php
            if ($_SESSION['leveluser']=='admin'){
             echo "<table class='data'>
	      	  <thead><tr>
	      	  <th class='shrink'>&nbsp;</th>
                  <th>Topik</th>
                  <th>Aktif</th>
                  <th>Tindakan</th>
              </tr></thead>
              <tbody>";
              $tampilkbm=mysql_query("SELECT * FROM kbm ORDER BY id_kbm DESC");
              while ($rkbm=mysql_fetch_array($tampilkbm)){
	      echo "<tr id='trkbm$rkbm[id_kbm]'>
                  <td><img src='theme/images/icons/icon_16_topik.png' /></td>
                  <td id='datakbm$rkbm[id_kbm]'>$rkbm[topik]</td>
                  <td id='datakbmb$rkbm[id_kbm]' style='display:none;'><input id='datatopikkbm$rkbm[id_kbm]' class='log' type='text' value='$rkbm[topik]' /></td>
                  <td id='aktifkbm$rkbm[id_kbm]'>$rkbm[aktif]</td>
                  <td id='aktifkbmb$rkbm[id_kbm]' style='display:none;'><input id='dataaktifkbm$rkbm[id_kbm]' class='log' type='text' value='$rkbm[aktif]' /></td>
                  <td id='aksikbm$rkbm[id_kbm]'><a href='#' id='$rkbm[id_kbm]' class='editkbm'>Edit</a> | <a href='#' id='$rkbm[id_kbm]' class='hapuskbm'>Hapus</a></td>
                  <td id='aksikbmb$rkbm[id_kbm]' style='display:none;'><a href='#' id='$rkbm[id_kbm]' class='updatekbm'>Proses</a></td>
              </tr>";
              }
	      echo "</tbody>
            </table><br />
            <table class='data'>
	      	  <thead><tr>
	      	  <th class='shrink'>&nbsp;</th>
                  <th>Topik KBM</th>
                  <th>Modul</th>
                  <th>Tindakan</th>
              </tr></thead>
              <tbody>";
              $tampilkbmm=mysql_query("SELECT * FROM modul_kbm ORDER BY id_modul DESC");
              while ($rkbmm=mysql_fetch_array($tampilkbmm)){
	      echo "<tr id='trkbmm$rkbmm[id_modul]'>
                  <td><img src='theme/images/icons/icon_16_topik.png' /></td>
                  <td>$rkbmm[topik]</td>
                  <td>$rkbmm[modul]</td>
                  <td><a href='#' id='$rkbmm[id_modul]' class='hapusmodul'>Hapus Modul<span id='$rkbmm[modul]' class='hapusfile'></span></a></td>
              </tr>";
              }
	      echo "</tbody>
            </table><br />
            <table class='data'>
	      	  <thead><tr>
	      	  <th class='shrink'>&nbsp;</th>
                  <th>Topik KBM</th>
                  <th>Source</th>
                  <th>Tindakan</th>
              </tr></thead>
              <tbody>";
              $tampilkbms=mysql_query("SELECT * FROM source_kbm ORDER BY id_source DESC");
              while ($rkbms=mysql_fetch_array($tampilkbms)){
	      echo "<tr id='trkbms$rkbms[id_source]'>
                  <td><img src='theme/images/icons/icon_16_topik.png' /></td>
                  <td>$rkbms[topik]</td>
                  <td>$rkbms[source]</td>
                  <td><a href='#' id='$rkbms[id_source]' class='hapussource'>Hapus Source<span id='$rkbms[source]' class='hapusfile2'></span></a></td>
              </tr>";
              }
	      echo "</tbody>
            </table><br />
            <table class='data'>
	      	  <thead><tr>
	      	  <th class='shrink'>&nbsp;</th>
                  <th>Topik KBM</th>
                  <th>Media</th>
                  <th>Tindakan</th>
              </tr></thead>
              <tbody>";
              $tampilkbmmd=mysql_query("SELECT * FROM media_kbm ORDER BY id_media DESC");
              while ($rkbmmd=mysql_fetch_array($tampilkbmmd)){
	      echo "<tr id='trkbmmd$rkbmmd[id_media]'>
                  <td><img src='theme/images/icons/icon_16_topik.png' /></td>
                  <td>$rkbmmd[topik]</td>
                  <td>$rkbmmd[media]</td>
                  <td><a href='#' id='$rkbmmd[id_media]' class='hapusmedia'>Hapus Media<span id='$rkbmmd[media]' class='hapusfile3'></span></a></td>
              </tr>";
              }
	      echo "</tbody>
            </table>";
            }else{
            $tampilkbmsiswa=mysql_query("SELECT * FROM kbm WHERE aktif='Y'");
            $rkbmsw=mysql_fetch_array($tampilkbmsiswa);
        echo "<div id='kbmsiswa' style='padding-left:20px;'><p style='padding-top:5px;'>
	<div id='accordion-js' class='accordion'>
		<h2>Belajar melalui modul untuk pemahaman&nbsp;&nbsp;&nbsp;</h2>";
            	$tampilkbmsiswa2=mysql_query("SELECT * FROM modul_kbm WHERE topik='$rkbmsw[topik]'");
            	while ($rkbmsw2=mysql_fetch_array($tampilkbmsiswa2)){
			echo "<div class='p'>";
				include "datakbm/$rkbmsw2[modul]";
			echo "</div>";
		}
		echo "<h2>Belajar melalui source atau coding langsung&nbsp;&nbsp;</h2>";
		$tampilkbmsiswa3=mysql_query("SELECT * FROM source_kbm WHERE topik='$rkbmsw[topik]'");
            	while ($rkbmsw3=mysql_fetch_array($tampilkbmsiswa3)){
			echo "<div class='p'>";
				include "datakbm/$rkbmsw3[source]";
			echo "</div>";
		}
		echo "<h2>Belajar melalui media video ataupun suara&nbsp;&nbsp;</h2>
			<div class='p'>
			        <iframe src='kbm_video.php' frameborder='0' width='555' height='430' scrolling='no'></iframe>
			</div>
	</div>
	</p></div>";
            }
          ?>
<?php
}
?>
