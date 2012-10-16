<?php
session_start();
error_reporting(0);
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  header('location:selamatdatang');
}
else{
  include "config/koneksi.php";
  include "config/fungsi_combobox.php";
  include "config/library.php";
  include "config/fungsi_indotgl.php";
?>
<script language="javascript" type="text/javascript" src="theme/js/jquery.alerts.js"></script>
<script language="javascript">
$(document).ready( function() {
	$(".tambahabsensi").click(function(){
		$('#formtambahdata').show();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".prosesabsensi").click(function(){
		$(".prosesabsensi").attr({"disabled" : "true", "value" : "Memproses..." });
	$.ajax({
		type: "POST",
		url: "aksi_absensi.php",
		data: $("#inputdata").serialize(),
		cache: false,
		success: function(data){
			$(".prosesabsensi").removeAttr("disabled").attr("value", "Proses");
			$("#berhasil").fadeIn();
			$("#berhasil").html('');
			$("#berhasil").html(data);
			$("#berhasil").fadeOut(3000);
			$("#username").val('');
			$("#kelas").val('');
			$("#harihuruf").val('');
			$("#keterangan").val('');
		        $('.window_isidata').html('');
			$('.window_isidata').load('load_absensi.php');
		}
	});
		return false;
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".tutupabsensi").click(function(){
		$('#formtambahdata').hide();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".siswaisiabsensi").click(function(){
		$(".siswaisiabsensi").attr({"disabled" : "true", "value" : "Memproses..." });
		var modul = "tambahdatasiswa";
		var dataString = 'modul=' + modul;
	$.ajax({
		type: "POST",
		url: "aksi_absensi.php",
		data: dataString,
		cache: false,
		success: function(data){
			$(".siswaisiabsensi").removeAttr("disabled").attr("value", "Saya Telah Hadir");
			$('#formtambahdata').html('');
   			$('#formtambahdata').css('margin-top','-20px');
			$('#formtambahdata').hide();
		        $('.window_isidata').html('');
			$('.window_isidata').load('load_absensi.php');
		}
	});
		return false;
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".siswatutupabsensi").click(function(){
		$('#formtambahdata').hide();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".hapusabsensi").click(function(){

		var id = $(this).attr("id");
		var modul = "hapus";
		var dataString = 'id=' + id + '&modul=' + modul;
		var parent = $(this).parent();

		jConfirm('Apakah anda yakin akan menghapus absensi ini?', 'Konfirmasi Penghapusan',
		function(r){
			if(r==true){
	$.ajax({
		type: "POST",
		url: "aksi_absensi.php",
		data: dataString,
		cache: false,
		success: function(){
			$('#trabsensi'+id).slideUp('slow', function() {$(this).remove();});
		        $('.window_isidata').html('');
			$('.window_isidata').load('load_absensi.php');
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
	$(".editdataabsensi").click(function(){
	        var id = $(this).attr("id");
		$('#ket'+id).hide();
		$('#ketb'+id).show();
		$('#aksi'+id).hide();
		$('#aksib'+id).show();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".updatedata").click(function(){
		var ide = $(this).attr("id");
		var data = $('#data'+ide).val();
		var modul = "editdata";
		var dataString = 'ide=' + ide + '&modul=' + modul + '&data=' + data;
		var parent = $(this).parent();
	$.ajax({
		type: "POST",
		url: "aksi_absensi.php",
		data: dataString,
		cache: false,
		success: function(html){
		        $('.window_isidata').html('');
			$('.window_isidata').load('load_absensi.php');
		}
	});
		return false;
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".refabsensi").click(function(){
		$('.window_isidata').html('');
		$('.window_isidata').load('load_absensi.php');
});
});
</script>
    <div id="window_absensi" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="theme/images/icons/icon_16_absensi.png" />
            Absensi
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_absensi" class="window_close"></a>
          </span>
        </div>
        <div class="abs window_content">
          <div class="window_aside">
            <p align="center"><a href="#" class="tambahabsensi">Tambah Data</a> | <a href="#" class="refabsensi">Refresh Data</a></p><br />
            <p>Absensi siswa berisi rekap data kehadiran dari pertemuan pertama sampai pertemuan terakhir.</p>
          </div>
          <div class="window_main">
          <?php
          if ($_SESSION['leveluser']=='admin'){
		echo "<div id='formtambahdata' style='display:none;padding-bottom:20px;'><p style='padding-top:20px;'>
		<table style='margin-left:20px;'>
		<form id='inputdata' method='POST' action='aksi_absensi.php'>
		        <input type='hidden' name='modul' value='tambahdata' />
		        <tr>
		                <td>Nama Siswa</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='username' name='username' class='log' style='width:250px;' placeholder='Isikan nama siswa' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Kelas</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='kelas' name='kelas' class='log' placeholder='Isikan kelas' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Hari</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='harihuruf' name='harihuruf' class='log' placeholder='Isikan hari' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Tanggal</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td>";
    					combotgl(1,31,'hari',$tgl_skrg);
        				combonamabln(1,12,'bulan',$bln_sekarang);
    					combothn(1980,$thn_sekarang,'tahun',$thn_sekarang);
				echo "<br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Keterangan</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='keterangan' name='keterangan' class='log' style='width:250px;' placeholder='Isikan keterangan kehadiran' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td colspan='3'>
					<input type='submit' name='submit' value='Proses' id='tbldesktop' class='prosesabsensi'  />
					<input type='button' value='Tutup' id='tbldesktop' class='tutupabsensi' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span id='berhasil'></span>
				</td>
		        </tr>
		</form>
		</table>
		</p></div>";
	    }else{
	        echo "<div id='formtambahdata' style='display:none;padding-bottom:20px;'><p style='padding-top:20px;'>
		<table style='margin-left:20px;'>";
		$tglhariini=$thn_sekarang.'-'.$bln_sekarang.'-'.$tgl_skrg;
                $cariabsensi=mysql_query("SELECT username,tanggal FROM absensi WHERE username='$_SESSION[namauser]' AND tanggal='$tglhariini'");
                $adaabsensi=mysql_num_rows($cariabsensi);
	        $rca=mysql_fetch_array($cariabsensi);
	        if ($adaabsensi > 0){
		        echo "<tr><td>Anda sudah hadir pada saat ini<br /><br />
			<input type='button' value='Tutup' id='tbldesktop' class='siswatutupabsensi' /></td></tr>";
		}else{
		        echo "<tr><td>Anda belum mengecek kehadiran sekarang, klik tombol di bawah ini :<br /><br />
			<input type='button' value='Saya Telah Hadir' id='tbldesktop' class='siswaisiabsensi' /></td></tr>";
		}
		echo "</table></p></div>";
	    }
	    ?>
            <div class="window_isidata">
            <?php
            if ($_SESSION['leveluser']=='admin'){
              echo "<table class='data'>
	      	  <thead><tr>
	      	  <th class='shrink'>&nbsp;</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Hari / Tanggal</th>
                  <th>Keterangan</th>
                  <th>Tindakan</th>
              </tr></thead>
              <tbody>";
              $tampil=mysql_query("SELECT * FROM absensi WHERE kelas='XA' ORDER BY id_absensi DESC");
              while ($r=mysql_fetch_array($tampil)){
              $carinama=mysql_query("SELECT username,nama_lengkap FROM user WHERE username='$r[username]'");
	      $rcn=mysql_fetch_array($carinama);
      	      $tgl = tgl_indo($r[tanggal]);
	      echo "<tr id='trabsensi$r[id_absensi]'>
                  <td><img src='theme/images/icons/icon_16_user.png' /></td>
                  <td>$rcn[nama_lengkap]</td>
                  <td>$r[kelas]</td>
                  <td>$r[hari], $tgl</td>
                  <td id='ket$r[id_absensi]'>$r[keterangan]</td>
                  <td id='ketb$r[id_absensi]' style='display:none;'><input id='data$r[id_absensi]' class='log' type='text' value='$r[keterangan]' /></td>
                  <td id='aksi$r[id_absensi]'><a href='#' id='$r[id_absensi]' class='editdataabsensi'>Edit</a> | <a href='#' id='$r[id_absensi]' class='hapusabsensi'>Hapus</a></td>
                  <td id='aksib$r[id_absensi]' style='display:none;'><a href='#' id='$r[id_absensi]' class='updatedata'>Proses</a></td>
              </tr>";
              }
	      echo "</tbody>
            </table><br />
            <table class='data'>
              	  <thead><tr>
              	  <th class='shrink'>&nbsp;</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Hari / Tanggal</th>
                  <th>Keterangan</th>
                  <th>Tindakan</th>
              </tr></thead>
              <tbody>";
              $tampil2=mysql_query("SELECT * FROM absensi WHERE kelas='XB' ORDER BY id_absensi DESC");
              while ($r2=mysql_fetch_array($tampil2)){
              $carinama2=mysql_query("SELECT username,nama_lengkap FROM user WHERE username='$r2[username]'");
	      $rcn2=mysql_fetch_array($carinama2);
      	      $tgl2 = tgl_indo($r2[tanggal]);
	      echo "<tr id='trabsensi$r2[id_absensi]'>
                  <td><img src='theme/images/icons/icon_16_user.png' /></td>
                  <td>$rcn2[nama_lengkap]</td>
                  <td>$r2[kelas]</td>
                  <td>$r2[hari], $tgl2</td>
                  <td id='ket$r2[id_absensi]'>$r2[keterangan]</td>
                  <td id='ketb$r2[id_absensi]' style='display:none;'><input id='data$r2[id_absensi]' class='log' type='text' value='$r2[keterangan]' /></td>
                  <td id='aksi$r2[id_absensi]'><a href='#' id='$r2[id_absensi]' class='editdataabsensi'>Edit</a> | <a href='#' id='$r2[id_absensi]' class='hapusabsensi'>Hapus</a></td>
                  <td id='aksib$r2[id_absensi]' style='display:none;'><a href='#' id='$r2[id_absensi]' class='updatedata'>Proses</a></td>
              </tr>";
              }
	      echo "</tbody>
            </table>";
            }else{
              echo "<table class='data'>
	      	  <thead><tr>
	      	  <th class='shrink'>&nbsp;</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Hari / Tanggal</th>
                  <th>Keterangan</th>
              </tr></thead>
              <tbody>";
              $tampil=mysql_query("SELECT * FROM absensi WHERE username='$_SESSION[namauser]' ORDER BY id_absensi DESC");
              while ($r=mysql_fetch_array($tampil)){
              $carinama=mysql_query("SELECT username,nama_lengkap FROM user WHERE username='$r[username]'");
	      $rcn=mysql_fetch_array($carinama);
      	      $tgl = tgl_indo($r[tanggal]);
	      echo "<tr id='trabsensi$r[id_absensi]'>
                  <td><img src='theme/images/icons/icon_16_user.png' /></td>
                  <td>$rcn[nama_lengkap]</td>
                  <td>$r[kelas]</td>
                  <td>$r[hari], $tgl</td>
                  <td>$r[keterangan]</td>
              </tr>";
              }
	      echo "</tbody>
            </table>";
            }
          ?>
          </div>
          </div>
        </div>
        <div class="abs window_bottom">
          Rekap Absensi Siswa
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
<?php
}
?>
