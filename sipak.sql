-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2022 at 05:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipak`
--

-- --------------------------------------------------------

--
-- Table structure for table `kode_arah_angin`
--

CREATE TABLE `kode_arah_angin` (
  `id_kode_arah_angin` int(11) NOT NULL,
  `kode_arah_angin` varchar(50) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode_arah_angin`
--

INSERT INTO `kode_arah_angin` (`id_kode_arah_angin`, `kode_arah_angin`, `nama_kategori`) VALUES
(1, 'SW', 'Barat Daya '),
(2, 'W', 'Barat'),
(3, 'AASW', 'Arah AASW'),
(4, 'AAW', 'Arah AAW');

-- --------------------------------------------------------

--
-- Table structure for table `prediksi_temp`
--

CREATE TABLE `prediksi_temp` (
  `id` int(11) NOT NULL,
  `id_rule_base` varchar(50) NOT NULL,
  `nama_rule` varchar(50) NOT NULL,
  `suhu_min` double NOT NULL,
  `suhu_max` double NOT NULL,
  `kelembapan_min` double NOT NULL,
  `kelembapan_max` double NOT NULL,
  `kec_angin` double NOT NULL,
  `id_kode_arah_angin` int(11) NOT NULL,
  `nama_cuaca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prediksi_temp`
--

INSERT INTO `prediksi_temp` (`id`, `id_rule_base`, `nama_rule`, `suhu_min`, `suhu_max`, `kelembapan_min`, `kelembapan_max`, `kec_angin`, `id_kode_arah_angin`, `nama_cuaca`) VALUES
(1, 'RL-2204-0001', 'Rule 1', 24, 26, 90, 95, 10, 4, 'Cerah Berawan');

-- --------------------------------------------------------

--
-- Table structure for table `rule_base`
--

CREATE TABLE `rule_base` (
  `id` int(11) NOT NULL,
  `id_rule_base` varchar(50) NOT NULL,
  `nama_rule` varchar(50) NOT NULL,
  `suhu_min` double NOT NULL,
  `suhu_max` double NOT NULL,
  `kelembapan_min` double NOT NULL,
  `kelembapan_max` double NOT NULL,
  `kec_angin` double NOT NULL,
  `id_kode_arah_angin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rule_base`
--

INSERT INTO `rule_base` (`id`, `id_rule_base`, `nama_rule`, `suhu_min`, `suhu_max`, `kelembapan_min`, `kelembapan_max`, `kec_angin`, `id_kode_arah_angin`) VALUES
(1, 'RL-2204-0001', 'Rule 1', 24, 26, 90, 95, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` varchar(50) NOT NULL,
  `nama_staff` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nama_staff`, `alamat`, `no_hp`, `jabatan`, `id_user`) VALUES
('STF-1910-0003', 'Test Dev', 'Test', '87382738192', 'Pegawai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Manajer','Gudang','Pegawai','Admin') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'superadmin@gmail.com', '12345678', 'user-default.png', 'Admin', 'aktif', '2017-04-01 08:15:15', '2019-11-11 23:23:40'),
(4, 'admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@example.com', '123456789', NULL, 'Admin', 'aktif', '2019-11-11 23:18:50', '2019-11-11 23:23:37'),
(5, 'pegawai', 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'pegawai@example.com', '3456789', NULL, 'Pegawai', 'aktif', '2019-11-11 23:57:09', '2019-11-11 23:57:09'),
(6, 'manajer', 'manajer', '69b731ea8f289cf16a192ce78a37b4f0', 'manajer@example.com', '34567890', NULL, 'Manajer', 'aktif', '2019-11-11 23:57:36', '2019-11-11 23:57:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kode_arah_angin`
--
ALTER TABLE `kode_arah_angin`
  ADD PRIMARY KEY (`id_kode_arah_angin`);

--
-- Indexes for table `prediksi_temp`
--
ALTER TABLE `prediksi_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rule_base`
--
ALTER TABLE `rule_base`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kode_arah_angin`
--
ALTER TABLE `kode_arah_angin`
  MODIFY `id_kode_arah_angin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prediksi_temp`
--
ALTER TABLE `prediksi_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rule_base`
--
ALTER TABLE `rule_base`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
