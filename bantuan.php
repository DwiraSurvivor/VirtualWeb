<?php
session_start();
error_reporting(0);
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  header('location:selamatdatang');
}
else{
?>
    <div id="window_bantuan" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="theme/images/icons/icon_16_bantuan.png" />
            Bantuan
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_bantuan" class="window_close"></a>
          </span>
        </div>
        <div class="abs window_content">
          <div class="window_aside">
            <p align="center">Bantuan Virtual Web</p>
          </div>
          <div class="window_main">
		<div id="tentangvw" style="padding:10px;">
		        <p align="justify"><b>Bantuan Virtual Web</b> : <br />
			<ul style="margin-left:20px;">
			        <li>1. <b>Absensi</b> : berisi rekap kehadiran dan konfirmasi kehadiran hari ini.</li>
			        <li>2. <b>KBM</b> : berisi kegiatan belajar mengajar hari ini :
					<ul style="margin-left:40px;">
					        <li>a. Pembelajaran lewat module .pdf atau .txt.</li>
					        <li>b. Pembelajaran langsung lewat coding dan demo coding.</li>
					        <li>c. Pembelajaran menggunakan mp3 atau video.</li>
					</ul>
				</li>
			        <li>3. <b>Kuis</b> : berisi kuis yang harus dikerjakan berdasarkan waktu untuk menguji pemahaman siswa tentang materi
				yang diajarkan.</li>
				<li>4. <b>Evaluasi</b> : Berisi soal-soal latihan, PR, MID, dan semester yang akan ditampilkan sesuai waktu yang telah
				ditetapkan dalam Silabus ataupun RPP.</li>
			</ul>
			</p>
		</div>
          </div>
        </div>
        <div class="abs window_bottom">
          Virtual Web &copy; 2012
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
<?php
}
?>
