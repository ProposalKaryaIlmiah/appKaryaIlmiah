-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2016 at 02:54 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_karyailmiah`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `dosen_nip` varchar(10) NOT NULL,
  `dosen_password` varchar(100) NOT NULL,
  `dosen_nama` varchar(50) NOT NULL,
  `dosen_email` varchar(50) NOT NULL,
  `dosen_notlp` varchar(15) NOT NULL,
  `dosen_status` enum('Pembimbing','Koordinator') NOT NULL DEFAULT 'Pembimbing'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`dosen_nip`, `dosen_password`, `dosen_nama`, `dosen_email`, `dosen_notlp`, `dosen_status`) VALUES
('103.78.069', '827ccb0eea8a706c4c34a16891f84e7b', 'Roni Habibi, S.Kom., M.T.', 'roni.habibi@gmail.com	   ', '-', 'Pembimbing'),
('105.79.081', '827ccb0eea8a706c4c34a16891f84e7b', 'Woro	 Isti Rahayu, ST., M.T.', 'wistirahayu@yahoo.com', '-', 'Pembimbing');

-- --------------------------------------------------------

--
-- Table structure for table `katpengajuan`
--

CREATE TABLE `katpengajuan` (
  `katpengajuan_id` int(5) NOT NULL,
  `katpengajuan_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katpengajuan`
--

INSERT INTO `katpengajuan` (`katpengajuan_id`, `katpengajuan_nama`) VALUES
(1, 'TA'),
(2, 'Proyek 1'),
(3, 'Proyek 2'),
(4, 'Internship 1'),
(5, 'Internship 2');

-- --------------------------------------------------------

--
-- Table structure for table `koordinator`
--

CREATE TABLE `koordinator` (
  `koordinator_id` int(5) NOT NULL,
  `dosen_nip` varchar(10) NOT NULL,
  `katpengajuan_nama` varchar(100) NOT NULL,
  `koordinator_tahun` varchar(10) NOT NULL,
  `koordinator_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_npm` varchar(10) NOT NULL,
  `mahasiswa_password` varchar(100) NOT NULL,
  `mahasiswa_nama` varchar(50) NOT NULL,
  `mahasiswa_email` varchar(50) NOT NULL,
  `mahasiswa_kelas` varchar(10) NOT NULL,
  `mahasiswa_foto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_npm`, `mahasiswa_password`, `mahasiswa_nama`, `mahasiswa_email`, `mahasiswa_kelas`, `mahasiswa_foto`) VALUES
('1144016', '827ccb0eea8a706c4c34a16891f84e7b', 'Anggi Sholihatus Sadiah', 'anggisholihatus04@gmail.com', 'D4 TI 3B', 0),
('1144027', '827ccb0eea8a706c4c34a16891f84e7b', 'Tentri May Simbolon', 'tentrimay.simbolon@gmail.com', 'D4 TI 3C', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `pengajuan_id` int(5) NOT NULL,
  `mahasiswa_npm` varchar(10) NOT NULL,
  `pengajuan_judul` varchar(200) NOT NULL,
  `pengajuan_deskripsi` text NOT NULL,
  `katpengajuan_nama` varchar(50) NOT NULL,
  `dosen_nama` varchar(50) NOT NULL,
  `pengajuan_alasan` text NOT NULL,
  `pengajuan_file` varchar(100) NOT NULL,
  `pengajuan_tahun` varchar(10) NOT NULL,
  `pengajuan_status` enum('?','ACC','TIDAK') NOT NULL DEFAULT '?',
  `pengajuan_catatan` text NOT NULL,
  `pengajuan_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('e885cf5339d6e9d21131ca5987d92d74', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', 1481031865, 'a:6:{s:18:"mahasiswa_password";s:32:"827ccb0eea8a706c4c34a16891f84e7b";s:15:"mahasiswa_email";s:27:"anggisholihatus04@gmail.com";s:15:"mahasiswa_kelas";s:8:"D4 TI 3B";s:13:"mahasiswa_npm";s:7:"1144016";s:14:"mahasiswa_nama";s:23:"Anggi Sholihatus Sadiah";s:9:"logged_in";b:1;}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`dosen_nip`);

--
-- Indexes for table `katpengajuan`
--
ALTER TABLE `katpengajuan`
  ADD PRIMARY KEY (`katpengajuan_id`);

--
-- Indexes for table `koordinator`
--
ALTER TABLE `koordinator`
  ADD PRIMARY KEY (`koordinator_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_npm`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`pengajuan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `katpengajuan`
--
ALTER TABLE `katpengajuan`
  MODIFY `katpengajuan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `koordinator`
--
ALTER TABLE `koordinator`
  MODIFY `koordinator_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `pengajuan_id` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
