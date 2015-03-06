-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2015 at 01:58 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usports`
--

-- --------------------------------------------------------

--
-- Table structure for table `joueurs`
--

CREATE TABLE IF NOT EXISTS `joueurs` (
  `login` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mdp` varchar(64) NOT NULL,
  `sport` varchar(20) NOT NULL,
  `equipe` int(11) NOT NULL,
  `ecole` varchar(30) NOT NULL,
  `promotion` int(11) DEFAULT NULL,
  `naissance` date NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joueurs`
--

INSERT INTO `joueurs` (`login`, `nom`, `prenom`, `mdp`, `sport`, `equipe`, `ecole`, `promotion`, `naissance`, `email`) VALUES
('alenoir', 'Lenoir', 'Alexandre', 'f89256820a4b7293015edfdbb1f5a06911d52f52', 'Volleyball', 3, 'X', 2013, '1994-06-24', 'alexandre.lenoir@polytechnique.edu'),
('cbournho', 'Bournhonesque', 'Charles', '7aacabb012b7198dec123ba4a3be5fdc2ae56e4d', 'Volleyball', 5, 'X', 2013, '1994-02-14', 'charles.bournhonesque@polytechnique.edu'),
('tbordier', 'Bordier', 'Thomas', 'bc65e4c8e33e4261065c547044e1941b37e9df0a', 'Basketball', 2, 'X', 2013, '1992-12-28', 'thomas.bordier@polytechnique.edu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `joueurs`
--
ALTER TABLE `joueurs`
 ADD PRIMARY KEY (`login`), ADD FULLTEXT KEY `mdp` (`mdp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
