-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 01:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blt`
--

-- --------------------------------------------------------

--
-- Table structure for table `blt`
--

CREATE TABLE `blt` (
  `id_blt` varchar(30) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `nama` text NOT NULL,
  `tgl_diajukan` date NOT NULL,
  `nik` varchar(100) NOT NULL,
  `kk` text NOT NULL,
  `rt` text NOT NULL,
  `norek` text NOT NULL,
  `sakit` text NOT NULL,
  `disabilitas` text NOT NULL,
  `pendapatan` text NOT NULL,
  `dinding` text NOT NULL,
  `lantai` text NOT NULL,
  `atap` text NOT NULL,
  `bantuan` text NOT NULL,
  `foto` varchar(500) NOT NULL,
  `id_status_blt` int(12) NOT NULL,
  `alasan_verifikasi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blt`
--

INSERT INTO `blt` (`id_blt`, `id_user`, `nama`, `tgl_diajukan`, `nik`, `kk`, `rt`, `norek`, `sakit`, `disabilitas`, `pendapatan`, `dinding`, `lantai`, `atap`, `bantuan`, `foto`, `id_status_blt`, `alasan_verifikasi`) VALUES
('blt-0a3f6', '0000f879df9b442107cc359168ce33a6', 'Ridzal', '2024-05-27', '1111111111111111', '1111111111111111', '10/02', '1111111111111111', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'image4.png', 2, 'Miskin Extreme'),
('blt-243c1', '0000f879df9b442107cc359168ce33a6', 'SEPIA ', '2024-05-27', '5315034507750008', '5315030710080055', '01/03', '5682654879006543', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'images.jpg', 2, 'Sregep Kerigan'),
('blt-4e93e', '0000f879df9b442107cc359168ce33a6', 'WAHYUDI ', '2024-05-27', '5315052606030008', '5315032910090008', '01/03', '6548902439271436', 'Tidak', 'Ya', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', 'image3.png', 3, 'Seneng ndablong');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `status_blt`
--

CREATE TABLE `status_blt` (
  `id_status_blt` int(11) NOT NULL,
  `status_blt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_blt`
--

INSERT INTO `status_blt` (`id_status_blt`, `status_blt`) VALUES
(1, 'Menunggu Konfirmasi'),
(2, 'Izin blt Diterima'),
(3, 'Izin blt Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(256) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_user_detail` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `id_user_level`, `id_user_detail`) VALUES
('0000f879df9b442107cc359168ce33a6', 'intan', 'intan', 'intan@gmail.com', 1, '0000f879df9b442107cc359168ce33a6'),
('134e349e4f50a051d8ca3687d6a7de1a', 'admin', 'admin', 'admin@admin.com', 2, '134e349e4f50a051d8ca3687d6a7de1a'),
('1fcaef592c1b8f4b733b04e19be58f99', 'fajar', 'fajar', 'fajar@gmail.com', 1, '1fcaef592c1b8f4b733b04e19be58f99'),
('263a76c22eb8acf8c3e08edd55c1421d', 'ali', 'ali', 'ali@gmail.com', 1, '263a76c22eb8acf8c3e08edd55c1421d'),
('2d0323357f989f5f37f7ad36472987d5', 'zaki', 'zaki', 'zaki@gmail.com', 1, '2d0323357f989f5f37f7ad36472987d5'),
('2fbb953bcaf76ff9d669197a6d9b6733', 'dedi', 'dedi', 'dedi@gmail.com', 1, '2fbb953bcaf76ff9d669197a6d9b6733'),
('39332f054c98c54e4eda83e1274566ed', 'putri', 'putri', 'putri@gmail.com', 1, '39332f054c98c54e4eda83e1274566ed'),
('394125b4dd6a990d44234aacb50d131a', 'abdul', 'adbul', 'abdul@gmail.com', 1, '394125b4dd6a990d44234aacb50d131a'),
('40bae2603ae22725d35def9e7c48b0d6', 'zahra', 'zahra', 'zahra@gmail.com', 1, '40bae2603ae22725d35def9e7c48b0d6'),
('44dabb248ea11b849e01b8daf96afcd1', 'violita', 'violita', 'violita@gmail.com', 1, '44dabb248ea11b849e01b8daf96afcd1'),
('57b4255e4a7980a1ddabce0ab0e506d6', 'hamdan', 'hamdan', 'Hamdan@gmail.com', 1, '57b4255e4a7980a1ddabce0ab0e506d6'),
('5a481cabb876061353a43db9b6f2e1bd', 'ikhwan', 'ikhwan', 'ikhwan@gmail.com', 1, '5a481cabb876061353a43db9b6f2e1bd'),
('66d0de4b6aab1f34ed9d8779f375a2ea', 'ahmad', 'ahmad', 'ahmad@gmail.com', 1, '66d0de4b6aab1f34ed9d8779f375a2ea'),
('8ac5e3b30c2f0091eef898158122d131', 'alvian', 'alvian', 'alvian@gmail.com', 1, '8ac5e3b30c2f0091eef898158122d131'),
('93f012d5ead1feed5512ad71e28ad6e5', 'marita', 'marita', 'marita@gmail.com', 1, '93f012d5ead1feed5512ad71e28ad6e5'),
('98eb4077470a60a0fe0f7b9d01755557', 'admin2', 'admin2@admin.com', 'ika@gmail.com', 2, '98eb4077470a60a0fe0f7b9d01755557'),
('a83fbd96f2b40a72ac3eb0d96f457222', 'sisca', 'sisca', 'sisca@gmail.com', 1, 'a83fbd96f2b40a72ac3eb0d96f457222'),
('beecc6bfae05c7fba5a19f27f41a27ec', 'elga', 'elga', 'elga@gmail.com', 1, 'beecc6bfae05c7fba5a19f27f41a27ec'),
('c5ebbfc46694606d675519cc31666e0d', 'firman', 'firman', 'firman@gmail.com', 1, 'c5ebbfc46694606d675519cc31666e0d'),
('d43114b75460d274e82f6cc8b6f93b5f', 'sindy', 'sindy', 'sindy@gmail.com', 1, 'd43114b75460d274e82f6cc8b6f93b5f'),
('dbedcc1be9d89cbb3eda751309eb77b0', 'bagus', 'bagus', 'bagus@gamil.com', 1, 'dbedcc1be9d89cbb3eda751309eb77b0'),
('f5972fbf4ef53843c1e12c3ae99e5005', 'sekretaris', 'sekretaris', 'kresna123@gmail.com', 3, 'f5972fbf4ef53843c1e12c3ae99e5005'),
('f8ed2321348b78239fb493bc55eed7b2', 'malik', 'malik', 'maik@gmail.com', 1, 'f8ed2321348b78239fb493bc55eed7b2');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id_user_detail` varchar(256) NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `id_jenis_kelamin` int(12) DEFAULT NULL,
  `no_telp` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `pangkat` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id_user_detail`, `nama_lengkap`, `id_jenis_kelamin`, `no_telp`, `alamat`, `nip`, `pangkat`, `jabatan`) VALUES
('0000f879df9b442107cc359168ce33a6', 'Ratna Intan', 2, '089878675654', 'Jl. Kendangsari', NULL, NULL, NULL),
('134e349e4f50a051d8ca3687d6a7de1a', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fcaef592c1b8f4b733b04e19be58f99', 'Fajar Alfansyah', 1, '081221334561', 'Jl. Ngagel Rejo', NULL, NULL, NULL),
('263a76c22eb8acf8c3e08edd55c1421d', 'Ali Makruf', 1, '087667898112', 'Jl. Sumberan', NULL, NULL, NULL),
('2d0323357f989f5f37f7ad36472987d5', 'Zaki Agus Saputra', 1, '089876765672', 'Jl. Klampis Jaya', NULL, NULL, NULL),
('2fbb953bcaf76ff9d669197a6d9b6733', 'Dadi Gusriyanto', 1, '087888879765', 'Jl. Dukuh Kupang', NULL, NULL, NULL),
('39332f054c98c54e4eda83e1274566ed', 'Putri Yulia Sari', 2, '087676765654', 'Jl. Sukosemolo', NULL, NULL, NULL),
('394125b4dd6a990d44234aacb50d131a', 'Abdul Haris', 1, '081234567890', 'Jl. Ahmad Yani', NULL, NULL, NULL),
('40bae2603ae22725d35def9e7c48b0d6', 'Zahra Amelia Fauzzi', 2, '085656456212', 'Jl. Kenjeran', NULL, NULL, NULL),
('44dabb248ea11b849e01b8daf96afcd1', 'Silvani Violita', 2, '089789876654', 'Jl. Sukosemolo', NULL, NULL, NULL),
('57b4255e4a7980a1ddabce0ab0e506d6', 'Hamdan Fajeril', 1, '087675641321', 'Jl. Walisongo', NULL, NULL, NULL),
('5a481cabb876061353a43db9b6f2e1bd', 'Ikhwan Saputra', 1, '085665453421', 'Jl. Bratang Gede', NULL, NULL, NULL),
('66d0de4b6aab1f34ed9d8779f375a2ea', 'Ahmad Burhanuddin', 1, '081654432342', 'Jl. Pejuang', NULL, NULL, NULL),
('8ac5e3b30c2f0091eef898158122d131', 'Alvian Andhi', 1, '089777666562', 'Jl. Ngagel Rejo', NULL, NULL, NULL),
('93f012d5ead1feed5512ad71e28ad6e5', 'Dwi Marita', 2, '081432415678', 'Jl. Manyar', NULL, NULL, NULL),
('98eb4077470a60a0fe0f7b9d01755557', NULL, 1, NULL, NULL, NULL, NULL, NULL),
('a83fbd96f2b40a72ac3eb0d96f457222', 'Sisca Verbriyanti', 2, '082341445678', 'Jl. Klampis Jaya', NULL, NULL, NULL),
('beecc6bfae05c7fba5a19f27f41a27ec', 'Elga Yuan Saputra', 1, '081224567122', 'Jl. Ngagel Rejo', NULL, NULL, NULL),
('c5ebbfc46694606d675519cc31666e0d', 'Firman Saputra', 1, '081234567890', 'Jl. Kaliurang', NULL, NULL, NULL),
('d43114b75460d274e82f6cc8b6f93b5f', 'Sindy Safara', 2, '081654432342', 'Jl. Bung Tomo', NULL, NULL, NULL),
('dbedcc1be9d89cbb3eda751309eb77b0', 'Bagus Saputra', 1, '0811122341432', 'Jl. Klampis Jaya', NULL, NULL, NULL),
('f5972fbf4ef53843c1e12c3ae99e5005', NULL, 1, NULL, NULL, NULL, NULL, NULL),
('f8ed2321348b78239fb493bc55eed7b2', 'Malik Indra Kusuma', 1, '081656765431', 'Jl. Diponegoro', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'petugas_lapangan'),
(2, 'admin'),
(3, 'super admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blt`
--
ALTER TABLE `blt`
  ADD PRIMARY KEY (`id_blt`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indexes for table `status_blt`
--
ALTER TABLE `status_blt`
  ADD PRIMARY KEY (`id_status_blt`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id_user_detail`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_blt`
--
ALTER TABLE `status_blt`
  MODIFY `id_status_blt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
