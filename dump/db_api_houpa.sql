-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Dez-2020 às 21:30
-- Versão do servidor: 10.4.16-MariaDB
-- versão do PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_api_houpa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `photo`, `store_id`) VALUES
(1, 'Camisa Blue', 'Camisa Navio', '/public/img/products/id_1/camisa_born_on_streets.jpg', 1),
(2, 'Camisa Navy C', 'Camisa Blue', '/public/img/products/id_2/camisa_on_streets_black.jpg', 2),
(3, 'Camisa Blue AF', 'Camisa N', '/public/img/products/id_3/camisa_blue_navy.jpg', 3),
(4, 'Camisa bore ', 'Camisa born aaa', '/public/img/products/id_4/camisa_born_on_streets.jpg', 3),
(5, 'Camisa   Camisa', 'Camisa born ', '/public/img/products/id_5/camisa_born_on_streets.jpg', 2),
(6, 'Camisa born BC', 'Camisa born Streets', '/public/img/products/id_6/camisa_born_on_streets.jpg', 1),
(7, 'Camisa Crazy monkey', 'Crazy Monkey af', '/public/img/products/id_7/camisa_crazy_monkey_black.jpg', 1),
(8, 'Camisa Crazy GG', 'Crazy Monkey 99', '/public/img/products/id_8/camisa_crazy_monkey_black.jpg', 2),
(9, 'Camisa Crazy macaco', 'Crazy Diamond', '/public/img/products/id_9/camisa_crazy_monkey_black.jpg', 3),
(10, 'Camisa Monky Zinza ff', 'Crazy Monkey Gray', '/public/img/products/id_10/camisa_crazy_monkey_grey.jpg', 1),
(11, 'Camisa Monky Gray', 'Crazy Gray', '/public/img/products/id_11/camisa_crazy_monkey_grey.jpg', 2),
(12, 'Camisa Monk aa', 'Crazy Monkey ', '/public/img/products/id_12/camisa_crazy_monkey_grey.jpg', 3),
(13, 'Camisa Perigo', 'Danger camisa', '/public/img/products/id_13/camisa_danger_knigth.jpg', 1),
(14, 'Camisa Dangerous', 'Danger perigo', '/public/img/products/id_14/camisa_danger_knigth.jpg', 2),
(15, 'Camisa Danger', 'Danger aasd', '/public/img/products/id_15/camisa_danger_knigth.jpg', 3),
(16, 'Camisa Die Gray', 'Die aasd', '/public/img/products/id_16/camisa_die_gray.jpg', 1),
(17, 'Camisa Die aa', 'Die Holy', '/public/img/products/id_17/camisa_die_gray.jpg', 2),
(18, 'Camisa Die Gray', 'Die Gray aad', '/public/img/products/id_18/camisa_die_gray.jpg', 3),
(19, 'Camisa On ', 'On Streets', '/public/img/products/id_19/camisa_on_streets_black.jpg', 1),
(20, 'Camisa On gg', 'On Streets a', '/public/img/products/id_20/camisa_on_streets_black.jpg', 2),
(21, 'Camisa On Streets', 'On Sky', '/public/img/products/id_21/camisa_on_streets_black.jpg', 3),
(22, 'Camisa Black Skull', 'Camisa Black ', '/public/img/products/id_22/camisa_skull.jpg', 1),
(23, 'Camisa Black ', 'Camisa  Skull', '/public/img/products/id_23/camisa_skull.jpg', 2),
(24, 'Camisa  Skull', 'Camisa gg', '/public/img/products/id_24/camisa_skull.jpg', 3),
(25, 'Camisa ap', 'Sphinxs', '/public/img/products/id_25/camisa_sphinx.jpg', 1),
(26, 'Camisa Sphinx', 'Sphinx ad', '/public/img/products/id_26/camisa_sphinx.jpg', 2),
(27, 'Camisa jk', 'ad ff', '/public/img/products/id_27/camisa_sphinx.jpg', 3),
(28, 'Camisa Tee', 'Tee t-shirt', '/public/img/products/id_28/camisa_tee.jpg', 1),
(29, 'Camisa Tee', 'Tee t-shirt', '/public/img/products/id_29/camisa_tee.jpg', 2),
(30, 'Camisa Tee', 'Tee ', '/public/img/products/id_30/camisa_tee.jpg', 3),
(31, 'Camisa Tee Black', 'Tee t-shirtdd', '/public/img/products/id_31/camisa_tee_black.jpg', 1),
(32, 'Camisa Tso', 'tso', '/public/img/products/id_32/camisa_tso_black.jpg', 3),
(33, 'Camisa Tso td', 'tso td', '/public/img/products/id_33/camisa_tso_td_shirts.jpg', 2),
(34, 'Camisa white dgk', 'tso td', '/public/img/products/id_34/camisa_white_dgk.jpg', 2),
(35, 'Camisa vinho ad', 'wine skull', '/public/img/products/id_35/camisa_wine_skull.jpg', 1),
(36, 'Camisa wine ', 'wine skull', '/public/img/products/id_36/camisa_wine_skull.jpg', 3),
(37, 'Camisa die', 'dye ', '/public/img/products/id_37/camiza_diey_sinza.jpg', 2),
(38, 'Camisa grey', 'grey', '/public/img/products/id_38/camiza_diey_sinza.jpg', 3),
(39, 'Camisa af', 'dye grey', '/public/img/products/id_39/camiza_diey_sinza.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sizeId` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `product_size`
--

INSERT INTO `product_size` (`id`, `productId`, `sizeId`, `quantity`) VALUES
(1, 1, 1, 10),
(2, 1, 2, 20),
(3, 1, 3, 34),
(4, 1, 4, 55),
(5, 2, 4, 30),
(6, 2, 3, 32),
(7, 2, 1, 10),
(8, 2, 2, 9),
(9, 3, 4, 30),
(10, 4, 1, 30),
(11, 5, 1, 30),
(12, 6, 1, 30),
(13, 7, 1, 30),
(14, 8, 1, 30),
(15, 9, 1, 30),
(16, 10, 1, 30),
(17, 11, 1, 30),
(18, 12, 1, 30),
(19, 13, 1, 30),
(20, 14, 1, 30),
(21, 15, 1, 30),
(22, 16, 1, 30),
(23, 17, 1, 30),
(24, 18, 1, 30),
(25, 19, 1, 30),
(26, 20, 1, 30),
(27, 21, 1, 30),
(28, 22, 1, 30),
(29, 23, 1, 30),
(30, 24, 1, 30),
(31, 25, 1, 30),
(32, 26, 1, 30),
(33, 27, 1, 30),
(34, 28, 1, 30),
(35, 29, 1, 30),
(36, 30, 1, 30),
(37, 31, 2, 30),
(38, 32, 3, 30),
(39, 33, 4, 30),
(40, 34, 2, 30),
(41, 35, 2, 350),
(42, 36, 2, 100),
(43, 37, 3, 100),
(44, 38, 3, 100),
(45, 39, 3, 100),
(46, 5, 2, 30),
(47, 5, 3, 30),
(48, 5, 4, 10),
(49, 3, 3, 30),
(50, 3, 2, 30),
(51, 3, 1, 10),
(52, 8, 2, 20),
(53, 8, 3, 25),
(54, 8, 4, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sizes`
--

CREATE TABLE `sizes` (
  `sizeId` int(11) NOT NULL,
  `sizeName` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sizes`
--

INSERT INTO `sizes` (`sizeId`, `sizeName`) VALUES
(1, 'P'),
(2, 'M'),
(3, 'G'),
(4, 'GG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `stores`
--

INSERT INTO `stores` (`id`, `name`, `img_path`) VALUES
(1, 'Lacoste', '/public/img/stores/id_1/lacoste.jpg'),
(2, 'Vans', '/public/img/stores/id_2/vans.jpg'),
(3, 'Livis', '/public/img/stores/id_3/livis.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `store_products`
--

CREATE TABLE `store_products` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `store_products`
--

INSERT INTO `store_products` (`id`, `id_product`, `store_id`, `price`) VALUES
(1, 1, 1, '20.00'),
(2, 2, 2, '20.00'),
(3, 3, 3, '20.00'),
(4, 4, 3, '35.00'),
(5, 5, 2, '35.00'),
(6, 6, 1, '35.00'),
(7, 7, 1, '35.00'),
(8, 8, 2, '35.00'),
(9, 9, 3, '35.00'),
(10, 10, 1, '35.00'),
(11, 11, 2, '35.00'),
(12, 12, 3, '35.00'),
(13, 13, 1, '35.00'),
(14, 14, 2, '35.00'),
(15, 15, 3, '35.00'),
(16, 16, 1, '35.00'),
(17, 17, 2, '35.00'),
(18, 18, 3, '35.00'),
(19, 19, 1, '27.00'),
(20, 20, 2, '27.00'),
(21, 21, 3, '27.00'),
(22, 22, 1, '27.00'),
(23, 23, 2, '27.00'),
(24, 24, 3, '27.00'),
(25, 25, 1, '27.00'),
(26, 26, 2, '27.00'),
(27, 27, 3, '27.00'),
(28, 28, 1, '27.00'),
(29, 29, 2, '27.00'),
(30, 30, 3, '27.00'),
(31, 31, 1, '27.00'),
(32, 32, 3, '27.00'),
(33, 33, 2, '27.00'),
(34, 34, 2, '23.00'),
(35, 35, 1, '22.00'),
(36, 36, 3, '22.00'),
(37, 37, 2, '19.00'),
(38, 38, 3, '19.00'),
(39, 39, 1, '19.00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_id` (`store_id`);

--
-- Índices para tabela `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`),
  ADD KEY `sizeId` (`sizeId`);

--
-- Índices para tabela `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`sizeId`);

--
-- Índices para tabela `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `store_products`
--
ALTER TABLE `store_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `store_id` (`store_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `sizes`
--
ALTER TABLE `sizes`
  MODIFY `sizeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `store_products`
--
ALTER TABLE `store_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_size_ibfk_2` FOREIGN KEY (`sizeId`) REFERENCES `sizes` (`sizeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `store_products`
--
ALTER TABLE `store_products`
  ADD CONSTRAINT `store_products_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `store_products_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
