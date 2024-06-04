-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2024 at 01:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_promosi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id_galeri` int NOT NULL,
  `id_produk` int NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`id_galeri`, `id_produk`, `foto`) VALUES
(22, 29, '1717449489.JPG'),
(23, 29, '1717449494.JPG'),
(24, 30, '1717449684.JPG'),
(25, 30, '1717449704.jpg'),
(26, 30, '1717449710.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int NOT NULL,
  `id_user` int NOT NULL,
  `id_produk` int NOT NULL,
  `id_range` int NOT NULL,
  `tanggal` datetime NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_user`, `id_produk`, `id_range`, `tanggal`, `deskripsi`) VALUES
(2, 3, 29, 9, '2024-06-04 00:00:36', 'sdf'),
(3, 3, 30, 9, '2024-06-04 08:03:19', 'asdasdasdasdasd'),
(4, 3, 30, 9, '2024-06-04 08:04:36', 'ffd'),
(5, 3, 30, 9, '2024-06-04 08:05:15', 'sdfsdf'),
(6, 3, 30, 9, '2024-06-04 08:13:13', 'sdsd'),
(7, 3, 30, 9, '2024-06-04 08:15:42', 'sdf'),
(8, 3, 30, 9, '2024-06-04 08:31:01', 'asd'),
(9, 3, 30, 9, '2024-06-04 08:33:35', 'sdsdfd'),
(10, 3, 30, 9, '2024-06-04 08:34:10', 'adss');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `hp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama`, `deskripsi`, `foto`, `hp`) VALUES
(29, 'e', 'e', '1717449299.JPG', '081234567890'),
(30, 'FANTA', 'uuu', '1717449481.JPG', '6281344968521'),
(31, 'Heinz', '333', '1717460900.jpg', '081244532213');

-- --------------------------------------------------------

--
-- Table structure for table `tb_range`
--

CREATE TABLE `tb_range` (
  `id_range` int NOT NULL,
  `id_produk` int NOT NULL,
  `range1` int NOT NULL,
  `range2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_range`
--

INSERT INTO `tb_range` (`id_range`, `id_produk`, `range1`, `range2`) VALUES
(9, 30, 100000, 200000),
(10, 30, 10000, 20000),
(11, 29, 23, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama`, `hp`, `alamat`, `foto`, `username`, `password`, `role`) VALUES
(1, 'admin 1', '081208201', 'admin@gmail.com', '', 'admin', 'admin', 'admin'),
(3, 'Adminia', '123123323', '78979789', '1716797766.jpg', 'root', 'root', 'user');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_produk`
-- (See below for the actual view)
--
CREATE TABLE `view_produk` (
`deskripsi` varchar(255)
,`foto` text
,`id_galeri` int
,`id_produk` int
,`nama` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi` (
`alamat_user` varchar(255)
,`deskripsi` text
,`hp_produk` text
,`nama_produk` varchar(255)
,`nama_user` varchar(255)
,`range1` int
,`range2` int
,`tanggal` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `view_produk`
--
DROP TABLE IF EXISTS `view_produk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_produk`  AS SELECT `tb_galeri`.`id_galeri` AS `id_galeri`, `tb_produk`.`id_produk` AS `id_produk`, `tb_produk`.`nama` AS `nama`, `tb_galeri`.`foto` AS `foto`, `tb_produk`.`deskripsi` AS `deskripsi` FROM (`tb_galeri` left join `tb_produk` on((`tb_galeri`.`id_produk` = `tb_produk`.`id_produk`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS SELECT `tb_users`.`nama` AS `nama_user`, `tb_users`.`alamat` AS `alamat_user`, `tb_produk`.`nama` AS `nama_produk`, `tb_produk`.`hp` AS `hp_produk`, `tb_range`.`range1` AS `range1`, `tb_range`.`range2` AS `range2`, `tb_order`.`deskripsi` AS `deskripsi`, `tb_order`.`tanggal` AS `tanggal` FROM (((`tb_order` join `tb_produk` on((`tb_produk`.`id_produk` = `tb_order`.`id_produk`))) join `tb_users` on((`tb_users`.`id_user` = `tb_order`.`id_user`))) join `tb_range` on((`tb_range`.`id_range` = `tb_order`.`id_range`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_range` (`id_range`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_range`
--
ALTER TABLE `tb_range`
  ADD PRIMARY KEY (`id_range`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id_galeri` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_range`
--
ALTER TABLE `tb_range`
  MODIFY `id_range` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD CONSTRAINT `tb_galeri_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_order_ibfk_3` FOREIGN KEY (`id_range`) REFERENCES `tb_range` (`id_range`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_range`
--
ALTER TABLE `tb_range`
  ADD CONSTRAINT `tb_range_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
