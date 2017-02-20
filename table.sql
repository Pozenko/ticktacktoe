
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `status` varchar(9) DEFAULT '000000000',
  `player1` varchar(25) DEFAULT NULL,
  `player2` varchar(25) DEFAULT '',
  `step` int(11) DEFAULT '0',
  `lastId` int(11) DEFAULT NULL,
  `place` varchar(10) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;