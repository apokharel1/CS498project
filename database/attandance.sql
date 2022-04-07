CREATE TABLE `attendance` (
  `id` int(6) NOT NULL,
  `crn` int(6) NOT NULL,
  `dept_id` int(1) NOT NULL,
  `sem_id` int(2) NOT NULL,
  `lecturer` varchar(24) NOT NULL,
  `course` varchar(24) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;