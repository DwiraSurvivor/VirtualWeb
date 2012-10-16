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
	$(".tambahuser").click(function(){
		$('#formtambuser').show();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".prosesuser").click(function(){
		$(".prosesuser").attr({"disabled" : "true", "value" : "Memproses..." });
	$.ajax({
		type: "POST",
		url: "aksi_user.php",
		data: $("#inputdatauser").serialize(),
		cache: false,
		success: function(data){
			$(".prosesuser").removeAttr("disabled").attr("value", "Proses");
			$("#berhasiluser").fadeIn();
			$("#berhasiluser").html('');
			$("#berhasiluser").html(data);
			$("#berhasiluser").fadeOut(3000);
			$("#inputdatauser").resetForm();
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
	$(".tutupuser").click(function(){
		$('#formtambuser').hide();
});
});
</script>
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
<script language="javascript">
$(document).ready( function() {
	$(".refuser").click(function(){
		$('.window_isidata5').html('');
		$('.window_isidata5').load('load_user.php');
});
});
</script>
    <div id="window_user" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="theme/images/icons/icon_16_user.png" />
            User
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_user" class="window_close"></a>
          </span>
        </div>
        <div class="abs window_content">
          <div class="window_aside">
            <p align="center"><a href="#" class="tambahuser">Tambah Data</a> | <a href="#" class="refuser">Refresh Data</a></p><br />
            <p>User berisi data-data siswa untuk login beserta data admin dimana melalui menu ini admin dapat mengatur akun dari siswa seperti blokir akses login.</p>
          </div>
          <div class="window_main">
          <?php
          if ($_SESSION['leveluser']=='admin'){
		echo "<div id='formtambuser' style='display:none;padding-bottom:20px;'><p style='padding-top:20px;'>
		<table style='margin-left:20px;'>
		<form id='inputdatauser' method='POST' action='aksi_user.php'>
		        <input type='hidden' name='modul' value='tambahuser' />
		        <tr>
		                <td>Username</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='usernameuser' name='usernameuser' class='log' style='width:250px;' placeholder='Isikan username' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Password</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='passworduser' name='passworduser' class='log' style='width: 250px;' placeholder='Isikan password' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Nama Lengkap</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='namalengkapuser' name='namalengkapuser' class='log' placeholder='Isikan nama lengkap' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Kelas</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='kelasuser' name='kelasuser' class='log' placeholder='Isikan kelas' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Aktif</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='radio' id='aktifuser' name='aktifuser' class='log' value='Y' checked />Ya
				<input type='radio' id='aktifuser' name='aktifuser' class='log' value='N' />Tidak<br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td colspan='3'>
					<input type='submit' name='submit' value='Proses' id='tbldesktop' class='prosesuser'  />
					<input type='button' value='Tutup' id='tbldesktop' class='tutupuser' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span id='berhasiluser'></span>
				</td>
		        </tr>
		</form>
		</table>
		</p></div>";
	    }else{
	        echo "<div id='formtambuser2' style='display:none;padding-bottom:20px;'><p style='padding-top:20px;'></p></div>";
	    }
	    ?>
            <div class="window_isidata5">
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
          </div>
          </div>
        </div>
        <div class="abs window_bottom">
          Manajemen Data Siswa dan Admin
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
  </div>
<?php
}
?>
