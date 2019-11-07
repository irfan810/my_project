<?php
session_start();
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];


// Update status order
if ($module=='order' AND $act=='hapus'){
  mysqli_query($db,"DELETE FROM laporan WHERE id_orders='$_GET[id]'");
  mysqli_query($db,"DELETE FROM konfirmasi WHERE id_orders='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
?>
