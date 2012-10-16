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
	$(".edituser").click(function(){
	        var id = $(this).attr("id");
		$('#eupassword'+id).hide();
		$('#eupasswordb'+id).show();
		$('#eunamalengkap'+id).hide();
		$('#eunamalengkapb'+id).show();
		$('#eukelas'+id).hide();
		$('#eukelasb'+id).show();
		$('#euaktif'+id).hide();
		$('#euaktifb'+id).show();
		$('#euaksi'+id).hide();
		$('#euaksib'+id).show();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".updateuser").click(function(){
		var id = $(this).attr("id");
		var datapuser = $('#datapuser'+id).val();
		var datanuser = $('#datanuser'+id).val();
		var datakuser = $('#datakuser'+id).val();
		var dataauser = $('#dataauser'+id).val();
		var modul = "edituser";
		var dataString = 'id=' + id + '&modul=' + modul + '&datapuser=' + datapuser + '&datanuser=' + datanuser + '&datakuser=' + datakuser + '&dataauser=' + dataauser;
		var parent = $(this).parent();
	$.ajax({
		type: "POST",
		url: "aksi_user.php",
		data: dataString,
		cache: false,
		success: function(html){
			$('.window_isidata5').html('');
			$('.window_isidata5').load('load_user.php');
		}
	});
		return false;
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".hapususer").click(function(){

		var id = $(this).attr("id");
		var modul = "hapususer";
		var dataString = 'id=' + id + '&modul=' + modul;
		var parent = $(this).parent();

		jConfirm('Apakah anda yakin akan menghapus user ini?', 'Konfirmasi Penghapusan',
		function(r){
			if(r==true){
	$.ajax({
		type: "POST",
		url: "aksi_user.php",
		data: dataString,
		cache: false,
		success: function(){
			$('#truser'+id).slideUp('slow', function() {$(this).remove();});
			$('.window_isidata5').html('');
			$('.window_isidata5').load('load_user.php');
		}
	});
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
                  <th>Username</th>
                  <th>Password</th>
                  <th>Nama Lengkap</th>
                  <th>Kelas</th>
                  <th>Aktif</th>
                  <th>Tindakan</th>
              </tr></thead>
              <tbody>";
              $tampil11=mysql_query("SELECT * FROM user ORDER BY id_user ASC");
              while ($r11=mysql_fetch_array($tampil11)){
	      echo "<tr id='truser$r11[id_user]'>
	      	  <td><img src='theme/images/icons/icon_16_user.png' /></td>
                  <td>$r11[username]</td>
                  <td id='eupassword$r11[id_user]'>Tidak bisa dilihat</td>
                  <td id='eupasswordb$r11[id_user]' style='display:none;'><input id='datapuser$r11[id_user]' class='log' type='text' value='' /></td>
                  <td id='eunamalengkap$r11[id_user]'>$r11[nama_lengkap]</td>
                  <td id='eunamalengkapb$r11[id_user]' style='display:none;'><input id='datanuser$r11[id_user]' class='log' type='text' value='$r11[nama_lengkap]' /></td>
                  <td id='eukelas$r11[id_user]'>$r11[kelas]</td>
                  <td id='eukelasb$r11[id_user]' style='display:none;'><input id='datakuser$r11[id_user]' class='log' type='text' value='$r11[kelas]' /></td>
                  <td id='euaktif$r11[id_user]'>$r11[aktif]</td>
                  <td id='euaktifb$r11[id_user]' style='display:none;'><input id='dataauser$r11[id_user]' class='log' type='text' value='$r11[aktif]' /></td>
                  <td id='euaksi$r11[id_user]'><a href='#' id='$r11[id_user]' class='edituser'>Edit</a> | <a href='#' id='$r11[id_user]' class='hapususer'>Hapus</a></td>
                  <td id='euaksib$r11[id_user]' style='display:none;'><a href='#' id='$r11[id_user]' class='updateuser'>Proses</a></td>
              </tr>";
              }
	      echo "</tbody>
            </table>";
            }else{
            }
          ?>
<?php
}
?>
