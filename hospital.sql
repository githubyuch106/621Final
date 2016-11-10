-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2016 at 02:17 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmpID` char(6) NOT NULL,
  `SSN` char(9) NOT NULL,
  `Fname` varchar(40) NOT NULL,
  `Lname` varchar(40) NOT NULL,
  `PhoneNumber` char(10) NOT NULL,
  `Salary` int(10) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `JobTitle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmpID`, `SSN`, `Fname`, `Lname`, `PhoneNumber`, `Salary`, `Password`, `JobTitle`) VALUES
('111', '23435465', 'Mohammed', 'Alhazza', '2169398627', 5000, 'doctor1', 'Doctor'),
('222', '3454657', 'Ali', 'AL-Mohammad', '2677749290', 6000, 'doctor2', 'Doctor'),
('333', '23243546', 'Jena', 'Tom', '223545678', 6000, 'doctor3', 'Doctor'),
('444', '3456576', 'Nancy', 'Jon', '32452435', 3000, 'nurse4', 'nurse'),
('admin', '2345678', 'admin', 'admin', '999', 100000, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `governs`
--

CREATE TABLE `governs` (
  `EmpID` char(6) DEFAULT NULL,
  `RoomID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `MedicineID` char(6) NOT NULL,
  `ReportID` char(6) NOT NULL,
  `Treatment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `PatientID` char(6) NOT NULL,
  `Fname` varchar(40) NOT NULL,
  `Lname` varchar(40) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `BloodType` varchar(30) NOT NULL,
  `Sex` varchar(20) NOT NULL,
  `Weight` int(4) NOT NULL,
  `Height` int(2) NOT NULL,
  `EmpID` char(6) DEFAULT NULL,
  `Vitals` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `ReportID` char(6) DEFAULT NULL,
  `RoomID` char(6) DEFAULT NULL,
  `VisitID` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PatientID`, `Fname`, `Lname`, `Address`, `BloodType`, `Sex`, `Weight`, `Height`, `EmpID`, `Vitals`, `Password`, `ReportID`, `RoomID`, `VisitID`) VALUES
('1111', 'Bob', 'Smith', '123 City Line Philadelphia PA 19131', 'A+', 'M', 180, 6, '111', 'Body temperature', 'patient1', NULL, '123', NULL),
('2222', 'Ahmed', 'bader', '3234 w112 westminster PA 19246', 'O', 'M', 160, 5, '111', 'Pulse rate', 'patient2', NULL, '456', NULL),
('3333', 'Sara', 'Anderson', '3244 34st philadelphia PA 19773', 'O+', 'F', 120, 6, '222', 'Pulse rate', 'patient3', NULL, '123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patientvisit`
--

CREATE TABLE `patientvisit` (
  `VisitID` char(6) NOT NULL,
  `PatientID` char(6) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Date` date NOT NULL,
  `EmpID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ReportID` char(6) NOT NULL,
  `EmpID` char(6) NOT NULL,
  `Description` varchar(40) NOT NULL,
  `MedicineID` char(6) DEFAULT NULL,
  `PatientID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomID` char(6) NOT NULL,
  `RoomNumber` int(5) NOT NULL,
  `BuildingNumber` int(5) NOT NULL,
  `FloorNumber` int(5) NOT NULL,
  `EmpID` char(6) DEFAULT NULL,
  `PatientID` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `RoomNumber`, `BuildingNumber`, `FloorNumber`, `EmpID`, `PatientID`) VALUES
('123', 101, 9999, 1, '444', '1111'),
('456', 202, 9999, 2, NULL, '2222'),
('678', 203, 8888, 2, NULL, '3333');

-- --------------------------------------------------------

--
-- Table structure for table `writes`
--

CREATE TABLE `writes` (
  `EmpID` char(6) NOT NULL,
  `ReportID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpID`);

--
-- Indexes for table `governs`
--
ALTER TABLE `governs`
  ADD KEY `EmpID` (`EmpID`),
  ADD KEY `RoomID` (`RoomID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`MedicineID`),
  ADD KEY `ReportID` (`ReportID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PatientID`),
  ADD KEY `EmpID` (`EmpID`),
  ADD KEY `ReportID` (`ReportID`),
  ADD KEY `RoomID` (`RoomID`),
  ADD KEY `VisitID` (`VisitID`);

--
-- Indexes for table `patientvisit`
--
ALTER TABLE `patientvisit`
  ADD PRIMARY KEY (`VisitID`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `EmpID` (`EmpID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `EmpID` (`EmpID`),
  ADD KEY `MedicineID` (`MedicineID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomID`),
  ADD KEY `EmpID` (`EmpID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `writes`
--
ALTER TABLE `writes`
  ADD KEY `EmpID` (`EmpID`),
  ADD KEY `ReportID` (`ReportID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `governs`
--
ALTER TABLE `governs`
  ADD CONSTRAINT `governs_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmpID`),
  ADD CONSTRAINT `governs_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`);

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`ReportID`) REFERENCES `report` (`ReportID`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmpID`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmpID`),
  ADD CONSTRAINT `patient_ibfk_3` FOREIGN KEY (`ReportID`) REFERENCES `report` (`ReportID`),
  ADD CONSTRAINT `patient_ibfk_4` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`),
  ADD CONSTRAINT `patient_ibfk_5` FOREIGN KEY (`VisitID`) REFERENCES `patientvisit` (`VisitID`);

--
-- Constraints for table `patientvisit`
--
ALTER TABLE `patientvisit`
  ADD CONSTRAINT `patientvisit_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`),
  ADD CONSTRAINT `patientvisit_ibfk_2` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmpID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmpID`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`MedicineID`) REFERENCES `medicine` (`MedicineID`),
  ADD CONSTRAINT `report_ibfk_3` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmpID`),
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`);

--
-- Constraints for table `writes`
--
ALTER TABLE `writes`
  ADD CONSTRAINT `writes_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmpID`),
  ADD CONSTRAINT `writes_ibfk_2` FOREIGN KEY (`ReportID`) REFERENCES `report` (`ReportID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
