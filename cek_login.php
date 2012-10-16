<?php
include "config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST[password]));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "0";
}
else{
$loginld=mysql_query("SELECT * FROM user WHERE username='$username' AND password='$pass' AND aktif='Y'");
$ketemu=mysql_num_rows($loginld);
$r=mysql_fetch_array($loginld);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();

  $_SESSION[namauser] = $r[username];
  $_SESSION[passuser] = $r[password];
  $_SESSION[kelasuser] = $r[kelas];
  $_SESSION[leveluser] = $r[level];

  echo "1";
}
else{
  echo "0";
}
}
?>
