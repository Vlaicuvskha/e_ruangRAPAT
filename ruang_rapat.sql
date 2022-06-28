-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 06:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruang_rapat`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `nama_pemohon` varchar(120) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `no_dir` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `username`, `nama_pemohon`, `jabatan`, `no_telepon`, `no_dir`, `password`, `role_id`) VALUES
(11, 'PERLUASAN', 'PERLUASAN', 'Muh. Ilham, S.Pd', 'SEKRETARIS', '085710388747', '3674052403990003', '038a0d280cd643a42e8af07a2b1ad92d', 2),
(14, 'BANTUAN OPERASIONAL SEKOLAH', 'BOS', 'Isyana Sabrina, S.E', 'SEKRETARIS', '087878786072', '14.5568', '6af7a035eac42ec21ec3ec096f97ee1d', 2),
(15, 'REFORMASI BIROKRASI INTERNAL', 'RBI', 'Nani Sukriswandari, S.Si', 'KORDINATOR', '087878786072', '46.123', 'b2ca61baaf396ddd8a09456d7f920b73', 2),
(16, 'TATA USAHA', 'TU', 'Imam Pranata, S.S', 'SEKRETARIS', '085155338426', '1658', 'ca3361ad64c4cfc6cf56de774c7a903c', 2),
(17, 'DIREKTUR', 'DIREKTUR', 'DRS. Mulyatsyah, M.M', 'DIREKTUR', '087878786072', '1', 'c4af1bb4b03e7b40f6931493864e4408', 1),
(18, 'SARANA PRASARANA', 'SARPRAS', 'Harnowo Susanto, S.E', 'SEKRETARIS', '087878786072', '3', 'ba8c14d358757a2b26e4e18e1af56fe7', 2),
(19, 'KELEMBAGAAN', 'KELEMBAGAAN', 'Eko Susanto, S.E', 'KORDINATOR', '085155338426', '98751', '9e14d7dd7bf02467dbfa8476a80209e8', 2),
(20, 'PEMBINAAN PESERTA DIDIK', 'PSD', 'Maulani Mega Hapsari, M.A', 'KORDINATOR', '085155338426', '216123', '9c0ec6bfdae0da828545d2d836f34d02', 2),
(22, 'ADMIN', 'admin', 'ADMIN', 'ADMINISTRATOR', '085710388747', '1', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `kode_tipe` varchar(120) NOT NULL,
  `no_ruang` varchar(120) NOT NULL,
  `dayatampung` varchar(4) NOT NULL,
  `status` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `ac` int(11) NOT NULL,
  `tambahkursitmeja` int(11) NOT NULL,
  `jendela` int(11) NOT NULL,
  `meja_bundar` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `kode_tipe`, `no_ruang`, `dayatampung`, `status`, `harga`, `denda`, `ac`, `tambahkursitmeja`, `jendela`, `meja_bundar`, `gambar`) VALUES
(6, 'UTAMA', '15.1', '200', '1', 0, 1, 1, 1, 1, 0, 'besar-11.jpg'),
(9, 'UTAMA', '15.2', '350', '0', 0, 1, 1, 0, 1, 0, 'besar-2.jpg'),
(10, 'KECIL', '16.1', '50', '0', 0, 1, 0, 0, 1, 1, 'kecil-1.jpg'),
(13, 'KECIL', '16.2', '45', '1', 0, 1, 1, 0, 1, 1, 'kecil-2.jpg'),
(14, 'KECIL', '16.3', '20', '1', 0, 1, 1, 0, 1, 1, 'kecil-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id_tipe` int(11) NOT NULL,
  `kode_tipe` varchar(120) NOT NULL,
  `nama_tipe` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id_tipe`, `kode_tipe`, `nama_tipe`) VALUES
(1, 'UTAMA', 'UTAMA'),
(3, 'KECIL', 'KECIL');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_rental` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `tgl_rental` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `harga` varchar(120) NOT NULL,
  `denda` int(11) NOT NULL,
  `total_denda` varchar(120) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status_pengembalian` varchar(50) NOT NULL,
  `status_rental` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_rental`, `id_customer`, `id_ruang`, `tgl_rental`, `tgl_kembali`, `harga`, `denda`, `total_denda`, `tgl_pengembalian`, `status_pengembalian`, `status_rental`, `bukti_pembayaran`, `keterangan`, `status_pembayaran`) VALUES
(27, 20, 13, '2022-06-28', '2022-06-30', '0', 1, '0', '2022-06-30', 'Kembali', 'Selesai', 'WhatsApp_Image_2022-06-27_at_10_58_54_AM7.jpg', 'Peminatan Belajar SMP', 1),
(28, 20, 9, '2022-06-27', '2022-06-27', '0', 1, '1', '2022-06-28', 'Kembali', 'Selesai', 'WhatsApp_Image_2022-06-27_at_10_58_54_AM9.jpg', 'Peminatan Belajar SMP', 1),
(30, 16, 6, '2022-06-28', '2022-06-29', '0', 1, '0', '2022-06-29', 'Kembali', 'Selesai', 'WhatsApp_Image_2022-06-27_at_10_58_54_AM10.jpg', 'Rapat dengan Badan Pemeriksa Keuangan', 1),
(31, 16, 9, '2022-06-28', '2022-06-28', '0', 1, '0', '0000-00-00', 'Belum Kembali', 'Belum Selesai', 'WhatsApp_Image_2022-06-27_at_10_58_54_AM11.jpg', 'Peminatan Belajar SMP', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_rental`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
