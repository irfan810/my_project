<?php
if ($_GET[module]=='home'){
  $sql=mysql_query("SELECT * FROM statis WHERE halaman='home'");
  $r=mysql_fetch_array($sql);
    echo "<div class='post_title'>$r[judul]</div>
		  <img src='lapangan/77lapangan-matras.jpg' width='600'>
          <div class='text_area'>".nl2br($r[detail])."</div>";      
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='gantipassword'){
	if (isset($_POST[pass])){
		$e=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='$_SESSION[namauser]'"));

		$lama = md5($_POST[a]);
		if ($lama != $e[password]){
			echo "<script>window.alert('Maaf, Inputan Password Lama anda Salah.');
        			window.location=('ganti-password.html')</script>";
		}elseif ($_POST[b] != $_POST[c]){
			echo "<script>window.alert('Maaf, Password Baru dan Konf Password Tidak Sama.');
        			window.location=('ganti-password.html')</script>";
		}else{
			$passwords = md5($_POST[b]);
			mysql_query("UPDATE users SET password='$passwords' where username = '$_SESSION[namauser]'");
			echo "<script>window.alert('Sukses, Ganti Password...');
        			window.location=('ganti-password.html')</script>";
		}

	}
	    echo "<div class='post_title'><b>Edit User.</b></div><br/>
			 <div class='h_line'></div>
	          <form  style='margin-bottom:30%' method=POST action=''>
	          <table width='100%'>
	          <tr><td>Password Lama</td>     <td> : <input type=text name='a'> *) </td></tr>
			  <tr><td>Password Baru</td>     <td> : <input type=text name='b'> *) </td></tr>
			  <tr><td>Konf. Password</td>     <td> : <input type=text name='c'> *) </td></tr>
	          <tr><td colspan=2><br><br><input type=submit value='Ganti Password' name='pass'>
	                            <input type=button value=Batal onclick=self.history.back()></td></tr>
	          </table></form>";  
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Modul daftar Customer
elseif ($_GET[module]=='daftar'){
echo "<div class='post_title'><b>Form Registrasi Members.</b></div>
			 <div class='h_line'></div>

		  <p>Silahkan Mengisi Formulir pendaftaran Berikut dengan data yang sebenarnya karena data-data yang anda isikan akan berguna unutk melakukan proses pemesanan Lapangan Futsal. Terima kasih,..</p>
          <form method=POST name='formku' onSubmit='return valid()' action='aksi_daftar.php'>
          <table style='border:none;' width='100%'><br/>
          <tr><td>Username</td>     	<td>&nbsp;<input type=text name='username' size=25 class='input'></td></tr>
          <tr><td>Password</td>     	<td>&nbsp;<input type='password' name='password' size=25 class='input'></td></tr>
          <tr><td>Nama Lengkap</td> 	<td>&nbsp;<input type=text name='nama_lengkap' size=55 class='input'></td></tr>  
		  <tr><td>E-mail</td>       	<td>&nbsp;<input type=text name='email' size=55 class='input'></td></tr>
          <tr><td>No.Telp/HP</td>   	<td>&nbsp;<input type=text name='no_telp' size=35 class='input'></td></tr>
          <tr><td>Alamat Lengkap</td> 	<td>&nbsp;<textarea name='alamat_lengkap' style='width: 93%; height: 70px;' class='input'></textarea></td></tr> 

          <tr><td></td><td><input type=submit value='Mendaftar' class='button'>
          <input type=button value=Batal onclick=self.history.back() class='button'><br/><br/><br/></td>
          </table></pad></form><br/>";
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='kelolaprofile'){
	if (isset($_POST[update])){
		    mysql_query("UPDATE users SET nama_lengkap   = '$_POST[nama_lengkap]',
		                                  email          = '$_POST[email]',
		                                  no_telp        = '$_POST[no_telp]',  
		                                  alamat_lengkap = '$_POST[alamat_lengkap]'
		                           WHERE  username       = '$_POST[id]'");

		  echo "<script>window.alert('Sukses Update Data Profile.');
        			window.location=('kelola-profile.html')</script>";
	}

    $edit=mysql_query("SELECT * FROM users WHERE username='$_SESSION[namauser]'");
    $r=mysql_fetch_array($edit);
    echo "<div class='post_title'><b>Edit Data Anda</b></div><br/>
		 <div class='h_line'></div>
          <form style='margin-bottom:20%' method=POST action=''>
          <input type=hidden name=id value='$r[username]'>
          <table width='100%'>
          <tr><td width='120px'>Username</td>     
		  <td><input type=text name='username' value='$r[username]' disabled> **)</td></tr>
          <tr><td>Nama Lengkap</td> 
		  <td> <input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'></td></tr>
          <tr><td>E-mail</td>       
		  <td> <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td>No.Telp/HP</td>   
		  <td> <input type=text name='no_telp' size=30 value='$r[no_telp]'></td></tr>
          <tr><td width='100px;'>Alamat Lengkap</td>
		  <td> <textarea name='alamat_lengkap' style='width: 450px; height: 70px;'>$r[alamat_lengkap]</textarea></td></tr>
          <tr><td></td>
		  <td><input type=submit value=Update class='button' name='update'>
                            <input type=button value=Batal class='button' onclick=self.history.back()></td></tr>
          </table></form>";  
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='home'){
  $sql=mysql_query("SELECT * FROM statis WHERE halaman='home'");
  $r=mysql_fetch_array($sql);
    echo "<div class='post_title'>$r[judul]</div>
          <div class='text_area'>".nl2br($r[detail])."</div>";      
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='pesanan'){
  $sql=mysql_query("SELECT * FROM statis WHERE halaman='pesanan'");
  $r=mysql_fetch_array($sql);
    echo "<div class='post_title'>$r[judul]</div>
          <div class='text_area'>".nl2br($r[detail])."</div>";      
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='jadwal'){
    echo "<div class='post_title'><b>Jadwal Penyewaan Lapangan Futsal</b> </div><br/>
		 <div class='h_line'></div>
          <table style='margin-bottom:20px' cellpadding=6 width=100%>
          <tr style='color:#fff; height:38px;' bgcolor=#1d5103>
		  <th>No.</th>
		  <th>Jam</th>
		  <th>Durasi</th>
		  <th>Tanggal</th>
		  <th>Status</th>";


    $tampil = mysql_query("SELECT * FROM laporan,lapangan WHERE lapangan.id_lapangan=laporan.id_lapangan 
						   ORDER BY id_orders DESC LIMIT 15");
  $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
	
		$tgl = tgl_indo($r[tanggal]);
	    $jam_mulai = $r[jam_mulai];
        $jam_selesai = $r[jam_selesai];
        $durasi = $jam_selesai - $jam_mulai;
		
	
	  if(($no % 1)==0){
		$warna="#267000";
	  }else{
		$warna="#E1E1E1";
	  }
      echo "<tr bgcolor=$warna>
                <td>$no</td>
                <td>$r[jam_mulai] s/d $r[jam_selesai] WIB</td>
				<td>$durasi/jam</td>
				<td>$tgl</td>
                <td class='button'>$r[status_pesanan]</td>
				</tr>";
      $no++;
    }

    echo "</table>";
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='sewa'){
echo "<div class='post_title'><b>Daftar Lapangan Futsal</b></div><br/>";
  $col = 2;
  $p      = new Paging;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas);
$query = mysql_query("SELECT * FROM lapangan ORDER BY id_lapangan DESC LIMIT $posisi,$batas");
$ada = mysql_num_rows($query);
if ($ada > 0) {
	  echo "<table><tr>";
	  $cnt = 0;
  while ($r=mysql_fetch_array($query)){
  		if ($cnt >= $col) {
		  echo "</tr><tr>";
		  $cnt = 0;
		}
		$cnt++;
	echo "<center><td align=center valign=top><span style='color:white'>$r[judul]</span><br/>
					<img src='lapangan/$r[gambar]' width='294' height='140'>";
							echo "<input style='width:100px;' type=button value='Lihat Detail' onclick=\"window.location.href='lihat-detail-$r[id_lapangan].html';\"><hr>
			</td></center>";
}
	  echo "</tr></table>";
	  
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM lapangan"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<br/>Halaman : $linkHalaman<br />";	  
}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


elseif ($_GET[module]=='detaillapangan'){

$query = mysql_query("SELECT * FROM lapangan where id_lapangan=$_GET[id]");
$r=mysql_fetch_array($query);
$harga = format_rupiah($r[harga_lapangan]);

echo "<div class='post_title'><b>$r[judul]</b></div><br/>
	 <img src='lapangan/$r[gambar]' width='600'><br/>";

echo "<table width='100%'><br/>
	  <tr><td width='20%'><b>Nama Lapangan</b></td> 
	  <td style='color:white'> $r[judul]</td></tr>
	  <tr><td><b>Sewa Lapangan</b></td> 
	  <td style='color:white'> Rp $harga/Jam</td></tr>  
	  <tr><td valign=top><b>Keterangan</b></td>  
	  <td> $r[detail]<br/><br/></td></tr>
	  </table>";
	  
	  if ($_SESSION[leveluser]=='members'){ 
echo "<table><tr><td></td>
      <td><input style='width:100px;' type=button value='Pesan'  class='button' onclick=\"window.location.href='sewa-lapangan-$r[id_lapangan].html';\"></td></tr></table>";
	}	
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='sewalapangan'){
		 $edit=mysql_query("SELECT * FROM users WHERE username='$_SESSION[namauser]'");
        $k=mysql_fetch_array($edit);
		
		
		$query = mysql_query("SELECT * FROM lapangan where id_lapangan='$_GET[id]'");
		$r=mysql_fetch_array($query);
		$harga = format_rupiah($r[harga_lapangan]);
		

echo "<div class='post_title'><b>Pemesanan $r[judul].</b></div><br/>";
echo "<form method=POST action='aksi-pesan.html' enctype='multipart/form-data'>
	  <table style='margin-bottom:45%;' width='100%'>
	  <input type=hidden name='id_lapangan' value='$r[id_lapangan]'>
	  
	  <tr><td width='120px'>Nama Lengkap</td>     	
	  <td> : &nbsp;<input type=text name='nama_lengkap' value='$k[nama_lengkap]' size=49 class='input2' readonly='on'></td></tr>
	  <tr><td width='120px'>Email</td> 
	  <td> : &nbsp;<input type=text name='email' value='$k[email]' size=49 class='input2' readonly='on'></td></tr>
	  <tr><td width='120px'>No. Telpon</td> 
	  <td> : &nbsp;<input type=text name='no_telp' value='$k[no_telp]' size=49 class='input2' readonly='on'></td></tr>
	  <tr><td width='120px'>Alamat</td> 
	  <td> : &nbsp;<textarea name='alamat_lengkap' style='width:380px; height:50px;' readonly='on'>$k[alamat_lengkap]</textarea></td></tr>
	  
	  <tr><td width='120px'>Nama Lapangan</td>     	
	  <td> : &nbsp;<input type=text name='judul' value='$r[judul]' size=49 class='input2' readonly='on'></td></tr>
	  <tr><td>Harga Sewa Lapangan</td>   	
	  <td> : &nbsp;<input type=text name='harga' value='Rp $harga' size=20 class='input2' readonly='on'> /Jam</td></tr>
	  <tr><td>Jam</td>  
	  <td> : &nbsp;";
	  ?>
	  <?php
							
echo "<select style='width:140px; margin-left:-4px;' name='jam_mulai'>
      <option value='0' selected>- Pilih Jam Mulai -</option>";
	  $tampil=mysql_query("SELECT * FROM jam GROUP BY jam_mulai");
      while($r=mysql_fetch_array($tampil)){
echo "<option>$r[jam_mulai]</option>";
      }
echo "</select>

      <select style='width:140px; margin-left:4px;' name='jam_selesai'>";
	  
echo "<option value='0' selected>- Pilih Jam Selesai -</option>";
	  $tampil=mysql_query("SELECT * FROM jam GROUP BY jam_selesai");
      while($k=mysql_fetch_array($tampil)){
echo "<option>$k[jam_selesai]</option>";
      }
echo "</select>";
?>

<?php
echo "</td></tr>
	  
	  <tr><td></td>   	
	  <td>&nbsp;&nbsp;&nbsp;<input type='submit' name='submit' class='button' value='Pesan Sekarang'></td></tr>
	  </table></form>";
      }



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='aksipesan'){
$query = mysql_query("SELECT * FROM lapangan where id_lapangan='$_POST[id_lapangan]'");
$r=mysql_fetch_array($query);

$jumlahh = mysql_query("SELECT * FROM laporan 
                        where jam_mulai='$_POST[jam_mulai]' 
                        and jam_selesai='$_POST[jam_selesai]' 
						AND id_lapangan='$_POST[id_lapangan]'");
$j=mysql_fetch_array($jumlahh);
$jml = mysql_num_rows($jumlahh);
					
if ($jml >= 1){
echo "<script>window.alert('Maaf, Jadwal Sewa Lapangan Futsal pada Jam $_POST[jam_mulai] s/d $_POST[jam_selesai] Sudah Ke isi, silahkan pilih jam Lainnya.');
			  window.location=('javascript:history.go(-1)')</script>";


}else{
        $jam_mulai   = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        $durasi      = $jam_selesai - $jam_mulai;
		
	    $total       = ($r[harga_lapangan]) * $durasi;
	    $harga       =  number_format(($total),0,",",".");
		
		
		$sql = mysql_query("INSERT INTO laporan (id_lapangan,
												 jam_mulai,
												 jam_selesai,
												 username,
												 tanggal,
												 total_harga) 
										   VALUES('$_POST[id_lapangan]',
												'$_POST[jam_mulai]',
												'$_POST[jam_selesai]',
												'$_SESSION[namauser]',
												'$tgl_sekarang',
												'$harga')");
echo "<script>window.alert('Sukses Mendaftarkan jadwal Sewa Lapangan Futsal.');
			window.location=('http://localhost/futsal/')</script>";
}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='laporanpemesanan'){
    echo "<div class='post_title'><b>Daftar Penyewaan Lapangan Futsal Oleh : $_SESSION[namalengkap].</b> </div><br/>
		 <div class='h_line'></div>
          <table style='margin-bottom:20px' cellpadding=6 width=100%>
          <tr style='color:#fff; height:38px;' bgcolor=#1d5103>
		  <th>No.</th>
		  <th>Jam</th>
		  <th>Durasi</th>
		  <th>Harga</th>
		  <th>Tanggal</th>
		  <th>Status</th>
		  <th>Aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM laporan,lapangan WHERE lapangan.id_lapangan=laporan.id_lapangan 
						   ORDER BY id_orders DESC LIMIT $posisi,$batas");
  $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
	
		$tgl = tgl_indo($r[tanggal]);
	    $jam_mulai = $r[jam_mulai];
        $jam_selesai = $r[jam_selesai];
        $durasi = $jam_selesai - $jam_mulai;
		
	
	  if(($no % 1)==0){
		$warna="#267000";
	  }else{
		$warna="#E1E1E1";
	  }
      echo "<tr bgcolor=$warna>
                <td>$no</td>
                <td>$r[jam_mulai] s/d $r[jam_selesai]</td>
				<td>$durasi/jam</td>
				<td>Rp. $r[total_harga]</td>
				<td>$tgl</td>
                <td>$r[status_pesanan]</td>
				<td>
				<input type=button value='Detail' class='button' onclick=\"window.location.href='detail-pemesanan-$r[id_orders].html';\">";
	      echo "<a target='_BLANK' href='print.php?id=$r[id_orders]'><input type='button' value='Cetak' class='button'></a>";
				
				echo "</center></td></tr>";
      $no++;
    }
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM laporan where username='$_SESSION[namauser]'"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "</table>";
    echo "<br/>Halaman: $linkHalaman<br>";
	}
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
elseif ($_GET[module]=='detailpemesanan'){
$query = mysql_query("SELECT * FROM laporan left join lapangan on laporan.id_lapangan=lapangan.id_lapangan
						where laporan.id_orders=$_GET[id]");
$r=mysql_fetch_array($query);
$tanggal = tgl_indo($r[tanggal]);
$jam_mulai   = $r[jam_mulai];
$jam_selesai = $r[jam_selesai];
$durasi      = $jam_selesai - $jam_mulai;

echo "<div class='post_title'><b>Detail Pemesanan $r[judul] - $r[id_orders]</b></div><br/>";
echo "<table style='margin-bottom:35%;' width='100%'><br/>
          <tr><td width='20%'>Nama Pemesan</td>     	
		  <td> &nbsp;<input type=text name='judul' value='$_SESSION[namalengkap]' size=29 class='input3' readonly='on'></td></tr>
		  <tr><td>Email</td>     	
		  <td>&nbsp;<input type=text name='judul' value='$_SESSION[email]' size=29 class='input3' readonly='on'></td></tr>
		  <tr><td>No Telp</td>     	
		  <td> &nbsp;<input type=text name='judul' value='$_SESSION[telp]' size=29 class='input3' readonly='on'></td></tr>
		  <tr><td>Alamat<br/><br/><br/></td>     	
		  <td>&nbsp;<textarea style='width:93%; height:50px;' class='input3' readonly='on'>$_SESSION[alamat]</textarea><br/><br/></td></tr>
													 
			
		  <tr><td>Judul</td>     	
		  <td> &nbsp;<input type=text name='judul' value='$r[judul]' size=49 class='input2' readonly='on'></td></tr>
		  <tr><td>Tanggal</td>   
		  <td> &nbsp;<input type=text name='tanggal' value='$tanggal' size=29 class='input2' readonly='on'></td></tr>
		  <tr><td>Jam Mulai</td>   
		  <td> &nbsp;<input type=text name='jam_mulai' value='$r[jam_mulai] s/d $r[jam_selesai] WIB' size=29 class='input2' readonly='on'></td></tr>
		  <tr><td>Harga Lapangan</td>   	
		  <td> &nbsp;<input type=text name='harga' value='Rp $r[total_harga]' size=20 class='input2' readonly='on'> $durasi Jam</td></tr>
          <tr><td>Status Pesanan</td>   	
		  <td> &nbsp;<input type=text name='jumlah_tiket' size=20 value='$r[status_pesanan]' class='input2' readonly='on'></td></tr>
		  <tr>
		  <td></td>   	
		  <td>
		  <input style='padding:8px; margin-left:5px;margin-top:5px;' type=button value='Konfirmasi Pembayaran' class='button' onclick=\"window.location.href='konfirmasi-pembayaran-$r[id_orders].html';\"></td></tr>
	  </table>";	
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='konfirmasipembayaran'){
$query = mysql_query("SELECT * FROM laporan left join lapangan on laporan.id_lapangan=lapangan.id_lapangan
						left join users on laporan.username=users.username
						where laporan.id_orders=$_GET[id]");
$r=mysql_fetch_array($query);
		

 echo "<div class='post_title'><b>Konfirmasi Pembayaran Untuk No Orders : $r[id_orders]</b></div><br/>";
 echo " <form action=aksi-konfirmasi.html method=POST name='formku' onSubmit='return valid()'>
        <table  style=' padding: 1em; margin-right=10px'>
		<tr><td width='140px'>id Order</td><td> <input type=text name=a value='$r[id_orders]' size=5 class='input' readonly='on'> </td></tr>
        
		<tr><td width='140px'>Total Biaya</td><td> <input type=text name=nama value='Rp $r[total_harga]' size=20 class='input' readonly='on'> </td></tr>
        <tr><td>Nama Pemesan</td><td> <input type=text name=b value='$_SESSION[namalengkap]' size=49 class='input' readonly='on'></td></tr>
        <tr><td>Bayar Ke</td><td> <select class='input' name='c'>
					<option value=0 selected>- Pilih (Bank anda Transfer pembayaran) -</option>";
            $tampil=mysql_query("SELECT * FROM rekening ORDER BY id_rekening");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_rekening]>$r[nama_bankk] - A/N : $r[atas_namaa]</option>";
            }
    echo "</select></td></tr>
		<tr><td>Total Bayar</td><td> <input type=text name=d size=20 class='input'></td></tr>
		<tr><td>No Rek. Anda</td><td> <input type=text name=e size=49 class='input'></td></tr>
		<tr><td>Atas Nama</td><td> <input type=text name=f size=49 class='input'></td></tr>
		<tr><td>Nama Bank</td><td> <input type=text name=g size=49 class='input'></td></tr>
        <tr><td valign=top>Pesan</td><td> <textarea name=h style='width: 105%; height: 60px;' class='input'></textarea></td></tr>
        <tr><td valign=top></td>
		<td><input type=submit name=submit value='Kirim Konfirmasi' class='button'></td></tr>
        </table>
		</form>";
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='aksikonfirmasi'){
if (empty($_POST[c])){
	echo "<script>window.alert('Anda belum memilih No rekening');
				window.location='javascript:history.go(-1)'</script>";	
}
elseif (empty($_POST[d])){
	echo "<script>window.alert('Anda belum mengisikan Total Bayar');
				window.location='javascript:history.go(-1)'</script>";	
}
elseif (empty($_POST[e])){
	echo "<script>window.alert('Anda belum mengisikan No Rek Anda');
				window.location='javascript:history.go(-1)'</script>";	
}
elseif (empty($_POST[f])){
	echo "<script>window.alert('Anda belum mengisikan Atas Nama');
				window.location='javascript:history.go(-1)'</script>";	
}
elseif (empty($_POST[g])){
	echo "<script>window.alert('Anda belum mengisikan Nama Bank');
				window.location='javascript:history.go(-1)'</script>";	
}else{
  mysql_query("INSERT INTO konfirmasi(id_orders,
									   id_rekening,
									   nama_pemesan,
									   total_bayar,
									   rek_anda,
									   atas_nama,
									   nama_bank,
									   pesan) 
							VALUES('$_POST[a]',
								   '$_POST[c]',
								   '$_POST[b]',
								   '$_POST[d]',
								   '$_POST[e]',
								   '$_POST[f]',
								   '$_POST[g]',
								   '$_POST[h]')");

	if ($_POST[a]=='All'){
			mysql_query("UPDATE laporan SET status_pesanan = 'Booking' where status_pesanan = 'Baru'");						   
		echo "<script>window.alert('Terima Kasih Telah Konfirmasi Pembayaran untuk $_POST[a]');
					window.location='laporan-pemesanan.html'</script>";	
	}else{								   
			mysql_query("UPDATE laporan SET status_pesanan = 'Booking' where id_orders='$_POST[a]'");						   
		echo "<script>window.alert('Terima Kasih Telah Konfirmasi Pembayaran..');
					window.location='laporan-pemesanan.html'</script>";	
	}
}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='hubungikami'){
  echo "<div class='post_title'><b>Hubungi kami secara online dengan mengisi form dibawah ini :</b></div><br/>
		<form action=hubungi-aksi.html name='formku' onSubmit='return valid()' method=POST >
        <table width=99% style=' padding: 1em; margin-right=10px'>
        <tr><td>Nama</td><td> <input type=text name=nama_lengkap value='$_SESSION[namalengkap]' size=68 class='input' readonly='on'></td></tr>
        <tr><td>Email</td><td> <input type=text name=alamat_email value='$_SESSION[email]' size=68 class='input' readonly='on'></td></tr>
        <tr><td>Subjek</td><td> <input type=text name=subjek size=68 class='input'></td></tr>
        <tr><td valign=top>Pesan</td><td> <textarea name=pesan style='width: 509px; height: 120px;' class='input'></textarea></td></tr>
        <tr>
		<td valign=top></td>
		<td><input type=submit name=submit class='button' value=Kirim class='submit'>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></td></tr>
        </table></pad></form>";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='hubungiaksi'){
if (empty($_POST[nama_lengkap])){
	echo "Nama Lengkap Masih Kosong";
} else if (empty($_POST[alamat_email])){
	echo "Alamat Email Masih kosong";
} else if (empty($_POST[subjek])){
	echo "Subjek Masih kosong";
} else if (empty($_POST[pesan])){
	echo "Input Kan pesan Anda Sebelum Mengirim";
} else {
$tanggal = date("Ymd");
mysql_query("INSERT INTO hubungi(nama_lengkap, 
									alamat_email,
									subjek,
									pesan,
									tanggal) 								
							VALUES ('$_POST[nama_lengkap]',
									'$_POST[alamat_email]',
									'$_POST[subjek]',
									'$_POST[pesan]',
									'$tanggal')");
	echo "Sukses Mengirimkan Pesan <a href='http://localhost/futsal'>Back to Menu</a>";	
}
}
?>