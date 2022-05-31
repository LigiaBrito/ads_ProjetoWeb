-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Maio-2022 às 16:51
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `restaurante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

CREATE TABLE `cardapio` (
  `idPrato` int(11) NOT NULL,
  `tipo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `descricao` varchar(50) CHARACTER SET utf8 NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cardapio`
--

INSERT INTO `cardapio` (`idPrato`, `tipo`, `nome`, `descricao`, `preco`) VALUES
(2, 'doce', 'sorvete', 'gelado', 10),
(4, 'salgado', 'pizza', 'pizza de frango', 20),
(9, 'bebida', 'suco', 'suco de laranja', 5),
(11, 'prato principal', 'PF', 'prato com arroz, feijão e carne', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `desconto` float NOT NULL,
  `valor` float NOT NULL,
  `observacoes` text CHARACTER SET utf8 NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`idPedido`, `desconto`, `valor`, `observacoes`, `idUsuario`) VALUES
(1, 15, 50, 'quero meu sorvete quente', 1),
(2, 5, 10, 'quero meu arroz gelado', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_cardapio`
--

CREATE TABLE `pedido_cardapio` (
  `idPedido` int(11) NOT NULL,
  `idCardapio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido_cardapio`
--

INSERT INTO `pedido_cardapio` (`idPedido`, `idCardapio`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `nivel`) VALUES
(1, 'admin', 0),
(2, 'caixa', 1),
(3, 'gerente', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`idPrato`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices para tabela `pedido_cardapio`
--
ALTER TABLE `pedido_cardapio`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idCardapio` (`idCardapio`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cardapio`
--
ALTER TABLE `cardapio`
  MODIFY `idPrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `pedido_cardapio`
--
ALTER TABLE `pedido_cardapio`
  ADD CONSTRAINT `pedido_cardapio_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedido_cardapio_ibfk_2` FOREIGN KEY (`idCardapio`) REFERENCES `cardapio` (`idPrato`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
