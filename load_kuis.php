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
	$(".edittopik").click(function(){
	        var id = $(this).attr("id");
		$('#dataet'+id).hide();
		$('#dataetb'+id).show();
		$('#aktift'+id).hide();
		$('#aktiftb'+id).show();
		$('#aksit'+id).hide();
		$('#aksitb'+id).show();
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".updatetopik").click(function(){
		var idet = $(this).attr("id");
		var dataet = $('#datatopik'+idet).val();
		var dataet2 = $('#dataaktif'+idet).val();
		var modul = "edittopik";
		var dataString = 'idet=' + idet + '&modul=' + modul + '&dataet=' + dataet + '&dataet2=' + dataet2;
		var parent = $(this).parent();
	$.ajax({
		type: "POST",
		url: "aksi_kuis.php",
		data: dataString,
		cache: false,
		success: function(html){
			$('.window_isidata3').html('');
			$('.window_isidata3').load('load_kuis.php');
		}
	});
		return false;
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".hapustopik").click(function(){

		var id = $(this).attr("id");
		var modul = "hapustopik";
		var dataString = 'id=' + id + '&modul=' + modul;
		var parent = $(this).parent();

		jConfirm('Apakah anda yakin akan menghapus topik ini?', 'Konfirmasi Penghapusan',
		function(r){
			if(r==true){
	$.ajax({
		type: "POST",
		url: "aksi_kuis.php",
		data: dataString,
		cache: false,
		success: function(){
			$('#trtopikkuis'+id).slideUp('slow', function() {$(this).remove();});
			$('.window_isidata3').html('');
			$('.window_isidata3').load('load_kuis.php');
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
	$(".lihatsoalkuis").click(function(){
         	var id = $(this).attr("id");
		Messi.load('aksi_kuis.php?modul=lihatsoalkuis&idlk='+id, {title: 'Soal Kuis', width: '650px', buttons: [{id: 0, label: 'Tutup', val: 'X'}]});
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".editkuis").click(function(){
         	var id = $(this).attr("id");
		$('#formtambahtopik').hide();
		$('#formtambahkuis').hide();
		$('#formeditkuis').show();
		var modul = "editsoalkuis";
		var dataString = 'id=' + id + '&modul=' + modul;
	$.ajax({
		type: "POST",
		url: "aksi_kuis.php",
		data: dataString,
		cache: false,
		success: function(data){
		        $("#ideditkuis").val('');
		        $("#ideditkuis").val(id);
			$("#epertanyaan").val('');
			$("#epertanyaan").val(data.split("@")[0]);
			$("#epilihana").val('');
			$("#epilihana").val(data.split("@")[1]);
			$("#epilihanb").val('');
			$("#epilihanb").val(data.split("@")[2]);
			$("#epilihanc").val('');
			$("#epilihanc").val(data.split("@")[3]);
			$("#epilihand").val('');
			$("#epilihand").val(data.split("@")[4]);
			$("#ejawaban").val('');
			$("#ejawaban").val(data.split("@")[5]);
		}
	});
		return false;
});
});
</script>
<script language="javascript">
$(document).ready( function() {
	$(".hapuskuis").click(function(){

		var idk = $(this).attr("id");
		var modul = "hapuskuis";
		var dataString = 'idk=' + idk + '&modul=' + modul;
		var parent = $(this).parent();

		jConfirm('Apakah anda yakin akan menghapus soal kuis ini?', 'Konfirmasi Penghapusan',
		function(r){
			if(r==true){
	$.ajax({
		type: "POST",
		url: "aksi_kuis.php",
		data: dataString,
		cache: false,
		success: function(){
			$('#trkuis'+idk).slideUp('slow', function() {$(this).remove();});
			$('.window_isidata3').html('');
			$('.window_isidata3').load('load_kuis.php');
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
	$(".hapusnilaikuis").click(function(){

		var idnk = $(this).attr("id");
		var modul = "hapusnikuis";
		var dataString = 'idnk=' + idnk + '&modul=' + modul;
		var parent = $(this).parent();

		jConfirm('Apakah anda yakin akan menghapus nilai kuis ini?', 'Konfirmasi Penghapusan',
		function(r){
			if(r==true){
	$.ajax({
		type: "POST",
		url: "aksi_kuis.php",
		data: dataString,
		cache: false,
		success: function(){
			$('#trnikuis'+idnk).slideUp('slow', function() {$(this).remove();});
			$('.window_isidata3').html('');
			$('.window_isidata3').load('load_kuis.php');
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
                  <th>Topik</th>
                  <th>Aktif</th>
                  <th>Tindakan</th>
              </tr></thead>
              <tbody>";
              $tampil3=mysql_query("SELECT * FROM topik_kuis ORDER BY id_topik DESC");
              while ($r3=mysql_fetch_array($tampil3)){
	      echo "<tr id='trtopikkuis$r3[id_topik]'>
                  <td><img src='theme/images/icons/icon_16_topik.png' /></td>
                  <td id='dataet$r3[id_topik]'>$r3[topik]</td>
                  <td id='dataetb$r3[id_topik]' style='display:none;'><input id='datatopik$r3[id_topik]' class='log' type='text' value='$r3[topik]' /></td>
                  <td id='aktift$r3[id_topik]'>$r3[aktif]</td>
                  <td id='aktiftb$r3[id_topik]' style='display:none;'><input id='dataaktif$r3[id_topik]' class='log' type='text' value='$r3[aktif]' /></td>
                  <td id='aksit$r3[id_topik]'><a href='#' id='$r3[id_topik]' class='edittopik'>Edit</a> | <a href='#' id='$r3[id_topik]' class='hapustopik'>Hapus</a></td>
                  <td id='aksitb$r3[id_topik]' style='display:none;'><a href='#' id='$r3[id_topik]' class='updatetopik'>Proses</a></td>
              </tr>";
              }
	      echo "</tbody>
            </table><br />
            <table class='data'>
	      	  <thead><tr>
                  <th class='shrink'>&nbsp;</th>
                  <th>Topik</th>
                  <th>Soal</th>
                  <th>Jawaban</th>
                  <th>Tindakan</th>
              </tr></thead>
              <tbody>";
              $tampil4=mysql_query("SELECT * FROM kuis ORDER BY id_kuis DESC");
              while ($r4=mysql_fetch_array($tampil4)){
	      echo "<tr id='trkuis$r4[id_kuis]'>
                  <td><img src='theme/images/icons/icon_16_page.png' /></td>
                  <td>$r4[topik]</td>
                  <td><a href='#' id='$r4[id_kuis]' class='lihatsoalkuis'>Lihat Soal</a></td>
                  <td>$r4[jawaban]</td>
                  <td><a href='#' id='$r4[id_kuis]' class='editkuis'>Edit</a> | <a href='#' id='$r4[id_kuis]' class='hapuskuis'>Hapus</a></td>
              </tr>";
              }
	      echo "</tbody>
            </table><br />
            <table class='data'>
	      	  <thead><tr>
	      	  <th class='shrink'>&nbsp;</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Topik</th>
                  <th>Nilai</th>
                  <th>Tindakan</th>
              </tr></thead>
              <tbody>";
              $tampil5=mysql_query("SELECT * FROM nilai_kuis WHERE kelas='XA' ORDER BY id_nilaikuis DESC");
              while ($r5=mysql_fetch_array($tampil5)){
              $carinama5=mysql_query("SELECT username,nama_lengkap FROM user WHERE username='$r5[username]'");
	      $rcnk=mysql_fetch_array($carinama5);
	      echo "<tr id='trnikuis$r5[id_nilaikuis]'>
                  <td><img src='theme/images/icons/icon_16_user.png' /></td>
                  <td>$rcnk[nama_lengkap]</td>
                  <td>$r5[kelas]</td>
                  <td>$r5[topik]</td>
                  <td>$r5[nilai_kuis]</td>
                  <td><a href='#' id='$r5[id_nilaikuis]' class='hapusnilaikuis'>Hapus Nilai</a></td>
              </tr>";
              }
	      echo "</tbody>
            </table><br />
            <table class='data'>
              	  <thead><tr>
              	  <th class='shrink'>&nbsp;</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Topik</th>
                  <th>Nilai</th>
                  <th>Tindakan</th>
              </tr></thead>
              <tbody>";
              $tampil6=mysql_query("SELECT * FROM nilai_kuis WHERE kelas='XB' ORDER BY id_nilaikuis DESC");
              while ($r6=mysql_fetch_array($tampil6)){
              $carinama6=mysql_query("SELECT username,nama_lengkap FROM user WHERE username='$r6[username]'");
	      $rcnk2=mysql_fetch_array($carinama6);
	      echo "<tr id='trnikuis$r6[id_nilaikuis]'>
                  <td><img src='theme/images/icons/icon_16_user.png' /></td>
                  <td>$rcnk2[nama_lengkap]</td>
                  <td>$r6[kelas]</td>
                  <td>$r6[topik]</td>
                  <td>$r6[nilai_kuis]</td>
                  <td><a href='#' id='$r6[id_nilaikuis]' class='hapusnilaikuis'>Hapus Nilai</a></td>
              </tr>";
              }
	      echo "</tbody>
            </table>";
            }else{
                echo "<div id='isisoal_kuis' style='padding-left:20px;padding-bottom:20px;'><p style='padding-top:20px;'>";
		$cariskuis=mysql_query("SELECT * FROM topik_kuis WHERE aktif='Y'");
              	$csk=mysql_num_rows($cariskuis);
              	$cskk=mysql_fetch_array($cariskuis);
		$cariskuis2=mysql_query("SELECT * FROM nilai_kuis WHERE username='$_SESSION[namauser]' AND topik='$cskk[topik]'");
              	$csk2=mysql_num_rows($cariskuis2);
              	if ($csk > 0){
              	        if ($csk2 > 0){
	        		echo "Anda Telah Mengikuti Kuis Saat Ini.....";
			}else{
			        include "soal_kuis.php";
			}
		}else{
		        echo "Tidak Ada Kuis Saat Ini.....";
		}
		echo "</p></div>";
            }
          ?>
<?php
}
?>
