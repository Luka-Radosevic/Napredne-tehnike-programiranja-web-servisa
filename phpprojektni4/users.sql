SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` char(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `archive` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `country`, `date`, `archive`) VALUES
(14, 'Luka', 'Radosevic', '', 'lradosev1', '$2y$12$MvEg.TeRkTn9zUUwc0ALyux..9cI5IXSukNi/V3qtyk3wy3DMxbW6', 'HR', '2016-12-13 09:37:04', 'Y'),
(15, 'Luka', 'Radosevic', 'lradosev1@eburza.hr', 'lradosevic', '$2y$12$l6kg1uoF7gLQeyz.fhfItu/2WLcMFkAB0HMSouo8LZH2lMglkqLkS', 'KH', '2017-12-12 11:18:43', 'Y');

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;