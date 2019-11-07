<?php
session_start();
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];


if ($module=='jam' AND $act=='hapus'){
  mysqli_query($db,"DELETE FROM jam WHERE id_jam='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

elseif ($module=='jam' AND $act=='input'){
  mysqli_query($db,"INSERT INTO jam VALUES('$_POST[jam_mulai]', 
                                      '$_POST[jam_selesai]')");
  header('location:../../media.php?module='.$module);
}

elseif ($module=='jam' AND $act=='update'){
  mysqli_query($db,"UPDATE jam SET jam_mulai   = '$_POST[jam_mulai]',
                              jam_selesai = '$_POST[jam_selesai]'
                        WHERE id_jam = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
