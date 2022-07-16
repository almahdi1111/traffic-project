-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220618.41c48b423e
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 10:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traffic`
--

-- --------------------------------------------------------

--
-- Table structure for table `camera`
--

CREATE TABLE `camera` (
  `Id` int(11) NOT NULL,
  `Id_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `camera`
--

INSERT INTO `camera` (`Id`, `Id_location`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Id` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `X_GPS` float NOT NULL,
  `Y_GPS` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Id`, `Address`, `X_GPS`, `Y_GPS`) VALUES
(1, 'صنعاء-جولة الرويشان', 11.1215, 54.1551),
(2, 'صنعاء-جولة الحباري', 15.1545, 60.4547);

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `Id` int(11) NOT NULL,
  `Plate_Number` varchar(50) NOT NULL,
  `Id_violation` int(11) NOT NULL,
  `Id_plate` int(11) NOT NULL,
  `Id_camera` int(11) NOT NULL,
  `Id_provinces` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ImagePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`Id`, `Plate_Number`, `Id_violation`, `Id_plate`, `Id_camera`, `Id_provinces`, `Date`, `ImagePath`) VALUES
(1, '245457', 4, 2, 4, 1, '2022-06-20 08:16:15', 'image/monit1.jpg'),
(2, '1454574', 4, 2, 1, 3, '2022-06-21 21:00:18', 'sfsdfsd'),
(3, '145454', 6, 2, 2, 3, '2022-06-21 20:45:42', 'image/15454'),
(5, '1545455', 1, 1, 2, 1, '2022-06-22 10:27:40', 'image1.jpg'),
(9, '77777777', 5, 1, 4, 1, '2022-06-22 16:18:14', 'image1'),
(11, '145757', 1, 2, 2, 2, '2022-06-26 17:15:52', 'hfhftgfyt.jpg'),
(14, '7722001111', 2, 1, 1, 2, '2022-07-16 17:59:55', ''),
(15, '556626', 4, 1, 4, 2, '2022-06-26 22:11:11', 'dladdada\r\n'),
(16, '6604545', 4, 2, 1, 1, '2022-07-06 20:24:35', 'alaklkala'),
(17, '54545', 5, 2, 2, 1, '2022-07-06 20:24:35', 'lklsdklsdmksd'),
(18, '773019241', 7, 1, 2, 1, '2022-07-16 16:16:18', ''),
(19, '145454', 2, 1, 1, 2, '2022-07-16 17:52:07', '');

--
-- Triggers `monitoring`
--
DELIMITER $$
CREATE TRIGGER `catch_violation` AFTER INSERT ON `monitoring` FOR EACH ROW IF NEW.Id_violation !=0 THEN INSERT INTO violation( Plate_Number, Id_violation_Type, Id_plate, Id_camera, Id_provinces, DATE, ImagePath ) VALUES( NEW.Plate_Number, NEW.Id_violation, NEW.Id_plate, NEW.Id_camera, NEW.Id_provinces, NEW.Date, NEW.ImagePath ); END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `plate`
--

CREATE TABLE `plate` (
  `Id` int(11) NOT NULL,
  `TypePlate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plate`
--

INSERT INTO `plate` (`Id`, `TypePlate`) VALUES
(1, 'خصوصي'),
(2, 'نقل'),
(3, 'اجرة');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`Id`, `Name`) VALUES
(1, 'الامانة'),
(2, 'صنعاء'),
(3, 'ذمار'),
(4, 'صعدة');

-- --------------------------------------------------------

--
-- Table structure for table `typeviolation`
--

CREATE TABLE `typeviolation` (
  `Id` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typeviolation`
--

INSERT INTO `typeviolation` (`Id`, `Type`) VALUES
(1, 'لايوجد مخالفة'),
(2, ' عرقلة سير يمين'),
(3, 'عرقلة سير يسار'),
(4, 'وقوف خاطئ'),
(5, 'تجاوز خط المشاه'),
(6, 'قطع الاشارة'),
(7, 'عاكس خط'),
(8, 'صدام');

-- --------------------------------------------------------

--
-- Table structure for table `violation`
--

CREATE TABLE `violation` (
  `Id` int(11) NOT NULL,
  `Plate_Number` int(11) NOT NULL,
  `Id_violation_Type` int(11) NOT NULL,
  `Id_plate` int(11) NOT NULL,
  `Id_camera` int(11) NOT NULL,
  `Id_provinces` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ImagePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `violation`
--

INSERT INTO `violation` (`Id`, `Plate_Number`, `Id_violation_Type`, `Id_plate`, `Id_camera`, `Id_provinces`, `Date`, `ImagePath`) VALUES
(1, 145454, 6, 2, 2, 3, '2022-06-21 20:45:42', 'image/15454'),
(2, 1454574, 4, 2, 1, 3, '2022-06-21 21:00:18', 'sfsdfsd'),
(3, 1545455, 1, 1, 2, 1, '2022-06-22 10:27:40', 'image1.jpg'),
(4, 77777777, 5, 1, 4, 1, '2022-06-22 16:18:14', 'image1'),
(5, 145454, 4, 2, 2, 3, '2022-06-22 21:31:48', 'jhiyuihkhjih'),
(6, 145454, 4, 2, 2, 3, '2022-06-22 21:32:01', 'jhiyuihkhjih'),
(7, 145454, 4, 2, 2, 3, '2022-06-22 21:32:14', 'jhiyuihkhjih'),
(8, 556626, 4, 1, 4, 2, '2022-06-26 22:11:11', 'dladdada\r\n'),
(9, 6604545, 4, 2, 1, 1, '2022-07-06 20:24:35', 'alaklkala'),
(10, 54545, 5, 2, 2, 1, '2022-07-06 20:24:35', 'lklsdklsdmksd'),
(11, 773019241, 7, 1, 2, 1, '2022-07-16 16:16:18', ''),
(12, 145454, 2, 1, 1, 2, '2022-07-16 17:52:07', ''),
(13, 2147483647, 2, 1, 1, 2, '2022-07-16 17:59:55', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camera`
--
ALTER TABLE `camera`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_location` (`Id_location`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_violation` (`Id_violation`),
  ADD KEY `Id_plate` (`Id_plate`),
  ADD KEY `Id_camera` (`Id_camera`),
  ADD KEY `Id_provinces` (`Id_provinces`);

--
-- Indexes for table `plate`
--
ALTER TABLE `plate`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `typeviolation`
--
ALTER TABLE `typeviolation`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `violation`
--
ALTER TABLE `violation`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_violation_type` (`Id_violation_Type`),
  ADD KEY `Id_plate` (`Id_plate`),
  ADD KEY `Id_camera` (`Id_camera`),
  ADD KEY `Id_provinces` (`Id_provinces`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `violation`
--
ALTER TABLE `violation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `camera`
--
ALTER TABLE `camera`
  ADD CONSTRAINT `camera_ibfk_1` FOREIGN KEY (`Id_location`) REFERENCES `location` (`Id`);

--
-- Constraints for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD CONSTRAINT `monitoring_ibfk_1` FOREIGN KEY (`Id_camera`) REFERENCES `camera` (`Id`),
  ADD CONSTRAINT `monitoring_ibfk_2` FOREIGN KEY (`Id_plate`) REFERENCES `plate` (`Id`),
  ADD CONSTRAINT `monitoring_ibfk_3` FOREIGN KEY (`Id_provinces`) REFERENCES `provinces` (`Id`),
  ADD CONSTRAINT `monitoring_ibfk_4` FOREIGN KEY (`Id_violation`) REFERENCES `typeviolation` (`Id`);

--
-- Constraints for table `violation`
--
ALTER TABLE `violation`
  ADD CONSTRAINT `violation_ibfk_1` FOREIGN KEY (`Id_camera`) REFERENCES `camera` (`Id`),
  ADD CONSTRAINT `violation_ibfk_2` FOREIGN KEY (`Id_plate`) REFERENCES `plate` (`Id`),
  ADD CONSTRAINT `violation_ibfk_3` FOREIGN KEY (`Id_provinces`) REFERENCES `provinces` (`Id`),
  ADD CONSTRAINT `violation_ibfk_4` FOREIGN KEY (`Id_violation_Type`) REFERENCES `typeviolation` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



