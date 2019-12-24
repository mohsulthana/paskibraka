-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 09:15 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_paskibraka`
--

-- --------------------------------------------------------

--
-- Table structure for table `keputusan`
--

CREATE TABLE `keputusan` (
  `bobot_tertulis` varchar(20) NOT NULL,
  `bobot_wawancara` varchar(20) NOT NULL,
  `bobot_kesehatan` varchar(30) NOT NULL,
  `bobot_jasmani` varchar(30) NOT NULL,
  `bobot_postur` varchar(30) NOT NULL,
  `NISN` varchar(15) NOT NULL,
  `id_keputusan` int(10) NOT NULL,
  `Nilai_Akhir` varchar(25) NOT NULL,
  `status_kelulusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keputusan`
--

INSERT INTO `keputusan` (`bobot_tertulis`, `bobot_wawancara`, `bobot_kesehatan`, `bobot_jasmani`, `bobot_postur`, `NISN`, `id_keputusan`, `Nilai_Akhir`, `status_kelulusan`) VALUES
('', '', '', '', '', '123', 1, '0.12941226008965', 'Lulus by Sistem'),
('0.14142135623731', '0.099357314721218', '0.14142135623731', '0.19521720236076', '0.092847669088526', '124', 2, '0.59118852391077', 'Lulus by Sistem'),
('0.10389645436542', '0.058885604696853', '0.1067402241663', '0.076525632344435', '0.090950859388625', '125', 3, '0.61112987723467', 'Lulus by Sistem'),
('0.10389645436542', '0.058885604696853', '0.1067402241663', '0.076525632344435', '0.090950859388625', '128', 4, '0.45781366614441', 'Lulus by Sistem'),
('0.10389645436542', '0.058885604696853', '0.1067402241663', '0.076525632344435', '0.090950859388625', '131', 5, '0.90887755135093', 'Lulus by Sistem'),
('0.10389645436542', '0.058885604696853', '0.1067402241663', '0.076525632344435', '0.090950859388625', '678', 6, '0.38239789802242', 'Lulus by Sistem'),
('0.14142135623731', '0.099357314721218', '0.14142135623731', '0.19521720236076', '0.092847669088526', '654', 7, '0.40881147608923', 'Lulus by Sistem');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_bobot` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_bobot`, `nama`, `bobot`) VALUES
(1, 'Tes Tertulis', 0.1),
(2, 'Wawancara', 0.2),
(3, 'kesehatan', 0.2),
(4, 'jasmani', 0.25),
(5, 'postur', 0.25);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(10) NOT NULL,
  `NISN` int(11) NOT NULL,
  `Wawancara` int(11) NOT NULL,
  `Tertulis` int(11) NOT NULL,
  `Kesehatan` int(11) NOT NULL,
  `Postur` int(11) NOT NULL,
  `Jasmani` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `NISN`, `Wawancara`, `Tertulis`, `Kesehatan`, `Postur`, `Jasmani`) VALUES
(1, 123, 100, 66, 20, 60, 40),
(2, 124, 100, 9, 80, 80, 100),
(13, 125, 84, 67, 70, 60, 100),
(14, 128, 100, 10, 60, 80, 60),
(15, 131, 100, 100, 87, 74, 100),
(16, 678, 100, 88, 80, 40, 60),
(17, 654, 100, 79, 80, 100, 40);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `Username` varchar(30) NOT NULL,
  `NISN` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `HP` varchar(12) NOT NULL,
  `Kelas` varchar(11) NOT NULL,
  `Sekolah` varchar(20) NOT NULL,
  `Daerah` varchar(30) NOT NULL,
  `JK` varchar(10) NOT NULL,
  `TB` int(11) NOT NULL,
  `BB` int(11) NOT NULL,
  `Delegasi` varchar(250) NOT NULL,
  `Aktif_Sekolah` varchar(250) NOT NULL,
  `Izin_Ortu` varchar(250) NOT NULL,
  `Surat_Kesehatan` varchar(250) NOT NULL,
  `Biodata` varchar(250) NOT NULL,
  `Foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`Username`, `NISN`, `email`, `HP`, `Kelas`, `Sekolah`, `Daerah`, `JK`, `TB`, `BB`, `Delegasi`, `Aktif_Sekolah`, `Izin_Ortu`, `Surat_Kesehatan`, `Biodata`, `Foto`) VALUES
('Arindia', '124', '', '08271625367', 'X', 'SMAN 2 ', 'Kabupaten Empat Lawang', 'Perempuan', 143, 54, 'C:/xampp/htdocs/paskibraka/berkas/124/11918.jpg', 'C:/xampp/htdocs/paskibraka/berkas/124/119181.jpg', 'C:/xampp/htdocs/paskibraka/berkas/124/557124.jpg', 'C:/xampp/htdocs/paskibraka/berkas/124/5571241.jpg', 'C:/xampp/htdocs/paskibraka/berkas/124/119182.jpg', 'C:/xampp/htdocs/paskibraka/berkas/124/5571242.jpg'),
('kentzo', '125', 'kentzo@gmail.com', '0862517822', 'X', 'Sman 2 ', 'Kabupaten Ogan Ilir', 'Laki-laki', 124, 43, 'C:/xampp/htdocs/paskibraka/berkas/125/119185.jpg', 'C:/xampp/htdocs/paskibraka/berkas/125/0_gambar_bunga21.png', 'C:/xampp/htdocs/paskibraka/berkas/125/119186.jpg', 'C:/xampp/htdocs/paskibraka/berkas/125/119187.jpg', 'C:/xampp/htdocs/paskibraka/berkas/125/0_gambar_bunga22.png', 'C:/xampp/htdocs/paskibraka/berkas/125/119188.jpg'),
('mama', '128', 'hanam@gmail.com', '828282', 'X', 'SMAN 44', 'Kabupaten Banyuasin', 'Laki-laki', 123, 11, '-', '-', '-', '-', '-', '-'),
('akbar', '131', 'jbdjkdwj@gmail.com', '0826356182', 'X', 'SMAN 3 Palembang', 'Kabupaten Banyuasin', 'Laki-laki', 111, 111, '-', '-', '-', '-', '-', '-'),
('Hanum', '218', 'hanumsabrina60@yahoo.co.id', '08122222', '08122222', 'sman 1', 'Kabupaten Banyuasin', 'Perempuan', 111, 111, '-', '-', '-', '-', '-', '-'),
('veni', '654', 'hanumsabrina60@yahoo.co.id', '08122222', '08122222', 'sman 1', 'Kabupaten Banyuasin', 'Perempuan', 111, 111, '-', '-', '-', '-', '-', '-'),
('', '678', 'qwer@gmail.com', '0862771', 'X', 'SMAN 44', 'Kabupaten Banyuasin', 'Laki-laki', 11, 11, '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `NISN` varchar(15) NOT NULL,
  `Nama_Lengkap` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NISN`, `Nama_Lengkap`, `Nama`, `Password`, `status`) VALUES
('', '', '', '', 1),
('111', '', 'adminsistem', 'adminsistem', 4),
('131', 'Akbar Alzaini', 'akbar', 'akbar', 1),
('345678', '', 'akbarara', '12333', 4),
('124', '', 'Arindia', '124', 1),
('12345', '', 'hanoem', 'qwerty', 2),
('123', '', 'Hanum', '123', 1),
('125', 'M. Kentzo', 'kentzo', 'kentzo', 1),
('128', 'mama', 'mama', 'mama', 1),
('222', '', 'penilai', 'penilai', 5),
('000', 'noem', 'pimpinan', 'pimpinan', 3),
('678', 'qwerty', 'qwer', 'qwer', 1),
('654', 'veni', 'veni', 'veni', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`id_keputusan`),
  ADD UNIQUE KEY `id_nilai` (`NISN`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD UNIQUE KEY `NISN` (`NISN`),
  ADD UNIQUE KEY `NISN_2` (`NISN`),
  ADD UNIQUE KEY `NISN_3` (`NISN`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NISN`),
  ADD UNIQUE KEY `NISN` (`NISN`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Nama`),
  ADD UNIQUE KEY `NISN` (`NISN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keputusan`
--
ALTER TABLE `keputusan`
  MODIFY `id_keputusan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
