CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `mname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `dept_id` int(2) NOT NULL,
  `sem_id` int(2) NOT NULL,
  `crn` varchar(6) NOT NULL,
  `reg` varchar(18) NOT NULL,
  `batch_bs` varchar(4) NOT NULL,
  `batch_ad` varchar(4) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;