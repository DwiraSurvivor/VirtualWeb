<?php
session_start();
error_reporting(0);
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  header('location:selamatdatang');
}
else{
?>
<script language="javascript">
$(document).ready( function() {
	$(".tambahkbm").click(function(){
		$('#formtambahkbm').show();
		$('#formtambahmodul').hide();
		$('#formtambahsource').hide();
		$('#formtambahmedia').hide();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".tutupkbm").click(function(){
		$('#formtambahkbm').hide();
		$('#formtambahmodul').hide();
		$('#formtambahsource').hide();
		$('#formtambahmedia').hide();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".tambahmodul").click(function(){
		$('#formtambahkbm').hide();
		$('#formtambahmodul').show();
		$('#formtambahsource').hide();
		$('#formtambahmedia').hide();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".tutupmodul").click(function(){
		$('#formtambahkbm').hide();
		$('#formtambahmodul').hide();
		$('#formtambahsource').hide();
		$('#formtambahmedia').hide();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".tambahsource").click(function(){
		$('#formtambahkbm').hide();
		$('#formtambahmodul').hide();
		$('#formtambahsource').show();
		$('#formtambahmedia').hide();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".tutupsource").click(function(){
		$('#formtambahkbm').hide();
		$('#formtambahmodul').hide();
		$('#formtambahsource').hide();
		$('#formtambahmedia').hide();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".tambahmedia").click(function(){
		$('#formtambahkbm').hide();
		$('#formtambahmodul').hide();
		$('#formtambahsource').hide();
		$('#formtambahmedia').show();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".tutupmedia").click(function(){
		$('#formtambahkbm').hide();
		$('#formtambahmodul').hide();
		$('#formtambahsource').hide();
		$('#formtambahmedia').hide();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".proseskbm").click(function(){
		$(".proseskbm").attr({"disabled" : "true", "value" : "Memproses..." });
	$.ajax({
		type: "POST",
		url: "aksi_kbm.php",
		data: $("#inputdatakbm").serialize(),
		cache: false,
		success: function(data){
			$(".proseskbm").removeAttr("disabled").attr("value", "Proses");
			$("#berhasilkbm").fadeIn();
			$("#berhasilkbm").html('');
			$("#berhasilkbm").html(data);
			$("#berhasilkbm").fadeOut(3000);
			$("#topikkbmt").val('');
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
<script type="text/javascript">
	<?php $timestamp = time();?>
	$(function() {
		$('#file_upload').uploadify({
   			'formData'     : {
				'timestamp' : '<?php echo $timestamp;?>',
				'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
				'modul'     : 'uploadmodul'
			},
			'buttonText' : 'Unggah Modul',
			'swf'      : 'uploadify.swf',
			'uploader' : 'uploadify.php'
		});
	});
</script>
<script type="text/javascript">
	<?php $timestamp = time();?>
	$(function() {
		$('#file_upload2').uploadify({
   			'formData'     : {
				'timestamp' : '<?php echo $timestamp;?>',
				'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
				'modul'     : 'uploadsource'
			},
			'buttonText' : 'Unggah Source',
			'swf'      : 'uploadify.swf',
			'uploader' : 'uploadify.php'
		});
	});
</script>
<script type="text/javascript">
	<?php $timestamp = time();?>
	$(function() {
		$('#file_upload3').uploadify({
   			'formData'     : {
				'timestamp' : '<?php echo $timestamp;?>',
				'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
				'modul'     : 'uploadmedia'
			},
			'buttonText' : 'Unggah Media',
			'swf'      : 'uploadify.swf',
			'uploader' : 'uploadify.php'
		});
	});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".hapuskbm").click(function(){

		var id = $(this).attr("id");
		var modul = "hapuskbm";
		var dataString = 'id=' + id + '&modul=' + modul;
		var parent = $(this).parent();

		jConfirm('Apakah anda yakin akan menghapus KBM ini?', 'Konfirmasi Penghapusan',
		function(r){
			if(r==true){
	$.ajax({
		type: "POST",
		url: "aksi_kbm.php",
		data: dataString,
		cache: false,
		success: function(){
			$('#trkbm'+id).slideUp('slow', function() {$(this).remove();});
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
<script language="javascript">
$(document).ready( function() {
	$(".refkbm").click(function(){
		$('.window_isidata2').html('');
		$('.window_isidata2').load('load_kbm.php');
});
});
</script>
    <div id="window_kbm" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="theme/images/icons/icon_16_kbm.png" />
            KBM
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_kbm" class="window_close"></a>
          </span>
        </div>
        <div class="abs window_content">
          <div class="window_aside">
            <p align="center"><a href="#" class="tambahkbm">Tambah KBM</a> | <a href="#" class="refkbm">Refresh Data</a>
	    <a href="#" class="tambahmodul">Tambah Modul</a><br /><a href="#" class="tambahsource">Tambah Source</a><br />
	    <a href="#" class="tambahmedia">Tambah Media</a></p><br />
            <p>KBM berisi semua hal yang digunakan dalam proses pembelajaran, mulai dari modul, source sampai media berupa video yang akan membuat proses
	    pembelajaran lebih inovatif dan merangsang minat siswa.</p>
          </div>
          <div class="window_main">
          <?php
          if ($_SESSION['leveluser']=='admin'){
		echo "<div id='formtambahkbm' style='display:none;padding-bottom:20px;'><p style='padding-top:20px;'>
		<table style='margin-left:20px;'>
		<form id='inputdatakbm' method='POST' action='aksi_kbm.php'>
		        <input type='hidden' name='modul' value='tambahkbm' />
		        <tr>
		                <td>Topik</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='topikkbmt' name='topikkbmt' class='log' style='width:250px;' placeholder='Isikan topik KBM' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Aktif</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='radio' id='aktifkbmt' name='aktifkbmt' class='log' value='Y' checked />Ya
				<input type='radio' id='aktifkbmt' name='aktifkbmt' class='log' value='N' />Tidak<br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td colspan='3'>
					<input type='submit' name='submit' value='Proses' id='tbldesktop' class='proseskbm'  />
					<input type='button' value='Tutup' id='tbldesktop' class='tutupkbm' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span id='berhasilkbm'></span>
				</td>
		        </tr>
		</form>
		</table>
		</p></div>
		<div id='formtambahmodul' style='display:none;padding-bottom:20px;padding-left:20px;'><p style='padding-top:20px;'>
			<form>
				<div id='queue'></div>
				<input id='file_upload' name='file_upload' type='file' multiple='true' />
				<input type='hidden' id='topikmodul' name='topikmodul' value='Sejarah HTML' />
				<input type='button' value='Tutup' id='tbldesktop' class='tutupmodul' />
			</form>
	        </p></div>
		<div id='formtambahsource' style='display:none;padding-bottom:20px;padding-left:20px;'><p style='padding-top:20px;'>
			<form>
				<div id='queue'></div>
				<input id='file_upload2' name='file_upload' type='file' multiple='true' />
				<input type='button' value='Tutup' id='tbldesktop' class='tutupsource' />
			</form>
	        </p></div>
		<div id='formtambahmedia' style='display:none;padding-bottom:20px;padding-left:20px;'><p style='padding-top:20px;'>
			<form>
				<div id='queue'></div>
				<input id='file_upload3' name='file_upload' type='file' multiple='true' />
				<input type='button' value='Tutup' id='tbldesktop' class='tutupmedia' />
			</form>
	        </p></div>";
	    }else{
	        echo "<div id='formtambahkbm2' style='display:none;padding-bottom:20px;'><p style='padding-top:20px;'></p></div>";
	    }
	    ?>
            <div class="window_isidata2">
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
          </div>
          </div>
        </div>
        <div class="abs window_bottom">
          Kegiatan Belajar Mengajar
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
<?php
}
?>
