<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_indotgl.php";

$module=$_GET[module];
$act=$_GET[act];
$tanggal = tgl_pesan($_POST[tanggal]);

if ($module=='lapangan' AND $act=='hapus'){
  mysqli_query($db,"DELETE FROM lapangan WHERE id_lapangan='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

elseif ($module=='lapangan' AND $act=='input'){
  mysqli_query($db,"INSERT INTO lapangan VALUES('$_POST[id]','$_POST[judul]','$_POST[detail]','$_POST[gambar]','$_POST[harga_lapangan]')");
  header('location:../../media.php?module='.$module);
}

// Update lapangan
elseif ($module=='lapangan' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
	
  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($db,"UPDATE lapangan SET judul          = '$_POST[judul]',
                                     detail         = '$_POST[detail]',
                                     harga_lapangan = '$_POST[harga_lapangan]'
                               WHERE id_lapangan    = '$_POST[id]'");
							 
  header('location:../../media.php?module='.$module);
  }
  else{
    $data_gambar = mysqli_query($db,"SELECT gambar FROM lapangan WHERE id_lapangan='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../lapangan/'.$r['gambar']);
	@unlink('../../../lapangan/'.'small_'.$r['gambar']);
    UploadImage($nama_file_unik ,'../../../lapangan/');
	
    mysqli_query($db,"UPDATE lapangan SET judul          = '$_POST[judul]',
                                     detail         = '$_POST[detail]',
                                     harga_lapangan = '$_POST[harga_lapangan]',
                                     gambar         = '$nama_file_unik'
                               WHERE id_lapangan    = '$_POST[id]'");
	
    header('location:../../media.php?module='.$module);
    }
  }

?>