-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 02:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_id` int(11) NOT NULL,
  `A_name` varchar(255) NOT NULL,
  `A_mail` varchar(255) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `A_image` varchar(255) NOT NULL,
  `Role` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_id`, `A_name`, `A_mail`, `passwords`, `phone_no`, `A_image`, `Role`) VALUES
(3, 'Sanks', 'sanket@kmail.com', 'aaaa', '9869891985', '', 1),
(4, 'sanks', 's@mail.com', 'aaaa', '9845400044', '65068632952f36.24111675.png', 0),
(5, 'Sanket', 'sanket@tracker.com', '1111', '9845440004', '650e8974e455b1.96963692.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `C_id` int(11) NOT NULL,
  `C_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`C_id`, `C_name`) VALUES
(1, 'Documents'),
(2, 'Pets'),
(3, 'Electronics'),
(4, 'Miscellanious');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `I_id` int(11) NOT NULL,
  `I_name` varchar(255) NOT NULL,
  `Date_Found` date NOT NULL,
  `Location` varchar(255) NOT NULL,
  `I_image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `Managed_By` int(255) NOT NULL,
  `U_id` int(10) NOT NULL,
  `C_id` int(10) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`I_id`, `I_name`, `Date_Found`, `Location`, `I_image`, `status`, `msg`, `Managed_By`, `U_id`, `C_id`, `Time`) VALUES
(13, 'Identity Card', '2023-07-11', 'Nayabazar,KTM', '650e80156bdb32.80724198.jpg', 'Declined', 'Looks Fake', 3, 6, 1, '2023-09-23 06:43:46'),
(14, 'Tiger', '2023-09-05', '911 Dihram Road, Dubai', '650e831c550275.94502544.jpg', 'Approved', '', 3, 6, 2, '2023-09-23 06:42:56'),
(15, 'Watch', '2023-09-19', 'Annapurna Circuit', '650e83784b9359.81481031.png', 'Approved', '', 3, 6, 3, '2023-09-23 06:42:53'),
(16, 'Acer Nitro 5 2021', '2023-09-03', 'Kausaltar,Bhaktapur', '650e84050eb9a2.89381383.jpg', 'Declined', 'Not very reasonable post', 3, 6, 3, '2023-09-23 06:44:21'),
(17, 'Car Key', '2023-09-11', 'Lakeside, Pokhara', '650e84590694c8.60138818.jpg', 'Declined', 'Location is not Valid', 5, 6, 4, '2023-09-23 07:11:10'),
(18, 'Comb Set', '2023-09-05', 'Thamel, Kathmandu', '650e8498baaf65.48605394.jpg', 'Declined', 'Please ', 5, 6, 4, '2023-09-23 07:12:58'),
(19, 'Myself', '2023-09-04', 'Thamel,Kathmandu', '650e850ed70d40.06224309.jpg', 'Approved', '', 3, 10, 4, '2023-09-23 06:43:00'),
(20, 'Buff', '2023-08-28', 'Gaidakot-1,Nawalpur', '650e854bddd503.80757573.jpg', 'Approved', '', 3, 10, 2, '2023-09-23 06:43:03'),
(21, 'Bike Key', '2023-09-12', 'Bharatpur-5,Chitwan', '650e85a6b09cc7.40822735.png', 'Declined', 'Pic not Proper', 5, 10, 4, '2023-09-23 07:21:54'),
(22, 'Lock and Key', '2023-08-28', 'Chitwan National Park', '650e85cec7a221.71138151.jpg', 'Pending', '', 5, 10, 4, '2023-09-25 12:03:31'),
(23, 'Keyboard', '2023-09-05', 'Bhalu Gau, Syangja', '650e86340752a8.51677278.jpg', 'Approved', '', 3, 10, 3, '2023-09-23 06:43:06'),
(24, 'Nagrikta', '2023-07-04', 'United Technical College', '650e871af15297.91234625.jpeg', 'Approved', '', 5, 10, 1, '2023-09-23 06:56:40'),
(25, 'Pan Card', '2023-07-13', 'Chaubiskoti,Bharatpur', '650e875eebd416.19582693.jpeg', 'Approved', '', 3, 7, 1, '2023-09-23 06:43:10'),
(26, 'Certificate of Excellence', '2023-08-27', 'Kritipur-4', '650e87d14db040.56945930.jpg', 'Declined', 'Not Named Under User', 5, 7, 1, '2023-09-23 07:23:11'),
(27, 'RAM', '2023-08-28', 'Near my computer', '650e880a2ad4d5.94334948.jpg', 'Declined', 'No proper Location', 5, 7, 4, '2023-09-23 07:24:15'),
(28, 'Gold Chain', '2023-09-04', 'Jorpatan,KTM', '650e883e90e1f7.05819205.png', 'Approved', '', 3, 7, 4, '2023-09-23 06:43:13'),
(29, 'Iphone 15 64gb ', '2023-09-11', 'Near Shiva Mandir', '650e8893d14fc3.99063762.png', 'Approved', '', 3, 7, 3, '2023-09-23 06:43:17'),
(30, 'SSD', '2023-09-03', 'Near UTEC College', '650e88b8c51451.96988276.jpg', 'Approved', '', 3, 7, 3, '2023-09-25 11:51:49'),
(31, 'Mouse', '2023-09-04', 'Near My Own House', '650e8af3049ad4.84141761.jpg', 'Claimed', '', 0, 8, 3, '2023-09-23 08:15:04'),
(32, 'Laptop', '2023-09-05', 'Near Bharatpur-11', '650e8b1a3ed215.19313186.jpg', 'Approved', '', 3, 8, 3, '2023-09-25 09:56:38'),
(33, 'Cat', '2023-03-15', 'Tandi,Chitwan', '650e8b5286b0f4.72539027.jpg', 'Declined', 'No proper Location', 3, 8, 2, '2023-09-25 10:42:11'),
(34, 'Rat', '2022-10-19', 'Inside Tom&Jerry', '650e8b80c24ba1.98511260.jpg', 'Pending', '', 3, 8, 2, '2023-09-25 12:02:58'),
(35, 'Hero Bike', '2023-08-28', 'Naryani Bank, Chitwan', '650e8bc690ced0.14362235.jpg', 'Approved', '', 5, 8, 4, '2023-09-23 06:59:01'),
(36, 'Passport', '2023-09-23', 'Tribhuwan Int. Airport', '650e8c648162c3.77720247.jpg', 'Approved', '', 5, 8, 1, '2023-09-23 06:57:46'),
(37, 'My Phone', '2023-05-09', 'Kathmandu', '650e8e03a7a061.70498411.jpg', 'Approved', '', 5, 11, 3, '2023-09-23 07:12:19'),
(38, 'Nagrikta', '2023-09-04', 'Near Chitwan Hotel', '650e8e41af8185.55228096.jpg', 'Approved', '', 5, 11, 1, '2023-09-23 07:10:35'),
(39, 'Licence', '2023-09-04', 'Cancer Hospital, Chitwan', '650e8e6a3bd6d6.30556608.jpg', 'Approved', '', 5, 11, 1, '2023-09-23 07:10:31'),
(40, 'Passport', '2023-07-14', 'Bharatpur Airport', '650e93f13a5ff2.13963434.jpg', 'Pending', '', 0, 11, 1, '2023-09-23 07:29:53'),
(41, 'Id Card', '2023-09-05', 'UTEC Bharatpur', '650e94340f7140.04733179.png', 'Pending', '', 0, 11, 1, '2023-09-23 07:31:00'),
(42, 'Cow', '2023-08-28', 'Gitanagar,Chitwan', '650e94771e4451.91505716.jpg', 'Pending', '', 0, 11, 2, '2023-09-23 07:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `U_name` varchar(255) NOT NULL,
  `U_mail` varchar(255) NOT NULL,
  `U_password` varchar(255) NOT NULL,
  `U_number` varchar(255) NOT NULL,
  `U_image` varchar(255) NOT NULL,
  `active_status` varchar(255) NOT NULL,
  `active_token` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `reset_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `U_name`, `U_mail`, `U_password`, `U_number`, `U_image`, `active_status`, `active_token`, `verification_code`, `is_verified`, `reset_token`) VALUES
(6, 'Saurav', 'saurav@tracker.com', '$2y$10$AMr3DeWQM.j/HfCCvH1bl.7VVPbORBm70gcPBLqJSW9pqyZ/IKnX.', '984513456', '650dbb9e07bd78.04718054.jpg', 'Active', '', '521571b9b49a5755705b1bb9398b0445', 1, ''),
(7, 'Sachin', 'sachin@tracker.com', '$2y$10$5YexZRxZFsWZfMd7B5S4BOuZ.la6ugDDvS9JU2RPgCbFV2pK/0kT.', '986456456', '650dbc5972b4c6.62598202.png', 'Active', '', 'c685a4ded294b4ffdd65b6cb27e1ed46', 1, ''),
(8, 'Gaurav', 'gaurav@tracker.com', '$2y$10$8LlnErwuqF1hN2Uhm/xm8./g81hKixtPbjHjMr/ntdJ6aLmgvZ1XK', '9869898985', '650dbcd2ecfca1.82661912.jpg', 'Active', '', '293575cbca2bfe5a06f066796db3215a', 1, ''),
(9, 'Sanket', 'sanket@tracker.com', '$2y$10$PeJYOWgiVmU4IUUHbXtEzeOI88ZZbBcBzAjcr.74bEwIyA0PVd0Bi', '9845440004', '650dbd1e2b4bd8.57549864.jpg', 'Active', '', '47498fe39e58b378eba0e09aee3be8af', 1, ''),
(10, 'Soviyat', 'soviyat@tracker.com', '$2y$10$p7QImWSd8PSXI6FdVZ4bPuRki9/KJm9Ocu8gtQ3aTxH4DkI9FjF4q', '986311735', '650dbd97d8dce9.34853913.jpg', 'Active', '', '3bccd482f5be7d24ca9801d8918e3f69', 1, ''),
(11, 'Utsab', 'utsab@tracker.com', '$2y$10$pHY/4kXht9T1qVCJsFmUoO2tryGHHy5iqSY/MNF5E1JLsTJN12Fma', '9869896545', '650dbdf5cdd802.44541876.jpg', 'Active', '', '111d8d4f8e4bf7cb3402986323c0222e', 1, ''),
(12, 'ALFAJER', 'alfajer@tracker.com', '$2y$10$zlvScEhUZw4b4aj5heN74ePBi/WbVLdbx1QV4YD2x35FnWi64EJVS', '9854321654', '650dbe9debf341.42556119.png', 'Active', '', 'a3e1d857f7bdce836120507dc5b7e9ca', 1, ''),
(17, 'Test', 'test@umail.com', '$2y$10$zlvScEhUZw4b4aj5heN74ePBi/WbVLdbx1QV4YD2x35FnWi64EJVS', '565656565656', '', 'Deleted', '', '', 1, ''),
(18, 'sanket', 'sanketsubedi1000@gmail.com', '$2y$10$xcaBpuKyNZEKprhuK/tCVOFOK1Ytj5MQ64lXu2t5zcDSTKl5mLodO', '9845440004', '651131cdc90720.23463168.png', 'Active', '2827209ead59824d365fe64724d04137', '7808d4cda2281d35fce5ebb75696b977', 1, 'be349555a8442ac7546a3b08c157a0f1'),
(19, 'sankt', 'sanketsubedi100@gmail.com', '$2y$10$aIKCJEaygorrlUKrblprJuVfROnz2If.ZMrfC./E9aRDasgGs6GP6', '55656565656', '6511464aabdcb2.04755342.png', 'Active', '', 'a7c60b7bb9611e46aa90542f591a8ca7', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`I_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `I_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
