-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 12:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `alasan` text NOT NULL,
  `tgl_diajukan` date NOT NULL,
  `mulai` date NOT NULL,
  `berakhir` date NOT NULL,
  `perihal_cuti` varchar(100) NOT NULL,
  `alasan_verifikasi` text DEFAULT NULL,
  `status_validasi` varchar(3) NOT NULL,
  `bukti` varchar(30) DEFAULT NULL,
  `keterangan_validasi` varchar(30) NOT NULL,
  `status_cuti` enum('Menunggu','Diterima','Ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `id_user`, `alasan`, `tgl_diajukan`, `mulai`, `berakhir`, `perihal_cuti`, `alasan_verifikasi`, `status_validasi`, `bukti`, `keterangan_validasi`, `status_cuti`) VALUES
(7, 14, 'medical check up di RS Sutomo Palembang', '2022-12-26', '2022-12-27', '2022-12-28', 'cuti sakit', 'jangan sampe lupa batas cutinya ', '1', NULL, 'Di tolak oleh Kepala Kantor', 'Diterima'),
(8, 14, 'menemani ibu medical check up di RS Muhamamdiyah Palembang', '2022-12-26', '2022-12-27', '2022-12-28', 'cuti karena alasan penting', 'kuota cuti anda telah habis', '1', NULL, 'Di tolak oleh Kepala Kantor', 'Ditolak'),
(10, 22, 'kakak', '2023-01-02', '2023-01-02', '2023-01-05', 'cuti tahunan', NULL, '1', 'File_bukti_10.png', '', 'Menunggu'),
(11, 14, 'medical check up', '2023-01-09', '2023-01-09', '2023-01-10', 'cuti sakit', 'oke sana', '1', NULL, 'Di tolak oleh Kepala Kantor', 'Diterima'),
(20, 35, 'medical check up', '2023-02-15', '2023-02-16', '2023-02-18', 'cuti sakit', 'semoga lekas sembuh dan ingat untuk waktu cutinya', '1', NULL, 'Di tolak oleh Kepala Kantor', 'Diterima'),
(22, 39, 'medical check up di rumah sakit baturaja', '2023-03-02', '2023-03-03', '2023-03-05', 'cuti sakit', NULL, '0', 'File_bukti_22.pdf', '', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(20) NOT NULL,
  `id_user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip`, `username`, `password`, `email`, `id_user_level`) VALUES
(4, '', 'staff umum', '$2y$05$Bi9tqhAMo4sflTh2YyLZCezH30V0.HystjbnIe.vcZiY79l4BfSQW', 'staff@mail.com', 2),
(10, '197520012001010902', 'kepala kantor', '$2y$05$dfDyr2XB5qdY1KGXzEKboesNosaxZfpqUgP1hmCaxJx5.unYhZBeu', 'kepala@mail.com', 4),
(14, '199012282007010207', 'lisdah', '$2y$05$Yo4MWWPKBh3Uhe6ePht.tuBeAHMADjNXb6z.HOoiGQsCd4nx1E6tm', 'astraman@gmail.com', 1),
(22, '131213131313131313', 'astraman', '$2y$05$oAWAQThJ.ZGQYM/iLGUq.OgDh86ge/XXyVaccZ/viQuWizclaidiy', 'admin@gmail.com', 1),
(30, '', 'admin', '$2y$05$azUV22HoV7lh9gYHtyLPxOK3RAFBWcMR5DNrEvGpId.ripKmjVcbm', 'admin@gmail.com', 3),
(35, '198512012003201201', 'suci', '$2y$05$2faYFz.xH9fTYIplR6rdOud8f2CbaPonLwAkoRg99g9d/7ZNp/fDS', 'suci@gmail.com', 1),
(39, '197502012001018201', 'fajar', '$2y$05$RL2ChQN19Ll4CukiIr2khO/mfgaY8fy3LmbPq1daXHwwQIXMe4OLq', 'fajar@gmail.com', 1);

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `trigger_user_detail` AFTER INSERT ON `user` FOR EACH ROW BEGIN

INSERT INTO user_detail(id_user)
VALUES(new.id_user);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id_user_detail` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `pangkat` varchar(30) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id_user_detail`, `id_user`, `nama_lengkap`, `no_telp`, `alamat`, `pangkat`, `jabatan`, `jenis_kelamin`) VALUES
(1, 4, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 10, 'Ishak Putih', '0821992011056', 'Baturaja', 'IV a', 'Kepala Kantor', 'L'),
(7, 14, 'lidia Hardayanti', '1928019238913', 'Baturaja', 'IV b', 'Penyusun laporan Keuangan pada Sub Bagian Tata Usaha', 'P'),
(15, 22, 'Muhammad Astraman', '0812382387128', 'rajabasa', 'III c', 'Pengelola Data Bimbingan Pendaftaran pada Seksi Penyelenggaraan Haji dan Umrah', 'L'),
(21, 28, 'aang', '1231312321312', 'rajabasa', 'III b', 'Pengelola Data Bimbingan Pendaftaran pada Seksi Penyelenggaraan Haji dan Umrah', 'L'),
(23, 30, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 33, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 35, 'suci rahayu', '081285628919', 'jl. komisaris umar no 122 kelurahan air gading', 'III d', 'Pengadministrasi Umum pada Penyelenggara Zakat dan Wakaf', 'P'),
(32, 39, 'fajar padillah', '082177188180', 'jl air paoh gang bunga no 128', 'IV a', 'Pengelola Surat pada Sub Bagian Tata Usaha', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'pegawai'),
(2, 'staff umum'),
(3, 'super admin'),
(4, 'kepala kantor ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `tb_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id_user_detail`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id_user_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `tb_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
