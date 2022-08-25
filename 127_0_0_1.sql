-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Maio-2022 às 02:34
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_biblioteca`
--
CREATE DATABASE IF NOT EXISTS `bd_biblioteca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_biblioteca`;
--
-- Banco de dados: `db_biblioteca`
--
CREATE DATABASE IF NOT EXISTS `db_biblioteca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_biblioteca`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_area`
--

CREATE TABLE `tb_area` (
  `codArea` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_area`
--

INSERT INTO `tb_area` (`codArea`, `nome`) VALUES
(1, 'Informática'),
(2, 'Contabilidade'),
(3, 'Economia'),
(4, 'Gestão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_autor`
--

CREATE TABLE `tb_autor` (
  `codAutor` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `nacionalidade` varchar(200) DEFAULT NULL,
  `areaFormacao` varchar(200) DEFAULT NULL,
  `cargo` varchar(200) DEFAULT NULL,
  `genero` enum('M') DEFAULT NULL,
  `dataNasc` date DEFAULT NULL,
  `dataRegisto` datetime DEFAULT NULL,
  `dataAlteracao` datetime DEFAULT NULL,
  `dataRemocao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_autor`
--

INSERT INTO `tb_autor` (`codAutor`, `nome`, `nacionalidade`, `areaFormacao`, `cargo`, `genero`, `dataNasc`, `dataRegisto`, `dataAlteracao`, `dataRemocao`) VALUES
(1, 'Napoleon Hill', 'Americana', 'Psicologia', 'Escritor', 'M', '1967-09-12', '2022-05-07 14:21:31', NULL, '2022-05-07 14:21:31'),
(2, 'Lucas Pazito', 'Angolana', 'Engenharia Informática', 'Professor', 'M', '1985-08-24', '2022-05-07 16:08:55', NULL, '2022-05-16 03:28:41'),
(3, 'José Alberto', 'Angolana', 'Psicologia', 'Psicólogo', 'M', '1984-08-12', '2022-05-16 03:24:04', NULL, '2022-05-16 03:29:49'),
(4, 'Arnaldo Quixe', 'Brasil', 'Informática', 'Analista de Requisitos', 'M', '1999-09-27', '2022-05-16 02:33:28', '2022-05-23 18:38:01', '2022-05-16 02:33:28'),
(6, 'Cabral Nunes', 'Angolana', 'Ciências', 'Escritor', 'M', '1954-03-12', '2022-05-21 13:24:52', '2022-05-23 18:39:40', '2022-05-23 06:42:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_carrinho`
--

CREATE TABLE `tb_carrinho` (
  `idUsuario` int(11) NOT NULL,
  `idExemplar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `codCategoria` int(11) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_categoria`
--

INSERT INTO `tb_categoria` (`codCategoria`, `descricao`) VALUES
(1, 'Livro'),
(2, 'Revista'),
(3, 'Artigo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_editora`
--

CREATE TABLE `tb_editora` (
  `codEditora` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefone` varchar(200) DEFAULT NULL,
  `dataRegisto` datetime DEFAULT NULL,
  `dataAlteracao` datetime DEFAULT NULL,
  `dataRemocao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_editora`
--

INSERT INTO `tb_editora` (`codEditora`, `nome`, `pais`, `cidade`, `email`, `telefone`, `dataRegisto`, `dataAlteracao`, `dataRemocao`) VALUES
(1, 'Pancada', 'Angola', 'Luanda', 'pancadatec2019@gmail.com', '946636594', '2022-05-07 14:43:07', NULL, NULL),
(2, 'Pancada', 'Angola', 'Luanda', 'pancadatec2019@gmail.com', '946636594', '2022-05-07 14:43:52', NULL, NULL),
(3, 'Cabral Nunes', 'Angola', 'Luanda', 'joaoamaral@gmail.com', '92312345', '2022-05-16 02:56:36', NULL, NULL),
(4, 'João Amaral', 'Angola', 'Luanda', 'joaoamaral@gmail.com', '1371797', '2022-05-16 02:58:16', NULL, '2022-05-16 02:58:16'),
(5, 'Pancada', 'Angola', 'Luanda', 'pancadatec2019@gmail.com', '923213618', '2022-05-21 13:42:40', NULL, '2022-05-21 13:42:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_emprestimo`
--

CREATE TABLE `tb_emprestimo` (
  `codEmprestimo` int(11) NOT NULL,
  `dataEmprestimo` date DEFAULT NULL,
  `dataDevolucao` date DEFAULT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `idReserva` int(11) DEFAULT NULL,
  `dataRegisto` datetime DEFAULT NULL,
  `dataAlteracao` datetime DEFAULT NULL,
  `dataRemocao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_exemplar`
--

CREATE TABLE `tb_exemplar` (
  `codExemplar` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `deposito` varchar(200) DEFAULT NULL,
  `anoPub` date DEFAULT NULL,
  `isbn` varchar(200) DEFAULT NULL,
  `localPub` varchar(200) DEFAULT NULL,
  `edicao` int(11) DEFAULT NULL,
  `medida` decimal(10,0) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `idEditora` int(11) DEFAULT NULL,
  `area` varchar(200) DEFAULT NULL,
  `dataRegisto` datetime DEFAULT NULL,
  `dataAlteracao` datetime DEFAULT NULL,
  `dataRemocao` datetime DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_exemplar`
--

INSERT INTO `tb_exemplar` (`codExemplar`, `titulo`, `deposito`, `anoPub`, `isbn`, `localPub`, `edicao`, `medida`, `idCategoria`, `idEditora`, `area`, `dataRegisto`, `dataAlteracao`, `dataRemocao`, `foto`) VALUES
(8, 'Programação em C', '13dwe', '0000-00-00', '12341', 'Luanda, Angola', 1, '20', 1, 4, 'Informática', '2022-05-21 06:51:25', NULL, '2022-05-21 06:51:25', '52bc94c2b2d4010364a0a1feaa686ed1.jpg'),
(9, 'C#', '13dwe', '0000-00-00', '#1234', 'Luanda', 1, '12', 2, 4, 'Economia', '2022-05-21 06:52:16', NULL, '2022-05-21 06:52:16', 'bd6552524aa3d5165d93fc52c0a8b8ed.jpg'),
(10, 'Contabilidade Geral', 'bb12', '0000-00-00', '#1234', 'Luanda, Angola', 1, '2012', 1, 4, 'Contabilidade', '2022-05-21 06:08:24', NULL, '2022-05-21 06:08:24', 'picture2.png'),
(11, 'Quem Pensa Enriquece', 'legal', '2020-03-12', '12345', 'EUA', 1, '20', 1, 4, 'Economia', '2022-05-21 15:49:27', '2022-05-25 02:49:56', '2022-05-21 15:49:27', 'b14725c3364c4b9c1e588590dc76e951.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_exemplar_autor`
--

CREATE TABLE `tb_exemplar_autor` (
  `idAutor` int(11) DEFAULT NULL,
  `idExemplar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_exemplar_autor`
--

INSERT INTO `tb_exemplar_autor` (`idAutor`, `idExemplar`) VALUES
(1, 8),
(1, 9),
(4, 9),
(4, 10),
(1, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_exemplar_reserva`
--

CREATE TABLE `tb_exemplar_reserva` (
  `idReserva` int(11) DEFAULT NULL,
  `idExemplar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nivel`
--

CREATE TABLE `tb_nivel` (
  `codNivel` int(11) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_nivel`
--

INSERT INTO `tb_nivel` (`codNivel`, `descricao`) VALUES
(1, 'Admin'),
(2, 'Bibliotecário'),
(3, 'Professor'),
(4, 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_reserva`
--

CREATE TABLE `tb_reserva` (
  `codReserva` int(11) NOT NULL,
  `dataReserva` date DEFAULT NULL,
  `comprovativo` text DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `dataRegisto` datetime DEFAULT NULL,
  `dataAlteracao` datetime DEFAULT NULL,
  `dataRemocao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `codUsuario` int(11) primary key auto_increment,
  `nome` varchar(200) DEFAULT NULL,
  `bi` varchar(200) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `dataNasc` date DEFAULT NULL,
  `telefone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `municipio` varchar(200) DEFAULT NULL,
  `distrito` varchar(200) DEFAULT NULL,
  `bairro` varchar(200) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `numUsuario` varchar(200) DEFAULT NULL,
  `idNivel` int(11) DEFAULT NULL,
  `dataRegisto` datetime DEFAULT NULL,
  `dataAlteracao` datetime DEFAULT NULL,
  `dataRemocao` datetime DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`nome`, `bi`, `genero`, `dataNasc`, `telefone`, `email`, `municipio`, `distrito`, `bairro`, `senha`, `quantidade`, `numUsuario`, `idNivel`, `dataRegisto`, `dataAlteracao`, `dataRemocao`, `foto`) VALUES
('Inês Garcia', 'LD1234567LA89', 'F', '1996-10-20', '937543215', 'ines.garcia@gmail.com', 'Belas', 'Futungo', 'Bla', '12345', NULL, '187652', 1, '2022-05-23 17:34:29', NULL, '2022-05-23 17:34:29', '0bbd794b87ca5304bfd747c2e4a329bb.jpg'),
('Gilberto Catimba', 'LD154212415609', 'M', '2002-04-16', '936213412', 'gilbertocatimba@gmail.com', 'Viana', 'Estalagem', 'Grafanil', '#1234', NULL, '184321', 4, '2022-05-23 16:34:22', NULL, '2022-05-23 16:34:22', 'picture2.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_area`
--
ALTER TABLE `tb_area`
  ADD PRIMARY KEY (`codArea`);

--
-- Índices para tabela `tb_autor`
--
ALTER TABLE `tb_autor`
  ADD PRIMARY KEY (`codAutor`);

--
-- Índices para tabela `tb_carrinho`
--
ALTER TABLE `tb_carrinho`
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idExemplar` (`idExemplar`);

--
-- Índices para tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`codCategoria`);

--
-- Índices para tabela `tb_editora`
--
ALTER TABLE `tb_editora`
  ADD PRIMARY KEY (`codEditora`);

--
-- Índices para tabela `tb_emprestimo`
--
ALTER TABLE `tb_emprestimo`
  ADD PRIMARY KEY (`codEmprestimo`),
  ADD KEY `idReserva` (`idReserva`);

--
-- Índices para tabela `tb_exemplar`
--
ALTER TABLE `tb_exemplar`
  ADD PRIMARY KEY (`codExemplar`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idEditora` (`idEditora`);

--
-- Índices para tabela `tb_exemplar_autor`
--
ALTER TABLE `tb_exemplar_autor`
  ADD KEY `idAutor` (`idAutor`),
  ADD KEY `idExemplar` (`idExemplar`);

--
-- Índices para tabela `tb_exemplar_reserva`
--
ALTER TABLE `tb_exemplar_reserva`
  ADD KEY `idReserva` (`idReserva`),
  ADD KEY `idExemplar` (`idExemplar`);

--
-- Índices para tabela `tb_nivel`
--
ALTER TABLE `tb_nivel`
  ADD PRIMARY KEY (`codNivel`);

--
-- Índices para tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD PRIMARY KEY (`codReserva`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`codUsuario`),
  ADD KEY `idNivel` (`idNivel`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_area`
--
ALTER TABLE `tb_area`
  MODIFY `codArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_autor`
--
ALTER TABLE `tb_autor`
  MODIFY `codAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `codCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_editora`
--
ALTER TABLE `tb_editora`
  MODIFY `codEditora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_emprestimo`
--
ALTER TABLE `tb_emprestimo`
  MODIFY `codEmprestimo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_exemplar`
--
ALTER TABLE `tb_exemplar`
  MODIFY `codExemplar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_nivel`
--
ALTER TABLE `tb_nivel`
  MODIFY `codNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  MODIFY `codReserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_carrinho`
--
ALTER TABLE `tb_carrinho`
  ADD CONSTRAINT `tb_carrinho_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`codUsuario`),
  ADD CONSTRAINT `tb_carrinho_ibfk_2` FOREIGN KEY (`idExemplar`) REFERENCES `tb_exemplar` (`codExemplar`);

--
-- Limitadores para a tabela `tb_emprestimo`
--
ALTER TABLE `tb_emprestimo`
  ADD CONSTRAINT `tb_emprestimo_ibfk_1` FOREIGN KEY (`idReserva`) REFERENCES `tb_reserva` (`codReserva`);

--
-- Limitadores para a tabela `tb_exemplar`
--
ALTER TABLE `tb_exemplar`
  ADD CONSTRAINT `tb_exemplar_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `tb_categoria` (`codCategoria`),
  ADD CONSTRAINT `tb_exemplar_ibfk_2` FOREIGN KEY (`idEditora`) REFERENCES `tb_editora` (`codEditora`);

--
-- Limitadores para a tabela `tb_exemplar_autor`
--
ALTER TABLE `tb_exemplar_autor`
  ADD CONSTRAINT `tb_exemplar_autor_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `tb_autor` (`codAutor`),
  ADD CONSTRAINT `tb_exemplar_autor_ibfk_2` FOREIGN KEY (`idExemplar`) REFERENCES `tb_exemplar` (`codExemplar`);

--
-- Limitadores para a tabela `tb_exemplar_reserva`
--
ALTER TABLE `tb_exemplar_reserva`
  ADD CONSTRAINT `tb_exemplar_reserva_ibfk_1` FOREIGN KEY (`idReserva`) REFERENCES `tb_reserva` (`codReserva`),
  ADD CONSTRAINT `tb_exemplar_reserva_ibfk_2` FOREIGN KEY (`idExemplar`) REFERENCES `tb_exemplar` (`codExemplar`);

--
-- Limitadores para a tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD CONSTRAINT `tb_reserva_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`codUsuario`);

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`idNivel`) REFERENCES `tb_nivel` (`codNivel`);
--
-- Banco de dados: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Extraindo dados da tabela `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'table', 'BibliotecaBD', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"allrows\":\"1\",\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@TABLE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"estructura da tabela @TABLE@\",\"latex_structure_continued_caption\":\"estructura da tabela @TABLE@ (continuação)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Conteúdo da tabela @TABLE@\",\"latex_data_continued_caption\":\"Conteúdo da tabela @TABLE@ (continuação)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}'),
(2, 'root', 'server', 'db_biblioteca', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"bd_biblioteca\",\"db_biblioteca\",\"phpmyadmin\",\"sg\",\"test\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"estructura da tabela @TABLE@\",\"latex_structure_continued_caption\":\"estructura da tabela @TABLE@ (continuação)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Conteúdo da tabela @TABLE@\",\"latex_data_continued_caption\":\"Conteúdo da tabela @TABLE@ (continuação)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

--
-- Extraindo dados da tabela `pma__navigationhiding`
--

INSERT INTO `pma__navigationhiding` (`username`, `item_name`, `item_type`, `db_name`, `table_name`) VALUES
('root', 'tb_nivel', 'table', 'db_biblioteca', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Extraindo dados da tabela `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"db_biblioteca\",\"table\":\"tb_exemplar\"},{\"db\":\"db_biblioteca\",\"table\":\"tb_usuario\"},{\"db\":\"db_biblioteca\",\"table\":\"tb_nivel\"},{\"db\":\"db_biblioteca\",\"table\":\"tb_reserva\"},{\"db\":\"db_biblioteca\",\"table\":\"tb_autor\"},{\"db\":\"db_biblioteca\",\"table\":\"tb_exemplar_autor\"},{\"db\":\"sg\",\"table\":\"site_contactos\"},{\"db\":\"sg\",\"table\":\"fornecedores\"}]');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Extraindo dados da tabela `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-05-25 00:32:41', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"pt\"}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Índices para tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Índices para tabela `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Índices para tabela `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Índices para tabela `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Índices para tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Índices para tabela `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Índices para tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Índices para tabela `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Índices para tabela `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Índices para tabela `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Índices para tabela `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Índices para tabela `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Índices para tabela `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Banco de dados: `sg`
--
CREATE DATABASE IF NOT EXISTS `sg` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sg`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filiais`
--

CREATE TABLE `filiais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `site`, `uf`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fornecedor ABC', 'fornecedorabc.com.ao', 'a', 'fornecedorabc@gmail.com', '2022-04-29 04:49:25', '2022-04-29 04:49:25', NULL),
(3, 'Fornecedor X', 'fornecedorx.co.ao', 'X', 'fornecedorx@gmail.com', '2022-05-01 22:32:27', '2022-05-03 20:43:03', NULL),
(4, 'Fornecedor 100', 'Fornecedor100.co.ao', 'S', 'Fornecedor100@gmail.com', '2022-05-03 20:49:35', '2022-05-03 20:49:35', NULL),
(5, 'Fornecedor 200', 'Fornecedor200.co.ao', 'D', 'Fornecedor200@gmail.com', '2022-05-03 20:53:11', '2022-05-03 20:53:11', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2022_04_04_121112_create_site_contactos_table', 1),
(18, '2022_04_08_194251_create_fornecedores_table', 1),
(19, '2022_04_21_180309_create_unidades_table', 1),
(20, '2022_04_29_050504_create_produtos_table', 1),
(21, '2022_04_29_050810_create_produto_detalhes_table', 1),
(22, '2022_04_29_051014_create_filiais_table', 1),
(23, '2022_04_29_051140_create_produtos_filiais_table', 1),
(24, '2022_04_29_052740_alter_fornecedores_nova_coluna_com_after', 1),
(26, '2022_05_03_220002_adicionar_soft_delete_no_fornecedor', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` int(11) NOT NULL,
  `unidade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_filiais`
--

CREATE TABLE `produtos_filiais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` bigint(20) UNSIGNED NOT NULL,
  `produto_id` bigint(20) UNSIGNED NOT NULL,
  `preco_venda` decimal(8,2) NOT NULL DEFAULT 0.01,
  `stoque_minimo` int(11) NOT NULL,
  `stoque_maximo` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_detalhes`
--

CREATE TABLE `produto_detalhes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comprimento` double(8,2) NOT NULL,
  `largura` double(8,2) NOT NULL,
  `altura` double(8,2) NOT NULL,
  `produto_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_contactos`
--

CREATE TABLE `site_contactos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivo` int(11) NOT NULL,
  `mensagem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `site_contactos`
--

INSERT INTO `site_contactos` (`id`, `nome`, `telefone`, `email`, `motivo`, `mensagem`, `created_at`, `updated_at`) VALUES
(1, 'Arnaldo', '946636594', 'acarnaldocatimba@gmail.com', 1, 'Olá gostaria de mais detalhes sobre...', '2022-04-29 04:18:53', '2022-04-29 04:18:53'),
(2, 'Joana Lumbi', '944112343', 'joana2000l@gmail.com', 1, 'Estou com dúvida', '2022-05-03 21:05:21', '2022-05-03 21:05:21'),
(3, 'Ford Parker', '(888) 734-1066', 'alexandra80@stiedemann.com', 3, 'Amet laudantium voluptates ipsum. Mollitia eaque molestias id ut molestias delectus nam nesciunt. Consequatur soluta asperiores numquam suscipit voluptatibus.', '2022-05-06 13:08:40', '2022-05-06 13:08:40'),
(4, 'Lenora Barton', '1-800-822-5876', 'kulas.dimitri@gmail.com', 1, 'Quos enim praesentium recusandae atque et quis vitae. Aperiam asperiores maiores dolorem rerum nisi neque. Est debitis eveniet ea provident dolorem quam.', '2022-05-06 13:08:41', '2022-05-06 13:08:41'),
(5, 'Julius Bosco', '1-877-389-8917', 'lfunk@quitzon.biz', 2, 'Cum minima magnam laudantium quos delectus assumenda. Voluptate dolorem eum totam. Voluptate aliquam harum accusantium autem.', '2022-05-06 13:08:41', '2022-05-06 13:08:41'),
(6, 'Stone Daniel', '(888) 460-3948', 'alva.zemlak@williamson.com', 3, 'Tempora sequi quaerat in explicabo aut. Maxime est et omnis non dolores hic. Qui assumenda distinctio quia aut.', '2022-05-06 13:08:41', '2022-05-06 13:08:41'),
(7, 'Mrs. Shanelle Berge', '1-844-209-3220', 'lhamill@streich.biz', 3, 'Ut magnam et distinctio tempore quod non et. Quibusdam et placeat rem tempore assumenda debitis non. Et quidem voluptas amet nam et.', '2022-05-06 13:08:42', '2022-05-06 13:08:42'),
(8, 'Ms. Heath Mosciski Sr.', '(877) 379-2780', 'sohara@tremblay.biz', 3, 'At cupiditate fugiat quo amet. Voluptatem ducimus velit totam consequatur impedit minus.', '2022-05-06 13:08:43', '2022-05-06 13:08:43'),
(9, 'Aimee Bernhard PhD', '844-370-8048', 'wiegand.telly@mayert.com', 3, 'Consectetur ut velit velit sint. Repellendus sed fugit inventore.', '2022-05-06 13:08:44', '2022-05-06 13:08:44'),
(10, 'Eleonore Hills III', '866.435.6962', 'flatley.mabelle@reichel.com', 3, 'Eveniet ut numquam suscipit saepe. Est aut voluptate temporibus eaque nemo rerum. Soluta nulla placeat non consectetur. Fuga eum exercitationem molestiae et voluptatem delectus culpa ut.', '2022-05-06 13:08:45', '2022-05-06 13:08:45'),
(11, 'Delta Walker', '1-888-520-7003', 'kale.runolfsdottir@huel.com', 3, 'Repellat laboriosam est magnam neque sunt est quae illo. In fugiat dolores unde. Quidem pariatur est eos facilis odit eveniet est. Iste minima modi repellendus dolorem qui ut.', '2022-05-06 13:08:45', '2022-05-06 13:08:45'),
(12, 'Lorena Emmerich', '(888) 739-7305', 'ritchie.clementina@bednar.org', 2, 'Maxime sint vel dolor harum. Est repellendus consequatur sed consectetur quis. Molestiae nulla in maxime unde placeat. Magni vero voluptas tempore officiis.', '2022-05-06 13:08:45', '2022-05-06 13:08:45'),
(13, 'Estell Zieme', '(866) 895-5969', 'trantow.eda@hotmail.com', 1, 'Voluptas at est eligendi qui quam. Dolore beatae earum itaque rerum. Perferendis ut incidunt est. Iusto voluptas expedita ratione vel ut dolorem repellat.', '2022-05-06 13:08:45', '2022-05-06 13:08:45'),
(14, 'Evangeline Herzog', '1-888-921-9131', 'dietrich.nya@davis.com', 2, 'Fugit doloribus in rerum consequatur reiciendis ea aut. Dolorem omnis architecto officia est optio ut. Occaecati quaerat omnis fugiat sit voluptatibus quos nesciunt vel.', '2022-05-06 13:08:45', '2022-05-06 13:08:45'),
(15, 'Jasper Miller MD', '1-855-526-6566', 'franco.hahn@flatley.biz', 3, 'Iure ab est vitae possimus repellendus repellat cumque. Beatae quaerat eaque ut velit molestiae unde. Molestiae maxime dolor quos autem et voluptatem omnis. Labore enim rem voluptatem ut quia.', '2022-05-06 13:08:45', '2022-05-06 13:08:45'),
(16, 'Tad Crona', '(888) 517-3619', 'lkiehn@yahoo.com', 2, 'Est in est consequuntur quia sequi aut architecto sed. Sit officiis aperiam incidunt eum qui error assumenda. Aut est nam nihil a nisi dolorem.', '2022-05-06 13:08:46', '2022-05-06 13:08:46'),
(17, 'Mr. Mustafa Graham Jr.', '800-843-6971', 'kimberly46@hotmail.com', 3, 'Saepe est assumenda dicta consequatur incidunt omnis voluptatibus. Enim nihil omnis qui veniam voluptas rerum. Iusto saepe aut eaque. Sint eum enim ut voluptatibus.', '2022-05-06 13:08:46', '2022-05-06 13:08:46'),
(18, 'Nola O\'Keefe', '844.714.8214', 'ricardo.schimmel@hotmail.com', 3, 'Sapiente et eligendi blanditiis non. Aut repellat repudiandae quia in quam rerum quo esse. Expedita ut aliquam omnis quia atque explicabo. Enim totam inventore quis quia placeat.', '2022-05-06 13:08:47', '2022-05-06 13:08:47'),
(19, 'Magnus Lang', '855.762.2638', 'gthiel@schaden.com', 2, 'Nulla cum non porro officiis. Repellat et consectetur alias omnis possimus sunt. A necessitatibus tempore dolore nulla et. Sed voluptatem aut autem sit atque totam.', '2022-05-06 13:08:47', '2022-05-06 13:08:47'),
(20, 'Ms. Hassie Schneider DVM', '1-888-665-7936', 'satterfield.lera@gmail.com', 1, 'Quod et eum placeat ipsum quia. Eius dicta nostrum molestiae fugiat.', '2022-05-06 13:08:47', '2022-05-06 13:08:47'),
(21, 'Matt Klocko', '1-888-986-9110', 'pdare@hotmail.com', 1, 'Molestiae rem blanditiis ullam doloremque nobis exercitationem. Enim odit consequatur nihil et qui. Ea perferendis dicta veritatis odit. Excepturi minima dolorem distinctio.', '2022-05-06 13:08:47', '2022-05-06 13:08:47'),
(22, 'Ms. Sunny Paucek III', '(888) 766-7928', 'mills.orlando@yahoo.com', 2, 'Dolor praesentium maxime facere beatae qui. Quia rem consectetur porro et saepe. Id explicabo laudantium et perspiciatis dolores non. Quia velit laborum atque inventore nemo.', '2022-05-06 13:08:48', '2022-05-06 13:08:48'),
(23, 'Stefanie Heidenreich', '(866) 806-4056', 'mckenna.donnelly@yahoo.com', 3, 'Totam assumenda architecto neque est ut ut. Nostrum totam aut nulla quia quam. Quo laboriosam debitis est rerum non labore enim eos.', '2022-05-06 13:08:49', '2022-05-06 13:08:49'),
(24, 'Lora Rice', '844.826.9025', 'deanna09@hotmail.com', 3, 'Beatae voluptas excepturi illum impedit quia rerum. Repudiandae sequi debitis dolore quam nihil qui. Explicabo corporis ipsam libero autem. Nisi nobis ut voluptas ut.', '2022-05-06 13:08:49', '2022-05-06 13:08:49'),
(25, 'Prof. Abigale Mills PhD', '844.346.1855', 'pfeffer.dallin@dubuque.org', 1, 'Sit quasi reiciendis qui deleniti nam. Maiores dicta veritatis cumque esse maxime. Et ut sed officiis tempora qui qui velit. Sit dolores quis harum quisquam.', '2022-05-06 13:08:50', '2022-05-06 13:08:50'),
(26, 'Adrianna Monahan', '800.720.2308', 'alesch@yahoo.com', 2, 'Veniam ut impedit sed fugiat repellendus. Natus fugiat molestiae et non corporis voluptas suscipit. Est ut quae ullam nemo natus alias.', '2022-05-06 13:08:51', '2022-05-06 13:08:51'),
(27, 'Hubert Rippin', '(844) 974-0709', 'ollie.murazik@yahoo.com', 2, 'Consequatur omnis cumque id quae qui modi omnis inventore. Quia et amet modi deserunt aut illum perferendis id. Qui eum iusto laborum quo sint rerum. Est corporis aut dolores.', '2022-05-06 13:08:52', '2022-05-06 13:08:52'),
(28, 'Mr. Patrick Grimes II', '1-800-862-4851', 'noelia.blanda@hotmail.com', 1, 'Fugit consequatur illum qui eligendi mollitia nisi impedit. Voluptatum rerum ducimus aut molestiae sint possimus. Et inventore ex quia vero voluptatem voluptas officia.', '2022-05-06 13:08:52', '2022-05-06 13:08:52'),
(29, 'Mr. Johnathon Walsh', '800-353-2097', 'bahringer.dell@yahoo.com', 2, 'Modi culpa omnis vel consequatur aspernatur eos voluptatem. Voluptatem nihil qui beatae in sapiente dolor officiis. Earum voluptatem in eos sed nostrum minus.', '2022-05-06 13:08:53', '2022-05-06 13:08:53'),
(30, 'Margarete Mayert', '1-855-210-7815', 'wolf.ethelyn@hotmail.com', 1, 'Necessitatibus ut placeat magni omnis quis. Deleniti quis harum ullam. Dolore aliquid perferendis vitae sed. Qui hic quibusdam dignissimos corporis qui sequi.', '2022-05-06 13:08:53', '2022-05-06 13:08:53'),
(31, 'Stefan Collins', '844.663.6544', 'queenie.doyle@hotmail.com', 2, 'Nulla numquam exercitationem soluta ipsam dolorum. In adipisci veritatis soluta voluptatem perspiciatis harum. Illo dolorum officia dolores pariatur quia quis.', '2022-05-06 13:08:53', '2022-05-06 13:08:53'),
(32, 'Prof. Camryn Pouros Jr.', '(844) 957-4586', 'hnikolaus@stark.com', 3, 'Dolor in sed unde praesentium voluptatum quos. Est dignissimos et qui temporibus illum. Repudiandae sunt earum aperiam.', '2022-05-06 13:08:53', '2022-05-06 13:08:53'),
(33, 'Albin Douglas', '1-866-543-5080', 'destin.bergnaum@ondricka.com', 3, 'Est quibusdam debitis autem est omnis. Dolore eaque ad accusantium impedit iure sint. Voluptatem molestiae cum quasi eos qui aspernatur nulla.', '2022-05-06 13:08:53', '2022-05-06 13:08:53'),
(34, 'Ms. Virgie Bernier II', '1-855-621-2234', 'jakubowski.lula@yahoo.com', 3, 'Quidem cupiditate libero non aut sed quia officiis. Quaerat ratione at aspernatur consequatur mollitia id et. Natus id quisquam qui dolorem.', '2022-05-06 13:08:54', '2022-05-06 13:08:54'),
(35, 'Dr. Emmie Renner II', '1-888-962-4770', 'lemmerich@bergnaum.com', 3, 'Blanditiis ut suscipit est quia temporibus est non. Impedit at similique quaerat et molestiae. Dolorum qui cumque pariatur dolor ipsa totam sed. Dolores fugit repellendus iste repellat.', '2022-05-06 13:08:54', '2022-05-06 13:08:54'),
(36, 'Stefanie Wilkinson', '1-866-432-5394', 'ted.runte@robel.net', 2, 'Ipsam doloremque magni quas vel veniam. Eveniet iste eaque aut accusamus porro dolorem. Suscipit ipsa sed distinctio. Autem cupiditate hic deserunt consectetur nam.', '2022-05-06 13:08:54', '2022-05-06 13:08:54'),
(37, 'Prof. Kirk Gottlieb III', '844.402.7436', 'fortiz@gmail.com', 2, 'Voluptates error magnam sint eos odit. Placeat velit et autem hic eveniet aut aut. Facilis tempora eligendi quia quisquam.', '2022-05-06 13:08:55', '2022-05-06 13:08:55'),
(38, 'Lula Bradtke', '(888) 242-1604', 'prince.wintheiser@medhurst.net', 3, 'Praesentium sint vitae dignissimos voluptatibus. Vitae eum et consequatur optio illo. Nostrum aut distinctio tenetur eum vitae veritatis.', '2022-05-06 13:08:55', '2022-05-06 13:08:55'),
(39, 'Ms. Velda Labadie', '877-799-7881', 'xschamberger@kuhlman.com', 1, 'Dolorem quis ab ut dolor. Ut quas nihil fuga. Ut in perspiciatis eligendi. Magni cupiditate minus facere distinctio error et aut.', '2022-05-06 13:08:55', '2022-05-06 13:08:55'),
(40, 'Johnathon Franecki', '888-265-4242', 'shany24@hotmail.com', 2, 'Quia beatae enim sunt iste. Facere explicabo debitis qui et vel illo. Et voluptate in minima dolor est est.', '2022-05-06 13:08:55', '2022-05-06 13:08:55'),
(41, 'Darby Koss', '844.392.9061', 'kertzmann.dixie@lesch.com', 2, 'Ratione soluta voluptatem quas vitae dolorem ut voluptates. Molestias rem aut et velit minus. Recusandae ipsam ea odio adipisci. Repellat quam hic iusto eaque.', '2022-05-06 13:08:55', '2022-05-06 13:08:55'),
(42, 'Dr. Damian Pfannerstill', '1-855-990-0993', 'sylvan.gleichner@gmail.com', 2, 'Porro culpa tenetur quod optio. Quis voluptatem et voluptatem quae. Dolor fuga id molestiae qui velit in voluptatem. Explicabo sit placeat aut explicabo sed libero tenetur est.', '2022-05-06 13:08:55', '2022-05-06 13:08:55'),
(43, 'Shirley VonRueden', '1-800-289-4653', 'tara29@gmail.com', 2, 'Quis sunt ipsa nulla id ad ut voluptatem. Minima amet corporis quia velit fugiat doloribus quia nam.', '2022-05-06 13:08:55', '2022-05-06 13:08:55'),
(44, 'Dr. Deontae Ratke IV', '1-855-354-0890', 'maxwell.zemlak@zieme.com', 3, 'Minus nihil qui vel repellat enim. Quae consequatur sed animi vitae animi. Reprehenderit aut ut eum blanditiis et et et.', '2022-05-06 13:08:56', '2022-05-06 13:08:56'),
(45, 'Alia Rice', '888.681.1316', 'sadie98@gmail.com', 3, 'Non dolorum laborum quo voluptates perferendis. Amet id consequatur consequatur occaecati. Alias eum eum voluptatem molestias quia sit non. Cumque facere voluptatibus et earum consequatur.', '2022-05-06 13:08:56', '2022-05-06 13:08:56'),
(46, 'Charlie Hansen', '888-615-1945', 'jpollich@hahn.com', 3, 'Error quaerat magni quidem ut animi nisi. Qui quis dolores dicta vitae. Facere aut laborum alias est animi.', '2022-05-06 13:08:56', '2022-05-06 13:08:56'),
(47, 'Dr. Jennings Deckow', '(800) 847-6266', 'schuster.wayne@stracke.net', 3, 'Molestiae repudiandae quidem ut quisquam. Recusandae accusamus voluptatem eos esse. Alias aut quod maxime non assumenda.', '2022-05-06 13:08:57', '2022-05-06 13:08:57'),
(48, 'Franco Koelpin', '800-272-6986', 'alfreda.cassin@franecki.org', 3, 'Eum perspiciatis voluptas repellendus repellendus et explicabo quia. Vitae exercitationem repudiandae amet cupiditate temporibus.', '2022-05-06 13:08:57', '2022-05-06 13:08:57'),
(49, 'Laurianne Powlowski', '888.855.2517', 'schneider.retha@hotmail.com', 2, 'Iure quia magnam iure ipsam doloremque. Accusantium quas qui ducimus exercitationem velit. Neque suscipit repellendus est sapiente laboriosam ut doloremque. Soluta ut aspernatur vel omnis magni odit.', '2022-05-06 13:08:58', '2022-05-06 13:08:58'),
(50, 'Kira Pfeffer IV', '1-888-960-1261', 'alberto83@gmail.com', 2, 'Ut quis qui earum sed maiores omnis. Animi sunt tenetur sunt et quidem repellendus. Sed ut necessitatibus ut ut ratione qui culpa laudantium.', '2022-05-06 13:08:58', '2022-05-06 13:08:58'),
(51, 'Prof. Clemens Mraz', '1-844-516-6061', 'schmitt.christophe@yahoo.com', 1, 'Reiciendis quis debitis quo nisi qui. Id tempore inventore consequatur optio est. Illum optio molestias temporibus. Quisquam dignissimos quia quia dolorum.', '2022-05-06 13:08:59', '2022-05-06 13:08:59'),
(52, 'Madge Jast', '800.760.9092', 'haylie.parisian@rutherford.com', 1, 'Consequatur voluptas amet nisi officiis quos. Maxime distinctio aspernatur quae velit voluptatem vitae. Voluptates nulla cumque esse quia accusantium tempore quisquam.', '2022-05-06 13:08:59', '2022-05-06 13:08:59'),
(53, 'Adrienne Gibson', '877-344-2834', 'considine.mollie@rohan.info', 2, 'Sed ea nisi similique illo quo aut eum ad. Nemo quia ratione necessitatibus nihil omnis nesciunt. Iste et doloremque quia aspernatur aperiam.', '2022-05-06 13:08:59', '2022-05-06 13:08:59'),
(54, 'Maudie Ledner', '844-488-2215', 'shyanne.leuschke@gmail.com', 1, 'Necessitatibus eos dolorum beatae voluptas occaecati. Saepe et voluptatem corporis quam illo maiores. Enim voluptatem suscipit totam est fugiat enim.', '2022-05-06 13:08:59', '2022-05-06 13:08:59'),
(55, 'Delta Koepp', '1-844-214-6337', 'adam.kuhlman@kassulke.com', 3, 'Cum accusamus distinctio eligendi laudantium qui laudantium. Ipsum vel tempore qui minima eos. Vitae quas perspiciatis voluptatem ut ab distinctio consequatur.', '2022-05-06 13:08:59', '2022-05-06 13:08:59'),
(56, 'London Cremin', '855-850-7032', 'wava04@pfannerstill.com', 1, 'Ut qui voluptas saepe ipsam et cumque. Quod vero nulla pariatur et accusamus saepe officia. Et atque exercitationem est aliquid numquam quisquam voluptas architecto. Deleniti rem ducimus quia amet.', '2022-05-06 13:08:59', '2022-05-06 13:08:59'),
(57, 'Katrina Mohr', '866.202.7199', 'mueller.odell@gmail.com', 2, 'Autem qui eum qui. Dolores perferendis suscipit rem quisquam fugit et. Ex quae illum autem accusamus ab sequi labore.', '2022-05-06 13:09:00', '2022-05-06 13:09:00'),
(58, 'Godfrey McDermott', '844.227.5967', 'yost.blanca@gmail.com', 2, 'Quaerat quis pariatur sed magnam. Dolor voluptatibus et nesciunt quae inventore non. Consectetur recusandae eos facere voluptates sed molestias ducimus natus. Impedit vel doloremque recusandae et.', '2022-05-06 13:09:00', '2022-05-06 13:09:00'),
(59, 'Hannah Nikolaus', '1-855-262-2551', 'legros.skye@pagac.com', 2, 'Quo aspernatur iste dolores non ut. Doloribus enim maxime corporis quia. Dolorum rerum sit blanditiis ex exercitationem. Ut consectetur illum ea autem.', '2022-05-06 13:09:01', '2022-05-06 13:09:01'),
(60, 'Prof. Clay Kovacek', '866.610.0967', 'windler.victoria@hotmail.com', 2, 'Molestias in neque explicabo provident. Mollitia odit architecto debitis et est neque aut id. Consequatur voluptate quia excepturi aut sint officia.', '2022-05-06 13:09:02', '2022-05-06 13:09:02'),
(61, 'Josianne Beier', '877.317.2236', 'effertz.kattie@bailey.com', 1, 'Molestias totam repudiandae nobis rerum. Temporibus ut dolorum et a. Voluptatem fugiat voluptatibus omnis rem.', '2022-05-06 13:09:03', '2022-05-06 13:09:03'),
(62, 'Norwood Veum', '(888) 791-1857', 'buck.barton@gmail.com', 2, 'Officiis dolor earum qui consequatur explicabo aut. Perferendis quis magni explicabo ut et. Non doloribus amet qui ea quae rem pariatur. Unde molestiae aut quod amet laudantium consequuntur.', '2022-05-06 13:09:05', '2022-05-06 13:09:05'),
(63, 'Ebba Williamson III', '800.425.9694', 'oryan@gmail.com', 1, 'Dolore voluptas aliquam quo eum blanditiis nostrum accusamus. Qui ducimus dignissimos quia quo. Non nam vel soluta tenetur ut.', '2022-05-06 13:09:05', '2022-05-06 13:09:05'),
(64, 'Mrs. Karli Dooley II', '855-438-1611', 'murray.schmeler@tillman.com', 1, 'Ipsam laboriosam eos dolores doloremque voluptas velit sit id. Esse voluptatibus ipsa inventore iste.', '2022-05-06 13:09:06', '2022-05-06 13:09:06'),
(65, 'Hulda Toy', '(855) 814-0388', 'jabshire@yahoo.com', 3, 'Incidunt numquam id porro ipsam voluptate. Eos voluptatum impedit et dolore eaque non debitis. Eum totam tempora deleniti quia vitae optio tempore.', '2022-05-06 13:09:07', '2022-05-06 13:09:07'),
(66, 'Elvis Schamberger IV', '1-866-929-2992', 'gcronin@kulas.net', 3, 'Laudantium deleniti veritatis quam rerum mollitia qui repellat. Et ad necessitatibus illum placeat dolor adipisci modi. Et tempore veniam possimus dicta. Autem nulla doloremque rerum est non.', '2022-05-06 13:09:08', '2022-05-06 13:09:08'),
(67, 'Delaney Shanahan DDS', '(800) 545-2325', 'adrienne37@hills.com', 1, 'Fugit autem id qui eligendi facilis qui. Porro ad fuga dolores et est error. Libero tempora quo consequatur. Et et et id error.', '2022-05-06 13:09:09', '2022-05-06 13:09:09'),
(68, 'Dr. Bradford Feeney', '800-881-4964', 'keara.hartmann@yahoo.com', 1, 'Odit est sed consequatur. Nesciunt fugit voluptas sunt. Blanditiis harum officiis est corrupti tempora. Quo facere vero quia odio recusandae et consequatur. Est soluta laborum cum ut quibusdam.', '2022-05-06 13:09:09', '2022-05-06 13:09:09'),
(69, 'Lupe Runte', '(800) 659-9056', 'frogahn@gmail.com', 2, 'Ut alias omnis quos eligendi reiciendis nisi quisquam. Nihil asperiores aliquam suscipit eum assumenda voluptas eum. Blanditiis dignissimos eum qui est in iusto. Et quaerat ducimus sit nobis sequi.', '2022-05-06 13:09:10', '2022-05-06 13:09:10'),
(70, 'Verona Spinka', '877-208-8149', 'shanel.gislason@daniel.com', 3, 'Voluptatum ex nemo sint consequuntur consequuntur unde et. Similique magni dignissimos explicabo asperiores. Quibusdam nihil minima molestias sequi.', '2022-05-06 13:09:11', '2022-05-06 13:09:11'),
(71, 'Katelyn Huel', '(866) 900-7859', 'omitchell@hotmail.com', 1, 'Aut enim voluptates repellat. Sint sint in neque doloribus non.', '2022-05-06 13:09:11', '2022-05-06 13:09:11'),
(72, 'Arianna Hartmann', '877.718.2171', 'josiah.jakubowski@larson.biz', 2, 'Ducimus tempore provident vel ea. Velit fugiat dolorem possimus pariatur veniam. Culpa dolor perferendis praesentium esse debitis aut.', '2022-05-06 13:09:12', '2022-05-06 13:09:12'),
(73, 'Valerie Schaefer', '1-877-275-2510', 'chase62@gmail.com', 3, 'Modi sapiente nihil totam quia nobis id. Excepturi repellat reiciendis nulla ut est rerum et. Enim provident et velit optio et dicta. Nesciunt voluptatibus explicabo quod incidunt.', '2022-05-06 13:09:12', '2022-05-06 13:09:12'),
(74, 'Dr. Tre Wisoky', '(866) 286-6173', 'dayana.gutmann@yahoo.com', 2, 'Nostrum similique iure non libero nostrum. Rem eos explicabo aut modi. Eos temporibus impedit reiciendis et aut quos. Sint dicta consequatur quam.', '2022-05-06 13:09:12', '2022-05-06 13:09:12'),
(75, 'Everett Goyette', '855.663.1900', 'lauren.fahey@gmail.com', 1, 'Culpa necessitatibus cum quisquam qui. Quae et sed cumque. Maiores totam impedit a dolorum aut harum. Asperiores vero error dolores nam itaque sit expedita.', '2022-05-06 13:09:12', '2022-05-06 13:09:12'),
(76, 'Colin Reinger', '855.612.7155', 'russel.janiya@hotmail.com', 2, 'Debitis ipsa maxime sunt iure voluptatum quod non. Earum architecto possimus sint laboriosam deleniti sint sed. Neque vel natus voluptatum amet et molestiae.', '2022-05-06 13:09:12', '2022-05-06 13:09:12'),
(77, 'Kiley Emmerich', '1-800-349-6101', 'orval25@gmail.com', 1, 'Est quam in cumque quia rerum sed. Et dolore corporis harum sit beatae. Laudantium autem iure cupiditate eveniet.', '2022-05-06 13:09:12', '2022-05-06 13:09:12'),
(78, 'Pete Hahn', '(866) 525-2701', 'deckow.saul@kuhn.com', 1, 'Nostrum reiciendis enim voluptatem ut eveniet molestiae. Iste ipsa labore itaque excepturi alias ut. Earum enim voluptas fugit enim et ipsa.', '2022-05-06 13:09:13', '2022-05-06 13:09:13'),
(79, 'Chauncey Monahan III', '(844) 468-9802', 'dgerlach@hotmail.com', 1, 'Non unde ad minima in possimus ea saepe. Commodi provident cumque voluptate beatae ut. Unde sit et non numquam dolorem vel ut.', '2022-05-06 13:09:13', '2022-05-06 13:09:13'),
(80, 'Katlyn Green', '1-800-718-4725', 'yframi@lemke.org', 2, 'Earum voluptatem voluptas repellat sint. In ut sint sapiente non error nesciunt omnis. Ut sit dolor dolorum praesentium nihil laborum eveniet.', '2022-05-06 13:09:13', '2022-05-06 13:09:13'),
(81, 'Emilio Stroman', '888.714.9313', 'vita.lind@ward.org', 3, 'Doloribus ipsum rerum dolores dolorum commodi. Voluptatem facere est nostrum ea omnis. Dolorum sunt perspiciatis numquam impedit et voluptates dolorum minima.', '2022-05-06 13:09:13', '2022-05-06 13:09:13'),
(82, 'Amara O\'Connell', '866-398-5009', 'hettinger.anna@hotmail.com', 3, 'Dolores id fugiat qui id. Iste optio saepe aut officia. Et ducimus et aspernatur praesentium. In aut culpa et ullam nobis quae ipsum maiores. Officia nobis totam ut ab libero quibusdam molestias aut.', '2022-05-06 13:09:13', '2022-05-06 13:09:13'),
(83, 'Jason Wiegand', '(866) 418-9693', 'bennie97@dibbert.com', 1, 'Tempora fugit ipsa est possimus veritatis vel. Tempora repudiandae rerum qui incidunt unde. Ex quam ipsam laudantium ea provident sed. Ut quas reprehenderit aliquid aut consectetur.', '2022-05-06 13:09:14', '2022-05-06 13:09:14'),
(84, 'Joaquin O\'Kon', '1-800-887-4915', 'rolando16@yahoo.com', 1, 'Quis molestiae modi autem at cupiditate rerum explicabo. Quae qui totam et quam odio eius debitis. Expedita quo animi perferendis nesciunt dolores ratione. Nihil architecto quas doloremque.', '2022-05-06 13:09:16', '2022-05-06 13:09:16'),
(85, 'Yasmine Kassulke', '800-203-9679', 'rubie.jast@yahoo.com', 1, 'Minus et dolorem est adipisci aut. Laboriosam est aut nesciunt aliquam rerum. Cupiditate exercitationem voluptatum enim laborum rerum veritatis eos. Exercitationem corporis eos et neque.', '2022-05-06 13:09:17', '2022-05-06 13:09:17'),
(86, 'Dr. Omari Keebler III', '877-713-8038', 'cleveland.wiza@kuhlman.info', 2, 'Accusantium rerum accusamus ut consequatur. Voluptate et suscipit ad. Velit tempore esse voluptas consequatur a. Veniam quos quo id accusamus blanditiis itaque necessitatibus quia.', '2022-05-06 13:09:17', '2022-05-06 13:09:17'),
(87, 'Toby Prohaska', '844.740.7394', 'zoila.murray@dach.com', 3, 'Id ducimus itaque ut blanditiis molestiae rerum. Ut totam unde excepturi velit. Illum enim nihil qui sit tenetur sit. Est harum non illum nam eveniet et doloremque. Nemo officia est aut.', '2022-05-06 13:09:17', '2022-05-06 13:09:17'),
(88, 'Mrs. Ruth Zulauf DDS', '855.724.3108', 'cristal.hettinger@hotmail.com', 2, 'Et tempore optio at nihil. Et harum dolor tempora praesentium quia ut. Nam facilis in magni aut. Quibusdam assumenda esse omnis culpa voluptate aut beatae quia.', '2022-05-06 13:09:17', '2022-05-06 13:09:17'),
(89, 'Jimmie Kohler DVM', '1-877-635-7633', 'pouros.harmon@witting.biz', 1, 'Quis suscipit ut sit et eveniet praesentium. Voluptatem inventore temporibus expedita ab eius. Perspiciatis et esse perferendis debitis pariatur et nulla. Aperiam ea commodi fugiat ab enim.', '2022-05-06 13:09:18', '2022-05-06 13:09:18'),
(90, 'Wilfred Cormier I', '877-643-9937', 'lemuel.rath@yahoo.com', 2, 'Placeat nihil ipsum et ducimus amet eaque. Sed dolorem ut perspiciatis dolores nostrum voluptas eum. Enim similique ut ut molestiae non qui natus mollitia.', '2022-05-06 13:09:20', '2022-05-06 13:09:20'),
(91, 'Allie Hickle', '(800) 257-4283', 'yjakubowski@bartoletti.com', 3, 'Vel modi ut sapiente delectus totam reprehenderit. Dolorem in laudantium iusto officia soluta sed eos cumque. Placeat molestiae odio sint.', '2022-05-06 13:09:20', '2022-05-06 13:09:20'),
(92, 'Ressie Wolf', '888-335-6362', 'jackson29@yahoo.com', 2, 'Tempore dolorem reiciendis distinctio. Consequuntur sit quisquam facilis. Vel tempora a impedit. Laborum maiores voluptatem rerum voluptatum suscipit sed suscipit odit.', '2022-05-06 13:09:22', '2022-05-06 13:09:22'),
(93, 'Mrs. Margaretta Nikolaus I', '1-866-772-0586', 'broberts@stamm.com', 1, 'Nihil porro voluptate totam tempore ex est aliquid. Vel non aperiam repudiandae nulla voluptatum. Suscipit dolorem modi est.', '2022-05-06 13:09:22', '2022-05-06 13:09:22'),
(94, 'Miss Nola Emmerich Jr.', '844-823-6955', 'carolanne30@yahoo.com', 1, 'Autem quae debitis deleniti rerum. Voluptatum dignissimos et eaque aspernatur esse. Odit enim sapiente necessitatibus sunt officiis.', '2022-05-06 13:09:23', '2022-05-06 13:09:23'),
(95, 'Julianne Donnelly', '(877) 650-6375', 'gbernhard@hotmail.com', 1, 'Dolore culpa aliquid quibusdam dolorum laborum nesciunt est. Veritatis omnis quia eum vero rerum. Et eaque ut tempore ea aut consequatur.', '2022-05-06 13:09:23', '2022-05-06 13:09:23'),
(96, 'Marlon Kuhn', '1-855-241-0359', 'adolf25@yahoo.com', 2, 'Veniam voluptate eius sit. Et iusto similique ipsa. Ad harum impedit quidem. Non incidunt qui commodi deserunt hic illo voluptatem. Numquam vitae eum natus.', '2022-05-06 13:09:23', '2022-05-06 13:09:23'),
(97, 'Gregorio McKenzie IV', '(855) 829-3120', 'adaline.schinner@beer.net', 1, 'Doloribus non eveniet nisi. Ut incidunt qui unde aut enim. Consectetur atque cupiditate ex voluptatem. Dolore explicabo fugiat libero vel nemo iure modi accusantium.', '2022-05-06 13:09:24', '2022-05-06 13:09:24'),
(98, 'Prof. Kylie Becker', '800.321.1482', 'abshire.cielo@yahoo.com', 1, 'Sunt qui odit neque eius. Ratione esse vel nam enim perspiciatis repellendus architecto. Nulla qui rem unde qui. Incidunt repellendus porro eum non.', '2022-05-06 13:09:24', '2022-05-06 13:09:24'),
(99, 'Weldon Hudson', '(877) 838-4749', 'semard@haley.com', 3, 'Eaque non illum unde vero. Doloribus vel placeat vitae est sed. Quasi quidem quibusdam odit eius qui. Sit et nihil quaerat ratione aperiam voluptas et dolore.', '2022-05-06 13:09:24', '2022-05-06 13:09:24'),
(100, 'Betty Eichmann II', '(855) 658-1791', 'tracey.hand@gmail.com', 1, 'Illum quasi ullam ipsum qui fugiat ut. Quia necessitatibus quasi ducimus minus voluptas ut dicta. Asperiores corporis illo ut aperiam itaque.', '2022-05-06 13:09:25', '2022-05-06 13:09:25'),
(101, 'Reese Rogahn', '888-467-2709', 'christopher84@hotmail.com', 2, 'Sit alias et veniam consequatur rerum saepe. Ut quae dolor dolorem sunt. Quia nihil quia et sint delectus voluptatem rem. Harum dolorem quam maxime quidem.', '2022-05-06 13:09:25', '2022-05-06 13:09:25'),
(102, 'Krystel Hettinger', '877-818-1831', 'gloria.bosco@heathcote.biz', 3, 'Ut sunt officiis et molestiae. Libero nisi error veritatis a quos nihil. Ut magni sunt dolorem omnis accusantium qui.', '2022-05-06 13:09:26', '2022-05-06 13:09:26'),
(103, 'João Amaral', '92312345', 'joaoamaral@gmail.com', 1, 'Acho que tenho alguma dúvida', '2022-05-06 13:29:53', '2022-05-06 13:29:53'),
(104, 'Cabral Nunes', '1371797', 'cabral.nunes@hotmail.com', 2, 'Gostei bastante do vosso aplicativo', '2022-05-06 13:57:06', '2022-05-06 13:57:06'),
(105, 'Cabral Nunes', '92312345', 'joaoamaral@gmail.com', 3, 'Não gostei do vosso atendiemnto.', '2022-05-06 13:59:38', '2022-05-06 13:59:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades`
--

CREATE TABLE `unidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unidade` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `filiais`
--
ALTER TABLE `filiais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produtos_unidade_id_foreign` (`unidade_id`);

--
-- Índices para tabela `produtos_filiais`
--
ALTER TABLE `produtos_filiais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produtos_filiais_filial_id_foreign` (`filial_id`),
  ADD KEY `produtos_filiais_produto_id_foreign` (`produto_id`);

--
-- Índices para tabela `produto_detalhes`
--
ALTER TABLE `produto_detalhes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `produto_detalhes_produto_id_unique` (`produto_id`);

--
-- Índices para tabela `site_contactos`
--
ALTER TABLE `site_contactos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `filiais`
--
ALTER TABLE `filiais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos_filiais`
--
ALTER TABLE `produtos_filiais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto_detalhes`
--
ALTER TABLE `produto_detalhes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `site_contactos`
--
ALTER TABLE `site_contactos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de tabela `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_unidade_id_foreign` FOREIGN KEY (`unidade_id`) REFERENCES `unidades` (`id`);

--
-- Limitadores para a tabela `produtos_filiais`
--
ALTER TABLE `produtos_filiais`
  ADD CONSTRAINT `produtos_filiais_filial_id_foreign` FOREIGN KEY (`filial_id`) REFERENCES `filiais` (`id`),
  ADD CONSTRAINT `produtos_filiais_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `produto_detalhes`
--
ALTER TABLE `produto_detalhes`
  ADD CONSTRAINT `produto_detalhes_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);
--
-- Banco de dados: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
