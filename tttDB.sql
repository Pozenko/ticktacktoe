-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 14 2017 г., 21:51
-- Версия сервера: 5.1.68-community-log
-- Версия PHP: 5.4.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `tttDB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(9) DEFAULT '0',
  `player1` varchar(25) DEFAULT NULL,
  `player2` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `Players`
--

CREATE TABLE IF NOT EXISTS `Players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `isActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `Players`
--

INSERT INTO `Players` (`id`, `player`, `cell0`, `cell1`, `cell2`, `cell3`, `cell4`, `cell5`, `cell6`, `cell7`, `cell8`, `isActive`) VALUES
(1, 'player1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'player2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
