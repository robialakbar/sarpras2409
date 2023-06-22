-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 06:30 PM
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
-- Database: `sarpras`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode` varchar(32) NOT NULL,
  `jenis_barang` varchar(128) NOT NULL,
  `jumlah_barang` int(8) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_kategori`, `kode`, `jenis_barang`, `jumlah_barang`, `keterangan`, `tanggal`) VALUES
(1, 3, '001', 'Meja Guru', 22, ' bisa v2', '2023-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode` varchar(32) NOT NULL,
  `jenis_barang` varchar(128) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `jumlah_barang` int(8) NOT NULL,
  `tanggal` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_kategori`, `kode`, `jenis_barang`, `merk`, `jumlah_barang`, `tanggal`) VALUES
(1, 3, '001', 'Meja Guru', 'Olimpus', 10, '2023-06-20'),
(3, 3, '002', 'Kursi Siswa', 'Fuji', 20, '2023-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Meja Satpam'),
(3, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `kelola_perencanaan`
--

CREATE TABLE `kelola_perencanaan` (
  `id_kelola_perencanaan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode` varchar(32) NOT NULL,
  `jenis_barang` varchar(128) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `harga` int(16) NOT NULL,
  `jumlah_barang` int(8) NOT NULL,
  `total` int(16) NOT NULL,
  `tanggal_perencanaan` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelola_perencanaan`
--

INSERT INTO `kelola_perencanaan` (`id_kelola_perencanaan`, `id_kategori`, `kode`, `jenis_barang`, `merk`, `harga`, `jumlah_barang`, `total`, `tanggal_perencanaan`, `status`) VALUES
(1, 1, '001', ' Kursi Satpam', 'HW', 220000, 10, 2200000, '2023-06-22', 'diterima'),
(3, 3, '002', 'Papan Tulis', 'Paper', 23000, 1, 23000, '2023-06-23', 'ditolak'),
(4, 3, '003', 'Sound System', 'JBL', 500000, 2, 1000000, '2023-06-22', 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `id_pemeliharaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `total_sarana` int(8) NOT NULL,
  `total_prasarana` int(8) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`id_pemeliharaan`, `id_user`, `kode`, `total_sarana`, `total_prasarana`, `keterangan`, `tanggal`) VALUES
(3, 1, '001', 12, 29, 'Berhasil', '2023-06-21'),
(4, 1, '002', 20, 10, 'Test', '2023-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `kode` varchar(32) NOT NULL,
  `nama_peminjam` varchar(128) NOT NULL,
  `jenis_yang_dipinjam` varchar(128) NOT NULL,
  `jumlah` int(8) NOT NULL,
  `tanggal` varchar(32) NOT NULL,
  `tanggal_kembali` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `kode`, `nama_peminjam`, `jenis_yang_dipinjam`, `jumlah`, `tanggal`, `tanggal_kembali`) VALUES
(1, '001', 'Heru', 'Meja Guru', 13, '2023-06-21', '2023-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `kode` varchar(32) NOT NULL,
  `nama_peminjam` varchar(128) NOT NULL,
  `jenis_yang_dipinjam` varchar(128) NOT NULL,
  `jumlah` int(8) NOT NULL,
  `kondisi` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `tanggal_pengembalian` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `kode`, `nama_peminjam`, `jenis_yang_dipinjam`, `jumlah`, `kondisi`, `status`, `tanggal_pengembalian`) VALUES
(1, '001', 'Heru', 'Meja Guru', 5, 'Rusak', 'Lecet', '2023-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'Ruang Kelas1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `role` enum('kepala sekolah','staff','','') NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `role`, `created`) VALUES
(1, 'kepsek', '$2y$10$vxFzOzPxFo78yBMVVU5f4un7NWBeBLlBt7sPLBjtDPnlbEx8lICGm', 'Kepala Sekolah', 'kepala sekolah', '2023-06-21'),
(11, 'izumi', '$2y$10$yhHxd.vZW/BQJLvvaKz81OnGyZ7QT84GdO8IYvvfgHBMoR42vh6Qm', 'Izumii', 'staff', '2023-06-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelola_perencanaan`
--
ALTER TABLE `kelola_perencanaan`
  ADD PRIMARY KEY (`id_kelola_perencanaan`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`id_pemeliharaan`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelola_perencanaan`
--
ALTER TABLE `kelola_perencanaan`
  MODIFY `id_kelola_perencanaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `id_pemeliharaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelola_perencanaan`
--
ALTER TABLE `kelola_perencanaan`
  ADD CONSTRAINT `kelola_perencanaan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD CONSTRAINT `pemeliharaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
