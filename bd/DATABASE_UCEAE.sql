CREATE DATABASE BD_UCEAE;
USE BD_UCEAE;

CREATE TABLE escolas(
	Cod_escola INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	CNPJ varchar(21),
    nome_escola varchar(40),
    rua_escola varchar(50),
    acessibilidade bool,
    email_escola varchar(70),
    telefone_escola varchar(16),
    imagem_escola varchar(60),
    uf_escola varchar(2),
    cep_escola varchar(30),
    cidade_escola varchar(50),
    bairro_escola varchar(40)
);

CREATE TABLE comentarios(
	titulo varchar(45),
    nome varchar(30),
    conteudo varchar(100),
    imagem_comentario varchar(100)
);

CREATE TABLE login(
	cod_login int not null auto_increment primary key,
	login varchar(20) not null,
    senha varchar(20) not null,
    nome varchar(40),
    imagem varchar(100)
);

CREATE TABLE if not exists tab_alunos
(
	cod_aluno int primary key auto_increment,
	cpf_aluno int(11),
	nome_aluno varchar(50),
	sexo_aluno enum('f','m'),
	email varchar(50),
	datanasc_aluno date,
	cep_aluno int(8),
	rua_aluno varchar(40),
	bairro_aluno varchar(40),
	cidade_aluno varchar(40),
	uf_aluno varchar(2),
);

SELECT * from tab_alunos;
SELECT * from escolas;


