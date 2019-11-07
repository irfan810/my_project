-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 03:52 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE `hubungi` (
  `id_hubungi` int(5) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat_email` varchar(100) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id_jam` int(5) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id_jam`, `jam_mulai`, `jam_selesai`) VALUES
(1, '08:00:00', '08:00:00'),
(2, '09:00:00', '09:00:00'),
(3, '10:00:00', '10:00:00'),
(4, '11:00:00', '11:00:00'),
(5, '12:00:00', '12:00:00'),
(6, '13:00:00', '13:00:00'),
(7, '14:00:00', '14:00:00'),
(8, '15:00:00', '15:00:00'),
(9, '16:00:00', '16:00:00'),
(10, '17:00:00', '17:00:00'),
(11, '18:00:00', '19:00:00'),
(12, '19:00:00', '20:00:00'),
(13, '20:00:00', '21:00:00'),
(14, '21:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(5) NOT NULL,
  `id_orders` varchar(5) NOT NULL,
  `id_rekening` int(5) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `total_bayar` varchar(100) NOT NULL,
  `rek_anda` varchar(150) NOT NULL,
  `atas_nama` varchar(150) NOT NULL,
  `nama_bank` varchar(150) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lapangan` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `detail` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `harga_lapangan` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id_lapangan`, `judul`, `detail`, `gambar`, `harga_lapangan`) VALUES
(1, 'Lapangan Futsal', 'isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. isi keterangan ini untuk melengkapi isi lapangan. ', '77lapangan-matras.jpg', '70000');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_orders` int(5) NOT NULL,
  `id_lapangan` int(5) NOT NULL,
  `jam_mulai` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `jam_selesai` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `total_harga` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status_pesanan` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'Belum'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(5) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `atas_namaa` varchar(50) NOT NULL,
  `nama_bankk` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `no_rekening`, `atas_namaa`, `nama_bankk`) VALUES
(6, '152-001030-2053', 'Sarjana Komedi', 'Bank Mandiri'),
(10, '521231231231231', 'Sarjana Komedi', 'Bank BCA');

-- --------------------------------------------------------

--
-- Table structure for table `statis`
--

CREATE TABLE `statis` (
  `judul` varchar(255) NOT NULL,
  `halaman` varchar(20) NOT NULL,
  `detail` text NOT NULL,
  `id_statis` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statis`
--

INSERT INTO `statis` (`judul`, `halaman`, `detail`, `id_statis`) VALUES
('Aplikasi Sistem Informasi Penyewaan Lapangan Futsal', 'home', 'Futsal adalah permainan bola yang dimainkan oleh dua tim, yang masing-masing beranggotakan lima orang. Tujuannya adalah memasukkan bola ke gawang lawan, dengan memanipulasi bola dengan kaki. Selain lima pemain utama, setiap regu juga diizinkan memiliki pemain cadangan. Tidak seperti permainan sepak bola dalam ruangan lainnya, lapangan futsal dibatasi garis, bukan net atau papan.\r\n\r\nFutsal dipopulerkan di Montevideo, Uruguay pada tahun 1930, oleh Juan Carlos Ceriani. Keunikan futsal mendapat perhatian di seluruh Amerika Selatan, terutamanya di Brasil. Ketrampilan yang dikembangkan dalam permainan ini dapat dilihat dalam gaya terkenal dunia yang diperlihatkan pemain-pemain Brasil di luar ruangan, pada lapangan berukuran biasa. Pele, bintang terkenal Brasil, contohnya, mengembangkan bakatnya di futsal. Sementara Brasil terus menjadi pusat futsal dunia, permainan ini sekarang dimainkan di bawah perlindungan FÃ©dÃ©ration Internationale de Football Association di seluruh dunia, dari Eropa hingga Amerika Tengah dan Amerika Utara serta Afrika, Asia, dan Oseania.', 2),
('Cara Pemesanan Lapanga Futsal', 'pesanan', 'Untuk pemesanan lapanga futsal, anda harus memenuhi syarat-syarat yang kami berika pada bagian selanjutnya, apa saja syarat yang harus anda penuhi atau bagaimana cara untuk mendapatkan tiket secara online dari biosko raya, berikut :\r\n\r\n1. Anda harus melakukan register sebagai members.\r\n2. silahkan isi semua data-data register anda dengan baik dan benar.\r\n3. jika semua sudah di isi, maka silahkan klik submit button.\r\n4. jika sukses melakukan pendaftaran, anda sudah bisa melakukan login.\r\n5. masukkan pada halaman login username dan password anda waktu mendaftar.\r\n6. jika benar, anda akan di bawa ke halaman members.\r\n7. pada halaman members anda bisa memilih lapagan futsal \r\n8. pilih dan lihat keterangan lapangan futsal yang anda ingin sewa terlebih dahulu jika mau.\r\n9. jika pilihan anda sudah benar, klik button pesan.\r\n10 dan isi semua data-data pemesanan lapangan futsal anda dengan baenar.\r\n11. klik button submit.\r\n12. jika data2 yang anda isikan benar, maka anda akan sukses memesan lapangan futsal.\r\n13. lapangan futsal yang di pesan akan masuk ke laporan pemesanan lapangan futsal dengan status baru.\r\n14. silahkan bayar pesanan anda ke rekening futsal dengan transfer.\r\n15 jika sudah transfer, silahkan konfrmasi pembayaran.\r\n16. setelah konfirmasi, tunggu status anda samapai di konfirmasi oleh admin.\r\n17. cetak jika status lapangan futsal sudah lunas atau di konfirmasi dan selesai.<br/>\r\n\r\n', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'members',
  `alamat_lengkap` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `alamat_lengkap`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'id.sarjanakomedi@gmail.com', '081297278127', 'admin', 'Kalibata Selatan'),
('fariz', '7815696ecbf1c96e6894b779456d330e', 'muhammad fariz', 'muhammadfarizzi96@gmail.com', '081297278127', 'admin', 'jl balai rakyat'),
('irfan', '7815696ecbf1c96e6894b779456d330e', 'irfan maulana', 'irfan@gmail.com', '081297278127', 'members', 'jl arjuna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `statis`
--
ALTER TABLE `statis`
  ADD PRIMARY KEY (`id_statis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id_hubungi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id_lapangan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_orders` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `statis`
--
ALTER TABLE `statis`
  MODIFY `id_statis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
