-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 02-Ago-2020 às 19:10
-- Versão do servidor: 10.3.23-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `edertton_amj_audiomotivacional`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `assunto`
--

CREATE TABLE `assunto` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  `slug` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `assunto`
--

INSERT INTO `assunto` (`id`, `titulo`, `descricao`, `slug`) VALUES
(24, 'Câncer', '', 'cancer'),
(21, 'Empreendedorismo', '', 'empreendedorismo'),
(22, 'Pense', '', 'pense'),
(30, 'dadad', '', 'dadad'),
(29, 'sonho', '', 'sonho'),
(20, 'Cura', '', 'cura'),
(19, 'Auto Ajuda', '', 'auto-ajuda'),
(25, 'Trabalho', '', 'trabalho'),
(27, 'Ajuda', '', 'ajuda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `audio`
--

CREATE TABLE `audio` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `data` date NOT NULL,
  `texto` varchar(5000) NOT NULL,
  `url` varchar(300) NOT NULL,
  `slug` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `audio`
--

INSERT INTO `audio` (`id`, `titulo`, `data`, `texto`, `url`, `slug`) VALUES
(4, 'SAINt JHN - Roses (Imanbek Remix)', '2020-04-02', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus.</p>\r\n\r\n<p>0Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus.</p>', 'https://soundcloud.com/saintjhn/saint-jhn-roses-imanbek-remix', 'saint-jhn---roses--imanbek-remix-1'),
(1, 'Alface com talo', '2020-04-03', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus.</p>', 'https://soundcloud.com/pinhoco/pinhocast-02-porque-eu-falo-sobre-o-minimalismo', 'alface-com-talo-1'),
(3, 'Use a merda como adubo!', '2020-04-01', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus.</p>', 'https://soundcloud.com/pinhoco/pinhocast-02-porque-eu-falo-sobre-o-minimalismo', 'use-a-merda-como-adubo-1'),
(5, 'Qual é o seu sonho?', '2020-04-07', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus.</p>\r\n\r\n<p>0Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus.</p>', 'https://soundcloud.com/saintjhn/saint-jhn-roses-imanbek-remix', 'qual-e-o-seu-sonho-1'),
(6, 'Já existe a resposta!', '2020-04-06', '', 'https://soundcloud.com/saintjhn/saint-jhn-roses-imanbek-remix', 'ja-existe-a-resposta-1'),
(2, 'Pense mais! ', '2020-04-04', '', 'https://soundcloud.com/saintjhn/saint-jhn-roses-imanbek-remix', 'pense-mais--1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `audio_assunto`
--

CREATE TABLE `audio_assunto` (
  `id` int(11) NOT NULL,
  `audio` int(11) NOT NULL,
  `assunto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `audio_assunto`
--

INSERT INTO `audio_assunto` (`id`, `audio`, `assunto`) VALUES
(11, 4, 22),
(10, 4, 19),
(21, 5, 25),
(20, 5, 29),
(15, 6, 22),
(14, 2, 22),
(13, 2, 19),
(12, 1, 20),
(9, 3, 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `id` int(11) NOT NULL,
  `assunto` varchar(300) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `data` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `solicitacoes`
--

INSERT INTO `solicitacoes` (`id`, `assunto`, `nome`, `telefone`, `email`, `data`, `status`) VALUES
(1, 'ser curado', 'Ederton Cirino Lima', '14981225949', 'edertton@gmail.com', '2020-06-01', 1),
(2, 'câncer alimentação', 'Paulo Roberto', '14981564586', 'pauloroberto@gmail.com', '2020-06-02', 0),
(8, 'audios gerais', 'Jéssica Souza', '(14) 9812-6', 'jessica@gmail.com', '2020-06-20', 1),
(6, 'trabalho, empreendedorismo', 'Felipe', '14984564562', 'felipe@gmail.com', '2020-06-20', 1),
(5, 'Corpo e mente sã', 'Priscila Mendes', '14985632458', 'priscila@gmail.com', '2020-06-03', 0),
(7, 'oratória', 'Renata Maria', '(14) 9564-8', 'renata@gmail.com', '2020-06-20', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `nome`) VALUES
(1, 'doaltivo@gmail.com', 'doaltivo2020', 'Altivo Martins Junior'),
(2, 'edertton@gmail.com', '123', 'Ederton Lima');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `assunto`
--
ALTER TABLE `assunto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `audio_assunto`
--
ALTER TABLE `audio_assunto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assunto`
--
ALTER TABLE `assunto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `audio_assunto`
--
ALTER TABLE `audio_assunto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
