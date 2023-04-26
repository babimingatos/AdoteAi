-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Abr-2023 às 01:50
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `adoteai_banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(26, 9, 10, 'Oi', '2021-11-15 18:37:33', 0),
(27, 11, 12, 'Oii', '2021-11-16 22:32:05', 0),
(28, 11, 12, 'dajsfklds', '2021-11-16 22:32:23', 2),
(29, 12, 11, 'Ola\ntenho interrese nesse animal', '2021-11-16 23:33:34', 0),
(30, 12, 13, 'oi', '2021-11-17 00:05:51', 0),
(31, 13, 12, 'po', '2021-11-17 00:06:54', 2),
(32, 11, 14, 'oi', '2021-11-20 01:26:49', 0),
(33, 14, 11, 'oi', '2021-11-20 01:27:30', 2),
(34, 12, 17, 'oi', '2021-12-09 01:07:00', 0),
(35, 17, 12, 'oi\ntudo bem?', '2021-12-09 01:07:35', 1),
(36, 12, 19, 'oi', '2021-12-09 01:25:19', 0),
(37, 19, 12, 'oi tudo bem?', '2021-12-09 01:25:54', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`) VALUES
(12, 'Barbara', '$2y$10$LirBgMI5Ly57MLWqN1L/QuOSb3vTLTBXOT4G7O.nTLPWZgZAg6.E2'),
(14, 'admin', '$2y$10$5cbyrb.tFvZhlugsI3s39Oiz.NiJV0ruV9mWHzwKjaH9kL5cJNzQm'),
(20, 'miaudote@gmail.com', '$2y$10$NYnqCacQi6bYTpjdlTaGkO5VchjLz9b08L6b73ks.GzTynHxEP.1e'),
(21, 'caopanheiro@gmail.co', '$2y$10$cmW0pPo8yTpshHqly3Ll3uJzN9.fqDkPbHvfdRw523sUFzgjNCqJa'),
(22, 'lucas@gmail.com', '$2y$10$ezoBEsaIMJUiIio60DADyOZ.Z0s3A46Tan2tIEHpeVsJ6CfUBXzg2'),
(23, 'babsab@gmail.com', '$2y$10$a7VhnXFCdhpU8.hui0fqFeD67ZtAf2pq5s0IgclL0jXaRL8BV2Yvi'),
(24, 'matheuszinho@a.com', '$2y$10$qE9o1ylyXeAj93z1VL4c5O6DOCT2ATI8SycGGqzf2b2xeKDHy.zEq');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 4, '2021-11-14 23:28:01', 'no'),
(2, 5, '2021-11-14 23:28:29', 'no'),
(3, 4, '2021-11-14 23:28:46', 'no'),
(4, 4, '2021-11-14 23:30:54', 'no'),
(5, 5, '2021-11-14 23:31:01', 'no'),
(6, 4, '2021-11-14 23:41:06', 'no'),
(7, 4, '2021-11-14 23:45:58', 'no'),
(8, 4, '2021-11-14 23:49:52', 'no'),
(9, 4, '2021-11-14 23:52:33', 'no'),
(10, 4, '2021-11-14 23:55:10', 'no'),
(11, 4, '2021-11-15 00:01:20', 'no'),
(12, 4, '2021-11-15 00:12:47', 'no'),
(13, 5, '2021-11-15 00:27:24', 'no'),
(14, 4, '2021-11-15 01:10:03', 'no'),
(15, 5, '2021-11-15 01:11:05', 'no'),
(16, 6, '2021-11-15 01:40:04', 'no'),
(17, 4, '2021-11-15 01:57:51', 'no'),
(18, 5, '2021-11-15 01:58:03', 'no'),
(19, 8, '2021-11-15 03:22:39', 'no'),
(20, 4, '2021-11-15 03:31:37', 'no'),
(21, 9, '2021-11-15 18:36:47', 'no'),
(22, 10, '2021-11-15 18:37:37', 'no'),
(23, 9, '2021-11-15 18:39:13', 'no'),
(24, 9, '2021-11-15 18:43:13', 'no'),
(25, 9, '2021-11-16 02:37:35', 'no'),
(26, 11, '2021-11-16 22:24:45', 'no'),
(27, 12, '2021-11-16 22:32:34', 'no'),
(28, 11, '2021-11-16 22:33:14', 'no'),
(29, 13, '2021-11-16 22:49:32', 'no'),
(30, 11, '2021-11-16 23:33:38', 'no'),
(31, 12, '2021-11-16 23:34:24', 'no'),
(32, 13, '2021-11-17 00:06:11', 'no'),
(33, 12, '2021-11-17 00:08:10', 'no'),
(34, 14, '2021-11-20 01:27:08', 'no'),
(35, 11, '2021-11-20 01:28:20', 'no'),
(36, 15, '2021-12-08 22:50:01', 'no'),
(37, 17, '2021-12-09 01:07:11', 'no'),
(38, 12, '2021-12-09 01:07:37', 'no'),
(39, 19, '2021-12-09 01:25:25', 'no'),
(40, 12, '2021-12-09 01:25:59', 'no'),
(41, 22, '2021-12-09 22:30:51', 'no'),
(42, 22, '2021-12-09 22:32:18', 'no'),
(43, 24, '2023-04-25 23:50:24', 'no');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adm_id` int(11) NOT NULL,
  `adm_nome` varchar(45) NOT NULL,
  `adm_cpf` varchar(14) NOT NULL,
  `adm_rg` varchar(12) NOT NULL,
  `adm_logradouro` varchar(45) NOT NULL,
  `adm_numero` int(11) NOT NULL,
  `adm_complemento` varchar(11) NOT NULL,
  `adm_bairro` varchar(11) NOT NULL,
  `adm_cep` varchar(9) NOT NULL,
  `adm_cidade` varchar(45) NOT NULL,
  `adm_estado` varchar(3) NOT NULL,
  `adm_email` varchar(45) NOT NULL,
  `adm_senha` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_admin`
--

INSERT INTO `tbl_admin` (`adm_id`, `adm_nome`, `adm_cpf`, `adm_rg`, `adm_logradouro`, `adm_numero`, `adm_complemento`, `adm_bairro`, `adm_cep`, `adm_cidade`, `adm_estado`, `adm_email`, `adm_senha`) VALUES
(9, 'Teste', '131232133', '2133213', '213231', 312323, '3213123', '31231', '31233213', 'Aparecida', 'sp', 'teste@gmail.com', '123'),
(10, 'adoteai', '11111111', '1111111', 'rua teste', 11, 'casa', 'centro', '12570000', 'aparecida', 'sp', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_adotador`
--

CREATE TABLE `tbl_adotador` (
  `adot_nome` varchar(45) NOT NULL,
  `adot_id` int(11) NOT NULL,
  `adot_cpf` varchar(20) NOT NULL,
  `adot_rg` varchar(20) NOT NULL,
  `adot_logradouro` varchar(45) NOT NULL,
  `adot_numero` int(11) NOT NULL,
  `adot_complemento` varchar(45) NOT NULL,
  `adot_bairro` varchar(20) NOT NULL,
  `adot_cep` varchar(45) NOT NULL,
  `adot_cidade` varchar(45) NOT NULL,
  `adot_estado` varchar(4) NOT NULL,
  `adot_email` varchar(45) NOT NULL,
  `adot_senha` varchar(14) NOT NULL,
  `adot_nivel` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tbl_adotador`
--

INSERT INTO `tbl_adotador` (`adot_nome`, `adot_id`, `adot_cpf`, `adot_rg`, `adot_logradouro`, `adot_numero`, `adot_complemento`, `adot_bairro`, `adot_cep`, `adot_cidade`, `adot_estado`, `adot_email`, `adot_senha`, `adot_nivel`) VALUES
('lucas messias', 15, '098.080.890-89', '09.809.809-8', 'rua treze', 34, 'casa', 'centro', '67567-575', 'aparecida', 'sp', 'lucas@gmail.com', '123', 2),
('Matheus', 16, '456.745.536-45', '65.465.465-4', 'Rua Treze de Maio', 2323, 'Casa', 'Vargem do Tanque', '32525-435', 'Cunha', 'SP', 'matheuszinho@a.com', '123', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_animal`
--

CREATE TABLE `tbl_animal` (
  `ani_id` int(11) NOT NULL,
  `ani_nome` varchar(20) NOT NULL,
  `ani_raca` varchar(13) NOT NULL,
  `ani_porte` varchar(10) NOT NULL,
  `ani_cor` varchar(10) NOT NULL,
  `ani_castrado` tinyint(1) NOT NULL,
  `ani_idade` int(11) NOT NULL,
  `ani_descricao` text NOT NULL,
  `ani_img` text NOT NULL,
  `ani_vacina` text NOT NULL,
  `tbl_ong_ong_id` int(11) NOT NULL,
  `tbl_especie_especie_id` int(11) NOT NULL,
  `tbl_genani_gen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_animal`
--

INSERT INTO `tbl_animal` (`ani_id`, `ani_nome`, `ani_raca`, `ani_porte`, `ani_cor`, `ani_castrado`, `ani_idade`, `ani_descricao`, `ani_img`, `ani_vacina`, `tbl_ong_ong_id`, `tbl_especie_especie_id`, `tbl_genani_gen_id`) VALUES
(35, 'Diva', 'SRD', 'Médio', 'branco e p', 0, 5, 'Dócil', 'a1-20211209104032.jpg', 'cartao_de_vacinacao_azul_claro_vetarq-1-20211209104032.jpg', 55, 1, 3),
(36, 'Josué', 'Husk Siberian', 'Grande', 'marrom', 0, 7, 'Dócil, carinhoso e inteligente', 'a3-20211209104533.jpg', 'cartao_de_vacinacao_azul_claro_vetarq-1-20211209104533.jpg', 56, 2, 4),
(37, 'Apollo', 'SRD', 'Pequeno', 'preto', 0, 5, 'Inteligente e brincalhão', 'a2-20211209104731.jpg', 'cartao_de_vacinacao_azul_claro_vetarq-1-20211209104731.jpg', 56, 2, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_enderecoong`
--

CREATE TABLE `tbl_enderecoong` (
  `endOng_id` int(11) NOT NULL,
  `endOng_logradouro` varchar(45) NOT NULL,
  `endOng_numero` int(11) NOT NULL,
  `endOng_complemento` varchar(45) NOT NULL,
  `endOng_bairro` varchar(45) NOT NULL,
  `endOng_cep` varchar(11) NOT NULL,
  `endOng_cidade` varchar(45) NOT NULL,
  `endOng_estado` varchar(45) NOT NULL,
  `tbl_ong_ong_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tbl_enderecoong`
--

INSERT INTO `tbl_enderecoong` (`endOng_id`, `endOng_logradouro`, `endOng_numero`, `endOng_complemento`, `endOng_bairro`, `endOng_cep`, `endOng_cidade`, `endOng_estado`, `tbl_ong_ong_id`) VALUES
(46, 'avenida padroeira do brasil', 456, 'casa', 'centro', '12570-000', 'aparecida', 'sp', 55),
(47, 'Avenida Juscelino Kubitschek', 456, 'chacara', 'centro', '87697-868', 'Lorena', 'SP', 56);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_especie`
--

CREATE TABLE `tbl_especie` (
  `especie_id` int(11) NOT NULL,
  `especie_nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_especie`
--

INSERT INTO `tbl_especie` (`especie_id`, `especie_nome`) VALUES
(1, 'Gato'),
(2, 'Cachorro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_genani`
--

CREATE TABLE `tbl_genani` (
  `gen_id` int(11) NOT NULL,
  `gen_nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_genani`
--

INSERT INTO `tbl_genani` (`gen_id`, `gen_nome`) VALUES
(3, 'Fêmea'),
(4, 'Macho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_ong`
--

CREATE TABLE `tbl_ong` (
  `ong_id` int(11) NOT NULL,
  `ong_nome` varchar(45) DEFAULT NULL,
  `ong_cnpj` varchar(20) DEFAULT NULL,
  `ong_email` varchar(45) NOT NULL,
  `ong_senha` varchar(10) NOT NULL,
  `ong_nivel` int(11) NOT NULL DEFAULT 1,
  `ong_cpf` varchar(14) DEFAULT NULL,
  `ong_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_ong`
--

INSERT INTO `tbl_ong` (`ong_id`, `ong_nome`, `ong_cnpj`, `ong_email`, `ong_senha`, `ong_nivel`, `ong_cpf`, `ong_img`) VALUES
(55, 'MiauDote', NULL, 'miaudote@gmail.com', '123', 1, '679.979.090-98', 'ong4-20211209103534.png'),
(56, 'Cãopanheiro', NULL, 'caopanheiro@gmail.com', '123', 1, '098.909.879-87', 'ong6-20211209104356.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_telefoneadot`
--

CREATE TABLE `tbl_telefoneadot` (
  `telAdot_id` int(11) NOT NULL,
  `telAdot_dd` varchar(2) NOT NULL,
  `telAdot_numero` varchar(20) NOT NULL,
  `tbl_adotador_adot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tbl_telefoneadot`
--

INSERT INTO `tbl_telefoneadot` (`telAdot_id`, `telAdot_dd`, `telAdot_numero`, `tbl_adotador_adot_id`) VALUES
(13, '12', '98098-0980', 15),
(14, '45', '64565-4645', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_telefoneong`
--

CREATE TABLE `tbl_telefoneong` (
  `telOng_id` int(11) NOT NULL,
  `tbl_ong_ong_id` int(11) NOT NULL,
  `telOng_numero` varchar(45) NOT NULL,
  `telOng_dd` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tbl_telefoneong`
--

INSERT INTO `tbl_telefoneong` (`telOng_id`, `tbl_ong_ong_id`, `telOng_numero`, `telOng_dd`) VALUES
(50, 55, '97697-8789', '12'),
(51, 56, '98788-7978', '12');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Índices para tabela `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Índices para tabela `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adm_id`),
  ADD UNIQUE KEY `adm_email` (`adm_email`),
  ADD UNIQUE KEY `adm_rg` (`adm_rg`),
  ADD UNIQUE KEY `adm_cpf` (`adm_cpf`);

--
-- Índices para tabela `tbl_adotador`
--
ALTER TABLE `tbl_adotador`
  ADD PRIMARY KEY (`adot_id`),
  ADD UNIQUE KEY `adot_cpf` (`adot_cpf`),
  ADD UNIQUE KEY `adot_rg` (`adot_rg`),
  ADD UNIQUE KEY `adot_email` (`adot_email`);

--
-- Índices para tabela `tbl_animal`
--
ALTER TABLE `tbl_animal`
  ADD PRIMARY KEY (`ani_id`),
  ADD KEY `tbl_especie_especie_id` (`tbl_especie_especie_id`),
  ADD KEY `tbl_ong_ong_id` (`tbl_ong_ong_id`),
  ADD KEY `tbl_genani_gen_id` (`tbl_genani_gen_id`);

--
-- Índices para tabela `tbl_enderecoong`
--
ALTER TABLE `tbl_enderecoong`
  ADD PRIMARY KEY (`endOng_id`),
  ADD KEY `tbl_ong_ong_id` (`tbl_ong_ong_id`);

--
-- Índices para tabela `tbl_especie`
--
ALTER TABLE `tbl_especie`
  ADD PRIMARY KEY (`especie_id`);

--
-- Índices para tabela `tbl_genani`
--
ALTER TABLE `tbl_genani`
  ADD PRIMARY KEY (`gen_id`);

--
-- Índices para tabela `tbl_ong`
--
ALTER TABLE `tbl_ong`
  ADD PRIMARY KEY (`ong_id`),
  ADD UNIQUE KEY `ong_email` (`ong_email`),
  ADD UNIQUE KEY `ong_cpf` (`ong_cpf`),
  ADD UNIQUE KEY `ong_cnpj` (`ong_cnpj`);

--
-- Índices para tabela `tbl_telefoneadot`
--
ALTER TABLE `tbl_telefoneadot`
  ADD PRIMARY KEY (`telAdot_id`),
  ADD UNIQUE KEY `telAdot_numero` (`telAdot_numero`),
  ADD KEY `tbl_adotador_adot_id` (`tbl_adotador_adot_id`);

--
-- Índices para tabela `tbl_telefoneong`
--
ALTER TABLE `tbl_telefoneong`
  ADD PRIMARY KEY (`telOng_id`),
  ADD UNIQUE KEY `telOng_numero` (`telOng_numero`),
  ADD KEY `tbl_ong_ong_id` (`tbl_ong_ong_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbl_adotador`
--
ALTER TABLE `tbl_adotador`
  MODIFY `adot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tbl_animal`
--
ALTER TABLE `tbl_animal`
  MODIFY `ani_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `tbl_enderecoong`
--
ALTER TABLE `tbl_enderecoong`
  MODIFY `endOng_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `tbl_especie`
--
ALTER TABLE `tbl_especie`
  MODIFY `especie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_genani`
--
ALTER TABLE `tbl_genani`
  MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbl_ong`
--
ALTER TABLE `tbl_ong`
  MODIFY `ong_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `tbl_telefoneadot`
--
ALTER TABLE `tbl_telefoneadot`
  MODIFY `telAdot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tbl_telefoneong`
--
ALTER TABLE `tbl_telefoneong`
  MODIFY `telOng_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbl_animal`
--
ALTER TABLE `tbl_animal`
  ADD CONSTRAINT `tbl_animal_ibfk_1` FOREIGN KEY (`tbl_especie_especie_id`) REFERENCES `tbl_especie` (`especie_id`),
  ADD CONSTRAINT `tbl_animal_ibfk_2` FOREIGN KEY (`tbl_especie_especie_id`) REFERENCES `tbl_especie` (`especie_id`),
  ADD CONSTRAINT `tbl_animal_ibfk_3` FOREIGN KEY (`tbl_ong_ong_id`) REFERENCES `tbl_ong` (`ong_id`),
  ADD CONSTRAINT `tbl_animal_ibfk_4` FOREIGN KEY (`tbl_genani_gen_id`) REFERENCES `tbl_genani` (`gen_id`),
  ADD CONSTRAINT `tbl_animal_ibfk_5` FOREIGN KEY (`tbl_genani_gen_id`) REFERENCES `tbl_genani` (`gen_id`);

--
-- Limitadores para a tabela `tbl_enderecoong`
--
ALTER TABLE `tbl_enderecoong`
  ADD CONSTRAINT `tbl_enderecoong_ibfk_1` FOREIGN KEY (`tbl_ong_ong_id`) REFERENCES `tbl_ong` (`ong_id`);

--
-- Limitadores para a tabela `tbl_telefoneadot`
--
ALTER TABLE `tbl_telefoneadot`
  ADD CONSTRAINT `tbl_telefoneadot_ibfk_1` FOREIGN KEY (`tbl_adotador_adot_id`) REFERENCES `tbl_adotador` (`adot_id`);

--
-- Limitadores para a tabela `tbl_telefoneong`
--
ALTER TABLE `tbl_telefoneong`
  ADD CONSTRAINT `tbl_telefoneong_ibfk_1` FOREIGN KEY (`tbl_ong_ong_id`) REFERENCES `tbl_ong` (`ong_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
