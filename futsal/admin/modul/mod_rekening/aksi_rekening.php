<?php
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

if ($module=='rekening' AND $act=='hapus'){
  mysqli_query($db,"DELETE FROM rekening WHERE id_rekening='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

elseif ($module=='rekening' AND $act=='input'){
  mysqli_query($db,"INSERT INTO rekening(no_rekening, atas_namaa, nama_bankk) VALUES('$_POST[a]', '$_POST[b]', '$_POST[c]')");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='rekening' AND $act=='update'){
  mysqli_query($db,"UPDATE rekening SET no_rekening = '$_POST[no_rekening]',
                                   atas_namaa  = '$_POST[atas_namaa]', 
                                   nama_bankk  = '$_POST[nama_bankk]'
                             WHERE id_rekening = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}

?>
