-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2020 at 11:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkelku`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'Admin Nino', 'nino@admin.bengkelku.com', 'nino'),
(3, 'Admin Tirto', 'tirto@admin.bengkelku.com', 'tirto'),
(5, 'Admin Rangga', 'rangga@admin.bengkelku.com', 'rangga');

-- --------------------------------------------------------

--
-- Table structure for table `buatpesanan_tb`
--

CREATE TABLE `buatpesanan_tb` (
  `request_id` int(11) NOT NULL,
  `tipe_mobil` text COLLATE utf8_bin NOT NULL,
  `d_masalah` text COLLATE utf8_bin NOT NULL,
  `nama_lengkap` varchar(60) COLLATE utf8_bin NOT NULL,
  `nomor_hp` bigint(20) NOT NULL,
  `kota_kec` varchar(60) COLLATE utf8_bin NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `lok_alamat` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `buatpesanan_tb`
--

INSERT INTO `buatpesanan_tb` (`request_id`, `tipe_mobil`, `d_masalah`, `nama_lengkap`, `nomor_hp`, `kota_kec`, `kode_pos`, `lok_alamat`) VALUES
(25, 'Lamborgini', 'ban bochor', 'Barack Omama', 628999999999, 'Pelam', 76543, 'Lamongan');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tb`
--

CREATE TABLE `contact_tb` (
  `no` int(11) NOT NULL,
  `nama` varchar(60) COLLATE utf8_bin NOT NULL,
  `subjek` text COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `pesan` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contact_tb`
--

INSERT INTO `contact_tb` (`no`, `nama`, `subjek`, `email`, `pesan`) VALUES
(1, 'Alvin Rohman', 'perihal biaya srvis', 'alvinrohmenn@gmail.com', 'harga untuk full servis mobil honda jazz berapa ya?'),
(2, 'Adi Purwanto', 'adakah lowongan pekerjaan?', 'puwanto.aaddii@gmail.com', 'saya ingin bertanya, apakah Bengkelku membuka lowongan pekerjaan?'),
(3, 'Diki Alfiansyah', 'Cara memesan', 'dkalfiansyah@yahoo.co.id', 'Bagaimana cara saya memesan jasa Bengkelku? dan bagaimana saya akan dilayani?');

-- --------------------------------------------------------

--
-- Table structure for table `customerlogin_tb`
--

CREATE TABLE `customerlogin_tb` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customerlogin_tb`
--

INSERT INTO `customerlogin_tb` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(1, 'Ivanda Orif', 'ivandaorif@gmail.com', 'wowow'),
(3, 'wawan', 'wawan@wawan.com', 'wawan'),
(5, 'diki', 'diki@diki.com', 'diki');

-- --------------------------------------------------------

--
-- Table structure for table `daftarteknisi_tb`
--

CREATE TABLE `daftarteknisi_tb` (
  `tek_id` int(11) NOT NULL,
  `tek_nama` varchar(60) COLLATE utf8_bin NOT NULL,
  `tek_kota` varchar(60) COLLATE utf8_bin NOT NULL,
  `tek_hp` bigint(20) NOT NULL,
  `tek_email` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `daftarteknisi_tb`
--

INSERT INTO `daftarteknisi_tb` (`tek_id`, `tek_nama`, `tek_kota`, `tek_hp`, `tek_email`) VALUES
(2, 'Brian Dean', 'Hierendela', 6282333333332, 'brian@emaila.com');

-- --------------------------------------------------------

--
-- Table structure for table `historipesanan_tb`
--

CREATE TABLE `historipesanan_tb` (
  `request_id` int(11) NOT NULL,
  `tipe_mobil` varchar(60) COLLATE utf8_bin NOT NULL,
  `d_masalah` text COLLATE utf8_bin NOT NULL,
  `nama_lengkap` varchar(60) COLLATE utf8_bin NOT NULL,
  `nomor_hp` bigint(20) NOT NULL,
  `kota_kec` varchar(60) COLLATE utf8_bin NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `lok_alamat` text COLLATE utf8_bin NOT NULL,
  `teknisi_t` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `historipesanan_tb`
--

INSERT INTO `historipesanan_tb` (`request_id`, `tipe_mobil`, `d_masalah`, `nama_lengkap`, `nomor_hp`, `kota_kec`, `kode_pos`, `lok_alamat`, `teknisi_t`) VALUES
(3, 'Tesla CyberTruck', 'ban bocor', 'Elon Musk', 82333333333, 'jembatan', 61235, 'luar angkasa, melewati void 0, disebelah comet hedge pada koordinat x3119', 'Rangga'),
(13, 'Revo', 'kijang kijang', 'Bagas', 81122223333, 'jember', 11234, 'di bumi', 'Rangga'),
(23, 'Shogun', 'meledak', 'Naruto', 6288811223311, 'Konoha', 54123, 'Depan Gedung Hokage', 'Rangga');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_tb`
--

CREATE TABLE `penjualan_tb` (
  `id_pnjln` int(11) NOT NULL,
  `nama_pbl` varchar(60) COLLATE utf8_bin NOT NULL,
  `kota_pbl` varchar(60) COLLATE utf8_bin NOT NULL,
  `p_nama` varchar(60) COLLATE utf8_bin NOT NULL,
  `p_jumlah` int(11) NOT NULL,
  `p_hsatuan` int(11) NOT NULL,
  `p_htotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `penjualan_tb`
--

INSERT INTO `penjualan_tb` (`id_pnjln`, `nama_pbl`, `kota_pbl`, `p_nama`, `p_jumlah`, `p_hsatuan`, `p_htotal`) VALUES
(1, 'Bill Gates', 'California', 'Steering Kijang Original', 2, 350000, 700000);

-- --------------------------------------------------------

--
-- Table structure for table `pesananditerima_tb`
--

CREATE TABLE `pesananditerima_tb` (
  `r_no` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `tipe_mobil` text COLLATE utf8_bin NOT NULL,
  `d_masalah` text COLLATE utf8_bin NOT NULL,
  `nama_lengkap` varchar(60) COLLATE utf8_bin NOT NULL,
  `nomor_hp` bigint(20) NOT NULL,
  `kota_kec` varchar(60) COLLATE utf8_bin NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `lok_alamat` text COLLATE utf8_bin NOT NULL,
  `teknisi_t` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pesananditerima_tb`
--

INSERT INTO `pesananditerima_tb` (`r_no`, `request_id`, `tipe_mobil`, `d_masalah`, `nama_lengkap`, `nomor_hp`, `kota_kec`, `kode_pos`, `lok_alamat`, `teknisi_t`) VALUES
(12, 5, 'Avanza 2015', 'ads', 'asdsa', 0, 'assaasaassa', 64131, 'awawawaw', 'Rangga'),
(28, 17, 'vario 125cc 2017', 'ini deskripsi ', 'ini nama saya', 82399999999, 'jepang', 89111, 'kyoto', 'Rangga'),
(33, 24, 'Porsche', 'Kaca Spion Retak', 'Bill Gates', 6282312341234, 'Bogor', 18845, 'Teras', 'Rangga');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart_tb`
--

CREATE TABLE `sparepart_tb` (
  `p_id` int(11) NOT NULL,
  `p_nama` varchar(60) COLLATE utf8_bin NOT NULL,
  `p_tersedia` int(11) NOT NULL,
  `p_total` int(11) NOT NULL,
  `p_hasli` int(11) NOT NULL,
  `p_hjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sparepart_tb`
--

INSERT INTO `sparepart_tb` (`p_id`, `p_nama`, `p_tersedia`, `p_total`, `p_hasli`, `p_hjual`) VALUES
(1, 'Steering Kijang Original', 48, 50, 250000, 350000),
(2, 'AKI GS ASTRA Premium NS40', 25, 25, 590000, 640000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `buatpesanan_tb`
--
ALTER TABLE `buatpesanan_tb`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `contact_tb`
--
ALTER TABLE `contact_tb`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `customerlogin_tb`
--
ALTER TABLE `customerlogin_tb`
  ADD PRIMARY KEY (`r_login_id`);

--
-- Indexes for table `daftarteknisi_tb`
--
ALTER TABLE `daftarteknisi_tb`
  ADD PRIMARY KEY (`tek_id`);

--
-- Indexes for table `historipesanan_tb`
--
ALTER TABLE `historipesanan_tb`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `penjualan_tb`
--
ALTER TABLE `penjualan_tb`
  ADD PRIMARY KEY (`id_pnjln`);

--
-- Indexes for table `pesananditerima_tb`
--
ALTER TABLE `pesananditerima_tb`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `sparepart_tb`
--
ALTER TABLE `sparepart_tb`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buatpesanan_tb`
--
ALTER TABLE `buatpesanan_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact_tb`
--
ALTER TABLE `contact_tb`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customerlogin_tb`
--
ALTER TABLE `customerlogin_tb`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daftarteknisi_tb`
--
ALTER TABLE `daftarteknisi_tb`
  MODIFY `tek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan_tb`
--
ALTER TABLE `penjualan_tb`
  MODIFY `id_pnjln` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesananditerima_tb`
--
ALTER TABLE `pesananditerima_tb`
  MODIFY `r_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sparepart_tb`
--
ALTER TABLE `sparepart_tb`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
