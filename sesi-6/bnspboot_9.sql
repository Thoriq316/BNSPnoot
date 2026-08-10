-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 10, 2026 at 02:12 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bnspboot_9`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `total` decimal(15,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `stock` int UNSIGNED NOT NULL DEFAULT '0',
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_user` (`user_id`),
  ADD KEY `fk_orders_product` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



INSERT INTO products
(name, description, image, price, stock, category)
VALUES
(
    'Laptop ASUS VivoBook 14',
    'Laptop ringan dengan performa tinggi untuk kebutuhan belajar, kerja, dan aktivitas sehari-hari.',
    'asus-vivobook-14.jpg',
    8500000.00,
    15,
    'Laptop'
),
(
    'Laptop Lenovo IdeaPad Slim 3',
    'Laptop modern dengan desain slim dan performa yang cocok untuk pelajar dan profesional.',
    'lenovo-ideapad-slim-3.jpg',
    7800000.00,
    20,
    'Laptop'
),
(
    'Mouse Logitech M331',
    'Mouse wireless dengan desain ergonomis dan nyaman digunakan dalam waktu lama.',
    'logitech-m331.jpg',
    325000.00,
    50,
    'Aksesoris'
),
(
    'Keyboard Mechanical Fantech',
    'Keyboard mechanical dengan RGB lighting dan switch yang responsif untuk gaming maupun produktivitas.',
    'fantech-keyboard.jpg',
    650000.00,
    30,
    'Aksesoris'
),
(
    'Monitor LG UltraGear 24',
    'Monitor gaming 24 inci dengan refresh rate tinggi dan kualitas gambar yang tajam.',
    'lg-ultragear-24.jpg',
    2400000.00,
    12,
    'Monitor'
),
(
    'Headset HyperX Cloud II',
    'Headset gaming dengan kualitas audio jernih dan microphone yang nyaman digunakan.',
    'hyperx-cloud-2.jpg',
    1250000.00,
    18,
    'Audio'
),
(
    'Webcam Logitech C920',
    'Webcam Full HD untuk meeting online, pembelajaran, streaming, dan video conference.',
    'logitech-c920.jpg',
    1100000.00,
    25,
    'Kamera'
),
(
    'SSD Kingston NV2 1TB',
    'SSD NVMe berkapasitas 1TB dengan kecepatan tinggi untuk meningkatkan performa komputer.',
    'kingston-nv2-1tb.jpg',
    950000.00,
    35,
    'Storage'
);


SELECT id, name, price, stock, category
FROM products;

UPDATE products
SET
    name = 'Laptop ASUS VivoBook',
    price = 9000000.00,
    stock = 15,
    category = 'Laptop'
WHERE id = 1;

DELETE FROM products
WHERE id = 1;