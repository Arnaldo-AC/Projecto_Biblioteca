create database db_biblioteca;

use db_biblioteca;

CREATE TABLE tb_categoria (
codCategoria int PRIMARY KEY auto_increment,
descricao varchar(200)
);

CREATE TABLE tb_editora (
codEditora int primary KEY auto_increment,
nome varchar(200),
pais varchar(200),
cidade varchar(200),
email varchar(200),
telefone varchar(200),
dataRegisto datetime,
dataAlteracao datetime,
dataRemocao datetime
);

CREATE TABLE tb_autor (
codAutor int PRIMARY KEY auto_increment,
nome varchar(200),
nacionalidade varchar(200),
areaFormacao varchar(200),
cargo varchar(200),
genero enum('M'),
dataNasc date,
dataRegisto datetime,
dataAlteracao datetime,
dataRemocao datetime
);

CREATE TABLE tb_nivel (
codNivel int PRIMARY KEY auto_increment,
descricao varchar(200)
);

CREATE TABLE tb_usuario (
codUsuario int PRIMARY KEY,
nome varchar(200),
bi varchar(200),
genero char(1),
dataNasc date,
telefone varchar(200),
email varchar(200),
municipio varchar(200),
distrito varchar(200),
bairro varchar(200),
senha varchar(200),
quantidade int,
numUsuario varchar(200),
idNivel int,
dataRegisto datetime,
dataAlteracao datetime,
dataRemocao datetime,
foreign key(idNivel) references tb_nivel(codNivel)
);

CREATE TABLE tb_exemplar (
codExemplar int PRIMARY KEY auto_increment,
titulo varchar(200),
deposito varchar(200),
anoPub date,
isbn varchar(200),
localPub varchar(200),
edicao int,
medida decimal,
idCategoria int,
idEditora int,
area varchar(200),
dataRegisto datetime,
dataAlteracao datetime,
dataRemocao datetime,
foreign key(idCategoria) references tb_categoria(codCategoria),
foreign key(idEditora) references tb_editora(codEditora)
);

CREATE TABLE tb_exemplar_autor (
idAutor int,
idExemplar int,
foreign key(idAutor) references tb_autor(codAutor),
foreign key(idExemplar) references tb_exemplar(codExemplar)
);

CREATE TABLE tb_reserva (
codReserva int primary key auto_increment,
dataReserva date,
comprovativo text,
idUsuario int,
dataRegisto datetime,
dataAlteracao datetime,
dataRemocao datetime,
foreign key(idUsuario) references tb_usuario(codUsuario)
);

CREATE TABLE tb_emprestimo (
codEmprestimo int PRIMARY KEY auto_increment,
dataEmprestimo date,
dataDevolucao date,
estado varchar(200),
idReserva int,
dataRegisto datetime,
dataAlteracao datetime,
dataRemocao datetime,
foreign key(idReserva) references tb_reserva(codReserva)
);

CREATE TABLE tb_exemplar_reserva (
idReserva int,
idExemplar int,
foreign key(idReserva) references tb_reserva(codReserva),
foreign key(idExemplar) references tb_exemplar(codExemplar)
);

select concat(cidade,', ',pais) as endereco from tb_editora;

insert into tb_categoria(descricao) values('Livro'),('Revista'),('Artigo');

alter table tb_exemplar add foto text;
alter table tb_usuario add foto text;

select *from tb_categoria;

select *from tb_autor;

create table tb_area(codArea int primary key auto_increment, nome varchar(200));

insert into tb_area(nome) values('Informática'),('Contabilidade'),('Economia'),('Gestão');

select *from tb_exemplar order by codExemplar desc limit 1;