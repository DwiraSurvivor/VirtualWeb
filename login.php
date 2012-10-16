<?php
session_start();
error_reporting(0);
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Virtual Web | Login</title>

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
<link rel="stylesheet" href="theme/css/login.css" type="text/css" media="screen, projection" />
<script language="javascript" type="text/javascript" src="theme/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="theme/js/jquery.backstretch.min.js"></script>

<script language="javascript">
$(document).ready(function(){
	$("#tbllogin").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();
		var dataString = "username=" + username + "&password=" + password;
	$.ajax({
		type: "POST",
		url: "cek_login.php",
		data: dataString,
		cache: false,
		success: function(data){
			if(data==0){
           			$("#pesan").html("<br />Maaf! Belum benar");
			}else{
           			$("#pesan").html("<br />Login Berhasil!");
			        setTimeout("location.href ='virtualweb'",1000);
			}
		}
	});
  	return false;
	});
});
</script>

</head>
<body>
<p style="margin-top: 200px;">&nbsp;</p>
<div class="login-form">
    <h1 style="text-align:center;">Virtual Web Login</h1>
    <form method="post" action="cek_login.php">
        <input id="username" type="text" name="username" placeholder="username">
        <input id="password" type="password" name="password" placeholder="password">
        <!--<span>
            <input type="checkbox" name="checkbox">
            <label for="checkbox">remember</label>
        </span>-->
        <input id="tbllogin" type="submit" value="log in">
    </form>
    <div id="pesan" style="color:#c3c3c3;"></div>
</div>
<script>
    $.backstretch("theme/images/loginwall.jpg");
</script>
<script>
$(document).ready(function() {
    $('body').addClass('js');
    $('.login-form span').addClass('checked').children('input').attr('checked', true);
    $('.login-form span').on('click', function() {
        if ($(this).children('input').attr('checked')) {
            $(this).children('input').attr('checked', false);
            $(this).removeClass('checked');
        }
        else {
            $(this).children('input').attr('checked', true);
            $(this).addClass('checked');
        }
    });
});
</script>
</body>
</html>
<?php
}else{
  header('location:virtualweb');
}
?>
