-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2026 at 06:24 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_marilaundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Budi Santoso', '081234567890', 'Jl. Merdeka No. 10, Jakarta Pusat', '2026-02-16 11:18:51', '2026-02-16 11:18:51'),
(2, 'Siti Aminah', '085678901234', 'Jl. Kebon Jeruk No. 5, Jakarta Barat', '2026-02-16 11:18:51', '2026-02-16 11:18:51'),
(3, 'Rudi Hartono', '087890123456', 'Jl. Diponegoro No. 20, Bandung', '2026-02-16 11:18:51', '2026-02-16 11:18:51'),
(4, 'Dewi Lestari', '081345678901', 'Jl. Malioboro No. 15, Yogyakarta', '2026-02-16 11:18:51', '2026-02-16 11:18:51'),
(5, 'Andi Wijaya', '082156789012', 'Jl. Pahlawan No. 8, Surabaya', '2026-02-16 11:18:51', '2026-02-16 11:18:51'),
(6, 'Handoko', '081381675285', '', '2026-02-16 12:24:00', '2026-02-16 12:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `category` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text,
  `user_id` int UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `date`, `category`, `amount`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2026-01-19', 'Gaji Karyawan', '85000.00', 'Service mesin cuci 1', 1, '2026-02-16 04:56:34', '2026-02-16 11:56:34'),
(2, '2026-02-01', 'Air', '109000.00', 'Ganti lampu yang mati', 1, '2026-02-16 04:56:35', '2026-02-16 11:56:35'),
(3, '2026-01-20', 'Deterjen & Pewangi', '345000.00', 'Beli pewangi 20 liter', 1, '2026-02-16 04:56:35', '2026-02-16 11:56:35'),
(4, '2026-02-05', 'Gaji Karyawan', '71000.00', 'Pembayaran tagihan listrik bulan ini', 1, '2026-02-16 04:56:35', '2026-02-16 11:56:35'),
(5, '2026-01-30', 'Perawatan Mesin', '497000.00', 'Gaji karyawan A bulan ini', 1, '2026-02-16 04:56:35', '2026-02-16 11:56:35'),
(6, '2026-02-07', 'Gaji Karyawan', '272000.00', 'Gaji karyawan A bulan ini', 1, '2026-02-16 04:56:35', '2026-02-16 11:56:35'),
(7, '2026-02-11', 'Lainnya', '160000.00', 'Pembayaran tagihan listrik bulan ini', 1, '2026-02-16 04:56:35', '2026-02-16 11:56:35'),
(8, '2026-01-31', 'Deterjen & Pewangi', '175000.00', 'Pembayaran tagihan air PAM', 1, '2026-02-16 04:56:35', '2026-02-16 11:56:35'),
(9, '2026-01-28', 'Lainnya', '114000.00', 'Gaji karyawan A bulan ini', 1, '2026-02-16 04:56:35', '2026-02-16 11:56:35'),
(10, '2026-01-20', 'Air', '238000.00', 'Ganti lampu yang mati', 1, '2026-02-16 04:56:35', '2026-02-16 11:56:35'),
(11, '2026-01-28', 'Air', '220000.00', 'Beli pewangi 20 liter', 1, '2026-02-16 04:56:35', '2026-02-16 11:56:35'),
(12, '2026-02-09', 'Perawatan Mesin', '160000.00', 'Beli pewangi 20 liter', 1, '2026-02-16 04:56:35', '2026-02-16 11:56:35'),
(13, '2026-02-14', 'Gaji Karyawan', '250000.00', 'Biaya kebersihan lingkungan', 1, '2026-02-16 04:56:35', '2026-02-16 11:56:35'),
(14, '2026-02-09', 'Air', '188000.00', 'Gaji karyawan A bulan ini', 1, '2026-02-16 04:56:35', '2026-02-16 11:56:35'),
(15, '2026-02-06', 'Lainnya', '278000.00', 'Gaji karyawan A bulan ini', 1, '2026-02-16 04:56:35', '2026-02-16 11:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(20240216000003);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `invoice_code` varchar(50) NOT NULL,
  `customer_id` int UNSIGNED NOT NULL,
  `entry_date` datetime NOT NULL,
  `estimation_date` datetime NOT NULL,
  `status` enum('diterima','diproses','selesai','diambil') NOT NULL DEFAULT 'diterima',
  `total_price` decimal(10,2) NOT NULL,
  `payment_status` enum('unpaid','paid') NOT NULL DEFAULT 'unpaid',
  `payment_method` enum('cash','transfer','qris','pending') NOT NULL DEFAULT 'pending',
  `user_id` int UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_code`, `customer_id`, `entry_date`, `estimation_date`, `status`, `total_price`, `payment_status`, `payment_method`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'INV-20260216-001', 1, '2026-02-16 04:35:29', '2026-02-16 10:35:29', 'diambil', '52800.00', 'paid', 'cash', 1, '2026-02-16 11:35:29', '2026-02-16 11:37:07'),
(2, 'INV-20260216-002', 2, '2026-02-16 04:48:34', '2026-02-16 10:48:34', 'diambil', '66600.00', 'paid', 'qris', 1, '2026-02-16 11:48:34', '2026-02-16 11:48:53'),
(3, 'INV-20260216-003', 6, '2026-02-16 05:24:25', '2026-02-16 11:24:25', 'diambil', '60000.00', 'paid', 'cash', 1, '2026-02-16 12:24:25', '2026-02-16 12:42:01'),
(4, 'INV-20260216-004', 6, '2026-02-16 05:40:38', '2026-02-18 05:40:38', 'diambil', '50000.00', 'paid', 'qris', 1, '2026-02-16 12:40:38', '2026-02-16 12:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `service_id` int UNSIGNED NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `service_id`, `qty`, `price`, `subtotal`) VALUES
(1, 1, 4, '4.40', '12000.00', '52800.00'),
(2, 2, 4, '5.55', '12000.00', '66600.00'),
(3, 3, 4, '5.00', '12000.00', '60000.00'),
(4, 4, 1, '10.00', '5000.00', '50000.00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `unit` enum('kg','pcs') NOT NULL DEFAULT 'kg',
  `estimation_duration` int NOT NULL COMMENT 'Duration in hours',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `price`, `unit`, `estimation_duration`, `created_at`, `updated_at`) VALUES
(1, 'Cuci Kering', NULL, '5000.00', 'kg', 48, '2026-02-16 11:18:49', '2026-02-16 11:18:49'),
(2, 'Cuci Setrika', NULL, '8000.00', 'kg', 48, '2026-02-16 11:18:49', '2026-02-16 11:18:49'),
(3, 'Setrika Saja', NULL, '4000.00', 'kg', 24, '2026-02-16 11:18:49', '2026-02-16 11:18:49'),
(4, 'Express', NULL, '12000.00', 'kg', 6, '2026-02-16 11:18:49', '2026-02-16 11:18:49'),
(5, 'Satuan + Setrika', 'Cuci Satuan (Bonus Setrika)', '7000.00', 'pcs', 0, '2026-02-16 11:48:05', '2026-02-16 11:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `key` varchar(50) NOT NULL,
  `value` text,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `description`) VALUES
(1, 'app_name', 'MariLaundry', 'Nama Aplikasi'),
(2, 'wa_api_key', '', 'API Key WhatsApp Gateway'),
(3, 'wa_template_accepted', 'Halo Kak {customer}, pesanan laundry Anda dengan nomor invoice {invoice} telah kami terima dan akan segera diproses. Estimasi selesai pada {estimation}. Terima kasih.', 'Template Pesan Order Diterima'),
(4, 'wa_template_process', 'Halo Kak {customer}, pesanan laundry Anda dengan nomor invoice {invoice} saat ini sedang dalam tahap pengerjaan. Mohon ditunggu ya Kak.', 'Template Pesan Order Diproses'),
(5, 'wa_template_ready', 'Halo Kak {customer}, laundry Anda dengan nomor invoice {invoice} sudah SELESAI dan siap diambil. Total tagihan Anda adalah {total}. Ditunggu kedatangannya ya Kak. Terima kasih.', 'Template Pesan Order Selesai'),
(6, 'wa_template_taken', 'Halo Kak {customer}, terima kasih telah menggunakan jasa MariLaundry. Laundry dengan nomor invoice {invoice} telah berhasil diambil. Semoga bersih dan wangi selalu!', 'Template Pesan Order Diambil');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('super_admin','admin','operator','owner') NOT NULL DEFAULT 'operator',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin', 'superadmin@example.com', '$2y$10$LOezNmDBu5nWcOraEMDsv.OeNL9AWpiS8PP899ovfCOZzvM4h0TJC', 'super_admin', '2026-02-16 11:18:49', '2026-02-16 11:18:50'),
(2, 'Admin', 'admin', 'admin@example.com', '$2y$10$zCdpJU/69KjRpRYeplP90OkGOCMrBjXI3JIYr8njC9eITSwr7yh5m', 'admin', '2026-02-16 11:18:49', '2026-02-16 11:18:51'),
(3, 'Operator', 'operator', 'operator@example.com', '$2y$10$boG5wki4gdFVK5JHUu0vKe2f0UbvmV.iZ/cBynyry3bZVA98WAazu', 'operator', '2026-02-16 11:18:49', '2026-02-16 05:53:48'),
(4, 'Owner', 'owner', 'owner@example.com', '$2y$10$1ZnvcpBoKttbZF2vriZozOk.KOq4qc3B7jCBFQuoYByu4AXnpEnZO', 'owner', '2026-02-16 11:18:49', '2026-02-16 05:52:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_code` (`invoice_code`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
