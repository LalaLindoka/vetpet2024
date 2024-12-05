-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Set-2024 às 18:42
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vetpet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `nascimento` date NOT NULL,
  `raca` varchar(50) DEFAULT NULL,
  `especie` varchar(50) DEFAULT NULL,
  `porte` enum('Pequeno','Médio','Grande') DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `sexo` enum('Macho','Fêmea') DEFAULT NULL,
  `castrado` tinyint(1) DEFAULT NULL,
  `observacao` text NOT NULL,
  `responsavel_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_responsavel` (`responsavel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `nascimento`, `raca`, `especie`, `porte`, `peso`, `sexo`, `castrado`, `observacao`, `responsavel_id`) VALUES
(3, 'Bob', '2019-08-23', 'Bulldog', 'Cão', 'Médio', '20.00', 'Macho', 1, '', 1),
(22, 'Juju', '2022-06-14', 'Maine Coon', 'gato', 'Grande', '5.00', 'Macho', 1, '', 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `racas`
--

DROP TABLE IF EXISTS `racas`;
CREATE TABLE IF NOT EXISTS `racas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `especie` enum('cachorro','gato','outro','roedor','ave','reptil') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `racas`
--

INSERT INTO `racas` (`id`, `nome`, `especie`) VALUES
(1, 'Labrador Retriever', 'cachorro'),
(2, 'Bulldog Francês', 'cachorro'),
(3, 'Golden Retriever', 'cachorro'),
(4, 'Pastor Alemão', 'cachorro'),
(5, 'Poodle', 'cachorro'),
(6, 'Beagle', 'cachorro'),
(7, 'Rottweiler', 'cachorro'),
(8, 'Yorkshire Terrier', 'cachorro'),
(9, 'Boxer', 'cachorro'),
(10, 'Dachshund', 'cachorro'),
(11, 'Persa', 'gato'),
(12, 'Siamês', 'gato'),
(13, 'Maine Coon', 'gato'),
(14, 'Bengal', 'gato'),
(15, 'Sphynx', 'gato'),
(16, 'Ragdoll', 'gato'),
(17, 'British Shorthair', 'gato'),
(18, 'Abyssinian', 'gato'),
(19, 'Birman', 'gato'),
(20, 'Scottish Fold', 'gato'),
(21, 'Sem raça definida', 'cachorro'),
(22, 'Sem raça definida', 'gato'),
(25, 'Coelho', 'roedor'),
(24, 'Pato', 'outro'),
(26, 'Porquinho-da-índia', 'roedor'),
(27, 'Hamster', 'roedor'),
(28, 'Pássaro Canário', 'ave'),
(29, 'Papagaio', 'ave'),
(30, 'Tartaruga', 'reptil'),
(31, 'Iguana', 'reptil'),
(32, 'Coati', 'outro'),
(33, 'Furão', 'outro'),
(34, 'Rato', 'roedor'),
(35, 'Paca', 'outro'),
(36, 'Ouriço', 'outro'),
(37, 'Pangolim', 'outro'),
(38, 'Cobrança', 'reptil'),
(39, 'Camaleão', 'reptil'),
(40, 'Falcão', 'ave'),
(41, 'Serpente', 'reptil'),
(42, 'Coelho', 'roedor'),
(43, 'Porquinho-da-índia', 'roedor'),
(44, 'Hamster', 'roedor'),
(45, 'Pássaro Canário', 'ave'),
(46, 'Papagaio', 'ave'),
(47, 'Tartaruga', 'reptil'),
(48, 'Iguana', 'reptil'),
(49, 'Coati', 'outro'),
(50, 'Furão', 'outro'),
(51, 'Rato', 'roedor'),
(52, 'Paca', 'outro'),
(53, 'Ouriço', 'outro'),
(54, 'Pangolim', 'outro'),
(55, 'Cobrança', 'reptil'),
(56, 'Camaleão', 'reptil'),
(57, 'Tetra', ''),
(58, 'Betta', ''),
(59, 'Cachorro-do-mato', 'outro'),
(60, 'Falcão', 'ave'),
(61, 'Serpente', 'reptil'),
(62, 'Coelho', 'roedor'),
(63, 'Porquinho-da-índia', 'roedor'),
(64, 'Hamster', 'roedor'),
(65, 'Pássaro Canário', 'ave'),
(66, 'Papagaio', 'ave'),
(67, 'Tartaruga', 'reptil'),
(68, 'Iguana', 'reptil'),
(69, 'Coati', 'outro'),
(70, 'Furão', 'outro'),
(71, 'Rato', 'roedor'),
(72, 'Paca', 'outro'),
(73, 'Ouriço', 'outro'),
(74, 'Pangolim', 'outro'),
(75, 'Cobrança', 'reptil'),
(76, 'Camaleão', 'reptil'),
(77, 'Cachorro-do-mato', 'outro'),
(78, 'Falcão', 'ave'),
(79, 'Serpente', 'reptil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsaveis`
--

DROP TABLE IF EXISTS `responsaveis`;
CREATE TABLE IF NOT EXISTS `responsaveis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `responsaveis`
--

INSERT INTO `responsaveis` (`id`, `nome`, `telefone`, `endereco`) VALUES
(27, 'Julia', '55997068936', 'Rua C, 634'),
(26, 'Julia', '55997068936', 'Rua C, 634'),
(25, 'Julia', '55997068936', 'Rua C, 634'),
(24, 'MERCEDES AUDERO', '55991587107', 'Rua A, 534'),
(23, 'eunice', '55997068936', 'Rua C, 634'),
(28, 'Mavi', '1234456778', 'rua c, n1234'),
(29, 'bruno bitencourt', '55 996507010', 'Cidade nova, augusto de almeida, 208'),
(30, 'Gavi Herreiro', '1234567893', 'Rua D,756');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `preco` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nome`, `preco`) VALUES
(1, 'Remoção de tartáro', 100),
(2, 'Aplicação de vacina', 80);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
