-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Fev-2023 às 00:57
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ponto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_ponto`
--

CREATE TABLE `adm_ponto` (
  `id_adm_ponto` int(11) NOT NULL,
  `users_adm_ponto` varchar(30) NOT NULL,
  `pass_adm_ponto` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `adm_ponto`
--

INSERT INTO `adm_ponto` (`id_adm_ponto`, `users_adm_ponto`, `pass_adm_ponto`) VALUES
(1, 'pedro', '1020'),
(2, 'enzo', '1020');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto`
--

CREATE TABLE `ponto` (
  `id_ponto` int(11) NOT NULL,
  `users_ponto` varchar(30) NOT NULL,
  `data_hora_ponto` timestamp NOT NULL DEFAULT current_timestamp(),
  `register_ponto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `ponto`
--

INSERT INTO `ponto` (`id_ponto`, `users_ponto`, `data_hora_ponto`, `register_ponto`) VALUES
(1, 'pedro', '2023-02-05 23:24:46', 'entrada'),
(2, 'enzo', '2023-02-05 23:47:39', 'entrada');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm_ponto`
--
ALTER TABLE `adm_ponto`
  ADD PRIMARY KEY (`id_adm_ponto`),
  ADD KEY `users_adm_ponto` (`users_adm_ponto`);

--
-- Índices para tabela `ponto`
--
ALTER TABLE `ponto`
  ADD PRIMARY KEY (`id_ponto`),
  ADD KEY `users_ponto` (`users_ponto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm_ponto`
--
ALTER TABLE `adm_ponto`
  MODIFY `id_adm_ponto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ponto`
--
ALTER TABLE `ponto`
  MODIFY `id_ponto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `ponto`
--
ALTER TABLE `ponto`
  ADD CONSTRAINT `ponto_ibfk_1` FOREIGN KEY (`users_ponto`) REFERENCES `adm_ponto` (`users_adm_ponto`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
