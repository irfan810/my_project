<?php
error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Update cara pembelian
if ($module=='statis' AND $act=='update'){
  mysqli_query($db,"UPDATE statis SET detail = '$_POST[isi]',
								judul = '$_POST[judul]'
                            WHERE halaman     = '$_POST[id]'");
  header('location:../../media.php?module='.$_POST[id]);
}
?>
