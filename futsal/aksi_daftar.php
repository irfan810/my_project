<?php
session_start();
include "config/koneksi.php";

$username=($_POST[username]);
$password=($_POST[password]);
$nama_lengkap=($_POST[nama_lengkap]);
$alamat_lengkap=($_POST[alamat_lengkap]);
$email=($_POST[email]);
$no_telp=($_POST[no_telp]);
$pass=md5($password);

if (empty($username)){
  echo "Anda belum mengisikan USERNAME<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($password)){
  echo "Anda belum mengisikan PASSWORD<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($nama_lengkap)){
  echo "Anda belum mengisikan NAMA LENGKAP<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($alamat_lengkap)){
  echo "Anda belum mengisikan ALAMAT LENGKAP<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($email)){
  echo "Anda belum mengisikan EMAIL<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($no_telp)){
  echo "Anda belum mengisikan NO. TELP<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}else{

    $sql = mysqli_query($db,"INSERT INTO users(username,
                                 password,
                                 nama_lengkap,
                                 email, 
                                 no_telp,
								 alamat_lengkap) 
	                       VALUES('$username',
                                '$pass',
                                '$nama_lengkap',
                                '$email',
                                '$no_telp',
								'$alamat_lengkap')");
header('location:http://localhost/myfutsal/');
}
?>