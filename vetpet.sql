-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Ago-2024 às 03:02
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
  `responsavel_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_responsavel` (`responsavel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `nascimento`, `raca`, `especie`, `porte`, `peso`, `sexo`, `castrado`, `responsavel_id`) VALUES
(1, 'Rex', '2020-01-01', 'Labrador', 'Cão', 'Grande', '30.50', 'Macho', 1, 1),
(2, 'Mimi', '2018-05-10', 'Siames', 'Gato', 'Pequeno', '4.30', 'Fêmea', 0, 2),
(3, 'Bob', '2019-08-23', 'Bulldog', 'Cão', 'Médio', '20.00', 'Macho', 1, 1),
(7, 'fade', '2023-11-02', 'Dooberman', 'Gato', 'Médio', '200.00', 'Macho', 0, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `racas`
--

DROP TABLE IF EXISTS `racas`;
CREATE TABLE IF NOT EXISTS `racas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `especie` enum('cachorro','gato') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(20, 'Scottish Fold', 'gato');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `responsaveis`
--

INSERT INTO `responsaveis` (`id`, `nome`, `telefone`, `endereco`) VALUES
(1, 'João Silva', '123456789', 'Rua A, 123'),
(2, 'Maria Oliveira', '987654321', 'Avenida B, 456'),
(3, 'Gabriel Araujo', '55997068936', 'Rua C, 634'),
(4, 'Gabriel Araujo', '55997068936', 'Rua C, 634'),
(6, 'Julia', '55997068936', 'Rua C, 634');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
