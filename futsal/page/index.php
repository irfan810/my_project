<?php
session_start();
error_reporting(0);
include "config/fungsi_rupiah.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Aplikasi Sistem Informasi Futsal ::.</title>
<link href="page/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="page/js/dropdown.js"></script>
<script type="text/javascript" src="page/js/highslide-with-html.js"></script>
<script type="text/javascript" src="page/js/slideshow.js"></script>
<script type="text/javascript" src="page/js/utilities.js"></script>
</head>
<body>

<div id="container_wrapper">
<div id="container">	
  <div id="header">
      <div id="inner_header">
			<a href='admin.php'><img src='page/images/header.jpg'></a>
      </div>
  </div>
<div id="top"> 
	<span class="cpojer-links"> 
		<a href="http://localhost/myfutsal/">Home</a> 
		<a href="lihat-detail-1.html">Lapangan</a> 
		<a href="pemesanan.html">Cara Pemesanan</a>
		<a href="jadwal.html">Jadwal</a>
		<a href="hubungi-kami.html">Hubungi Kami</a> 
		
	</span>
</div>
<table style='width:100%; padding-bottom:20px;'><tr></tr></table>

		<div id="left_column">
			<div class="text_area" align="justify">	
			<?php include "data.php"; ?>
			</div>
		</div>

    	<div id="right_column">
			<?php include "sidebar_kiri.php"; ?>
		</div>

	<div style='color:#fff;' id="footer">
	Copyright (c) 2017 - Sistem Informasi Aplikasi Futsal
    </div>
        
</div>
<div class="spacer"></div>
</div>
</body>
</html>