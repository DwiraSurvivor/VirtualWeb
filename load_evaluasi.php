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
<?php
}
?>
