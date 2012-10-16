<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Virtual Web | Booting</title>

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
<link rel="stylesheet" href="theme/css/screen.css" type="text/css" media="screen, projection">
<!--[if lt IE 8]>
  <link rel="stylesheet" href="theme/css/ie.css" type="text/css" media="screen, projection">
<![endif]-->
<link rel="stylesheet" href="theme/css/booting.css" type="text/css" media="screen, projection" />
<script language="javascript" type="text/javascript" src="theme/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="theme/js/jquery.typist.js"></script>

<script language="javascript">
$(document).ready(function(){
    	setTimeout("location.href ='selamatdatang'",20000);
});
</script>

<script language="javascript">
$(document).ready(function(){
$('#terminal').typist({
  height: 180
});

$('#terminal').typist('prompt')
      .typist('type','Instalasi Virtual Web')
      .typist('echo','$_Dibuat oleh Jenuar Dalapang')
      .typist('wait',2000)
      .typist('speed','fast')
      .typist('echo','$_Mempersiapkan dan memasang modul pada perangkat.....')
      .typist('wait',2000)
      .typist('speed','normal')
      .typist('echo','$_Instalasi modul absensi berhasil')
      .typist('echo','$_Instalasi modul kbm berhasil')
      .typist('echo','$_Instalasi modul kuis berhasil')
      .typist('echo','$_Instalasi modul evaluasi berhasil')
      .typist('echo','$_Instalasi selesai dan Virtual Web siap dijalankan')
      .typist('echo','');
});
</script>
</head>
<body>
	<p id="terminal"></p>
	<p style="margin-top: 120px;">&nbsp;</p>
	<div class="ball"></div>
	<div class="ball1"></div>
	<div class="logo"><b>Virtual Web<b></div>
	<div class="logo2">&copy; 2012</div>
</body>
</html>
