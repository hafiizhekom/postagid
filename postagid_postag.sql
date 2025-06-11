-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2020 at 07:26 PM
-- Server version: 10.1.44-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `postagid_postag`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontribusi`
--

CREATE TABLE `kontribusi` (
  `id` int(11) NOT NULL,
  `artikel` text NOT NULL,
  `user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontribusi`
--

INSERT INTO `kontribusi` (`id`, `artikel`, `user`, `created_date`) VALUES
(1, 'hafiizh test 123', 0, '2019-12-03 13:34:56'),
(2, 'saya suka makan sayur yang berwarna hijau', 0, '2020-01-13 16:09:05'),
(3, 'saya tidak makan nasi', 0, '2020-01-30 04:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `logs_login`
--

CREATE TABLE `logs_login` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs_login`
--

INSERT INTO `logs_login` (`id`, `email`, `datetime`) VALUES
(1, 'hafiizhekom@yahoo.com', '2019-11-24 10:36:28'),
(2, 'hafiizhekom@yahoo.com', '2019-11-24 17:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `ner`
--

CREATE TABLE `ner` (
  `id` int(11) NOT NULL,
  `kata` varchar(50) NOT NULL,
  `tag` varchar(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ner`
--

INSERT INTO `ner` (`id`, `kata`, `tag`, `created_date`) VALUES
(1, '123', 'PRS', '2019-12-03 13:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `ner_tag`
--

CREATE TABLE `ner_tag` (
  `id` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `contoh` text NOT NULL,
  `deskripsi` text NOT NULL,
  `warna` varchar(7) NOT NULL,
  `font` enum('white','black') NOT NULL,
  `verifikasi` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ner_tag`
--

INSERT INTO `ner_tag` (`id`, `kelas`, `kode`, `contoh`, `deskripsi`, `warna`, `font`, `verifikasi`) VALUES
(1, 'Nama Seseorang', 'PRS', 'Andi, Budi, Charles', 'Untuk nama seseorang', '#dc3545', 'white', 1),
(2, 'Nama Tempat', 'PLC', 'Jakarta, Thailand, Kemayoran', 'Untuk nama tempat', '#ffc107', 'white', 1),
(3, 'Nama Organisasi', 'ORG', 'KPI, KPAI, KPK, DPR, MPR', 'Untuk nama organisasi', '#28a745', 'white', 1),
(4, 'Lainnya', 'OTH', '', 'Untuk penamaan sesuatu lainnya', '#1C39BB', 'white', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` int(11) NOT NULL,
  `kata` varchar(50) NOT NULL,
  `tag` varchar(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`id`, `kata`, `tag`, `created_date`) VALUES
(1, 'produk', 'NNO', '2019-11-29 04:09:29'),
(2, 'halal', 'NNP', '2019-11-29 04:09:29'),
(3, 'bukan', 'NEG', '2019-11-29 04:09:29'),
(4, 'hanya', 'KUA', '2019-11-29 04:09:29'),
(5, 'untuk', 'PPO', '2019-11-29 04:09:29'),
(6, 'muslim', 'NNP', '2019-11-29 04:09:29'),
(7, 'tapi', 'CCN', '2019-11-29 04:09:29'),
(8, 'semua', 'KUA', '2019-11-29 04:09:29'),
(9, 'masyarakat', 'NNO', '2019-11-29 04:09:29'),
(10, 'bukan', 'NEG', '2019-11-29 04:12:10'),
(11, 'halal', 'NNP', '2019-11-29 04:12:10'),
(12, 'hanya', 'KUA', '2019-11-29 04:12:10'),
(13, 'masyarakat', 'NNO', '2019-11-29 04:12:10'),
(14, 'muslim', 'NNO', '2019-11-29 04:12:10'),
(15, 'produk', 'NNO', '2019-11-29 04:12:10'),
(16, 'semua', 'KUA', '2019-11-29 04:12:10'),
(17, 'tapi', 'CCN', '2019-11-29 04:12:10'),
(18, 'untuk', 'PPO', '2019-11-29 04:12:10'),
(19, 'produk', 'NNO', '2019-11-29 04:13:25'),
(20, 'halal', 'NNP', '2019-11-29 04:13:25'),
(21, 'bukan', 'NEG', '2019-11-29 04:13:25'),
(22, 'hanya', 'KUA', '2019-11-29 04:13:25'),
(23, 'untuk', 'PPO', '2019-11-29 04:13:25'),
(24, 'muslim', 'NNO', '2019-11-29 04:13:25'),
(25, 'peneliti', 'NNO', '2019-11-30 12:10:07'),
(26, 'dari', 'PPO', '2019-11-30 12:10:07'),
(27, 'uns', 'NNO', '2019-11-30 12:10:07'),
(28, 'menemukan', 'VBI', '2019-11-30 12:10:07'),
(29, 'cara', 'NNO', '2019-11-30 12:10:07'),
(30, 'efektif', 'ADJ', '2019-11-30 12:10:07'),
(31, 'menurunkan', 'VBT', '2019-11-30 12:10:07'),
(32, 'populasi', 'NNO', '2019-11-30 12:10:07'),
(33, 'tikus', 'NNP', '2019-11-30 12:10:07'),
(34, 'yang', 'PRR', '2019-11-30 12:10:07'),
(35, 'menyerang', 'VBT', '2019-11-30 12:10:07'),
(36, 'tanaman', 'NNO', '2019-11-30 12:10:07'),
(37, 'padi', 'NNP', '2019-11-30 12:10:07'),
(38, 'keberadaan', 'NNO', '2019-12-01 08:09:12'),
(39, 'toko', 'NNO', '2019-12-01 08:09:12'),
(40, 'kelontong', 'ADJ', '2019-12-01 08:09:12'),
(41, 'di', 'PPO', '2019-12-01 08:09:12'),
(42, 'jawa', 'NNP', '2019-12-01 08:09:12'),
(43, 'timur', 'NNP', '2019-12-01 08:09:12'),
(44, 'terus', 'ADV', '2019-12-01 08:09:12'),
(45, 'diperkuat', 'VBP', '2019-12-01 08:09:12'),
(46, 'tengah', 'NNO', '2019-12-01 08:09:12'),
(47, 'gempuran', 'NNO', '2019-12-01 08:09:12'),
(48, 'minimarket', 'NNO', '2019-12-01 08:09:12'),
(49, 'berjejaring', 'VBI', '2019-12-01 08:09:12'),
(50, 'andi', 'NNP', '2019-12-02 07:03:53'),
(51, 'tertabrak', 'VBI', '2019-12-02 07:03:53'),
(52, 'sepeda', 'NNO', '2019-12-02 07:03:53'),
(53, 'motor', 'NNO', '2019-12-02 07:03:53'),
(86, 'berharga', 'VBI', '2019-12-04 07:58:25'),
(85, 'benda', 'NNO', '2019-12-04 07:58:25'),
(84, 'jadi', 'PPO', '2019-12-04 07:58:25'),
(83, 'berubah', 'VBI', '2019-12-04 07:58:25'),
(82, 'percuma', 'ADJ', '2019-12-04 07:58:25'),
(81, 'terbuang', 'VBT', '2019-12-04 07:58:25'),
(80, 'yang', 'PRR', '2019-12-04 07:58:25'),
(79, 'alba', 'NNO', '2019-12-04 07:58:25'),
(78, 'dan', 'CCN', '2019-12-04 07:58:25'),
(77, 'pinus', 'NNO', '2019-12-04 07:58:25'),
(76, 'kayu', 'NNO', '2019-12-04 07:58:25'),
(75, 'limbah', 'NNO', '2019-12-04 07:58:24'),
(87, 'di', 'PPO', '2019-12-04 07:58:25'),
(88, 'tangan', 'NNO', '2019-12-04 07:58:25'),
(89, 'pelda', 'NNO', '2019-12-04 07:58:25'),
(90, 'margiyono', 'NNP', '2019-12-04 07:58:25'),
(91, 'nama', 'NNO', '2019-12-08 18:28:19'),
(92, 'saya', 'NNO', '2019-12-08 18:28:19'),
(93, 'hafiizh', 'NNP', '2019-12-08 18:28:19'),
(94, 'eko', 'NNP', '2019-12-08 18:28:19'),
(95, 'm', 'NNP', '2019-12-08 18:28:19'),
(96, 'saya', 'PRN', '2020-01-13 16:09:05'),
(97, 'suka', 'VBT', '2020-01-13 16:09:05'),
(98, 'makan', 'VBI', '2020-01-13 16:09:05'),
(99, 'sayur', 'NNO', '2020-01-13 16:09:05'),
(100, 'yang', 'PRR', '2020-01-13 16:09:05'),
(101, 'berwarna', 'VBT', '2020-01-13 16:09:05'),
(102, 'hijau', 'ADJ', '2020-01-13 16:09:05'),
(103, 'saya', 'PRN', '2020-01-30 04:29:05'),
(104, 'tidak', 'NEG', '2020-01-30 04:29:05'),
(105, 'makan', 'VBT', '2020-01-30 04:29:05'),
(106, 'nasi', 'NNO', '2020-01-30 04:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `pos_tag`
--

CREATE TABLE `pos_tag` (
  `id` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `contoh` text NOT NULL,
  `deskripsi` text NOT NULL,
  `warna` varchar(7) NOT NULL,
  `font` enum('white','black') NOT NULL,
  `verifikasi` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_tag`
--

INSERT INTO `pos_tag` (`id`, `kelas`, `kode`, `contoh`, `deskripsi`, `warna`, `font`, `verifikasi`) VALUES
(1, 'Nomina', 'NNO', 'buku, mobil, malaikat, pikiran', 'Nomina adalah kata yang mengacu pada manusia, binatang, benda, konsep, atau pengertian', '#E52B50', 'black', 1),
(2, 'Nomina Nama Diri', 'NNP', 'Jakarta, Indonesia,Burhan Silalahi', 'Nomina yang merupakan individu yang unik, misalnya nama kota, nama geografi, nama orang dan sebagainya.', '#FFBF00', 'black', 1),
(3, 'Pronomina', 'PRN', 'saya, anda, kamu, sesuatu, seseorang, itu, ini ', 'Pronomina adalah kata yang digunakan untuk mengacu kepada orang, binatang, benda, atau hal tertentu, misalnya dia atau itu.', '#9966CC', 'black', 1),
(4, 'Pronomina Relatif', 'PRR', 'yang, tempat ', 'Pronomina relatif merupakan kata yang berfungsi untuk menggantikan bagian pokok dan/atau menghubungkannya dengan  bagian  yang  menjelaskannya.  Untuk kata tempat, bedakan pelabelan kata tersebut dalam kalimat (1) dan (2):  (1) Wilayah perbukitan itu menjadi tempat persembunyian kelompok Santoso. (2) Polisi telah memberi garis polisi di sekitar kamar sewaan tempat korban dibunuh.  Pada (1), tempat dilabeli nomina (NNO) dan pada (2), tempat dilabeli pronomina relatif (PRR).', '#FBCEB1', 'black', 1),
(5, 'Pronomina Interogatif', 'PRI', 'apa, siapa, bagaimana', 'Pronomina interogatif adalah pronomina yang digunakan untuk menggantikan ihwal yang menjadi pertanyaan dalam kalimat pertanyaan.', '#7FFFD4', 'black', 1),
(6, 'Pronomina Klitik', 'PRK', 'mu, ku, nya ', 'Pronomina ini adalah kata ganti yang merupakan varian  terikat dari pronomina  persona kamu, aku, dan dia. ? Bentuk -mu, ku, dan –nya yang berkaitan dengan ', '#007FFF', 'black', 1),
(7, 'Adjektiva', 'ADJ', 'biru, sakit, gelisah, cerdas', 'Adjektiva adalah kata yang memberikan keterangan yang lebih khusus tentang sesuatu yang dinyatakan oleh nomina dalam kalimat.', '#89CFF0', 'black', 1),
(8, 'Verba Intransitif', 'VBI', 'membaca, menyirami, membelikan, memperistri, memperbarui', '', '#F5F5DC', 'black', 1),
(9, 'Verba Transitif', 'VBT', 'membaca, menyirami, membelikan, memperistri, memperbarui', '', '#000000', 'white', 1),
(10, 'Verba Pasif', 'VBP', 'dipukul, dipenuhi, disembuhkan, kejatuhan, terpukul', 'Verba pasif yang berafiks ter- atau ke-an dimasukkan ke dalam kelompok ini, misalnya terselamatkan,  terduduk,  kejatuhan ', '#0000FF', 'white', 1),
(11, 'Verba Penghubung', 'VBL', 'adalah, ialah, merupakan, menjadi', 'Merupakan verba yang menghubungkan dua bagian, yaitu SUBJEK (SUBJ) dan KOMPLEMEN SUBJEK (KOMP)', '#0095B6', 'white', 1),
(12, 'Verba Eksistensial', 'VBE', 'ada', 'Ada merupakan verba eksistensial pada kalimat seperti, “Adegan ini selalu ada di pembukaan Galnas.”', '#8A2BE2', 'white', 1),
(13, 'Adverbia Modal', 'ADV', 'enggan, harus, mesti, agak, sangat, sebaiknya, seharusnya, agaknya', '', '#DE5D83', 'white', 1),
(14, 'Adverbia Kala', 'ADK', 'akan, bakal, baru, belum, lagi, masih, mau', '', '#CD7F32', 'white', 1),
(15, 'Negasi', 'NEG', 'tidak, bukan, tak, enggak, kagak', ' ', '#964B00', 'white', 1),
(16, 'Konjungsi Koordinatif', 'CCN', 'dan, atau, tetapi, maupun, baik', 'Kata yang menghubungkan dua atau lebih klausa (bisa juga frasa atau kalimat) yang setara. Misalnya: Perhelatan besar itu dijaga dengan ketat oleh petugas keamanan baik dari unsur Polri maupun dari unsur TNI.', '#800020', 'white', 1),
(17, 'Konjungsi Subordinatif', 'CSN', 'jika, sejak, meskipun, sebaliknya, oleh karena itu', 'Kata yang menghubungkan dua atau lebih klausa (bisa juga kalimat) yang tidak setara. Misalnya: Permasalahan pada timnas bukan terletak pada keterampilan individu, melainkan pada kerja sama tim.', '#DE3163', 'white', 1),
(18, 'Preposisi', 'PPO', 'di, ke, dari, tentang, untuk', '', '#E0B0FF', 'white', 1),
(19, 'Interjeksi', 'INT', 'aduh, astaga, wah, maaf', 'Merupakan kelas kata yang menunjukkan emosi atau perasaan si pembicara/penulis, misalnya pada kalimat, “Wah, Australia akan membuat kereta yang lebih cepat dari pesawat terbang.”', '#CC7722', 'white', 1),
(20, 'Kuantifikator', 'KUA', 'sesuatu, semua, beberapa, beberapa, sebagian', '', '#FF6600', 'white', 1),
(21, 'Numeral ', 'NUM', 'Terdiri atas: <ul> <li>Bilangan kardinal: satu, dua, sebuah, seorang, seekor</li><li>Bilangan ordinal: pertama, kesatu, kedua</li><li>Bilangan kolektif: ribuan, beratus-ratus</li>', 'Terdiri atas: a. Bilangan kardinal: satu, dua, sebuah, seorang, seekor. b. Bilangan ordinal: pertama, kesatu, kedua       c. Bilangan kolektif: ribuan, beratus-ratus', '#483C32', 'white', 1),
(22, 'Artikel', 'ART', 'para, si, sang', '', '#008080', 'white', 1),
(23, 'Partikel', 'PAR', 'pun, per', '', '#dc3545', 'white', 1),
(24, 'Lambang Satuan', 'UNS', 'w, kg, meter, km', '', '#29AB87', 'white', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `verifikasi_token` varchar(32) NOT NULL,
  `verifikasi` tinyint(1) NOT NULL DEFAULT '0',
  `source` varchar(15) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `jenis_kelamin`, `tanggal_lahir`, `no_telp`, `password`, `verifikasi_token`, `verifikasi`, `source`, `created_date`) VALUES
(1, 'User Dummy', 'dummy@yahoo.com', 'Pria', '1992-02-02', '0858912345678', '138126aa7da88215191ece758a2228d1', 'fc4e7528f10625baee735097c90c0644', 1, '', '2019-11-24 17:39:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontribusi`
--
ALTER TABLE `kontribusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs_login`
--
ALTER TABLE `logs_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ner`
--
ALTER TABLE `ner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ner_tag`
--
ALTER TABLE `ner_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_tag`
--
ALTER TABLE `pos_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontribusi`
--
ALTER TABLE `kontribusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs_login`
--
ALTER TABLE `logs_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ner`
--
ALTER TABLE `ner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ner_tag`
--
ALTER TABLE `ner_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `pos_tag`
--
ALTER TABLE `pos_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
