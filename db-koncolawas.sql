-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 01:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-koncolawas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bahan`
--

CREATE TABLE `tbl_bahan` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bahan`
--

INSERT INTO `tbl_bahan` (`id_bahan`, `nama_bahan`, `stok`) VALUES
(1, 'Bakso Urat Mentah', 45),
(2, 'Bakso Telur Mentah', 45),
(3, 'Mie Kuning', 48),
(5, 'Bakso Halus Mentah', 100),
(6, 'Bakso Mercon Mentah', 45),
(7, 'Bakso Iga Mentah', 20),
(8, 'Teh', 298),
(9, 'Jeruk', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jual`
--

CREATE TABLE `tbl_jual` (
  `id_jual` int(11) NOT NULL,
  `no_faktur` varchar(15) DEFAULT NULL,
  `tgl_jual` date DEFAULT NULL,
  `jam` time DEFAULT current_timestamp(),
  `grand_total` int(11) DEFAULT NULL,
  `dbayar` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `nama_kasir` varchar(50) DEFAULT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `no_meja` int(11) DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL,
  `id_kasir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jual`
--

INSERT INTO `tbl_jual` (`id_jual`, `no_faktur`, `tgl_jual`, `jam`, `grand_total`, `dbayar`, `kembalian`, `nama_kasir`, `nama_pelanggan`, `no_meja`, `keterangan`, `id_kasir`) VALUES
(23, '202405290001', '2024-05-30', '04:29:13', 13000, 20000, 7000, 'Dijal', 'ucup', NULL, NULL, NULL),
(24, '202405290001', '2024-05-30', '05:56:44', 14000, 20000, 6000, 'Dijal', 'dijal', NULL, NULL, NULL),
(25, '202405300002', '2024-05-30', '09:58:36', 14000, 20000, 6000, 'Dijal', 'uasd', NULL, NULL, NULL),
(26, '202405300003', '2024-05-30', '13:36:11', 43000, 50000, 7000, 'Raka', 'raka', NULL, NULL, NULL),
(27, '202406040001', '2024-06-05', '00:37:05', 14000, 15000, 1000, 'Dijal', 'udin', NULL, NULL, NULL),
(28, '202406050002', '2024-06-05', '15:43:59', 14000, 20000, 6000, 'Dijal', 'ujang', NULL, NULL, NULL),
(29, '202406050002', '2024-06-05', '15:46:44', 14000, 20000, 6000, 'Dijal', 'ujang', NULL, NULL, NULL),
(30, '202406050002', '2024-06-05', '15:47:34', 14000, 20000, 6000, 'Dijal', 'ujang', NULL, NULL, NULL),
(31, '202406050002', '2024-06-05', '15:47:36', 14000, 20000, 6000, 'Dijal', 'ujang', NULL, NULL, NULL),
(32, '202406050003', '2024-06-05', '15:49:10', 14000, 12000, -2000, 'Dijal', 'ujan', NULL, NULL, NULL),
(33, '202406050004', '2024-06-05', '15:52:07', 14000, 20000, 6000, 'Dijal', 'ujang', NULL, NULL, NULL),
(34, '202406050005', '2024-06-05', '16:03:20', 71000, 100000, 29000, 'Dijal', 'ina', NULL, NULL, NULL),
(35, '202406050006', '2024-06-05', '18:47:48', 14000, 20000, 6000, 'Dijal', 'ucin', NULL, NULL, NULL),
(36, '202406050007', '2024-06-06', '00:35:20', 14000, 50000, 36000, 'Dijal', 'asd', NULL, NULL, NULL),
(37, '202406050007', '2024-06-06', '00:49:49', 14000, 20000, 6000, 'Dijal', 'dina', NULL, NULL, NULL),
(38, '202406050007', '2024-06-06', '00:51:13', 16000, 20000, 4000, 'Dijal', 'ujang', NULL, NULL, NULL),
(39, '202406050007', '2024-06-06', '00:55:28', 14000, 20000, 6000, 'Dijal', 'ucin', NULL, NULL, NULL),
(40, '202406050007', '2024-06-06', '01:00:06', 13000, 20000, 7000, 'Dijal', 'asd', NULL, NULL, NULL),
(41, '202406050007', '2024-06-06', '01:46:05', 16000, 20000, 4000, 'Dijal', 'asd', NULL, NULL, NULL),
(42, '202406060008', '2024-06-06', '13:19:44', 21000, 23000, 2000, 'admin', 'udin', NULL, NULL, NULL),
(43, '202406180001', '2024-06-18', '16:15:46', 4500, 5000, 500, 'Dijal', 'ujang', NULL, NULL, NULL),
(44, '202406180002', '2024-06-18', '16:16:27', 14000, 17000, 3000, 'Dijal', 'raka', NULL, NULL, NULL),
(45, '202406180003', '2024-06-18', '16:20:39', 21500, 25000, 3500, 'Dijal', 'raka', NULL, NULL, NULL),
(46, '202406180004', '2024-06-18', '17:01:20', 4500, 5000, 500, 'kasir', 'ujang', NULL, NULL, NULL),
(47, '202406180004', '2024-06-18', '17:01:21', 0, 5000, 5000, 'kasir', 'ujang', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(2) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(2) NOT NULL,
  `kode_produk` varchar(25) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `id_kategori` int(2) DEFAULT NULL,
  `id_satuan` int(2) DEFAULT NULL,
  `id_bahan` int(11) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `kode_produk`, `nama_produk`, `id_kategori`, `id_satuan`, `id_bahan`, `harga_beli`, `harga_jual`, `gambar`) VALUES
(12, 'M0001', 'Mie Ayam', 1, 6, 3, 8000, 13000, 'https://upload.wikimedia.org/wikipedia/commons/8/82/Mi_ayam_jamur.JPG'),
(13, 'M0002', 'Mie Ayam Bakso', 1, 6, 3, 10000, 15000, 'https://allofresh.id/blog/wp-content/uploads/2023/08/cara-membuat-mie-ayam-4.jpg'),
(14, 'BU0001', 'Bakso Urat Lengkap', 1, 6, 1, 13000, 15000, 'https://cdn.linkumkm.id/library/9/0/3/1/1/90311_840x576.jpg'),
(15, 'BU0002', 'Bakso Urat tanpa Mie', 1, 6, 1, 11000, 14000, 'https://miro.medium.com/v2/resize:fit:480/1*l9b4MMbgFaqz7KH65xDZOw.jpeg'),
(16, 'BU0003', 'Bakso Urat Spesial', 1, 6, 1, 15000, 20000, 'https://www.alpermata.com/wp-content/uploads/2021/01/IMG_5234-1024x683.jpg'),
(17, 'BT0001', 'Bakso Telur', 1, 6, 2, 8000, 13000, 'https://cdn.idntimes.com/content-images/post/20200122/bakso-362ae4f801fa9cf14e910faf3cd4eae0_600x400'),
(18, 'BT0002', 'Bakso Telur Tanpa Mie', 1, 6, 2, 11000, 14000, 'https://www.jagel.id/api/listimage/v/Bakso-Telur-Tanpa-Mie-0-54761a9afbf1d3c9.jpg'),
(19, 'BT0003', 'Bakso Telur Lengkap', 1, 6, 2, 13000, 16000, 'https://images.tokopedia.net/img/cache/500-square/VqbcmM/2022/1/25/1c2d0b6d-0585-408d-900f-8957104dd'),
(20, 'BM0001', 'Bakso Mercon', 1, 6, 6, 12000, 15000, 'https://beritajatim.com/cdn-cgi/image/width=545,height=563,fit=crop,quality=80,format=auto,onerror=r'),
(21, 'BH0001', 'Bakso Halus Komplit', 1, 6, 5, 11000, 13000, 'https://www.daya.id/02%20Kisah%20Sukses/Usaha/2022/2022-04/Gagal%20di%20Bidang%20Usaha%20Lain-%20Pen'),
(22, 'BH0002', 'Bakso Halus', 1, 6, 5, 8000, 11000, 'https://www.jagel.id/api/listimage/v/Bakso-Halus-Kosongan-0-5245f62c5e2e721f.jpg'),
(23, 'BM0002', 'Bakso Mercon Komplit', 1, 6, 6, 14000, 18000, 'https://awsimages.detik.net.id/community/media/visual/2018/10/20/08cec229-53c4-4bae-82fb-2e0099d9a87'),
(24, 'BI0001', 'Bakso Iga', 1, 6, 7, 20000, 40000, 'https://cdn.idntimes.com/content-images/community/2022/01/fromandroid-5f8c6c91b35ccc22f8432e8cffcf8f'),
(25, 'BI0002', 'Bakso Iga Komplit', 1, 6, 7, 26000, 50000, 'https://i.pinimg.com/736x/09/fa/6f/09fa6f0355db42a8272cbfde3e5cabfc.jpg'),
(27, 'T0002', 'Teh Manis Panas ', 2, 3, 8, 1800, 4500, 'https://gratisongkir-storage.com/products/900x900/tEGKNZn3osm7.jpg'),
(28, 'J0001', 'Es Jeruk', 2, 3, 9, 4000, 7000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7QCESy9aa3Ueel_fZQu9xtxmVIHCD_8oDiA&s'),
(29, 'J0002', 'Jeruk Panas', 2, 3, 9, 3800, 6500, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZa0PmCpZNmAWuuFbOw0d2v9nCvJYv-nQN-Q&s');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rinci`
--

CREATE TABLE `tbl_rinci` (
  `id_rinci` int(11) NOT NULL,
  `no_faktur` varchar(15) DEFAULT NULL,
  `kode_produk` varchar(15) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `tgl_jual` date NOT NULL,
  `jam` time NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `untung` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_kasir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rinci`
--

INSERT INTO `tbl_rinci` (`id_rinci`, `no_faktur`, `kode_produk`, `nama_produk`, `tgl_jual`, `jam`, `qty`, `harga_jual`, `harga_beli`, `untung`, `total`, `id_produk`, `id_kasir`) VALUES
(1, '202405050004', 'BU0002', 'Bakso Urat tanpa Mie', '2024-05-05', '15:52:07', 1, 14000, 11000, 3000, 14000, NULL, NULL),
(2, '202406050005', 'M0001', 'Mie Ayam', '2024-06-05', '16:03:20', 1, 13000, 8000, 5000, 13000, NULL, NULL),
(3, '202406050005', 'M0002', 'Mie Ayam Bakso', '2024-06-05', '16:03:20', 1, 15000, 10000, 5000, 15000, NULL, NULL),
(4, '202406050005', 'BU0001', 'Bakso Urat Lengkap', '2024-06-05', '16:03:20', 1, 15000, 13000, 2000, 15000, NULL, NULL),
(5, '202406050005', 'BU0002', 'Bakso Urat tanpa Mie', '2024-06-05', '16:03:20', 2, 14000, 11000, 6000, 28000, NULL, NULL),
(6, '202406050006', 'BU0002', 'Bakso Urat tanpa Mie', '2024-06-05', '18:47:48', 1, 14000, 11000, 3000, 14000, NULL, NULL),
(7, '202406050007', 'BU0002', 'Bakso Urat tanpa Mie', '2024-06-06', '00:35:20', 1, 14000, 11000, 3000, 14000, NULL, NULL),
(8, '202406050007', 'BU0002', 'Bakso Urat tanpa Mie', '2024-06-06', '00:49:49', 1, 14000, 11000, 3000, 14000, NULL, NULL),
(9, '202406050007', 'BT0003', 'Bakso Telur Lengkap', '2024-06-06', '00:51:13', 1, 16000, 13000, 3000, 16000, NULL, NULL),
(10, '202406050007', 'BT0002', 'Bakso Telur Tanpa Mie', '2024-06-06', '00:55:28', 1, 14000, 11000, 3000, 14000, NULL, NULL),
(11, '202406050007', 'BT0001', 'Bakso Telur', '2024-06-06', '01:00:06', 1, 13000, 8000, 5000, 13000, NULL, NULL),
(12, '202406050007', 'BT0003', 'Bakso Telur Lengkap', '2024-06-06', '01:46:05', 1, 16000, 13000, 3000, 16000, NULL, NULL),
(13, '202406060008', 'BU0002', 'Bakso Urat tanpa Mie', '2024-06-06', '13:19:44', 1, 14000, 11000, 3000, 14000, NULL, NULL),
(14, '202406060008', 'J0001', 'Es Jeruk', '2024-06-06', '13:19:44', 1, 7000, 4000, 3000, 7000, NULL, NULL),
(15, '202406180001', 'T0002', 'Teh Manis Panas ', '2024-06-18', '16:15:46', 1, 4500, 1800, 2700, 4500, NULL, NULL),
(16, '202406180002', 'BU0002', 'Bakso Urat tanpa Mie', '2024-06-18', '16:16:27', 1, 14000, 11000, 3000, 14000, NULL, NULL),
(17, '202406180003', 'J0002', 'Jeruk Panas', '2024-06-18', '16:20:39', 1, 6500, 3800, 2700, 6500, NULL, NULL),
(18, '202406180003', 'M0002', 'Mie Ayam Bakso', '2024-06-18', '16:20:39', 1, 15000, 10000, 5000, 15000, NULL, NULL),
(19, '202406180004', 'T0002', 'Teh Manis Panas ', '2024-06-18', '17:01:20', 1, 4500, 1800, 2700, 4500, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id_satuan` int(2) NOT NULL,
  `nama_satuan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id_satuan`, `nama_satuan`) VALUES
(3, 'Buah'),
(6, 'Porsi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(2) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level`) VALUES
(1, 'Dijal', 'dijalcandy@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(2, 'Ucup', 'ucup123@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3),
(4, 'Raka', 'rakaapu@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
(5, 'Ucok', 'ucoktampan123@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 4),
(6, 'admin', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(7, 'pemilik', 'pemilik@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 4),
(8, 'kasir', 'kasir@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
(9, 'gudang', 'gudang@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bahan`
--
ALTER TABLE `tbl_bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `tbl_rinci`
--
ALTER TABLE `tbl_rinci`
  ADD PRIMARY KEY (`id_rinci`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `idkasir` (`id_kasir`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bahan`
--
ALTER TABLE `tbl_bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_rinci`
--
ALTER TABLE `tbl_rinci`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id_satuan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD CONSTRAINT `id_kasir` FOREIGN KEY (`id_kasir`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `id_bahan` FOREIGN KEY (`id_bahan`) REFERENCES `tbl_bahan` (`id_bahan`),
  ADD CONSTRAINT `id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`),
  ADD CONSTRAINT `id_satuan` FOREIGN KEY (`id_satuan`) REFERENCES `tbl_satuan` (`id_satuan`);

--
-- Constraints for table `tbl_rinci`
--
ALTER TABLE `tbl_rinci`
  ADD CONSTRAINT `id_produk` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`),
  ADD CONSTRAINT `idkasir` FOREIGN KEY (`id_kasir`) REFERENCES `tbl_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
