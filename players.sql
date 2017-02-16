-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 14, 2017 at 04:53 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tttDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Players`
--

CREATE TABLE `Players` (
  `id` int(11) NOT NULL,
  `player` varchar(25) DEFAULT NULL,
  `cell0` int(11) DEFAULT NULL,
  `cell1` int(11) DEFAULT NULL,
  `cell2` int(11) DEFAULT NULL,
  `cell3` int(11) DEFAULT NULL,
  `cell4` int(11) DEFAULT NULL,
  `cell5` int(11) DEFAULT NULL,
  `cell6` int(11) DEFAULT NULL,
  `cell7` int(11) DEFAULT NULL,
  `cell8` int(11) DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Players`
--

INSERT INTO `Players` (`id`, `player`, `cell0`, `cell1`, `cell2`, `cell3`, `cell4`, `cell5`, `cell6`, `cell7`, `cell8`, `isActive`) VALUES
(1, 'player1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'player2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Players`
--
ALTER TABLE `Players`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Players`
--
ALTER TABLE `Players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;

