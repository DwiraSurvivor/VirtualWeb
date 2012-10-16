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
	$(".tambahevaluasi").click(function(){
		$('#formtambaheva').show();
		$('#formtambahnieva').hide();
		$('#formediteva').hide();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".prosesevaluasi").click(function(){
		$(".prosesevaluasi").attr({"disabled" : "true", "value" : "Memproses..." });
		nicEditors.findEditor('soaleva').saveContent();
	$.ajax({
		type: "POST",
		url: "aksi_evaluasi.php",
		data: $("#inputdataeva").serialize(),
		cache: false,
		success: function(data){
			$(".prosesevaluasi").removeAttr("disabled").attr("value", "Proses");
			$("#berhasileva").fadeIn();
			$("#berhasileva").html('');
			$("#berhasileva").html(data);
			$("#berhasileva").fadeOut(3000);
			$("#topik").val('');
			nicEditors.findEditor('soaleva').setContent('');
			$("#jnsevaluasi").val('');
			$('.window_isidata4').html('');
			$('.window_isidata4').load('load_evaluasi.php');
		}
	});
		return false;
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".tutupevaluasi").click(function(){
		$('#formtambaheva').hide();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".hapusevaluasi").click(function(){

		var id = $(this).attr("id");
		var modul = "hapusevaluasi";
		var dataString = 'id=' + id + '&modul=' + modul;
		var parent = $(this).parent();

		jConfirm('Apakah anda yakin akan menghapus evaluasi ini?', 'Konfirmasi Penghapusan',
		function(r){
			if(r==true){
	$.ajax({
		type: "POST",
		url: "aksi_evaluasi.php",
		data: dataString,
		cache: false,
		success: function(){
			$('#trevaluasi'+id).slideUp('slow', function() {$(this).remove();});
			$('.window_isidata4').html('');
			$('.window_isidata4').load('load_evaluasi.php');
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
	$(".tambahnilaievaluasi").click(function(){
		$('#formtambahnieva').show();
		$('#formtambaheva').hide();
		$('#formediteva').hide();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".prosesnievaluasi").click(function(){
		$(".prosesnievaluasi").attr({"disabled" : "true", "value" : "Memproses..." });
	$.ajax({
		type: "POST",
		url: "aksi_evaluasi.php",
		data: $("#inputdatanieva").serialize(),
		cache: false,
		success: function(data){
			$(".prosesnievaluasi").removeAttr("disabled").attr("value", "Proses");
			$("#berhasilnieva").fadeIn();
			$("#berhasilnieva").html('');
			$("#berhasilnieva").html(data);
			$("#berhasilnieva").fadeOut(3000);
			$("#usernamenieva").val('');
			$("#kelasnieva").val('');
			$("#jnsnievaluasi").val('');
			$("#nilai").val('');
			$('.window_isidata4').html('');
			$('.window_isidata4').load('load_evaluasi.php');
		}
	});
		return false;
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".tutupnievaluasi").click(function(){
		$('#formtambahnieva').hide();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".editnilaieva").click(function(){
	        var id = $(this).attr("id");
		$('#nilai'+id).hide();
		$('#nilaib'+id).show();
		$('#aksieva'+id).hide();
		$('#aksievab'+id).show();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".updatenilaieva").click(function(){
		var idene = $(this).attr("id");
		var datane = $('#datane'+idene).val();
		var modul = "editnievaluasi";
		var dataString = 'idene=' + idene + '&modul=' + modul + '&datane=' + datane;
		var parent = $(this).parent();
	$.ajax({
		type: "POST",
		url: "aksi_evaluasi.php",
		data: dataString,
		cache: false,
		success: function(html){
			$('.window_isidata4').html('');
			$('.window_isidata4').load('load_evaluasi.php');
		}
	});
		return false;
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".hapusnilaieva").click(function(){

		var idne = $(this).attr("id");
		var modul = "hapusnievaluasi";
		var dataString = 'idne=' + idne + '&modul=' + modul;
		var parent = $(this).parent();

		jConfirm('Apakah anda yakin akan menghapus nilai evaluasi ini?', 'Konfirmasi Penghapusan',
		function(r){
			if(r==true){
	$.ajax({
		type: "POST",
		url: "aksi_evaluasi.php",
		data: dataString,
		cache: false,
		success: function(){
			$('#trnievaluasi'+idne).slideUp('slow', function() {$(this).remove();});
			$('.window_isidata4').html('');
			$('.window_isidata4').load('load_evaluasi.php');
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
	$(".lihatsoaleva").click(function(){
         	var id = $(this).attr("id");
		Messi.load('aksi_evaluasi.php?modul=lihatsoaleva&id='+id, {title: 'Soal Evaluasi', width: '650px', buttons: [{id: 0, label: 'Tutup', val: 'X'}]});
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".editevaluasi").click(function(){
         	var id = $(this).attr("id");
         	$('#formediteva').show();
		$('#formtambahnieva').hide();
		$('#formtambaheva').hide();
		var modul = "editsoaleva";
		var dataString = 'id=' + id + '&modul=' + modul;
	$.ajax({
		type: "POST",
		url: "aksi_evaluasi.php",
		data: dataString,
		cache: false,
		success: function(data){
		        $("#idediteva").val('');
		        $("#idediteva").val(id);
			$("#topikedit").val('');
			$("#topikedit").val(data.split("@")[0]);
			nicEditors.findEditor('soalevaedit').setContent('');
			nicEditors.findEditor('soalevaedit').setContent(data.split("@")[1]);
			$("#jnsevaluasiedit").val('');
			$("#jnsevaluasiedit").val(data.split("@")[2]);
   			$("input:radio[name=aktifedit]:nth(1)").attr("checked",true);
		}
	});
		return false;
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".prosesevaluasiedit").click(function(){
		$(".prosesevaluasiedit").attr({"disabled" : "true", "value" : "Memproses..." });
		nicEditors.findEditor('soalevaedit').saveContent();
	$.ajax({
		type: "POST",
		url: "aksi_evaluasi.php",
		data: $("#editdataeva").serialize(),
		cache: false,
		success: function(data){
			var optedit = data;
			if(optedit = "Semua kolom data harus diisi"){
				$(".prosesevaluasiedit").removeAttr("disabled").attr("value", "Proses");
				$("#berhasilevaedit").fadeIn();
				$("#berhasilevaedit").html('');
   				$("#berhasilevaedit").html(data);
				$("#berhasilevaedit").fadeOut(3000);
			}else{
				$(".prosesevaluasiedit").removeAttr("disabled").attr("value", "Proses");
				$("#berhasilevaedit").fadeIn();
				$("#berhasilevaedit").html('');
   				$("#berhasilevaedit").html(data);
				$("#berhasilevaedit").fadeOut(3000);
				$("#idediteva").val('');
				$("#topikedit").val('');
				nicEditors.findEditor('soalevaedit').setContent('');
				$("#jnsevaluasiedit").val('');
   			}
			$('.window_isidata4').html('');
			$('.window_isidata4').load('load_evaluasi.php');
		}
	});
		return false;
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".tutupevaluasiedit").click(function(){
		$('#formediteva').hide();
		$("#topikedit").val('');
		nicEditors.findEditor('soalevaedit').setContent('');
		$("#jnsevaluasiedit").val('');
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".refevaluasi").click(function(){
		$('.window_isidata4').html('');
		$('.window_isidata4').load('load_evaluasi.php');
});
});
</script>
<script type='text/javascript'>
bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true}).panelInstance('soaleva');
 	new nicEditor({fullPanel : true}).panelInstance('soalevaedit');
});
</script>
    <div id="window_evaluasi" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="theme/images/icons/icon_16_evaluasi.png" />
            Evaluasi
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_evaluasi" class="window_close"></a>
          </span>
        </div>
        <div class="abs window_content">
          <div class="window_aside">
            <p align="center"><a href="#" class="tambahevaluasi">Tambah Data</a> | <a href="#" class="refevaluasi">Refresh Data</a>
	    <a href="#" class="tambahnilaievaluasi">Tambah Nilai</a></p><br />
            <p>Evaluasi berisi kumpulan soal-soal untuk menguji pencapaian siswa baik berupa soal latihan, soal PR, soal MID sampai soal Semester.
	    Dengan ini pula kita bisa memantau nilai-nilai siswa sehingga untuk perhitungan nilai akhir dapat terbantukan.</p>
          </div>
          <div class="window_main">
          <?php
          if ($_SESSION['leveluser']=='admin'){
		echo "<div id='formtambaheva' style='display:none;padding-bottom:20px;'><p style='padding-top:20px;'>
		<table style='margin-left:20px;'>
		<form id='inputdataeva' method='POST' action='aksi_evaluasi.php'>
		        <input type='hidden' name='modul' value='tambahevaluasi' />
		        <tr>
		                <td>Topik</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='topik' name='topik' class='log' style='width:250px;' placeholder='Isikan topik evaluasi' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Soal</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><textarea id='soaleva' name='soal' class='log' style='width: 550px; height: 150px;' placeholder='Isikan soal evaluasi'></textarea><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Jenis Evaluasi</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='jnsevaluasi' name='jnsevaluasi' class='log' placeholder='Isikan jenis evaluasi' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Aktif</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='radio' id='aktif' name='aktif' class='log' value='Y' checked />Ya
				<input type='radio' id='aktif' name='aktif' class='log' value='N' />Tidak<br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td colspan='3'>
					<input type='submit' name='submit' value='Proses' id='tbldesktop' class='prosesevaluasi'  />
					<input type='button' value='Tutup' id='tbldesktop' class='tutupevaluasi' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span id='berhasileva'></span>
				</td>
		        </tr>
		</form>
		</table>
		</p></div>
		<div id='formtambahnieva' style='display:none;padding-bottom:20px;'><p style='padding-top:20px;'>
                <table style='margin-left:20px;'>
		<form id='inputdatanieva' method='POST' action='aksi_evaluasi.php'>
		        <input type='hidden' name='modul' value='tambahnievaluasi' />
		        <tr>
		                <td>Nama Siswa</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='usernamenieva' name='username' class='log' style='width:250px;' placeholder='Isikan nama siswa' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Kelas</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='kelasnieva' name='kelas' class='log' placeholder='Isikan kelas' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Jenis Evaluasi</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='jnsnievaluasi' name='jnsnievaluasi' class='log' placeholder='Isikan jenis evaluasi' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Nilai</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='nilai' name='nilai' class='log' placeholder='Isikan nilai evaluasi' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td colspan='3'>
					<input type='submit' name='submit' value='Proses' id='tbldesktop' class='prosesnievaluasi'  />
					<input type='button' value='Tutup' id='tbldesktop' class='tutupnievaluasi' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span id='berhasilnieva'></span>
				</td>
		        </tr>
		</form>
		</table>
		</p></div>
		<div id='formediteva' style='display:none;padding-bottom:20px;'><p style='padding-top:20px;'>
		<table style='margin-left:20px;'>
		<form id='editdataeva' method='POST' action='aksi_evaluasi.php'>
		        <input type='hidden' id='idediteva' name='idediteva' />
		        <input type='hidden' name='modul' value='editevaluasi' />
		        <tr>
		                <td>Topik</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='topikedit' name='topikedit' class='log' style='width:250px;' placeholder='Isikan topik evaluasi' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Soal</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><textarea id='soalevaedit' name='soaledit' class='log' style='width: 550px; height: 150px;' placeholder='Isikan soal evaluasi'></textarea><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Jenis Evaluasi</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='text' id='jnsevaluasiedit' name='jnsevaluasiedit' class='log' placeholder='Isikan jenis evaluasi' /><br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td>Aktif</td>
		                <td>&nbsp;&nbsp;&nbsp;</td>
		                <td><input type='radio' id='aktifedit' name='aktifedit' class='log' value='Y' />Ya
				<input type='radio' id='aktifedit' name='aktifedit' class='log' value='N' />Tidak<br />&nbsp;</td>
		        </tr>
		        <tr>
		                <td colspan='3'>
					<input type='submit' name='submit' value='Proses' id='tbldesktop' class='prosesevaluasiedit'  />
					<input type='button' value='Tutup' id='tbldesktop' class='tutupevaluasiedit' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span id='berhasilevaedit'></span>
				</td>
		        </tr>
		</form>
		</table>
		</p></div>";
	    }else{
	        echo "<div id='formtambaheva2' style='display:none;padding-bottom:20px;'><p style='padding-top:20px;'></p></div>
		<div id='formtambahnieva2' style='display:none;padding-bottom:20px;'><p style='padding-top:20px;'></p></div>";
	    }
	    ?>
            <div class="window_isidata4">
            <?php
            if ($_SESSION['leveluser']=='admin'){
             echo "<table class='data'>
	      	  <thead><tr>
	      	  <th class='shrink'>&nbsp;</th>
                  <th>Topik</th>
                  <th>Soal</th>
                  <th>Jenis Evaluasi</th>
                  <th>Aktif</th>
                  <th>Tindakan</th>
              </tr></thead>
              <tbody>";
              $tampil7=mysql_query("SELECT * FROM evaluasi ORDER BY id_evaluasi DESC");
              while ($r7=mysql_fetch_array($tampil7)){
	      echo "<tr id='trevaluasi$r7[id_evaluasi]'>
                  <td><img src='theme/images/icons/icon_16_evaluasi.png' /></td>
                  <td>$r7[topik]</td>
                  <td><a href='#' id='$r7[id_evaluasi]' class='lihatsoaleva'>Lihat Soal</a></td>
                  <td>$r7[jns_evaluasi]</td>
                  <td>$r7[aktif]</td>
                  <td id='aksi$r7[id_evaluasi]'><a href='#' id='$r7[id_evaluasi]' class='editevaluasi'>Edit</a> | <a href='#' id='$r7[id_evaluasi]' class='hapusevaluasi'>Hapus</a></td>
              </tr>";
              }
	      echo "</tbody>
            </table><br />
            <table class='data'>
	      	  <thead><tr>
	      	  <th class='shrink'>&nbsp;</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Jenis Evaluasi</th>
                  <th>Nilai</th>
                  <th>Tindakan</th>
              </tr></thead>
              <tbody>";
              $tampil8=mysql_query("SELECT * FROM nilai_evaluasi WHERE kelas='XA' ORDER BY id_nilaievaluasi DESC");
              while ($r8=mysql_fetch_array($tampil8)){
              $carinama8=mysql_query("SELECT username,nama_lengkap FROM user WHERE username='$r8[username]'");
	      $rce=mysql_fetch_array($carinama8);
	      echo "<tr id='trnievaluasi$r8[id_nilaievaluasi]'>
                  <td><img src='theme/images/icons/icon_16_user.png' /></td>
                  <td>$rce[nama_lengkap]</td>
                  <td>$r8[kelas]</td>
                  <td>$r8[jns_evaluasi]</td>
                  <td id='nilai$r8[id_nilaievaluasi]'>$r8[nilai_evaluasi]</td>
                  <td id='nilaib$r8[id_nilaievaluasi]' style='display:none;'><input id='datane$r8[id_nilaievaluasi]' class='log' type='text' value='$r8[nilai_evaluasi]' /></td>
                  <td id='aksieva$r8[id_nilaievaluasi]'><a href='#' id='$r8[id_nilaievaluasi]' class='editnilaieva'>Edit</a> | <a href='#' id='$r8[id_nilaievaluasi]' class='hapusnilaieva'>Hapus</a></td>
                  <td id='aksievab$r8[id_nilaievaluasi]' style='display:none;'><a href='#' id='$r8[id_nilaievaluasi]' class='updatenilaieva'>Proses</a></td>
              </tr>";
              }
	      echo "</tbody>
            </table><br />
            <table class='data'>
              	  <thead><tr>
              	  <th class='shrink'>&nbsp;</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Jenis Evaluasi</th>
                  <th>Nilai</th>
                  <th>Tindakan</th>
              </tr></thead>
              <tbody>";
              $tampil9=mysql_query("SELECT * FROM nilai_evaluasi WHERE kelas='XB' ORDER BY id_nilaievaluasi DESC");
              while ($r9=mysql_fetch_array($tampil9)){
              $carinama9=mysql_query("SELECT username,nama_lengkap FROM user WHERE username='$r9[username]'");
	      $rce2=mysql_fetch_array($carinama9);
	      echo "<tr id='trnievaluasi$r9[id_nilaievaluasi]'>
                  <td><img src='theme/images/icons/icon_16_user.png' /></td>
                  <td>$rce2[nama_lengkap]</td>
                  <td>$r9[kelas]</td>
                  <td>$r9[jns_evaluasi]</td>
                  <td id='nilai$r9[id_nilaievaluasi]'>$r9[nilai_evaluasi]</td>
                  <td id='nilaib$r9[id_nilaievaluasi]' style='display:none;'><input id='datane$r9[id_nilaievaluasi]' class='log' type='text' value='$r9[nilai_evaluasi]' /></td>
                  <td id='aksieva$r9[id_nilaievaluasi]'><a href='#' id='$r9[id_nilaievaluasi]' class='editnilaieva'>Edit</a> | <a href='#' id='$r9[id_nilaievaluasi]' class='hapusnilaieva'>Hapus</a></td>
                  <td id='aksievab$r9[id_nilaievaluasi]' style='display:none;'><a href='#' id='$r9[id_nilaievaluasi]' class='updatenilaieva'>Proses</a></td>
              </tr>";
              }
	      echo "</tbody>
            </table>";
            }else{
            $tampil10=mysql_query("SELECT * FROM evaluasi WHERE aktif='Y'");
            $r10=mysql_fetch_array($tampil10);
            $isisoal2 = nl2br($r10[soal]);
              echo "<div id='formsoaleva' style='padding-left:20px;'><p style='padding-top:20px;'>$isisoal2</p></div>";
            }
          ?>
          </div>
          </div>
        </div>
        <div class="abs window_bottom">
          Manajemen Evaluasi
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
  </div>
<?php
}
?>
