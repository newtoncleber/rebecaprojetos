-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Nov-2022 às 22:31
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rebeca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(20) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`) VALUES
(1, 'BRASKEM'),
(2, 'BASF');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id`, `descricao`) VALUES
(1, 'Masculino'),
(2, 'Feminino'),
(3, 'Não Binário'),
(4, 'Fluido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

CREATE TABLE `localizacao` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `localizacao`
--

INSERT INTO `localizacao` (`id`, `nome`, `id_empresa`) VALUES
(1, 'BA1', 1),
(2, 'SP1', 2),
(3, 'RJ', 1),
(4, 'RS', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id` bigint(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `id_localizacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id`, `titulo`, `imagem`, `link`, `id_localizacao`) VALUES
(1, 'Projeto A', 'https://www.handtalk.me/br/wp-content/uploads/sites/8/2018/11/capa-blog-2.png', 'http://127.0.0.1/rebeca/projetoa', 1),
(2, 'Projeto B', 'https://artia.com/wp-content/uploads/2017/08/como-manter-um-projeto-dentro-do-prazo.png', 'http://127.0.0.1/rebeca/projetob', 2),
(3, 'Projeto C', 'https://kingengenharia.com.br/sites/default/files/imagens-produto/im.-dest.-projeto.jpg', 'http://127.0.0.1/rebeca/projetoc', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `id_genero`) VALUES
(1, 'Newton Cleber Carvalho', 'newton', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Rebeca Nery', 'rebeca', 'e10adc3949ba59abbe56e057f20f883e', 2),
(3, 'Priscila Fernandes', 'priscila', 'e10adc3949ba59abbe56e057f20f883e', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_localizacao`
--

CREATE TABLE `users_localizacao` (
  `id` bigint(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_localizacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users_localizacao`
--

INSERT INTO `users_localizacao` (`id`, `id_user`, `id_localizacao`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 1, 1),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_projetos`
--

CREATE TABLE `users_projetos` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_projeto` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users_projetos`
--

INSERT INTO `users_projetos` (`id`, `id_user`, `id_projeto`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 3, 1),
(4, 3, 2),
(5, 3, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `localizacao`
--
ALTER TABLE `localizacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users_localizacao`
--
ALTER TABLE `users_localizacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users_projetos`
--
ALTER TABLE `users_projetos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `localizacao`
--
ALTER TABLE `localizacao`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users_localizacao`
--
ALTER TABLE `users_localizacao`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users_projetos`
--
ALTER TABLE `users_projetos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
