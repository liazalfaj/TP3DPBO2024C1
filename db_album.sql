-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 07:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_album`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `nama_album` varchar(255) NOT NULL,
  `tahun_rilis` year(4) NOT NULL,
  `genre_musik` varchar(255) NOT NULL,
  `id_artis` int(11) NOT NULL,
  `id_label` int(11) NOT NULL,
  `sampul_album` varchar(255) NOT NULL,
  `deskripsi_album` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `nama_album`, `tahun_rilis`, `genre_musik`, `id_artis`, `id_label`, `sampul_album`, `deskripsi_album`) VALUES
(1, 'NCT EMPATHY', 2018, 'Hip hop trap EDM', 1, 2, 'nct.jpeg', 'Album ini terdiri dari 14 lagu dari semua unit debut NCT - NCT U, NCT 127 dan NCT DREAM, termasuk lagu utama \"BOSS\", \"Baby Don\'t Stop\", \"GO\", \"TOUCH\", \"YESTODAY\" dan \" Black on Black\", dan single digital yang dirilis sebelumnya, \"Timeless\", \"The 7th Sense\", \"WITHOUT YOU\" dan \"Dream In A Dream\".'),
(2, 'SAVAGE', 2021, 'Pop music, Electropop, Hyperpop, Dance-pop', 3, 4, 'aespa.jpeg', 'Savage adalah album mini dari grup vokal wanita Korea Selatan Aespa. Album mini ini terdiri dari enam lagu termasuk single utama yang bernama \"Savage\", dan telah dirilis oleh SM Entertainment pada tanggal 5 Oktober 2021.'),
(6, 'Its Never Easy', 2021, 'Indonesian Indie', 5, 9, 'gangga.jpeg', 'Its Never Easy merupakan album studio pertama dari Gangga Kusuma yang dirilis pada 27 Agustus 2021.'),
(7, 'MFAL', 2017, 'K-POP', 1, 4, 'MFAL.jpeg', '\"The First\" is the debut double A-side single by South Korean-Chinese boy band NCT Dream, the third sub-unit of the South Korean boy band NCT. It was released on February 9, 2017 with \"My First and Last\" serving as the single\'s title track.'),
(8, 'Nicole', 2022, 'Pop', 10, 12, 'nicole.jpeg', 'Nicole is the second studio album by Indonesian singer-songwriter Niki. It was released on 12 August 2022, through 88rising.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `id_label` (`id_label`),
  ADD KEY `id_artis` (`id_artis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_label`) REFERENCES `label` (`id_label`),
  ADD CONSTRAINT `album_ibfk_2` FOREIGN KEY (`id_artis`) REFERENCES `artis` (`id_artis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
