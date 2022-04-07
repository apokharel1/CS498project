CREATE TABLE `lecturerassign` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `assign` int(2) NOT NULL DEFAULT 1,
  `course` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;