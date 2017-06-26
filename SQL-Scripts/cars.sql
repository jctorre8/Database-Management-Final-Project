-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2017 at 03:02 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `can signals`
--

CREATE TABLE `can signals` (
  `Address` varchar(25) NOT NULL,
  `Controller` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Units` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `can signals`
--

INSERT INTO `can signals` (`Address`, `Controller`, `Name`, `Units`) VALUES
('0x010', 1, 'Accel_Pedal_Status', 'Boolean'),
('0x011', 1, 'Accel_Pedal_Position', 'Radians'),
('0x012', 1, 'Acceleration', 'MPH'),
('0x310', 2, 'Brakes_Depressed', 'Boolean'),
('0x311', 2, 'Brake_Pedal_Position', 'Radians');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `CarID` int(11) NOT NULL,
  `Make` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`CarID`, `Make`, `Model`, `Type`, `Year`) VALUES
(1, 'Honda', 'Civic', 'LE', 2005),
(2, 'Honda', 'CR-V', 'XE', 2012),
(3, 'Hyndai', 'Elantra', 'n/a', 2007),
(4, 'Ford', 'Ranger', 'ShortCab', 2000),
(5, 'Toyota', 'Rav4', 'LE', 2009),
(6, 'Toyota', 'Camary', 'n/a', 2001),
(7, 'BMW', 'M3', 'n/a', 1993),
(8, 'Tesla', 'Model S', 'P100D', 2015),
(9, 'Audi', 'A3', 'n/a', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `car component`
--

CREATE TABLE `car component` (
  `ComponentID` int(11) NOT NULL,
  `Controller` int(11) NOT NULL,
  `Connector` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car component`
--

INSERT INTO `car component` (`ComponentID`, `Controller`, `Connector`, `Name`) VALUES
(1, 1, 1, 'WindowSwitchpack'),
(2, 1, 2, 'Transmission'),
(3, 1, 3, 'AcceleratorPedal'),
(4, 5, 5, 'BrakePedal');

-- --------------------------------------------------------

--
-- Table structure for table `connector`
--

CREATE TABLE `connector` (
  `ConnectorID` int(11) NOT NULL,
  `Controller` int(11) NOT NULL,
  `Manfacturer` varchar(255) NOT NULL,
  `Pin Number` int(11) NOT NULL,
  `Pin Type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connector`
--

INSERT INTO `connector` (`ConnectorID`, `Controller`, `Manfacturer`, `Pin Number`, `Pin Type`) VALUES
(1, 1, 'Tyco', 1315, 'male'),
(2, 1, 'Delphi', 1234, 'female'),
(3, 1, 'Yazaki', 53252, 'female'),
(4, 1, 'Sumitomo', 36346, 'female'),
(5, 1, 'Tyco', 6364, 'male'),
(6, 1, 'AMP', 6346, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `controller`
--

CREATE TABLE `controller` (
  `ControllerID` int(11) NOT NULL,
  `CarID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Supplier` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `controller`
--

INSERT INTO `controller` (`ControllerID`, `CarID`, `Name`, `Supplier`) VALUES
(1, 8, 'FrontController', 'Bosch'),
(2, 8, 'Entertainment', 'Continental'),
(3, 8, 'Powertrain', 'Delphi'),
(4, 8, 'BodyControls', 'GuysBasement'),
(5, 8, 'BrakeControlModule', 'Bosch'),
(6, 8, 'BatteryManagent', 'Continental'),
(7, 8, 'Fluids', 'Continental');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `can signals`
--
ALTER TABLE `can signals`
  ADD PRIMARY KEY (`Address`),
  ADD KEY `Controller` (`Controller`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`CarID`);

--
-- Indexes for table `car component`
--
ALTER TABLE `car component`
  ADD PRIMARY KEY (`ComponentID`),
  ADD KEY `Controller` (`Controller`),
  ADD KEY `Connector` (`Connector`);

--
-- Indexes for table `connector`
--
ALTER TABLE `connector`
  ADD PRIMARY KEY (`ConnectorID`),
  ADD KEY `Controller` (`Controller`);

--
-- Indexes for table `controller`
--
ALTER TABLE `controller`
  ADD PRIMARY KEY (`ControllerID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
