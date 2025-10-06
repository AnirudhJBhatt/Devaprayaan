-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2025 at 05:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devaprayaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `booking_ref` varchar(50) NOT NULL,
  `package_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `passenger_name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `booked_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_ref`, `package_id`, `user_id`, `passenger_name`, `age`, `gender`, `phone`, `booked_at`) VALUES
(7, 'BK_68b68ceb91305', 2, '2', 'Anirudh', 21, 'Male', '8281020395', '2025-09-02 06:40:53'),
(8, 'BK_68b68ceb91305', 2, '2', 'Anirudh', 25, 'Male', '8281020395', '2025-09-02 06:40:53'),
(9, 'BK_02092501', 1, '2', 'Anirudh', 21, 'Male', '8281020395', '2025-09-02 06:40:53'),
(10, 'BK_02092501', 1, '2', 'Anirudh', 25, 'Male', '8281020395', '2025-09-02 06:40:53'),
(14, 'BK_03092501', 1, '2', 'Anirudh', 21, 'Male', '8281020395', '2025-09-03 15:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `description`, `price`, `duration`, `location`, `image`) VALUES
(1, 'Golden Triangle Tour', 'Explore Delhi, Agra, and Jaipur including Taj Mahal and Amber Fort.', 12000.00, '5 Days / 4 Nights', 'Delhi – Agra – Jaipur', 'images/golden-triangle.jpg'),
(2, 'Kerala Backwaters', 'Houseboat ride through Alleppey backwaters with Munnar and Kochi sightseeing.', 18000.00, '6 Days / 5 Nights', 'Cochin – Munnar – Alleppey', 'images/kerala-backwaters.jpg'),
(3, 'Goa Beach Holiday', 'Enjoy the vibrant beaches, water sports, and nightlife of Goa.', 15000.00, '4 Days / 3 Nights', 'North & South Goa', 'images/goa-beach.jpg'),
(4, 'Himalayan Adventure', 'Trekking, camping, and river rafting in the Himalayas.', 22000.00, '7 Days / 6 Nights', 'Rishikesh – Manali – Kasol', 'images/himalayan-adventure.jpg'),
(5, 'Royal Rajasthan', 'Experience palaces, forts, and desert safari in Rajasthan.', 20000.00, '6 Days / 5 Nights', 'Jaipur – Jodhpur – Jaisalmer', 'images/royal-rajasthan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_ref` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `status` enum('Pending','Completed','Failed') DEFAULT 'Pending',
  `transaction_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `booking_ref`, `amount`, `payment_method`, `status`, `transaction_date`) VALUES
(1, 2, 'BK_02092501', 7000.00, 'Credit Card', 'Completed', '2025-09-02 12:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Name`, `Gender`, `Phone`, `Email`, `Password`, `Role`) VALUES
(1, 'Admin', 'Male', '8281020395', 'admin@gmail.com', 'Admin@123', 'Admin'),
(2, 'Anirudh J Bhatt', 'Male', '9188130395', 'anirudhjbhatt@gmail.com', 'User@123', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
