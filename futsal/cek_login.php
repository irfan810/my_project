<?php
error_reporting(0);
include "config/koneksi.php";
$pass=md5($_POST[password]);
$level=$_POST[level];
if ($level=='Admin')
{
$login=mysqli_query($db,"SELECT * FROM users
			WHERE username='$_POST[id_user]' AND password='$pass' AND level='$level'");
$cocok=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

if ($cocok > 0){
	session_start();
	$_SESSION[namauser]     = $r[username];
  	$_SESSION[namalengkap]  = $r[nama_lengkap];
  	$_SESSION[passuser]     = $r[password];
  	$_SESSION[leveluser]    = $r[level];

	header('location:admin/media.php?module=home');
	}
else {
echo "<script>window.alert('Username atau Password anda salah.');
        window.location=('http://localhost/myfutsal/')</script>";
}
}

elseif ($level=='members'){
$login=mysqli_query($db,"SELECT * FROM users
			WHERE username='$_POST[id_user]' AND password='$pass' AND level='$level'");
$cocok=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

	if ($cocok > 0){
		session_start();
		$_SESSION[namauser]     = $r[username];
		$_SESSION[passuser]     = $r[password];
	  	$_SESSION[namalengkap]  = $r[nama_lengkap];
		$_SESSION[email]    	= $r[email];
		$_SESSION[telp]    		= $r[no_telp];
		$_SESSION[alamat]    	= $r[alamat_lengkap];
	  	$_SESSION[leveluser]    = $r[level];

		header('location:http://localhost/myfutsal/');
	}else {
		echo "<script>window.alert('Username atau Password anda salah.');
		        window.location=('http://localhost/myfutsal/')</script>";
	}
}

?>
