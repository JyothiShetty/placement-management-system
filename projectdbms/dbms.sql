

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `admin` (
  `email` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `applied_comp` (
  `c_id` int(255) NOT NULL,
  `sapid` bigint(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `companies` (
  `contact` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `intake` int(25) NOT NULL,
  `c_id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `selected_stud` (
  `sapid` int(255) NOT NULL,
  `c_id` int(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `student` (
  `email` varchar(25) NOT NULL,
  `s_id` int(25) NOT NULL,
  `cgpa` float DEFAULT NULL,
  `dept` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` int(15) DEFAULT NULL,
  `name` varchar(25) NOT NULL,
  `sapid` bigint(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `applied_comp`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `companies`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `selected_stud`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);


ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


ALTER TABLE `applied_comp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;


ALTER TABLE `companies`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;


ALTER TABLE `selected_stud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;


ALTER TABLE `student`
  MODIFY `s_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

