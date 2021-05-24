-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2021 at 12:03 AM
-- Server version: 10.5.9-MariaDB-1
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automata`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga`, `stok`, `foto`, `deskripsi`, `kategori`) VALUES
(1, 'Komputer', 200000, 20, '2.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'jual'),
(2, 'Laptop', 100000, 46, '3.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'sewa'),
(3, 'CCTV', 80000, 59, '1.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'jual'),
(4, 'Server', 1000000, 7, '5.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'sewa'),
(5, 'Printer', 60000, 40, '4.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'jual'),
(13, 'sad2', 100000, 33, 'Screenshot_20210516_161303.png', '                                            afa                                        ', 'jual');

-- --------------------------------------------------------

--
-- Table structure for table `foto_barang`
--

CREATE TABLE `foto_barang` (
  `id_foto` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_foto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto_barang`
--

INSERT INTO `foto_barang` (`id_foto`, `id_barang`, `nama_foto`) VALUES
(1, 1, '1.png'),
(2, 1, '2.png'),
(3, 1, '3.png'),
(4, 1, '4.png'),
(5, 1, '5.png'),
(6, 2, '5.png'),
(7, 2, '4.png'),
(8, 2, '3.png'),
(9, 2, '2.png'),
(10, 2, '1.png'),
(11, 3, '1.png'),
(16, 4, '5.png'),
(17, 4, '4.png'),
(18, 4, '3.png'),
(19, 4, '2.png'),
(20, 4, '1.png'),
(21, 5, '1.png'),
(22, 5, '2.png'),
(23, 5, '3.png'),
(24, 5, '4.png'),
(25, 5, '5.png'),
(44, 13, '1.jpg'),
(45, 13, '5.jpg'),
(57, 13, 'Screenshot_20210516_162111.png'),
(58, 13, 'Screenshot_20210517_110838.png');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `sales` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `kategori` enum('jual','sewa') NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_user`, `sales`, `total`, `kategori`, `waktu`, `status`) VALUES
(258435767, 1, 'Dede', 110000, 'jual', '2021-05-24 15:07:23', 'pending'),
(458300102, 1, 'Dede', 5500000, 'sewa', '2021-05-24 16:00:03', 'pending'),
(1445249057, 1, 'dodo', 88000, 'jual', '2021-05-24 16:58:42', 'pending'),
(2137577370, 1, 'Dede', 22220000, 'sewa', '2021-05-24 16:11:15', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_barang`
--

CREATE TABLE `pesanan_barang` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `peminjaman` varchar(100) NOT NULL,
  `pengembalian` varchar(100) NOT NULL,
  `jumlah_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan_barang`
--

INSERT INTO `pesanan_barang` (`id`, `id_pesanan`, `id_barang`, `foto`, `harga_barang`, `jumlah_barang`, `subtotal`, `peminjaman`, `pengembalian`, `jumlah_hari`) VALUES
(12, 2069354307, 5, '4.png', 60000, 1, 60000, '', '', 0),
(13, 708331381, 5, '4.png', 60000, 1, 60000, '', '', 0),
(14, 258435767, 13, 'Screenshot_20210516_161303.png', 100000, 1, 100000, '', '', 0),
(16, 458300102, 4, '5.png', 1000000, 1, 1000000, '2021-05-24', '2021-05-29', 5),
(17, 2137577370, 4, '5.png', 1000000, 3, 3000000, '2021-05-01', '2021-05-06', 5),
(18, 2137577370, 2, '3.png', 100000, 4, 400000, '2021-05-08', '2021-05-21', 13),
(19, 1445249057, 3, '1.png', 80000, 1, 80000, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `perusahaan` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `no_hp` varchar(45) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `level` enum('user','admin','sales') NOT NULL,
  `izin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `perusahaan`, `email`, `alamat`, `no_hp`, `foto`, `bukti`, `level`, `izin`) VALUES
(1, 'demo', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'PT. DEMO', 'demo@demo.com', 'demo Jl. Demo', '021111111111111', 'Screenshot_20210516_161303.png', '', 'user', 1),
(4, 'Admin Automata', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, '', '', '', 'find_user.png', '', 'admin', 1),
(11, 'dvd', 'dd', '202cb962ac59075b964b07152d234b70', 'pt. pelindo', 'mal@mail.com', 'asdad', '0219924051233', 'Screenshot_20210516_162111.png', 'Screenshot_20210517_110838.png', 'user', 1),
(13, 'Dede', 'dede', '202cb962ac59075b964b07152d234b70', NULL, 'dede@gmail.com', '', '02199240512', 'Screenshot_20210503_053921.png', '', 'sales', 1),
(14, 'dodo', 'dodo', '202cb962ac59075b964b07152d234b70', NULL, 'dodo@gmail.com', '', '021992567809', 'Screenshot_20210516_161303.png', '', 'sales', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_barang`
--
ALTER TABLE `foto_barang`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_barang`
--
ALTER TABLE `pesanan_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `foto_barang`
--
ALTER TABLE `foto_barang`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pesanan_barang`
--
ALTER TABLE `pesanan_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
