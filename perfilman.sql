-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 03:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perfilman`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `sinopsis` varchar(400) DEFAULT NULL,
  `rating` varchar(45) DEFAULT NULL,
  `durasi` varchar(45) DEFAULT NULL,
  `tahun` varchar(45) DEFAULT NULL,
  `gambar` varchar(15) DEFAULT NULL,
  `produksi_id` int(11) NOT NULL,
  `sutradara_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `title`, `sinopsis`, `rating`, `durasi`, `tahun`, `gambar`, `produksi_id`, `sutradara_id`, `genre_id`) VALUES
(1, 'Godzilla vs Kong', 'Sebuah pertarungan epic dalam sinematik Monsterverse antara Godzilla dan Kong.Pertarungan Godzilla vs. Kong membuat umat manusia harus bertahan dengan berbagai cara. Salah satunya adalah memusnahkan kedua raksasa tersebut.Siapa yang akan menang?\r\n', '8,4', '1 jam 53 menit', '2021', 'godzi.jpg', 4, 1, 2),
(11, 'Outside The Wire', 'Kisah persahabatan serta perjuangan tentara m', '8,7', '1 jam 55 menit', '2021', 'outside.jpg', 3, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `nama`) VALUES
(1, 'Science Fiction'),
(2, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `hp` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id`, `nama`, `email`, `alamat`, `hp`, `foto`) VALUES
(1, 'Pixar Animation Studios', NULL, 'PIXAR ANIMATION STUDIOS1200 PARK AVEEMERYVILLE, CA 94608', '(510) 922-3000', NULL),
(2, 'Paramount Picture', NULL, '5555 Melrose Avenue, Hollywood, California', '(323) 956-5000', 'paramount.jpg'),
(3, 'Starvision Plus', 'starvisionplus@indo.net.id', 'Jalan Cempaka Putih Raya No.11A, Cempaka Putih Tengah, RT.4/RW.6, Cemp. Putih Tim., Kec. Cemp. Putih, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10510', 'Tel: +6221 425 3390', 'Starvision Plus.png'),
(4, 'legendary pictures', 'legendarypictures@gmail.co.id', 'Burbank California, Amerika Serikat', '+1 001342', 'legend.jpg'),
(6, '20th Century Fox', '20thcenturyfox@gmail.com', 'Los Angeles, California, Amerika', '+1  002548', '20th Century Fox.png');

-- --------------------------------------------------------

--
-- Table structure for table `sutradara`
--

CREATE TABLE `sutradara` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `jenis_kelamin` varchar(45) DEFAULT NULL,
  `umur` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sutradara`
--

INSERT INTO `sutradara` (`id`, `nama`, `jenis_kelamin`, `umur`, `foto`) VALUES
(1, 'Christopher Nolan', 'Laki Laki', '50', 'chris.jpg'),
(2, 'Pete Docter', 'Laki Laki', '52', 'pete.jpg'),
(3, 'Adam Wingard', 'Laki laki', '38 ', 'adam.jpg'),
(6, 'Mikael Hamstrom', 'Laki laki', '60', 'Mikael Hamstrom.jpg'),
(7, 'Joko Anwar', 'Laki-Laki', '59', 'Joko Anwar.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_film_produksi_idx` (`produksi_id`),
  ADD KEY `fk_film_sutradara1_idx` (`sutradara_id`),
  ADD KEY `fk_film_genre1_idx` (`genre_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sutradara`
--
ALTER TABLE `sutradara`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sutradara`
--
ALTER TABLE `sutradara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk_film_genre1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_film_produksi` FOREIGN KEY (`produksi_id`) REFERENCES `produksi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_film_sutradara1` FOREIGN KEY (`sutradara_id`) REFERENCES `sutradara` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
