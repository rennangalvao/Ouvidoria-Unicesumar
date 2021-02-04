-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2018 at 12:06 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ouvidoria`
--

-- --------------------------------------------------------

--
-- Table structure for table `ouvidoria`
--

CREATE TABLE `ouvidoria` (
  `protocolo` varchar(50) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `rg` varchar(14) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cep` varchar(100) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `telefone_ddd` varchar(2) DEFAULT NULL,
  `telefone_numero` varchar(12) DEFAULT NULL,
  `celular_ddd` varchar(2) DEFAULT NULL,
  `celular_numero` varchar(12) DEFAULT NULL,
  `mensagem` text NOT NULL,
  `resposta` text,
  `dataResposta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ouvidoria`
--

INSERT INTO `ouvidoria` (`protocolo`, `nome`, `cpf`, `rg`, `email`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `pais`, `telefone_ddd`, `telefone_numero`, `celular_ddd`, `celular_numero`, `mensagem`, `resposta`, `dataResposta`) VALUES
('ABC123456', 'Eduardo Bona', '123.123.123-12', '1.123.123-0', 'ead@eduardobona.com.br', '11.111-11', 'Avenida Brasil', '1234', 'Bloco 1 Ap 234', 'Vila Umdois TrêsQuatro', 'Maringá', 'PR', 'BR', '11', '3111-4321', '11', '99912-3456', 'Mensagem Enviada para conhecer melhor os projetos para a Avenida Brasil.', 'Mensagem Enviada para conhecer melhor os projetos para a Avenida Brasil.', '2018-07-10'),
('ABC654321', 'Eduardo Bona', '111.111.111-11', '1.123.123-0', 'ead@eduardobona.com.br', '12.121.122-11', 'Logradouro', '12', NULL, 'Centro', 'Londrina', 'PR', 'Brasil', '43', '3030-3030', '43', '98877-1234', 'Mensagem enviada que ainda estará sem resposta.', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ouvidoria`
--
ALTER TABLE `ouvidoria`
  ADD PRIMARY KEY (`protocolo`);

