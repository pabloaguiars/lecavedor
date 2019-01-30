
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2016 at 08:22 PM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u801686450_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `precio` int(11) NOT NULL,
  `image` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `tipo`, `nombre`, `marca`, `precio`, `image`) VALUES
(1, 'Espumoso', 'Champagne', 'Moët & Chandon', 750, 'image_1'),
(2, 'Espumoso', 'Lambrusco', 'Riunite', 490, 'image_2'),
(3, 'Tinto', 'Merlot', 'Vistaña', 591, 'image_3'),
(4, 'Tinto', 'Cabernet Sauvignon', 'Brady Vineyard', 675, 'image_4'),
(5, 'Rosado', 'Zinfandel', 'Blossom Hill', 358, 'image_5'),
(6, 'Rosado', 'Syrah', 'Viña Casablanca', 427, 'image_6'),
(7, 'Blanco', 'Moscato', 'Barefoot', 364, 'image_7'),
(8, 'Blanco', 'Chardonnay', 'Black Swan', 347, 'image_8'),
(9, 'Aromatizados', 'Vermouth', 'Dolin', 426, 'image_9'),
(10, 'Aromatizados', 'Sherry', 'San Antonio Dessert', 472, 'image_10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
