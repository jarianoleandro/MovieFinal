-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jun-2021 às 22:50
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancoteste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `codigo` smallint(6) NOT NULL,
  `nome` varchar(5000) NOT NULL,
  `descricao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codigo`, `nome`, `descricao`) VALUES
(33, 'é um filme com humor ou que pretende provocar o riso', 'Comédia '),
(34, 'adsfdghjklkjhaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'animação'),
(35, 'Uma comédia cinematográfica é um filme com humor ou que pretende provocar o riso da audiência. Junto com o drama, é um dos mais importantes gêneros de cinema', 'comedia ');

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codigo` smallint(6) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `admina` boolean not null default 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `nome`, `cpf`,  `senha`) VALUES
(37, 'Leandro', '02956514018', '89794b621a313bb59eed0d9f0f4e8205'),
(38, 'Leandro Antu', '02956578985', '89794b621a313bb59eed0d9f0f4e8205');



--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `codfilme` smallint(6) NOT NULL,
  `titulo` varchar(5000) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `data_lancamento` Date NOT NULL,
  `categoria` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `codigo` smallint(6) NOT NULL,
  `nome` varchar(5000) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `quantidade` varchar(500) NOT NULL,
  `codfilme` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--



--
-- Índices para tabelas despejadas
--
--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_filmeProd` (`codfilme`);

--
-- Índices para tabela `produto`
--

ALTER TABLE `filmes`
  ADD PRIMARY KEY (`codfilme`),
  ADD KEY `fk_filmeCat` (`categoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--
--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `codigo` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `codfilme` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `codigo` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

--
-- AUTO_INCREMENT de tabela `produto`
--

INSERT INTO `filmes` (`codfilme`, `titulo`, `descricao`, `data_lancamento`, `categoria`) VALUES
(75, 'filme', 'ancora', '10-09-2021', 33),
(76, 'filme 1', 'vela', '10-09-2021', 34),
(78, 'filme 2', 'drone', '10-09-2021', 35);

INSERT INTO `produto` (`codigo`, `nome`, `descricao`, `quantidade`, `codfilme`) VALUES
(53, 'lond', 'blusa', '10', 75),
(54, 'marie', 'copo', '12', 76),
(55, 'jonik', 'livro', '14', 78);

ALTER TABLE `produto`
  ADD CONSTRAINT `fk_filmeProd` FOREIGN KEY (`codfilme`) REFERENCES `filmes` (`codfilme`);
COMMIT;

--
-- AUTO_INCREMENT de tabela `filmes`
--

ALTER TABLE `filmes` 
  ADD CONSTRAINT `fk_filmeCat` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


