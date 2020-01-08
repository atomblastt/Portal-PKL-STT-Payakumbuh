-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2019 at 11:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan_dsn`
--

CREATE TABLE `bimbingan_dsn` (
  `id_bm_dsn` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `file_bm_dsn` varchar(255) NOT NULL,
  `komentar_dsn` varchar(255) NOT NULL,
  `update_dsn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan_mhs`
--

CREATE TABLE `bimbingan_mhs` (
  `id_bm_mhs` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `file_bm_mhs` varchar(255) NOT NULL,
  `komentar_mhs` varchar(255) NOT NULL,
  `update_mhs` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `id_user`, `nama_dosen`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `agama`, `no_tlp`, `gambar`, `status_update`) VALUES
(1, 67, 'lilik', '1970-12-12', 'pyk', 'pyk', 'islam', '098765', '', '2019-07-12 22:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `judul_pkl`
--

CREATE TABLE `judul_pkl` (
  `id_judul` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judul_pkl`
--

INSERT INTO `judul_pkl` (`id_judul`, `id_user`, `id_mahasiswa`, `judul`, `update`) VALUES
(1, 64, 27, 'gy8y8yi', '2019-07-12 22:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_pkl`
--

CREATE TABLE `kegiatan_pkl` (
  `id_kegiatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `absen` varchar(50) NOT NULL DEFAULT 'mangkir',
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_pkl`
--

INSERT INTO `kegiatan_pkl` (`id_kegiatan`, `id_user`, `id_mahasiswa`, `kegiatan`, `absen`, `tanggal_update`) VALUES
(1, 64, 27, 'menginput data', 'mangkir', '2019-07-13 02:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_judul` varchar(50) NOT NULL,
  `status_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `id_user`, `id_dosen`, `id_pembimbing`, `nama_mahasiswa`, `tanggal_lahir`, `tempat_lahir`, `prodi`, `alamat`, `agama`, `no_tlp`, `gambar`, `status_judul`, `status_update`) VALUES
(27, 64, 1, 0, 'Thomas Barone', '2016-09-29', 'PYK', 'Teknik Komputer', 'PKU', 'islam', '082345678909', '', 'acc', '2019-07-12 22:27:02'),
(28, 65, 0, 0, 'Jabal Aulia Rahman', '2017-10-29', 'PYK', 'Teknik Komputer', 'PKU', 'islam', '082345678909', '', '', '2019-07-10 10:19:46'),
(29, 68, 0, 0, 'megasur', '1997-02-25', 'pyk', 'Teknik Komputer', 'pyk', 'islam', '0928378923', '', '', '2019-07-13 00:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mhs`
--

CREATE TABLE `nilai_mhs` (
  `id_nilai` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `total_lapangan` int(11) NOT NULL,
  `total_akhir` int(11) NOT NULL,
  `nilai_lapangan` int(11) NOT NULL,
  `nilai_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing_lapangan`
--

CREATE TABLE `pembimbing_lapangan` (
  `id_pembimbing` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `nama_pembimbing` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `instusi` varchar(255) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing_lapangan`
--

INSERT INTO `pembimbing_lapangan` (`id_pembimbing`, `id_user`, `id_mahasiswa`, `nama_pembimbing`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `instusi`, `agama`, `no_tlp`, `gambar`, `status_update`) VALUES
(16, 66, 0, 'pak agus', '2017-11-29', 'PYK', 'PKU', '', 'islam', '082345678909', '', '2019-07-10 09:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing_mahasiswa`
--

CREATE TABLE `pembimbing_mahasiswa` (
  `id_user` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing_mahasiswa`
--

INSERT INTO `pembimbing_mahasiswa` (`id_user`, `id_mahasiswa`) VALUES
(16, 28),
(16, 28),
(16, 27);

-- --------------------------------------------------------

--
-- Table structure for table `pkl`
--

CREATE TABLE `pkl` (
  `id_pkl` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `status_pkl` varchar(50) NOT NULL DEFAULT 'peninjauan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pkl`
--

INSERT INTO `pkl` (`id_pkl`, `id_user`, `nama_tempat`, `lokasi`, `status_pkl`) VALUES
(16, 64, 'Pajak godang', 'seindah syurga', 'disetujui'),
(17, 65, 'Pajak godang', 'seindah syurga', 'disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `sidang`
--

CREATE TABLE `sidang` (
  `id_sidang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `jadwal_sidang` date NOT NULL,
  `id_penguji_1` int(11) NOT NULL,
  `id_penguji_2` int(11) NOT NULL,
  `status_sidang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sidang`
--

INSERT INTO `sidang` (`id_sidang`, `id_user`, `id_mahasiswa`, `jadwal_sidang`, `id_penguji_1`, `id_penguji_2`, `status_sidang`) VALUES
(1, 42, 16, '0000-00-00', 0, 0, 'acc dosen'),
(2, 44, 18, '2019-07-07', 2, 4, 'acc'),
(3, 57, 24, '2019-07-15', 8, 7, 'acc');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_induk` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses_level` varchar(100) NOT NULL DEFAULT 'mahasiswa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `no_induk`, `password`, `akses_level`) VALUES
(1, 'lilik@gmail.com', '161012018', '8cb2237d0679ca88db6464eac60da96345513964', 'prodi'),
(64, 'atomcrvrsquad@gmail.com', '161012001', '8cb2237d0679ca88db6464eac60da96345513964', 'mahasiswa'),
(65, 'jabal@gmail.com', '161012016', '8cb2237d0679ca88db6464eac60da96345513964', 'mahasiswa'),
(66, 'agus@gmail.com', '123456', '8cb2237d0679ca88db6464eac60da96345513964', 'pembimbing_lapangan'),
(67, 'lilik@gmail.com', '121344', '8cb2237d0679ca88db6464eac60da96345513964', 'dosen'),
(68, 'mega@gmail.com', '161012045', '8cb2237d0679ca88db6464eac60da96345513964', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan_dsn`
--
ALTER TABLE `bimbingan_dsn`
  ADD PRIMARY KEY (`id_bm_dsn`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `bimbingan_mhs`
--
ALTER TABLE `bimbingan_mhs`
  ADD PRIMARY KEY (`id_bm_mhs`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `judul_pkl`
--
ALTER TABLE `judul_pkl`
  ADD PRIMARY KEY (`id_judul`),
  ADD KEY `id_user` (`id_mahasiswa`);

--
-- Indexes for table `kegiatan_pkl`
--
ALTER TABLE `kegiatan_pkl`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_pembimbing` (`id_pembimbing`);

--
-- Indexes for table `nilai_mhs`
--
ALTER TABLE `nilai_mhs`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `pembimbing_lapangan`
--
ALTER TABLE `pembimbing_lapangan`
  ADD PRIMARY KEY (`id_pembimbing`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_user_3` (`id_user`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `pkl`
--
ALTER TABLE `pkl`
  ADD PRIMARY KEY (`id_pkl`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `sidang`
--
ALTER TABLE `sidang`
  ADD PRIMARY KEY (`id_sidang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan_dsn`
--
ALTER TABLE `bimbingan_dsn`
  MODIFY `id_bm_dsn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bimbingan_mhs`
--
ALTER TABLE `bimbingan_mhs`
  MODIFY `id_bm_mhs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `judul_pkl`
--
ALTER TABLE `judul_pkl`
  MODIFY `id_judul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kegiatan_pkl`
--
ALTER TABLE `kegiatan_pkl`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `nilai_mhs`
--
ALTER TABLE `nilai_mhs`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembimbing_lapangan`
--
ALTER TABLE `pembimbing_lapangan`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pkl`
--
ALTER TABLE `pkl`
  MODIFY `id_pkl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sidang`
--
ALTER TABLE `sidang`
  MODIFY `id_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kegiatan_pkl`
--
ALTER TABLE `kegiatan_pkl`
  ADD CONSTRAINT `kegiatan_pkl_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembimbing_lapangan`
--
ALTER TABLE `pembimbing_lapangan`
  ADD CONSTRAINT `pembimbing_lapangan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pkl`
--
ALTER TABLE `pkl`
  ADD CONSTRAINT `pkl_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
