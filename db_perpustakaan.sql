-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 06:16 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_akun` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_akun`, `id_anggota`, `email`, `password`, `role_id`, `is_active`, `date_created`, `gambar`) VALUES
(3, 2, 'admin@gmail.com', '$2y$10$9YH1D4KPPNFyPbOSWv7O5uk14uMhgAF7t3nVPjxweZuyrk3Hjwszu', 1, 1, 1625832757, 'fb.png'),
(4, 3, 'Ephanzen4@gmail.com', '$2y$10$8.5zqXiidhg36L5Yu1vfC.iNlt4xfe08bTnTcaE8A35zjC1jwaxUS', 2, 1, 1625834056, 'profil.jpg'),
(5, 4, 'lola1987lol@gmail.com', '$2y$10$g3N61rA5Tlc9ZJ/Xk5UlJ..jtWyezl.LkYgC/mTUzkpy0/yTEIDzS', 2, 1, 1625834276, '319483.jpg'),
(7, 7, '191111048@mhs.stiki.ac.id', '$2y$10$Y8VWMVA7gBNQLlv2pZaCGO3gO27VQWcKkRe6TfTmK7ty8Cn4TZ.o2', 2, 1, 1626010064, 'wp1828920-coding-wallpapers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `kode_anggota` char(20) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `jk_siswa_anggota` enum('Laki-laki','Perempuan') NOT NULL,
  `nis_lokal` varchar(128) NOT NULL,
  `ttl` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `kode_anggota`, `nama_anggota`, `jk_siswa_anggota`, `nis_lokal`, `ttl`) VALUES
(2, '0', 'ADMIN', 'Laki-laki', '', ''),
(3, '0045227820', 'ABIDATUZ ZAKIYA', 'Perempuan', '131235070064200001', 'Malang, 10 Oktober 2004'),
(4, '0036916227', 'ACHMAD IKHLASH SAYYIDI RAJAB', 'Perempuan', '131235070064200002', 'Malang, 7 September 2003'),
(5, '0047286290', 'AHMAD MUHAIMIN ISKANDARIA', 'Laki-laki', '131235070064200006', 'Malang, 08 Desember 2004'),
(6, '0046332234', 'AMALIA PUTRI SRI LESTARI', 'Perempuan', '131235070064200007', 'Malang, 25 Juli 2004'),
(7, '0044881345', 'BURHANUDIN YUSUF', 'Laki-laki', '131235070064200011', 'Gresik, 19 April 2004'),
(8, '0053855795', 'CHALIK ALI RIDHO', 'Laki-laki', '131235070064200012', 'Mojokerto, 26 Januari 2005'),
(9, '0046019362', 'DAVANI ISTIANA BASTIAN', 'Perempuan', '131235070064200013', 'Bekasi, 17 Oktober 2004'),
(10, '0047654603', 'DAVINA FISTIANI BASTIAN', 'Perempuan', '131235070064200014', 'Bekasi, 17 Oktober 2004'),
(11, '0050997455', 'DWITA NANDA MARGARINI', 'Perempuan', '131235070064200018', 'Malang, 02 Mei 2005'),
(12, '0058233316', 'FERNANDA OLIVIA PUTRI', 'Perempuan', '131235070064200019', 'Malang, 16 Agustus 2005');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` char(20) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `tahun_penerbit` char(7) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `judul_buku`, `id_kategori`, `id_penulis`, `id_penerbit`, `tahun_penerbit`, `stok`) VALUES
(1, 'KMK001', 'HAIKYUU', 1, 1, 1, '2012', 36),
(3, 'NVL001', 'Laskar Pelangi', 2, 5, 3, '2005', 49),
(10, 'NVL002', 'Novel Remaja', 2, 5, 3, '2017', 30);

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_buku`
-- (See below for the actual view)
--
CREATE TABLE `info_buku` (
`id_buku` int(11)
,`kode_buku` char(20)
,`judul_buku` varchar(100)
,`id_kategori` int(11)
,`nama_kategori` varchar(200)
,`id_penulis` int(11)
,`nama_penulis` varchar(128)
,`id_penerbit` int(11)
,`nama_penerbit` varchar(128)
,`tahun_penerbit` char(7)
,`stok` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_peminjaman`
-- (See below for the actual view)
--
CREATE TABLE `info_peminjaman` (
`id_peminjaman` int(11)
,`nama_anggota` varchar(100)
,`id_buku` int(11)
,`judul_buku` varchar(100)
,`tanggal_pinjam` date
,`tanggal_kembali` date
,`status` enum('Sudah Kembali','Belum Kembali')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_pengembalian`
-- (See below for the actual view)
--
CREATE TABLE `info_pengembalian` (
`nama_anggota` varchar(100)
,`tanggal_kembali` date
,`tanggal_pengembalian` date
,`judul_buku` varchar(100)
,`denda` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'KOMIK'),
(2, 'NOVEL'),
(5, 'CERPEN');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `id_anggota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_pinjam`, `tanggal_kembali`, `id_anggota`) VALUES
(1, '2021-12-27', '2021-12-30', 3),
(2, '2021-01-02', '2021-01-05', 3),
(3, '2022-01-03', '2022-01-06', 3);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_detail`
--

CREATE TABLE `peminjaman_detail` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `status` enum('Sudah Kembali','Belum Kembali') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman_detail`
--

INSERT INTO `peminjaman_detail` (`id_peminjaman`, `id_buku`, `status`) VALUES
(1, 1, 'Sudah Kembali'),
(2, 1, 'Belum Kembali'),
(3, 3, 'Sudah Kembali'),
(3, 1, 'Belum Kembali'),
(3, 3, 'Belum Kembali');

--
-- Triggers `peminjaman_detail`
--
DELIMITER $$
CREATE TRIGGER `kurang stok` AFTER INSERT ON `peminjaman_detail` FOR EACH ROW BEGIN
UPDATE buku
SET stok = stok - 1
WHERE id_buku = new.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
(1, 'Shueisha'),
(3, 'Bentang Pustaka');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman`, `tanggal_pengembalian`, `denda`) VALUES
(1, 1, '2022-01-02', 1500),
(2, 3, '2022-01-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_detail`
--

CREATE TABLE `pengembalian_detail` (
  `id_pengembalian` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian_detail`
--

INSERT INTO `pengembalian_detail` (`id_pengembalian`, `id_buku`) VALUES
(1, 1),
(2, 3);

--
-- Triggers `pengembalian_detail`
--
DELIMITER $$
CREATE TRIGGER `tambah stok` AFTER INSERT ON `pengembalian_detail` FOR EACH ROW BEGIN
UPDATE buku
set stok = stok + 1
WHERE id_buku = new.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(11) NOT NULL,
  `nama_penulis` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`) VALUES
(1, 'Haruichi Furudate'),
(5, 'Andrea Hirata');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(50) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Siswa'),
(5, 'Buku'),
(6, 'Peminjaman'),
(7, 'Pengembalian'),
(8, 'lihatBuku');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-qrcode', 1),
(2, 2, 'Info', 'user', 'fas fa-qrcode', 1),
(3, 4, 'Siswa', 'siswa', 'fas fa-fw fa-user', 1),
(4, 5, 'Buku', 'buku', 'fas fa-fw fa-book', 1),
(5, 6, 'Peminjaman', 'peminjaman', 'fas fa-fw fa-clipboard', 1),
(6, 7, 'Pengembalian', 'pengembalian', 'fas fa-fw fa-exchange-alt', 1),
(7, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 0),
(8, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 0),
(9, 8, 'Lihat Buku', 'lihatBuku', 'fas fa-fw fa-book', 1);

-- --------------------------------------------------------

--
-- Structure for view `info_buku`
--
DROP TABLE IF EXISTS `info_buku`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_buku`  AS SELECT `buku`.`id_buku` AS `id_buku`, `buku`.`kode_buku` AS `kode_buku`, `buku`.`judul_buku` AS `judul_buku`, `kategori`.`id_kategori` AS `id_kategori`, `kategori`.`nama_kategori` AS `nama_kategori`, `penulis`.`id_penulis` AS `id_penulis`, `penulis`.`nama_penulis` AS `nama_penulis`, `penerbit`.`id_penerbit` AS `id_penerbit`, `penerbit`.`nama_penerbit` AS `nama_penerbit`, `buku`.`tahun_penerbit` AS `tahun_penerbit`, `buku`.`stok` AS `stok` FROM (((`buku` join `kategori`) join `penulis`) join `penerbit`) WHERE `buku`.`id_kategori` = `kategori`.`id_kategori` AND `buku`.`id_penulis` = `penulis`.`id_penulis` AND `buku`.`id_penerbit` = `penerbit`.`id_penerbit` ;

-- --------------------------------------------------------

--
-- Structure for view `info_peminjaman`
--
DROP TABLE IF EXISTS `info_peminjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_peminjaman`  AS SELECT `peminjaman`.`id_peminjaman` AS `id_peminjaman`, `anggota`.`nama_anggota` AS `nama_anggota`, `buku`.`id_buku` AS `id_buku`, `buku`.`judul_buku` AS `judul_buku`, `peminjaman`.`tanggal_pinjam` AS `tanggal_pinjam`, `peminjaman`.`tanggal_kembali` AS `tanggal_kembali`, `peminjaman_detail`.`status` AS `status` FROM (((`anggota` join `peminjaman`) join `peminjaman_detail`) join `buku`) WHERE `anggota`.`id_anggota` = `peminjaman`.`id_anggota` AND `peminjaman`.`id_peminjaman` = `peminjaman_detail`.`id_peminjaman` AND `buku`.`id_buku` = `peminjaman_detail`.`id_buku` ;

-- --------------------------------------------------------

--
-- Structure for view `info_pengembalian`
--
DROP TABLE IF EXISTS `info_pengembalian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_pengembalian`  AS SELECT `anggota`.`nama_anggota` AS `nama_anggota`, `peminjaman`.`tanggal_kembali` AS `tanggal_kembali`, `pengembalian`.`tanggal_pengembalian` AS `tanggal_pengembalian`, `buku`.`judul_buku` AS `judul_buku`, `pengembalian`.`denda` AS `denda` FROM ((((`pengembalian` join `buku`) join `pengembalian_detail`) join `peminjaman`) join `anggota`) WHERE `pengembalian`.`id_pengembalian` = `pengembalian_detail`.`id_pengembalian` AND `buku`.`id_buku` = `pengembalian_detail`.`id_buku` AND `pengembalian`.`id_peminjaman` = `peminjaman`.`id_peminjaman` AND `anggota`.`id_anggota` = `peminjaman`.`id_anggota` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `nama_kategori` (`id_kategori`),
  ADD KEY `id_penulis` (`id_penulis`),
  ADD KEY `id_penerbit` (`id_penerbit`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `pengembalian_detail`
--
ALTER TABLE `pengembalian_detail`
  ADD KEY `id_pengembalian` (`id_pengembalian`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`),
  ADD CONSTRAINT `buku_ibfk_3` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id_penulis`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_4` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);

--
-- Constraints for table `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  ADD CONSTRAINT `peminjaman_detail_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`),
  ADD CONSTRAINT `peminjaman_detail_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Constraints for table `pengembalian_detail`
--
ALTER TABLE `pengembalian_detail`
  ADD CONSTRAINT `pengembalian_detail_ibfk_1` FOREIGN KEY (`id_pengembalian`) REFERENCES `pengembalian` (`id_pengembalian`),
  ADD CONSTRAINT `pengembalian_detail_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `rak`
--
ALTER TABLE `rak`
  ADD CONSTRAINT `rak_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
