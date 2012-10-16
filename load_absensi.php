<?php
session_start();
error_reporting(0);
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  header('location:selamatdatang');
}
else{
include "config/koneksi.php";
include "config/fungsi_indotgl.php";
?>
<script language="javascript" type="text/javascript" src="theme/js/jquery.alerts.js"></script>
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
<?php
}
?>
