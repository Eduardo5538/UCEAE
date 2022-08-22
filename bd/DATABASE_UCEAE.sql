CREATE DATABASE BD_UCEAE;
USE BD_UCEAE;

CREATE TABLE escolas( 
	CNPJ varchar(21) PRIMARY KEY NOT NULL,
    nome_escola varchar(40),
    rua_escola varchar(50),
    acessibilidade enum('N','S'),
    acessibilidade_texto varchar(400),
    email_escola varchar(70),
    telefone_escola varchar(16),
    uf_escola varchar(2),
    cep_escola varchar(30),
    cidade_escola varchar(50),
    bairro_escola varchar(40),
    foto_perfil varchar(120),
    foto_banner varchar(120),
    foto_prop varchar(120)
);

CREATE TABLE comentarios(
	titulo varchar(45),
    nome varchar(30),
    conteudo varchar(100),
    imagem_comentario varchar(100)
);

CREATE TABLE login(
	cod_login int not null auto_increment primary key,
    CNPJ varchar(21),
	login varchar(20) not null,
    senha varchar(20) not null,
    nome varchar(40),
    imagem varchar(100),
    FOREIGN KEY (CNPJ) REFERENCES escolas(CNPJ)
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
	uf_aluno varchar(2)
);

