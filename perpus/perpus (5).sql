-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 03:52 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `id_peminjam` int(100) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `no_buku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`id_peminjam`, `nama_peminjam`, `instansi`, `no_hp`, `judul`, `tgl_pinjam`, `tgl_kembali`, `no_buku`) VALUES
(1, 'Namia Amanta', 'FH ULM', '0', 'Logika HK', '2021-07-05', '2021-07-12', '16 FAT L'),
(2, 'Rahmawati', 'FH ULM', '0', 'Penelitian Hukum (Legal Research)', '2021-07-05', '2021-07-12', '23122'),
(3, 'Luqyana Farah', 'FH ULM', '0', 'Teori HK', '2021-07-05', '2021-07-12', '340.12'),
(4, 'Vania Ananta', 'Fakultas Hukum Unlam', '0', 'Hukum Humaniter Internasional', '2021-07-06', '2021-07-13', '341.9.H'),
(5, 'Ivanra Ananta', 'Fakultas Hukum Unlam', '0', 'Penanganan Korban Kekerasan Dalam Rumah Tangga', '2021-07-07', '2021-07-14', '25074'),
(6, 'Ivanra Ananta', 'Fakultas Hukum Unlam', '0', 'Pengantar Tata Hukum Indonesia', '2021-07-07', '2021-07-14', '23096'),
(7, 'Ridho', 'Kanwil', '0', 'Unsur unsur perbuatan yang dapat dilakukan', '2021-07-09', '2021-07-15', '343.23'),
(8, 'Rahmawati', 'Unlam', '0', 'Sanksi Perdata Administratif Terhadap Notaris', '2021-07-16', '2021-07-26', '347.964'),
(9, 'Lugayana Fatah', 'Unlam', '0', 'Jurnal HAM Vol 11 No 8 Agustus 2020 Badan Penelitian dan Pengembangan Hukum dan HAM RI', '2021-07-16', '2021-07-23', ''),
(10, 'Nur Ni\'mah', 'Unlam', '0', 'Jurnal HAM Vol 11 No 8 Agustus 2020 Badan Penelitian dan Pengembangan Hukum dan HAM RI', '2021-07-16', '2021-07-23', ''),
(11, 'Hairul Fahmi', 'kanwil', '0', 'Undang Undang Republik Indonesia Tentang Keberagaman RI', '2021-08-11', '0000-00-00', '38010'),
(12, 'Adiyanto', 'Kanwil', '0', 'Cyber Low', '2021-09-16', '0000-00-00', '341'),
(13, 'Arpali', 'Kanwil', '0', 'Perlindungan Hukum dan HAM Terhadap Perempuan Korban Kekerasan RUmah Tangga dan Upaya Pencegahan nya', '2021-09-10', '2021-09-17', '32172'),
(14, 'Arpali', 'Kanwil', '0', 'UU RI Nomor 23 Tahun 2004 Tentang Penghapusan Kekerasan Dalam Rumah Tangga', '2021-09-10', '2021-09-17', '37074'),
(15, 'Bahjah', 'Kanwil', '0', 'Hukum Agraria', '2021-09-21', '2021-09-29', '34.333'),
(16, 'Dony', 'Kanwil', '0', 'Psikologi Umum', '2021-09-30', '0000-00-00', ''),
(17, 'Akhwan', 'Kanwil ', '0', 'Hukum Adat Indonesia', '2021-10-04', '2021-10-11', '34.91'),
(18, 'Lutfiyana', 'FH ULM', '0', 'Panduan Praktis Memahami Perancangan Peraturan Daerah', '2021-10-14', '2021-10-28', '11.009'),
(19, 'Nur Ni\'mah', 'FH ULM', '0', 'Kekerasan Terhadap Perempuan ', '2021-10-14', '2021-10-28', '371.4'),
(20, 'Erdalima', 'Notaris Batola', '0', 'Syarah Riyadhush Shalihih', '2021-11-08', '2021-11-22', '348.97'),
(21, 'Muhammad Yasir', 'Fakultas Hukum ULM', '0', 'Peran Penasihat Hukum Dalam Penegakan Hukum Pidana', '2021-11-16', '0000-00-00', ''),
(22, 'Anya', 'Uniska', '0', 'Sejarah Pemikir Dalam Islam', '2021-11-23', '2021-12-21', '930.297'),
(23, 'Riski Aulia Ananda', 'FEB ULM', '0', 'Sejarah Pemikiran Islam', '2022-01-06', '0000-00-00', '13050'),
(24, 'Yanto', 'Kanwil ', '0', 'Hukum Perusahaan Indonesia', '2021-12-21', '2022-04-07', ''),
(25, 'Ahmad Syaipullah', 'Unlam', '081251149235', 'Undang Undang Pembentukan Pembahasan Permasalahan DPK', '2021-12-27', '2022-02-08', ''),
(26, 'Agustina', 'Unlam', '081351992669', 'Pengantar Hukum Ketenagakerjaan', '2021-12-27', '0000-00-00', ''),
(27, 'Lugyana Farah  N.N', 'Unlam', '089524601709', 'Kekerasan Terhadap Perempuan', '2022-01-03', '2022-01-12', '343.88.MUN.K'),
(28, 'Lugyana Farah  N.N', 'Unlam', '089524601709', 'Perancangan Peraturan Daerah ', '2022-01-03', '2022-01-17', '342.7'),
(29, 'Syamsul Bahri', 'Swasta', '081551733337', 'Teori dan Praktek Hukum Pidana Khusus', '2022-01-08', '2022-02-01', '044.5'),
(30, 'Syamsul Bahri', 'Swasta', '081551733337', 'Perlindungan Saksi dan Korban Dalam Sistem Peradilan Pidana', '2022-01-08', '2022-02-01', ''),
(31, 'Riska', 'Uniska ', '087815778680', 'Hukum Merek', '2022-02-01', '2022-06-06', 'P.DIK'),
(32, 'M. Rasyid', '', '085247639903', 'Hukum Tanah', '2022-02-24', '2022-03-01', ''),
(33, 'M. Rasyid', '', '085247639903', 'Hukum Pertambangan', '2022-02-24', '2022-03-01', ''),
(34, 'M. Rasyid', '', '085247639903', 'Hukum Tata Usaha', '2022-02-24', '2022-03-01', ''),
(35, 'Riska', 'Uniska', '087815778680', 'Hukum Merek', '2022-01-08', '2022-02-24', ''),
(36, 'Riska', 'Uniska', '087815778680', 'Himpunan Merek Merek Tahun 1978', '2022-01-08', '2022-02-24', ''),
(37, 'Raihan ', 'handil Bakti ', '083141724924', 'Singgasana Kalsel Teropong Masa Depan Banua', '2022-02-01', '2022-03-07', ''),
(38, 'Suci Kartikasari', 'Kayutangi 2 Jalur 3', '089524515186', 'Penyelenggaraan Bantuan Hukum', '2022-03-01', '2022-03-22', ''),
(39, 'Wily AKbar R', 'Handil Bakti', '083159316773', 'Buku Pedoman Penerapan Restorative Justice Dalam Upaya Perlindungan Anak Yang Berkonflik Dengan Huku', '2022-03-09', '2022-11-10', ''),
(40, 'Wily AKbar R', 'Handil Bakti', '083159316773', 'Evaluasi Pemenuhan Hak Anak Pada daerah Otonom Hasil Pemekaran di Provinsi dan Kabupaten ', '2022-03-09', '2022-11-10', ''),
(41, 'Iwan Setiawan J', 'Jl. Pramuka', '082158847036', 'Penegakan Hukum Psikotropika Dalam Kation Sosiologi Hukum', '2022-03-09', '2022-04-15', ''),
(42, 'Iwan Setiawan J', 'Jl. Pramuka', '082158847036', 'Kejahatan Narkotika dan Psikotropika', '2022-03-09', '2022-04-15', ''),
(43, 'Novi', 'Kanwil', '08525288168', 'Otonomi Daerah dan Daerah Otonom', '2022-03-14', '2022-03-21', ''),
(44, 'Novi', 'Kanwil', '08525288168', 'Pemberhentian Kepala Daerah', '2022-03-14', '2022-03-21', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_dataanggota`
--

CREATE TABLE `t_dataanggota` (
  `id_anggota` int(5) NOT NULL,
  `no_anggota` varchar(9) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jns_klmn` varchar(9) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `pkrjaan` varchar(100) NOT NULL,
  `denda` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_dataanggota`
--

INSERT INTO `t_dataanggota` (`id_anggota`, `no_anggota`, `nama_anggota`, `tempat_lahir`, `tanggal_lahir`, `jns_klmn`, `alamat`, `telp`, `nik`, `pkrjaan`, `denda`) VALUES
(10, '10310524', 'Kay', 'Balikpapan', '2002-11-25', 'Laki-laki', 'Jl. Handil Bakti', '085705945879', '6304052511020001', 'Mahasiswa', '0000-00-00'),
(11, '11310524', 'Noval', 'Banjarmasin', '1998-07-19', 'Laki-laki', 'handil bakti', '081367875373', '65555555', 'Universitas Muhammadiyah Banjarmasin', '2024-08-13'),
(12, '12060624', 'Rahmat', 'Banjarmasin', '2002-01-10', 'Laki-laki', 'Jl. Kayutangi', '081367875373', '60040384789', 'Universitas Sari Mulia', '0000-00-00'),
(13, '13120624', 'User', 'Banjarmasin', '2024-06-12', 'Laki-laki', 'abcde', '12345', '11111', 'abc', '0000-00-00'),
(14, '14100724', 'Kayyisu', 'Kapuas', '2024-07-10', 'Laki-laki', 'wwwwww', '12345678', '111111', 'Kantor Wilayah', '0000-00-00'),
(15, '15230724', 'amin', 'tamban', '2019-01-23', 'Laki-laki', 'anjir', '1111111', '2222222', 'kuli', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `t_datapengguna`
--

CREATE TABLE `t_datapengguna` (
  `id_pengguna` int(5) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_datapengguna`
--

INSERT INTO `t_datapengguna` (`id_pengguna`, `nama_pengguna`, `level`, `nip`, `username`, `password`) VALUES
(1, 'Kayyisu ', 1, '00001', 'Kapus', 'Kapus'),
(2, 'Willyani', 2, '00002', '1', '1'),
(3, 'Kayyisu Willyani', 2, '00003', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `t_datapengunjung`
--

CREATE TABLE `t_datapengunjung` (
  `id_pgnjng` int(5) NOT NULL,
  `no_anggota` int(50) NOT NULL,
  `nama_pgnjng` varchar(50) NOT NULL,
  `kprluan` text NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_datapengunjung`
--

INSERT INTO `t_datapengunjung` (`id_pgnjng`, `no_anggota`, `nama_pgnjng`, `kprluan`, `tgl`) VALUES
(26, 0, 'kay', 'handil bakti', '2024-05-31'),
(27, 0, 'ubai', 'kelayan', '2024-06-03'),
(28, 0, 'putri', 'kayu tangi', '2024-06-03'),
(29, 0, 'ahmad', 'belitung', '2024-06-04'),
(30, 0, 'azmi', 'kuin', '2024-06-04'),
(31, 0, 'imam', 'kayutangi', '2024-06-04'),
(32, 0, 'kayyisu', 'Handil bakti', '2024-06-04'),
(33, 0, 'kayyisu', 'handil bakti', '2024-06-06'),
(34, 0, 'kayyisu', 'handil bakti', '2024-06-10'),
(35, 0, 'kayyisu', 'handil bakti', '2024-06-11'),
(36, 0, 'kay', 'handil bakti', '2024-06-11'),
(37, 0, 'Ratih', 'Veteran', '2024-01-02'),
(38, 0, 'Nor Anisa', 'Kampung Gadang', '2024-01-04'),
(39, 0, 'Rusmaida', 'Cemata', '2024-01-04'),
(40, 0, 'M. Haris', 'Kayutangi', '2024-01-04'),
(41, 0, 'M. Fikri Firdaus', 'Bumimas', '2024-01-04'),
(42, 0, 'Windri Lestari', 'Kayu Tangi', '2024-01-08'),
(43, 0, 'M. Fikri Firdaus', 'Bumimas', '2024-01-08'),
(44, 0, 'Rena T', 'Pekapuran', '2024-01-11'),
(45, 0, 'Anggun', 'Gerilya', '2024-01-11'),
(46, 0, 'Nur Irfansyah', 'Handil Bakti', '2024-01-15'),
(47, 0, 'Ramly Salim A', 'Manunggal II', '2024-01-15'),
(48, 0, 'Fajar', 'Handil Bakti', '2024-01-17'),
(49, 0, 'Nor Anisa', 'Kampung Gadang', '2024-01-18'),
(50, 0, 'Ramly Salim A', 'UIN Antasari', '2024-01-19'),
(51, 0, 'Nurhalisa', 'UIN Antasari', '2024-01-19'),
(52, 0, 'Ahmad Royhan', 'SMKN 4 BJM', '2024-01-22'),
(53, 0, 'Imam Zikri', 'SMKN 4 BJM', '2024-01-22'),
(54, 0, 'Nor Anisa', 'UIN Antasari', '2024-01-22'),
(55, 0, 'Ratih', 'Veteran', '2024-01-23'),
(56, 0, 'Bayu', 'Manarap', '2024-01-24'),
(57, 0, 'M. Hatta', 'Handil Bakti', '2024-01-24'),
(58, 0, 'Kusumawati', 'Banjar Raya', '2024-01-24'),
(59, 0, 'Mirna', 'Adhyaksa', '2024-01-24'),
(60, 0, 'Dewi', 'A. Yani', '2024-01-26'),
(61, 0, 'Maida', 'Kayutangi', '2024-01-26'),
(62, 0, 'Nurhalisa', 'UIN Antasari', '2024-01-26'),
(63, 0, 'Nadia', 'Perumnas', '2024-01-29'),
(64, 0, 'Aisya', 'A. Yani', '2024-01-29'),
(65, 0, 'Alexa', 'Jl. AES Nasution', '2024-01-30'),
(66, 0, 'Anwar', 'HKSN', '2024-01-31'),
(67, 0, 'Dewi', 'Jl. Veteran', '2024-02-01'),
(68, 0, 'Rusmaida', 'Cemara', '2024-02-01'),
(69, 0, 'Anita Karlina', 'Handil Bakti', '2024-02-01'),
(70, 0, 'Azizah', 'Uniska', '2024-02-02'),
(71, 0, 'Hastarie', 'Handil Bakti', '2024-02-02'),
(72, 0, 'Linda', 'Adiyaksa', '2024-02-05'),
(73, 0, 'Juliyanti', 'Wildan', '2024-02-05'),
(74, 0, 'Mirna', 'Adhiyaksa', '2024-02-07'),
(75, 0, 'Helmina', 'Kuin', '2024-02-07'),
(76, 0, 'Rusli', 'BJM', '2024-02-08'),
(77, 0, 'Sunaryo', 'Handil Bakti', '2024-02-12'),
(78, 0, 'Ratih', 'Veteran', '2024-02-12'),
(79, 0, 'Rusli', 'BJM', '2024-02-13'),
(80, 0, 'Aji', 'BJM', '2024-02-13'),
(81, 0, 'Ratih', 'BJM', '2024-02-15'),
(82, 0, 'Joel', 'BJM', '2024-02-15'),
(83, 0, 'Fayta', 'BJM', '2024-02-16'),
(84, 0, 'Linda', 'Adhyaksa', '2024-02-19'),
(85, 0, 'Anita', 'Handil Bakti', '2024-02-19'),
(86, 0, 'Rusli', 'BJM', '2024-02-19'),
(87, 0, 'Fansyah', 'Handil Bakti', '2024-02-20'),
(88, 0, 'Anita Karlina', 'Handil Bakti', '2024-02-20'),
(89, 0, 'Rusmaida', 'Cemara', '2024-02-21'),
(90, 0, 'Linda', 'Adiyaksa', '2024-02-22'),
(91, 0, 'Dewi', 'BJM', '2024-02-22'),
(92, 0, 'Mirna', 'Adhiyaksa', '2024-02-22'),
(93, 0, 'M. Adetya A', 'Pramuka', '2024-02-23'),
(94, 0, 'Helmalia', 'Jl. Banyiur luar', '2024-02-23'),
(95, 0, 'Vina', 'SImpang Ulin', '2024-02-23'),
(96, 0, 'Richo', 'Sungai Andai', '2024-02-26'),
(97, 0, 'Giovan', 'Belitung', '2024-02-26'),
(98, 0, 'Dina', 'Adyaksa', '2024-02-27'),
(99, 0, 'Danang', 'Sultan Adam', '2024-02-27'),
(100, 0, 'Rizqon', 'Sultan Adam', '2024-02-27'),
(101, 0, 'Linda', 'Adyaksa', '2024-02-28'),
(102, 0, 'Mirna', 'Jl. Adyaksa', '2024-02-28'),
(103, 0, 'Zamira', 'Jl. Adiyaksa', '2024-02-29'),
(104, 0, 'Arya', 'Banjarmasin', '2024-02-29'),
(105, 0, 'Ratih', 'Jl. Veteran', '2024-02-29'),
(106, 0, 'Puspita', 'HKSN', '2024-02-29'),
(107, 0, 'Dewi', 'Uniska', '2024-03-04'),
(108, 0, 'Linda', 'Uniska', '2024-03-04'),
(109, 0, 'Rio', 'Handil Bakti', '2024-03-04'),
(110, 0, 'Windy', 'Pos Bakumadin Kalsel', '2024-03-05'),
(111, 0, 'Tika', 'Pos Bakumadin Kalsel', '2024-03-05'),
(112, 0, 'Sabrina R', 'FH ULM', '2024-03-05'),
(113, 0, 'Nadia', 'Kayutangi', '2024-03-06'),
(114, 0, 'Ica', 'Kayutangi', '2024-03-06'),
(115, 0, 'Puspita', 'Uniska', '2024-03-06'),
(116, 0, 'Fatya', 'Uniska', '2024-03-07'),
(117, 0, 'Linda', 'Uniska', '2024-03-07'),
(118, 0, 'Anita Karlina', 'Uniska', '2024-03-07'),
(119, 0, 'YOYO', 'Handil Bakti', '2024-03-07'),
(120, 0, 'Dewi', 'Kanwil', '2024-03-07'),
(121, 0, 'Arie', 'Kanwil', '2024-03-08'),
(122, 0, 'YOYO', 'Kanwil', '2024-03-13'),
(123, 0, 'Ratih', 'Kanwil', '2024-03-13'),
(124, 0, 'Anggria', 'Sultan Adam', '2024-03-13'),
(125, 0, 'Nur Irfansyah', 'Handil Bakti', '2024-03-13'),
(126, 0, 'Rio', 'Teluk Dalam', '2024-03-14'),
(127, 0, 'Dewi', 'Uniska', '2024-03-18'),
(128, 0, 'Fansyah', 'Sutoyo S', '2024-03-21'),
(129, 0, 'Rusli', 'kanwil', '2024-03-22'),
(130, 0, 'Antonius', 'Darma Praja', '2024-03-25'),
(131, 0, 'Ipan', 'Kanwil', '2024-03-25'),
(132, 0, 'Arya', 'Kanwil', '2024-03-26'),
(133, 0, 'Ratih', 'Kanwil', '2024-03-27'),
(134, 14100724, 'Kayyisu', 'Anggota', '2024-07-23'),
(135, 12060624, 'Rahmat', 'Anggota', '2024-07-23'),
(136, 0, 'kayyisu', 'banjarmasin', '2024-07-23'),
(137, 11310524, 'Noval', 'Anggota', '2024-07-23'),
(138, 11310524, 'Noval', 'Anggota', '2024-07-23'),
(142, 0, 'akmal', 'barito', '2024-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `t_datapustaka`
--

CREATE TABLE `t_datapustaka` (
  `id_dp` int(10) NOT NULL,
  `judul_dp` varchar(150) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` int(4) NOT NULL,
  `isbn` varchar(15) NOT NULL,
  `klasifikasi` varchar(20) NOT NULL,
  `jumlah` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_datapustaka`
--

INSERT INTO `t_datapustaka` (`id_dp`, `judul_dp`, `kategori`, `pengarang`, `penerbit`, `tahun`, `isbn`, `klasifikasi`, `jumlah`) VALUES
(1, 'HUKUM PEMBUKTIAN PIDANA', 'Buku Hukum', 'HARIMAN SATRIA', 'PT RAJA GRAFINDO PERSADA', 2022, '9786025759192', '343 HAR H', 2),
(4, 'PERBANDINGAN HUKUM PIDANA DI 18 NEGARA', 'Buku Hukum', 'Prof. Dr. (jur.) Andi Hamzah', 'PT RAJA GRAFINDO PERSADA', 2022, '9789792921588', '343 AND P', 2),
(5, 'ETIKA DAN MORAL PENEGAK HUKUM DI INDONESIA', 'Buku Hukum', 'Prof. Dr. H. A. Salman Maggalatung, S.H., M.H.', 'PT RAJA GRAFINDO PERSADA', 2023, '9786020269757', '342.97(910) SAL E', 2),
(9, 'DINAMIKA KONSTITUALISME DI INDONESIA', 'Buku Hukum', 'Luthfi Widagdo Eddyono', 'PT RAJA GRAFINDO PERSADA', 2020, '9789792967593', '342.766(91) LUT D', 2),
(10, 'HUKUM PIDANA PEMILU ', 'Buku Hukum', 'TOPO SANTOSO', 'PT RAJA GRAFINDO PERSADA', 2024, '9786233729109', '343 TOP H', 2),
(11, 'PENGANTAR ILMU POLITIK', 'Buku Hukum', 'Dr. Syafhendry, M.S', 'PT RAJAGRAFINDO PERSADA', 2024, '9786230807305', '342 SYA P', 1),
(12, 'ILMU PERUNDANG UNDANGAN', 'Buku Hukum', 'Dr. Putera Astomo, S.H., M.H.', 'PT RAJAGRAFINDO PERSADA', 2023, '9786024255107', '340 PUT I', 3),
(13, 'ANTROPOLOGI HUKUM KONTEMPORER', 'Buku Hukum', 'Dr. Erdianto Effendi, S.H., M.Hum.', 'PT RAJAGRAFINDO PERSADA', 2023, '9786230803369', '34.01 ERD A', 3),
(14, 'REFLEKSI PEMIKIRAN HUKUM TATA NEGARA', 'Buku Hukum', 'UMBU RAUTA', 'PT RAJA GRAFINDO PERSADA', 2023, '9786230802614', '34 UMB R', 2),
(15, 'TANGKAL TERORISME DAN SOFT APPROACH', 'Buku Hukum', 'Dr. Drs. Edi Saputra Hasibuan, S.H., M.H.', 'PT RAJA GRAFINDO PERSADA', 2023, '9786233728539', '343 EDI T', 2),
(16, 'Teori Konstitusi Sejarah, Teori, dan Perubahan Kosnstitusi', 'Buku Hukum', 'Dr. Taufiqurohman Syahuri, S.H., M.H.', 'PT RAJA GRAFINDO PERSADA', 2023, '9786233728843', '347.192 TAU T', 2),
(17, 'Perkembangan dan Praktik JAMINAN FIDUSIA', 'Buku Hukum', 'Dr. Rio Christiawan, S.H., M.Hum., M.Kn.', 'PT RAJA GRAFINDO PERSADA', 2022, '9786233724524', '347 RIO P', 2),
(18, 'LEMBAGA NEGARA KONSEP, SEJARAH, WEWENANG, DAN DINAMIKA KONSTITUSIONAL', 'Buku Hukum', 'SALDI ISRA', 'PT RAJA GRAFINDO PERSADA', 2022, '9786232315129', '342 SAL L', 2),
(19, 'HUKUM ACARA PERADILAN AGAMA', 'Buku Hukum', 'Dr. H. Roihan A. Rasyid, S.H., M.A.', 'PT RAJA GRAFINDO PERSADA', 2022, '9789797695170', '342 ROH H', 2),
(20, 'LEMBAGA NEGARA KONSEP, SEJARAH, WEWENANG, DAN DINAMIKA KONSTITUSIONAL', 'Buku Hukum', 'SALDI ISRA', 'PT RAJA GRAFINDO PERSADA', 2022, '9786232315129', '342 SAL L', 2),
(21, 'HUKUM KEUANGAN NEGARA DI INDONESIA', 'Buku Hukum', 'DR. HADIYANTO, S.H., LL.M.', 'PT RAJA GRAFINDO PERSADA', 2022, '9786233726634', '34.07 HAD H', 2),
(22, 'HUKUM PIDANA KHUSUS', 'Buku Hukum', 'HARIMAN SATRIA', 'PT RAJA GRAFINDO PERSADA', 2022, '978623372383', '343 HAR H', 2),
(23, 'PENGANTAR HUKUM PERBURUHAN DAN KETENAGAKERJAAN', 'Buku Hukum', 'Dr. Khairani, S.H., M.H.', 'PT RAJA GRAFINDO PERSADA', 2022, '978623231945', '347 KHA P', 2),
(24, 'Indonesia Constitutional Court and Living Constitution', 'Pengkajian Konstitusi', 'Hani Adhani, S.H., M.H.', 'PT RAJA GRAFINDO PERSADA', 2021, '9786233720960', '342.37(910) HAN I', 2),
(25, 'HUKUM PERBANKAN Pendirian Sampai Pembubaran', 'Buku Hukum', 'Almaududi, S.H., M.H.', 'PT RAJA GRAFINDO PERSADA', 2021, '9786232319325', '347.734 ALM H', 2),
(26, 'Vexatiuous Request', 'Buku Hukum', 'Dr. Syamsudin Noer, S.H., M.H.', 'PT RAJA GRAFINDO PERSADA', 2021, '978623372146', '343 SYA V', 2),
(27, 'HUKUM ADMINISTRASI PEMERINTAHAN', 'Buku Hukum', 'Dr. Yudhi Setiawan, Drs., S.H., M.Hum.', 'PT RAJA GRAFINDO PERSADA', 2021, '9786024252397', '342.9 YUD H', 3),
(28, 'HUKUM ISLAM (Suatu Pengantar)', 'Buku Hukum', 'H. ZAENI ASYHADIE, S.H., M.Hum.', 'PT RAJA GRAFINDO PERSADA', 2021, '9786232316775', '348.97 ZAE H', 2),
(29, 'ARGUMENTUM IN SCRIPTUM', 'Pengkajian Konstitusi', 'Mohammad Mahrus Ali', 'PT RAJA GRAFINDO PERSADA', 2021, '978623372280', '341 MOH A', 2),
(30, 'HUKUM BISNIS Kontemporer', 'Buku Hukum', 'Dr. Rio Christiawan, S.H., M.Hum., M.Kn.', 'PT RAJA GRAFINDO PERSADA', 2021, '978623231667', '347 RIO H', 2),
(31, 'Dinamika IMPLEMENTASI PUTUSAN MAHKAMAH KONSTITUSI Polemik Penentuan Ibukota Kabupaten Maybrat', 'Pengkajian Konstitusi', 'Luthfi Widagdo Eddyono', 'PT RAJA GRAFINDO PERSADA', 2021, '9786233721257', '347.95 LUT D', 2),
(32, 'HUKUM TATA NEGARA INDONESIA', 'Buku Hukum', 'Prof. Dr. Ellydar Chaidir, S.H., M.Hum', 'PT RAJA GRAFINDO PERSADA', 2021, '978623231264', '342(910) ELL H', 2),
(33, 'PERPU DALAM TEORI DAN PRAKTIK', 'Buku Hukum', 'Dr. Daniel Yusmic P. FoEkh', 'PT RAJA GRAFINDO PERSADA', 2021, '9786233721431', '34 DAN P', 2),
(34, 'KEPASTIAN HUKUM DALAM PROSES ARBITRASE', 'Buku Hukum', 'Dr. Ir. H. Agus Gurlaya Kartasasmita', 'PT RAJA GRAFINDO PERSADA', 2021, '9786232319318', '341.636 AGU K', 2),
(35, 'Pemilihan Umum Demokratis', 'Buku Hukum', 'SALDI ISRA', 'PT RAJA GRAFINDO PERSADA', 2021, '9786232311329', '342.24 SAL P', 2),
(36, 'HUKUM PENITENSIER DI INDONESIA KONSEP DAN PERKEMBANGANNYA', 'Buku Hukum', 'ANIS WIDYWATI', 'PT RAJA GRAFINDO PERSADA', 2020, '9786232314603', '343 ANI H', 2),
(37, 'JUDICIAL PREVIEW TERHADAP UU RATIFIKASI PERJANJIAN INTERNAASIONAL', 'Buku Hukum', 'NOOR SIDHARTA', 'PT RAJA GRAFINDO PERSADA', 2020, '9786232315181', '343 NOO J', 3),
(38, 'HUKUM ACARA PENYELESAIAN SENGKETA PROSES PEMILU KONSEP, PROSEDUR DAN TEKNIS PELAKSANAAN', 'Buku Hukum', 'Rahmat Bagja, S.H., L.LM.', 'PT RAJA GRAFINDO PERSADA', 2020, '9786232312517', '342 RAH H', 2),
(39, 'HUKUM KEPAILITAN dan Penundaan Kewajiban Pembayaran Utang', 'Buku Hukum', 'Dr. Rio Christiawan, S.H., M.Hum., M.Kn.', 'PT RAJA GRAFINDO PERSADA', 2020, '9786232316157', '347 RIO H', 2),
(40, 'Pancasila Identitas Konstitusi Berbangsa dan Bernegara', 'Buku Hukum', 'Prof. Dr. Jimly Asshiddiqie, S.H.', 'PT RAJA GRAFINDO PERSADA', 2020, '9786232315211', '342 JIM P', 2),
(41, 'HUKUM KETENAGAKERJAAN KEBIJAKAN DAN PERLINDUNGAN TENAGA KERJA DALAM PENANAMAN MODAL ASING', 'Buku Hukum', 'Anna Triniingsih', 'PT RAJA GRAFINDO PERSADA', 2020, '9786232315167', '341 ANN H', 2),
(42, 'Etika PROFESI HUKUM', 'Buku Hukum', 'Dr. Mardani', 'PT RAJA GRAFINDO PERSADA', 2020, '9786024251673', '343 MAR E', 2),
(43, 'HUKUM PEMERINTAHAN DAERAH INVESTASI', 'Buku Hukum', 'DR. P.M. RONDONUWU', 'PT RAJA GRAFINDO PERSADA', 2019, '978623231227', '342 RON H', 2),
(44, 'HAKIM KONSTITUSI Kekuasaan Kehakiman dan Pengisian Jabatan', 'Pengkajian Konstitusi', 'Dr. Achmad Edi Subiyanto, S.H., M.H.', 'PT RAJA GRAFINDO PERSADA', 2019, '9786024258948', '347.95 ACH H', 2),
(45, 'HUKUM ADMINISTRASI NEGARA DALAM PENGELOLAAN SUMBER DAYA ALAM DAN ENERGI BERBASIS LINGKUNGAN', 'Buku Hukum', 'Prof. Dr. I Gusti Ayu Ketut Rahmi Handayani, S.H.,', 'PT RAJA GRAFINDO PERSADA', 2019, '9786024253080', '342.9 GUS H', 2),
(46, 'PENGANTAR HUKUM SUMBER DAYA ALAM', 'Buku Hukum', 'Prof. Dr. H. Salim HS., S.H., M.S.', 'PT RAJA GRAFINDO PERSADA', 2018, '9786024255169', '347 SAL P', 2),
(47, 'HUKUM PIDANA KHUSUS UNSUR DAN SANKSI PIDANANYA', 'Buku Hukum', 'Prof. Dr. Hj. Rodliyah, S.H., M.H.', 'PT RAJA GRAFINDO PERSADA', 2017, '9786024251642', '343 ROD H', 2),
(48, 'PENGANTAR HUKUM LAUT EDISI KEDUA', 'Buku Hukum', 'Prof. Dr. H. Syafrinaldi, S.H., M.C.L.', 'PT RAJA GRAFINDO PERSADA', 2016, '9786230801525', '347.79 SYA P', 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_denda`
--

CREATE TABLE `t_denda` (
  `id_denda` int(11) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `judul_dp` varchar(255) NOT NULL,
  `tgl_pjm` date NOT NULL,
  `tgl_kmbl` date NOT NULL,
  `ktrlmbtn` int(11) NOT NULL,
  `pkrjaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_denda`
--

INSERT INTO `t_denda` (`id_denda`, `nama_anggota`, `judul_dp`, `tgl_pjm`, `tgl_kmbl`, `ktrlmbtn`, `pkrjaan`) VALUES
(1, 'Kay', 'ANTROPOLOGI HUKUM KONTEMPORER', '2024-06-11', '2024-06-24', 13, 'Mahasiswa'),
(2, 'Noval', 'PENGANTAR ILMU POLITIK', '2024-06-06', '2024-06-11', 5, 'Universitas Muhammadiyah Banjarmasin'),
(3, 'Noval', 'Dinamika IMPLEMENTASI PUTUSAN MAHKAMAH KONSTITUSI Polemik Penentuan Ibukota Kabupaten Maybrat', '2024-06-25', '2024-07-10', 15, 'Universitas Muhammadiyah Banjarmasin'),
(4, 'Noval', 'HUKUM PIDANA KHUSUS', '2024-06-25', '2024-07-10', 15, 'Universitas Muhammadiyah Banjarmasin'),
(5, 'Noval', 'HUKUM ACARA PERADILAN AGAMA', '2024-06-25', '2024-07-23', 28, 'Universitas Muhammadiyah Banjarmasin'),
(6, 'Noval', 'Perkembangan dan Praktik JAMINAN FIDUSIA', '2024-07-10', '2024-08-06', 27, 'Universitas Muhammadiyah Banjarmasin'),
(7, 'Rahmat', 'HUKUM ACARA PERADILAN AGAMA', '2024-06-06', '2024-06-11', 5, 'Universitas Sari Mulia'),
(8, 'Rahmat', 'HUKUM PERBANKAN Pendirian Sampai Pembubaran', '2024-06-25', '2024-07-23', 28, 'Universitas Sari Mulia'),
(9, 'Rahmat', 'HUKUM ACARA PERADILAN AGAMA', '2024-06-25', '2024-07-23', 28, 'Universitas Sari Mulia'),
(10, 'User', 'HUKUM KEUANGAN NEGARA DI INDONESIA', '2024-06-25', '2024-07-10', 15, 'abc'),
(11, 'Kayyisu', 'DINAMIKA KONSTITUALISME DI INDONESIA', '2024-07-06', '2024-08-06', 31, 'Kantor Wilayah');

-- --------------------------------------------------------

--
-- Table structure for table `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `id_pmnjmn` int(5) NOT NULL,
  `nomor_pmnjmn` varchar(5) NOT NULL,
  `id_anggota` int(5) NOT NULL,
  `id_dp` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `tgl_pjm` date NOT NULL,
  `tgl_kmbl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_peminjaman`
--

INSERT INTO `t_peminjaman` (`id_pmnjmn`, `nomor_pmnjmn`, `id_anggota`, `id_dp`, `id_pengguna`, `tgl_pjm`, `tgl_kmbl`) VALUES
(1, '71204', 12, 19, 2, '2024-06-06', '2024-06-13'),
(2, '83358', 11, 11, 2, '2024-06-06', '2024-06-13'),
(3, '75025', 10, 13, 2, '2024-06-11', '2024-06-18'),
(4, '73160', 11, 19, 2, '2024-06-25', '2024-07-02'),
(5, '32373', 13, 21, 2, '2024-06-25', '2024-07-02'),
(6, '49822', 12, 19, 2, '2024-06-25', '2024-07-02'),
(7, '15265', 11, 22, 2, '2024-06-25', '2024-07-02'),
(8, '94111', 11, 31, 2, '2024-06-25', '2024-07-02'),
(9, '93281', 12, 25, 2, '2024-06-25', '2024-07-02'),
(10, '24177', 15, 5, 2, '2024-08-01', '2024-08-08'),
(11, '94981', 14, 9, 2, '2024-07-06', '2024-08-13'),
(12, '56411', 11, 17, 2, '2024-07-10', '2024-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `t_pengembalian`
--

CREATE TABLE `t_pengembalian` (
  `id_pgmbln` int(5) NOT NULL,
  `nomor_pgmbln` varchar(5) NOT NULL,
  `id_pmnjmn` int(5) NOT NULL,
  `id_anggota` int(5) NOT NULL,
  `id_dp` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `ktrlmbtn` int(5) NOT NULL,
  `tgl_kmbl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pengembalian`
--

INSERT INTO `t_pengembalian` (`id_pgmbln`, `nomor_pgmbln`, `id_pmnjmn`, `id_anggota`, `id_dp`, `id_pengguna`, `ktrlmbtn`, `tgl_kmbl`) VALUES
(1, '70273', 2, 11, 11, 2, 0, '2024-06-11'),
(2, '78584', 1, 12, 19, 2, 0, '2024-06-11'),
(3, '87357', 3, 10, 13, 2, 6, '2024-06-24'),
(4, '10579', 5, 13, 21, 2, 8, '2024-07-10'),
(5, '56439', 8, 11, 31, 2, 8, '2024-07-10'),
(6, '69106', 7, 11, 22, 2, 8, '2024-07-10'),
(7, '37416', 9, 12, 25, 2, 21, '2024-07-23'),
(8, '81661', 6, 12, 19, 2, 21, '2024-07-23'),
(9, '42604', 4, 11, 19, 2, 21, '2024-07-23'),
(10, '17182', 10, 15, 5, 2, 0, '2024-08-01'),
(11, '98835', 11, 14, 9, 2, 0, '2024-08-06'),
(12, '75088', 12, 11, 17, 2, 20, '2024-08-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indexes for table `t_dataanggota`
--
ALTER TABLE `t_dataanggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `t_datapengguna`
--
ALTER TABLE `t_datapengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `t_datapengunjung`
--
ALTER TABLE `t_datapengunjung`
  ADD PRIMARY KEY (`id_pgnjng`);

--
-- Indexes for table `t_datapustaka`
--
ALTER TABLE `t_datapustaka`
  ADD PRIMARY KEY (`id_dp`);

--
-- Indexes for table `t_denda`
--
ALTER TABLE `t_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`id_pmnjmn`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_dp` (`id_dp`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `t_pengembalian`
--
ALTER TABLE `t_pengembalian`
  ADD PRIMARY KEY (`id_pgmbln`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_dp` (`id_dp`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pmnjmn` (`id_pmnjmn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `id_peminjam` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `t_dataanggota`
--
ALTER TABLE `t_dataanggota`
  MODIFY `id_anggota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t_datapengguna`
--
ALTER TABLE `t_datapengguna`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_datapengunjung`
--
ALTER TABLE `t_datapengunjung`
  MODIFY `id_pgnjng` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `t_datapustaka`
--
ALTER TABLE `t_datapustaka`
  MODIFY `id_dp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `t_denda`
--
ALTER TABLE `t_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  MODIFY `id_pmnjmn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_pengembalian`
--
ALTER TABLE `t_pengembalian`
  MODIFY `id_pgmbln` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD CONSTRAINT `t_peminjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `t_dataanggota` (`id_anggota`),
  ADD CONSTRAINT `t_peminjaman_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `t_datapengguna` (`id_pengguna`),
  ADD CONSTRAINT `t_peminjaman_ibfk_4` FOREIGN KEY (`id_dp`) REFERENCES `t_datapustaka` (`id_dp`);

--
-- Constraints for table `t_pengembalian`
--
ALTER TABLE `t_pengembalian`
  ADD CONSTRAINT `t_pengembalian_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `t_datapengguna` (`id_pengguna`),
  ADD CONSTRAINT `t_pengembalian_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `t_dataanggota` (`id_anggota`),
  ADD CONSTRAINT `t_pengembalian_ibfk_3` FOREIGN KEY (`id_dp`) REFERENCES `t_datapustaka` (`id_dp`),
  ADD CONSTRAINT `t_pengembalian_ibfk_4` FOREIGN KEY (`id_pmnjmn`) REFERENCES `t_peminjaman` (`id_pmnjmn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
