-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Ago-2022 às 18:42
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `yii2basic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `doadores`
--

DROP TABLE IF EXISTS `doadores`;
CREATE TABLE IF NOT EXISTS `doadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `cpf` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `telefone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `data_nascimento` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `endereco` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `data_cadastro` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `intervalo_doacao` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `valor_doacao` int(11) NOT NULL,
  `forma_pagamento` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `agencia` int(11) DEFAULT NULL,
  `conta` int(11) DEFAULT NULL,
  `bandeira_cartao` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `numero_cartao` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `doadores`
--

INSERT INTO `doadores` (`id`, `nome`, `email`, `cpf`, `telefone`, `data_nascimento`, `endereco`, `data_cadastro`, `intervalo_doacao`, `valor_doacao`, `forma_pagamento`, `agencia`, `conta`, `bandeira_cartao`, `numero_cartao`) VALUES
(19, 'João Silva', 'joaosilva@outlook.com', '215.569.958-14', '(15) 35748424_', '08/12/1947', 'Av. Rebouças, 3970', '29-08-22 03:05:51', 'semestral', 75, 'credito', NULL, NULL, 'visa', '123456******3587'),
(21, 'Roberto Luiz', 'robertoluiz@yahoo.com.br', '156.959.598-45', '(21) 21977800_', '25/02/1967', 'Rua Augusta, 1611', '29-08-22 03:12:20', 'semestral', 50, 'debito', 654321, 54231, NULL, NULL),
(20, 'Maria Silva', 'mariasilva@gmail.com', '619.167.428-74', '(11) 932165495', '12/08/1954', 'Rua General Jardim, 32', '29-08-22 03:08:34', 'bimestral', 150, 'debito', 123456, 123456, NULL, NULL),
(22, 'Maria Lucia', 'marialucia@gmail.com', '604.674.198-09', '(21) 21977800_', '25/02/1967', 'Avenida Paulista, 2064', '29-08-22 03:18:54', 'anual', 100, 'credito', NULL, NULL, 'ello', '147852******1253'),
(23, 'Marco Antonio', 'marcoantonio@outlook.com', '841.620.588-49', '(11) 35265412_', '13/12/1948', 'Avenida Roque Petroni Júnior, 1089', '29-08-22 03:24:55', 'bimestral', 90, 'credito', NULL, NULL, 'master', '578468******3562'),
(24, 'Paulo Augusto', 'pauloaugusto@yahoo.com.br', '812.991.168-09', '(21) 34612461_', '16/09/1948', 'Av. Dr Ruth Cardoso, 4777', '29-08-22 03:26:45', 'semestral', 45, 'debito', 16895, 7845, NULL, NULL),
(25, 'Jurema dos Santos', 'juremadossantos@gmail.com', '690.834.738-99', '(15) 34856781_', '28/08/1973', 'R. Itacaiúna, 61', '29-08-22 03:30:05', 'unico', 90, 'credito', NULL, NULL, 'visa', '348564******3165'),
(26, 'Rodrigo Marcelo', 'rodrigomarcelo@gmail.com', '639.937.358-11', '(45) 34573568_', '15/09/1973', 'R. Olimpíadas, 360', '29-08-22 03:33:40', 'bimestral', 120, 'credito', NULL, NULL, 'master', '784589******5623'),
(27, 'Hélio Almeida', 'helioalmeida@uol.com.br', '169.738.158-80', '(12) 937842976', '01/06/1910', 'Av. Benedito Andrade, 71', '29-08-22 03:38:21', 'bimestral', 75, 'debito', 87456, 24951, NULL, NULL),
(28, 'Fabricio Rodrigues', 'fabriciorodrigues@bol.com', '236.876.248-54', '(21) 34872648_', '08/03/1943', 'Av. Juscelino Kubitschek,2041', '29-08-22 03:41:30', 'semestral', 64, 'debito', 172659, 34524, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
