<?php
session_start();
error_reporting(0);
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  header('location:selamatdatang');
}
else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Virtual Web</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta name="description" content="Virtual Web">
<meta name="keywords" content="Virtual Web">
<meta http-equiv="Copyright" content="Cyber Clone">
<meta name="author" content="Jenuar Dalapang">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">

<link rel="shortcut icon" href="theme/images/favicon.png" />
<link rel="stylesheet" href="theme/css/reset.css" type="text/css" media="screen, projection">
<!--[if lt IE 8]>
  <link rel="stylesheet" href="theme/css/ie.css" type="text/css" media="screen, projection">
<![endif]-->
<link rel="stylesheet" href="theme/css/desktop.css" type="text/css" media="screen, projection" />
<script language="javascript" type="text/javascript" src="theme/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="theme/js/jquery.ui.js"></script>
<script language="javascript" type="text/javascript" src="theme/js/jquery.desktop.js"></script>
<script language="javascript" type="text/javascript" src="theme/js/jquery.backstretch.min.js"></script>
<script language="javascript" type="text/javascript" src="theme/js/messi.min.js"></script>
<script language="javascript" type="text/javascript" src="nicEdit/nicEdit.js"></script>
<script language="javascript" type="text/javascript" src="theme/js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="theme/js/jquery.uploadify.min.js"></script>
</head>
<body>
<div class="abs" id="wrapper">
  <div class="abs" id="desktop">
    <a class="abs icon" style="left:20px;top:20px;" href="#icon_dock_absensi">
      <img src="theme/images/icons/icon_32_absensi.png" />
      Absensi
    </a>
    <a class="abs icon" style="left:20px;top:100px;" href="#icon_dock_kbm">
      <img src="theme/images/icons/icon_32_kbm.png" />
      KBM
    </a>
    <a class="abs icon" style="left:20px;top:180px;" href="#icon_dock_kuis">
      <img src="theme/images/icons/icon_32_kuis.png" />
      Kuis
    </a>
    <a class="abs icon" style="left:20px;top:260px;" href="#icon_dock_evaluasi">
      <img src="theme/images/icons/icon_32_evaluasi.png" />
      Evaluasi
    </a>
    <?php
    if ($_SESSION['leveluser']=='admin'){
    ?>
    <a class="abs icon" style="left:20px;top:340px;" href="#icon_dock_user">
      <img src="theme/images/icons/icon_32_user.png" />
      User
    </a>
    <?php
    }else{
    }
    ?>

    <?php
	include "absensi.php";
	include "kbm.php";
	include "kuis.php";
	include "evaluasi.php";
    	if ($_SESSION['leveluser']=='admin'){
        include "user.php";
    	}else{
    	}
	include "bantuan.php";
	include "tentang.php";
    ?>


  <div class="abs" id="bar_top">
    <span class="float_right" id="clock"></span>
    <ul>
      <li>
        <a class="menu_trigger" href="#"><i>Virtual Web : Konsep Belajar Web Di Dalam Web</i></a>
      <li>
        <a class="menu_trigger" href="#">Pilihan Tambahan</a>
        <ul class="menu">
          <li>
            <a class="menuatas" href="#icon_dock_bantuan">Bantuan Virtual Web</a>
          </li>
          <li>
            <a class="menuatas" href="#icon_dock_tentang">Tentang Virtual Web</a>
          </li>
          <li>
            <a href="keluar">Keluar Dari Virtual Web</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
  
  
  <div class="abs" id="bar_bottom">
    <a class="float_left" href="#" id="show_desktop" title="Show Desktop">
      <img src="theme/images/icons/icon_22_desktop.png" />
    </a>
    <ul id="dock">
      <li id="icon_dock_absensi">
        <a href="#window_absensi">
          <img src="theme/images/icons/icon_22_absensi.png" />
          Absensi
        </a>
      </li>
      <li id="icon_dock_kbm">
        <a href="#window_kbm">
          <img src="theme/images/icons/icon_22_kbm.png" />
          KBM
        </a>
      </li>
      <li id="icon_dock_kuis">
        <a href="#window_kuis">
          <img src="theme/images/icons/icon_22_kuis.png" />
          Kuis
        </a>
      </li>
      <li id="icon_dock_evaluasi">
        <a href="#window_evaluasi">
          <img src="theme/images/icons/icon_22_evaluasi.png" />
          Evaluasi
        </a>
      </li>
    <?php
    if ($_SESSION['leveluser']=='admin'){
    ?>
      <li id="icon_dock_user">
        <a href="#window_user">
          <img src="theme/images/icons/icon_22_user.png" />
          User
        </a>
      </li>
    <?php
    }else{
    }
    ?>
      <li id="icon_dock_bantuan">
        <a href="#window_bantuan">
          <img src="theme/images/icons/icon_22_bantuan.png" />
          Bantuan
        </a>
      </li>
      <li id="icon_dock_tentang">
        <a href="#window_tentang">
          <img src="theme/images/icons/icon_22_tentang.png" />
          Tentang
        </a>
      </li>
    </ul>
    <a class="float_right" href="#">
      <img src="theme/images/misc/virtualweb.png" />
    </a>
  </div>
</div>


<script>
	$.backstretch([
      		"theme/images/utamawall.jpg"
    		, "theme/images/utamawall2.jpg"
    		, "theme/images/utamawall3.jpg"
    		, "theme/images/utamawall4.jpg"
    		, "theme/images/utamawall5.jpg"
    		, "theme/images/utamawall6.jpg"
    		, "theme/images/utamawall7.jpg"
    		, "theme/images/utamawall8.jpg"
  	], {duration: 10000, fade: 750});
</script>
</body>
</html>
<?php
}
?>
