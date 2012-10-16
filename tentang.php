<?php
session_start();
error_reporting(0);
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  header('location:selamatdatang');
}
else{
?>
    <div id="window_tentang" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="theme/images/icons/icon_16_tentang.png" />
            Tentang
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_tentang" class="window_close"></a>
          </span>
        </div>
        <div class="abs window_content">
          <div class="window_aside">
            <p align="center">Tentang Virtual Web
            <img src="theme/images/misc/tentang.jpg" /></p>
          </div>
          <div class="window_main">
		<div id="tentangvw" style="padding:10px;">
		        <p align="justify"><b>Virtual Web</b> : Merupakan media pembelajaran yang diperuntukan dalam mata pelajaran Mengelola Isi Halaman Web.
			Dengan mengusung konsep "Belajar Web Di Dalam Web", saya optimis siswa akan semakin tertarik untuk belajar web
			dan pastinya nilai yang siswa peroleh akan meningkat seiring minat belajar yang ikut naik.</p><br />
			<p align="justify">Dengan menggunakan Virtual Web, guru dapat mengontrol proses belajar-mengajar yang berlangsung. Guru juga akan
			dipermudah dalam hal memanajemen kelas karena guru dapat dengan mudah mengontrol absensi siswa, manajemen nilai dan
			melihat perkembangan siswa hari ke hari.</p><br />
			<p align="justify">Untuk kedepannya Virtual Web akan dikembangkan juga untuk mata pelajaran lain yang tentunya cara belajarnya
			melalui web. Menyikapi hal di atas maka saya meluncurkan Virtual Web sebagai proyek Open Source yang bisa dikembangkan siapa saja.</p><br />
			<p align="justify"><b>Terima Kasih</b> : <br />
			1. Tuhan Yesus Kristus sebagai Juru Selamat kita<br />
			2. Orangtua yang selalu ada disetiap langkah saya<br />
			3. Kakak saya Noprid R. Dalapang dan Adik saya Surya T. P. Dalapang<br />
			4. Universitas Negeri Manado sebagai almamater saya<br />
			5. Dosen-dosen yang selalu mengajar dan membantu saya<br />
			6. Teman-teman seperjuangan saya di Cyber Clone, MOSC dan PTIK<br /><br />
			Salam saya,<br /><b>Jenuar Dwi Putra Dalapang</b></p>
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
