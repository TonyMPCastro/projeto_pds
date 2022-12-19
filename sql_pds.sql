-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Dez-2022 às 05:27
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `edukar_gestao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dividas`
--

CREATE TABLE `dividas` (
  `id` int(11) NOT NULL,
  `valor` double NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_gasto` date NOT NULL,
  `data_hora_cri` datetime NOT NULL,
  `data_hora_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `dividas`
--

INSERT INTO `dividas` (`id`, `valor`, `descricao`, `data_gasto`, `data_hora_cri`, `data_hora_at`, `user_id`) VALUES
(1, 500, 'Produtos de Pele\r\n', '2022-12-30', '2022-12-15 19:44:01', '2022-12-15 19:44:01', 2),
(2, 200, 'Cera Depiladora', '2022-12-29', '2022-12-15 19:47:42', '2022-12-15 19:47:42', 1),
(3, 430, 'Energia', '2022-12-20', '2022-12-15 19:49:40', '2022-12-15 19:49:40', 2),
(4, 32, 'Conta de Água\r\n', '2022-12-20', '2022-12-15 19:51:12', '2022-12-15 19:51:12', 3),
(11, 10, 'AGUA MINERAL', '2022-12-13', '2022-12-18 04:09:45', '2022-12-18 04:09:58', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `taxa` double NOT NULL,
  `tipo_taxa` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `forma_pagamento`
--

INSERT INTO `forma_pagamento` (`id`, `nome`, `taxa`, `tipo_taxa`, `status`) VALUES
(1, 'PIX', 3, 1, 1),
(2, 'CARTÃO DE CREDITO', 5.2, 2, 1),
(3, 'CARTÃO DE DEBITO', 4.5, 2, 1),
(4, 'DINHEIRO', 0, 1, 1),
(5, '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `semana_id` int(11) NOT NULL,
  `horario` time NOT NULL,
  `data_hora_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`id`, `semana_id`, `horario`, `data_hora_at`, `status`) VALUES
(1, 1, '09:00:00', '2022-12-13 23:24:11', 1),
(2, 2, '09:00:00', '2022-12-13 23:24:11', 1),
(3, 3, '09:00:00', '2022-12-13 23:24:11', 1),
(4, 4, '09:00:00', '2022-12-13 23:24:11', 1),
(5, 5, '09:00:00', '2022-12-13 23:24:11', 1),
(6, 2, '10:00:00', '2022-12-18 23:27:42', 1),
(7, 2, '14:00:00', '2022-12-18 23:27:42', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcacao_servico`
--

CREATE TABLE `marcacao_servico` (
  `id` int(11) NOT NULL,
  `servicos` text COLLATE utf8_unicode_ci NOT NULL,
  `forma_pagamento_id` int(11) NOT NULL,
  `horarios_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `horario_agendado` datetime DEFAULT NULL,
  `data_hora_at` datetime NOT NULL,
  `data_hora_cri` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `marcacao_servico`
--

INSERT INTO `marcacao_servico` (`id`, `servicos`, `forma_pagamento_id`, `horarios_id`, `user_id`, `horario_agendado`, `data_hora_at`, `data_hora_cri`, `status`) VALUES
(1, '1;2', 1, 1, 3, NULL, '2022-12-13 23:31:38', '2022-12-13 23:31:38', 1),
(2, '1;2;3', 1, 2, 2, '2022-12-06 15:30:00', '2022-12-13 23:57:24', '2022-12-12 23:57:24', 3),
(3, '1', 2, 2, 6, '2022-12-20 10:30:25', '2022-12-15 20:46:25', '2022-12-15 20:46:25', 2),
(4, ';1;1;3', 5, 4, 2, NULL, '2022-12-19 00:53:33', '2022-12-30 16:51:17', 1),
(5, '2;3', 4, 2, 9, '2022-12-20 14:30:00', '2022-12-20 16:53:07', '2022-12-20 16:53:07', 2),
(6, '2', 1, 2, 7, '2022-12-19 12:30:25', '2022-12-28 20:46:25', '2022-12-28 20:46:25', 2),
(9, '2;2;3', 5, 6, 2, NULL, '2022-12-19 01:20:19', '2022-12-19 00:55:38', 1),
(10, '1;1;3', 5, 5, 2, '2022-12-28 10:00:43', '2022-12-19 01:21:52', '2022-12-19 01:21:52', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_item`
--

CREATE TABLE `menu_item` (
  `id_menu_item` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `menu_item` varchar(45) DEFAULT NULL,
  `tipo_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `menu_item`
--

INSERT INTO `menu_item` (`id_menu_item`, `nome`, `icon`, `url`, `menu_item`, `tipo_user_id`) VALUES
(1, 'HOME ADM', 'mdi mdi-home', 'home/onShow', 'HOME', 1),
(2, 'HOME ALUNO', 'mdi mdi-home', 'home2/index', 'HOME', 2),
(3, 'Pendentes', 'mdi mdi-calendar', 'cliente/index', 'Pendentes', 1),
(4, 'Serviços', 'mdi mdi-settings', 'servico_adm/index', 'Serviços', 1),
(5, 'Users', 'mdi mdi-table-large', 'adm_user/index', 'Users', 1),
(7, 'Dividas ', 'mdi mdi-square-inc-cash', 'financeiro/dividas', 'Dividas', 1),
(8, 'Forma Pagamentos', 'mdi mdi-tag-text-outline', 'financeiro/formaPagamento', 'Forma Pagamentos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `semana`
--

CREATE TABLE `semana` (
  `id` int(11) NOT NULL,
  `dia` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `semana`
--

INSERT INTO `semana` (`id`, `dia`) VALUES
(1, 'Segunda-feira'),
(2, 'Terça-feira'),
(3, 'Quarta-feira'),
(4, 'Quinta-feira'),
(5, 'Sexta-feira'),
(6, 'Sábado'),
(7, 'Domingo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `nome`, `valor`, `status`) VALUES
(1, 'Limpeza de pele', 110, 1),
(2, 'Preenchimento Labial', 200, 1),
(3, 'Drenagem Linfática', 400, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_user`
--

CREATE TABLE `tipo_user` (
  `id_tipo` int(11) NOT NULL,
  `nome_tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_user`
--

INSERT INTO `tipo_user` (`id_tipo`, `nome_tipo`) VALUES
(1, 'ADM'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `tipo_user_id` int(11) NOT NULL,
  `nome_user` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `grau_formacao` varchar(45) DEFAULT NULL,
  `formacao_instituicao` varchar(45) DEFAULT NULL,
  `status_user` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `tipo_user_id`, `nome_user`, `email`, `senha`, `telefone`, `data_nascimento`, `cpf`, `grau_formacao`, `formacao_instituicao`, `status_user`) VALUES
(1, 1, 'ANTONIO CASTRO', 'antonio@edukar.com', 'e10adc3949ba59abbe56e057f20f883e', '98989670143', '1988-08-15', '020.142.805-17', 'Ensino Superior', 'Universidade Paulista', 2),
(2, 2, 'Gestrude das Flores', 'gesflores@edukar.com', 'e10adc3949ba59abbe56e057f20f883e', '98988203742', '1980-05-10', '081.232.401-21', 'Ensino Superior', 'Universidade São Luís', 2),
(3, 2, 'Franscico Raimundo', 'Fraraimundos@edukar.com', '202cb962ac59075b964b07152d234b70', '98989670143', '1988-08-15', '020.142.805-17', 'Ensino Superior', 'Universidade Paulista', 2),
(4, 2, 'Janaina Almeida', 'Janalmeida@edukar.com', '202cb962ac59075b964b07152d234b70', '98988250575', '1999-04-01', '053.124.879-37', 'Ensino Médio', 'Colegio Educacional', 2),
(6, 2, 'Maria Eduarda Espindola', 'duda.gatinha@hotmail.com', '123456', '98982042651', '2002-05-04', '61489368924', NULL, NULL, 1),
(7, 2, 'Vitoria Lima Bandeira', 'segue.alider@hotmail.com', '123456', '98987770038', '2000-04-01', '62354898602', NULL, NULL, 1),
(8, 2, 'Jeffersn de Carvalho', 'audacioso69@hotmail.com', '123456', '9884622017', '1995-05-24', '69856342856', NULL, NULL, 1),
(9, 2, 'Kylian Mbapé ', 'pipoqueiro02@gmail.com', '123456', '98991563408', '1998-12-20', '02305608902', NULL, NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `dividas`
--
ALTER TABLE `dividas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dividas_1` (`user_id`);

--
-- Índices para tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_horarios_1` (`semana_id`);

--
-- Índices para tabela `marcacao_servico`
--
ALTER TABLE `marcacao_servico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_marcacao_servico_1` (`forma_pagamento_id`),
  ADD KEY `fk_marcacao_servico_2` (`horarios_id`),
  ADD KEY `fk_marcacao_servico_3` (`user_id`);

--
-- Índices para tabela `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id_menu_item`),
  ADD KEY `fk_menu_item_tipo_user1_idx` (`tipo_user_id`);

--
-- Índices para tabela `semana`
--
ALTER TABLE `semana`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_tipo_user1_idx` (`tipo_user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dividas`
--
ALTER TABLE `dividas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `marcacao_servico`
--
ALTER TABLE `marcacao_servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `id_menu_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `semana`
--
ALTER TABLE `semana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tipo_user`
--
ALTER TABLE `tipo_user`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `dividas`
--
ALTER TABLE `dividas`
  ADD CONSTRAINT `fk_dividas_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Limitadores para a tabela `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `fk_horarios_1` FOREIGN KEY (`semana_id`) REFERENCES `semana` (`id`);

--
-- Limitadores para a tabela `marcacao_servico`
--
ALTER TABLE `marcacao_servico`
  ADD CONSTRAINT `fk_marcacao_servico_1` FOREIGN KEY (`forma_pagamento_id`) REFERENCES `forma_pagamento` (`id`),
  ADD CONSTRAINT `fk_marcacao_servico_2` FOREIGN KEY (`horarios_id`) REFERENCES `horarios` (`id`),
  ADD CONSTRAINT `fk_marcacao_servico_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Limitadores para a tabela `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `fk_menu_item_tipo_user1` FOREIGN KEY (`tipo_user_id`) REFERENCES `tipo_user` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_tipo_user1` FOREIGN KEY (`tipo_user_id`) REFERENCES `tipo_user` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
