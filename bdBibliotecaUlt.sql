DROP DATABASE IF EXISTS `db_biblioteca`;
--
CREATE DATABASE IF NOT EXISTS `db_biblioteca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_biblioteca`;

CREATE TABLE `tb_area` (
  `codArea` int(11) NOT NULL PRIMARY KEY auto_increment,
  `nome` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_area`
--

INSERT INTO `tb_area` (`nome`) VALUES
('Informática'),
('Contabilidade'),
('Economia'),
('Gestão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_autor`
--

CREATE TABLE `tb_autor` (
  `codAutor` int(11) NOT NULL PRIMARY KEY auto_increment,
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
(5, 'Cabral Nunes', 'Angolana', 'Ciências', 'Escritor', 'M', '1954-03-12', '2022-05-21 13:24:52', '2022-05-23 18:39:40', '2022-05-23 06:42:01'),
(6, 'Capela Tepa', 'Angolana', 'Contabilidade', 'Professor', 'M', '1973-12-09', '2022-06-01 16:08:34', NULL, '2022-06-01 16:08:34'),
(7, 'Gil Fernandes Ferreira', 'Angolana', 'Economia', 'Contabilista', 'M', '2020-12-06', '2022-06-01 16:32:01', NULL, '2022-06-01 16:32:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_carrinho`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `codCategoria` int(11) NOT NULL PRIMARY KEY auto_increment,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_categoria`
--

INSERT INTO `tb_categoria` (`descricao`) VALUES
('Livro'),
('Revista'),
('Artigo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_editora`
--

CREATE TABLE `tb_editora` (
  `codEditora` int(11) NOT NULL PRIMARY KEY auto_increment,
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
(2, 'Cabral Nunes', 'Angola', 'Luanda', 'joaoamaral@gmail.com', '92312345', '2022-05-16 02:56:36', NULL, NULL),
(3, 'João Amaral', 'Angola', 'Luanda', 'joaoamaral@gmail.com', '1371797', '2022-05-16 02:58:16', NULL, '2022-05-16 02:58:16'),
(4, 'Pancada', 'Angola', 'Luanda', 'pancadatec2019@gmail.com', '923213618', '2022-05-21 13:42:40', NULL, '2022-05-21 13:42:40'),
(5, 'Revista Forbes', 'Portugal', 'Lisboa', '', '921355665', '2022-06-01 16:22:48', NULL, '2022-06-01 16:22:48'),
(6, 'Artigo News', 'Angola', 'Luanda', 'artigonews@gmail.com', '+244921342561', '2022-06-01 16:32:44', NULL, '2022-06-01 16:32:44');
-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_exemplar`
--

CREATE TABLE `tb_exemplar` (
  `codExemplar` int(11) NOT NULL PRIMARY KEY auto_increment,
  `titulo` varchar(200) DEFAULT NULL,
  `deposito` varchar(200) DEFAULT NULL,
  `anoPub` date DEFAULT NULL,
  `isbn` varchar(200) DEFAULT NULL,
  `localPub` varchar(200) DEFAULT NULL,
  `edicao` int(11) DEFAULT NULL,
  `medida` varchar(50) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `idEditora` int(11) DEFAULT NULL,
  `area` varchar(200) DEFAULT NULL,
  `dataRegisto` datetime DEFAULT NULL,
   `quantidade` int not null,
  `dataAlteracao` datetime DEFAULT NULL,
  `dataRemocao` datetime DEFAULT NULL,
  `foto` text DEFAULT NULL,
foreign key(idEditora) references tb_editora(codEditora),
foreign key(idCategoria) references tb_categoria(codCategoria)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Estrutura da tabela `tb_exemplar_reserva`
INSERT INTO `tb_exemplar` (`codExemplar`, `titulo`, `deposito`, `anoPub`, `isbn`, `localPub`, `edicao`, `medida`, `idCategoria`, `idEditora`, `area`, `dataRegisto`, `quantidade`, `dataAlteracao`, `dataRemocao`, `foto`) VALUES
(1, 'A ciência do sucesso', 'EUA', '2019-02-09', '#12345', 'EUA', 5, '20x45', 1, 4, 'Gestão', '2022-06-01 16:02:08', 5, NULL, '2022-06-01 16:02:08', 'd3f72baf70f27fa3a54bb85f333c422b.jpg'),
(2, 'Quem pensa enriquece', 'EUA', '2015-08-12', '12346', 'EUA', 6, '12x15', 1, 4, 'Gestão', '2022-06-01 16:06:01', 6, NULL, '2022-06-01 16:06:01', '7edef09aa9da087eba281245dc5fde3f.jpg'),
(3, 'A teoria da contabilidade', 'Brasil', '2010-09-09', '123&21', 'Angola', 10, '12x15', 1, 3, 'Informática', '2022-06-01 16:09:57', 7, NULL, '2022-06-01 16:09:57', '16c243fced518af264f33fa147e2b9d4.jpg'),
(4, 'As maiores fundações de Portugal', 'Portugal', '2019-02-12', '12#42', 'Portugal', 6, '12x15', 2, 5, 'Economia', '2022-06-01 16:24:26', 3, NULL, '2022-06-01 16:24:26', '87fa8ab3ed77c297a9d3fc345c0f986c.jpg'),
(5, 'Plano Geral de Contabilidade', 'Angola', '2021-07-23', '', 'Angola', 3, '20x20', 3, 6, 'Contabilidade', '2022-06-01 16:35:01', 10, NULL, '2022-06-01 16:35:01', '4aec25297a4292cb4271afb816fd6904.jpg'),
(6, 'O Ano da Virada', 'Brasil', '2020-02-09', '545454', 'Brasil', 5, '5x5', 2, 5, 'Informática', '2022-06-01 21:43:15', 4, NULL, '2022-06-01 21:43:15', 'b83978657ff752ee02ce7222f962c389.jpg');

--
-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nivel`
--

CREATE TABLE `tb_nivel` (
  `codNivel` int(11) NOT NULL PRIMARY KEY auto_increment,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_nivel`
--

INSERT INTO `tb_nivel` (`descricao`) VALUES
('Admin'),
('Bibliotecário'),
('Professor'),
('Aluno');
--

CREATE TABLE `tb_usuario` (
  `codUsuario` int(11) primary key auto_increment,
  `nome` varchar(200) DEFAULT NULL,
  `bi` varchar(200) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `dataNasc` date DEFAULT NULL,
  `telefone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL unique,
  `municipio` varchar(200) DEFAULT NULL,
  `distrito` varchar(200) DEFAULT NULL,
  `bairro` varchar(200) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `curso` varchar(200),
  `idNivel` int(11) DEFAULT NULL,
    `numUsuario` varchar(200) DEFAULT NULL,
  `dataRegisto` datetime DEFAULT NULL,
  `dataAlteracao` datetime DEFAULT NULL,
  `dataRemocao` datetime DEFAULT NULL,
  `foto` text DEFAULT NULL,
  foreign key(idNivel) references tb_nivel(codNivel)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tb_funcionario` (
  `codFuncionario` int(11) NOT NULL PRIMARY KEY auto_increment,
  `nome` varchar(200) DEFAULT NULL,
  `bi` varchar(200) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `dataNasc` date DEFAULT NULL,
  `telefone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL unique,
  `municipio` varchar(200) DEFAULT NULL,
  `distrito` varchar(200) DEFAULT NULL,
  `bairro` varchar(200) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `cargo` varchar(100),
  `idNivel` int(11) DEFAULT NULL,
  `dataRegisto` datetime DEFAULT NULL,
  `dataAlteracao` datetime DEFAULT NULL,
  `dataRemocao` datetime DEFAULT NULL,
  `foto` text DEFAULT NULL,
  foreign key(idNivel) references tb_nivel(codNivel)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `tb_funcionario` (`nome`, `bi`, `genero`, `dataNasc`, `telefone`, `email`, `municipio`, `distrito`, `bairro`, `senha`, `cargo`, `idNivel`, `dataRegisto`, `dataAlteracao`, `dataRemocao`, `foto`) VALUES
('Inês Garcia', 'LD1234567LA89', 'F', '1996-10-20', '937543215', 'ines.garcia@gmail.com', 'Belas', 'Futungo', 'Bla', '12345', 'Professora', 1, '2022-05-23 17:34:29', NULL, '2022-05-23 17:34:29', '0bbd794b87ca5304bfd747c2e4a329bb.jpg');

INSERT INTO `tb_usuario` (`nome`, `bi`, `genero`, `dataNasc`, `telefone`, `email`, `municipio`, `distrito`, `bairro`, `senha`, `curso`, `idNivel`, `numUsuario`, `dataRegisto`, `dataAlteracao`, `dataRemocao`, `foto`) VALUES
('Gilberto Catimba', 'LD154212415609', 'M', '2002-04-16', '936213412', 'gilbertocatimba@gmail.com', 'Viana', 'Estalagem', 'Grafanil', '#1234', 'IGF',4, '184321', '2022-05-23 16:34:22', NULL, '2022-05-23 16:34:22', 'picture2.png');

CREATE TABLE `tb_reserva` (
  `codReserva` int(11) NOT NULL PRIMARY KEY auto_increment,
  `dataReserva` datetime DEFAULT NULL,
  `comprovativo` text DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `dataRegisto` datetime DEFAULT NULL,
  `dataAlteracao` datetime DEFAULT NULL,
  `dataRemocao` datetime DEFAULT NULL,
  foreign key(idUsuario) references tb_usuario(codUsuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Extraindo dados da tabela `tb_usuario`
--

CREATE TABLE `tb_exemplar_reserva` (
  `idReserva` int(11) DEFAULT NULL,
  `idExemplar` int(11) DEFAULT NULL,
  foreign key(idReserva) references tb_reserva(codReserva),
    foreign key(idExemplar) references tb_exemplar(codExemplar)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_emprestimo`
--

CREATE TABLE `tb_emprestimo` (
  `codEmprestimo` int(11) NOT NULL PRIMARY KEY auto_increment,
  `dataEmprestimo` datetime DEFAULT NULL,
  `dataDevolucao` datetime DEFAULT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `idReserva` int(11) DEFAULT NULL,
  `idFuncionario` int(11) DEFAULT NULL,
  `dataRegisto` datetime DEFAULT NULL,
  `dataAlteracao` datetime DEFAULT NULL,
  `dataRemocao` datetime DEFAULT NULL,
  foreign key(idReserva) references tb_reserva(codReserva),
	foreign key(idFuncionario) references tb_funcionario(codFuncionario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 


CREATE TABLE `tb_exemplar_autor` (
  `idAutor` int(11) DEFAULT NULL,
  `idExemplar` int(11) DEFAULT NULL,
  foreign key(idAutor) references tb_autor(codAutor),
	foreign key(idExemplar) references tb_exemplar(codExemplar)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_exemplar_autor` (`idExemplar`,`idAutor`) VALUES
(1, 2),
(1, 1),
(2, 3),
(3, 1),
(4, 4),
(5, 5),
(6, 2),
(6, 3);


CREATE TABLE `tb_carrinho` (
  `idUsuario` int(11) NOT NULL,
  `idExemplar` int(11) NOT NULL,
  `dataRegisto` datetime,
  `dataRemocao` datetime,
foreign key(idExemplar) references tb_exemplar(codExemplar),
foreign key(idUsuario) references tb_usuario(codUsuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

create table tb_verificacao(codVerificacao int primary key AUTO_INCREMENT,
email varchar(100) unique,
codigo varchar(20) unique);