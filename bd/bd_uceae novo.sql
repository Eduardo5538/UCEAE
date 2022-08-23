-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23-Ago-2022 às 01:19
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_uceae`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `titulo` varchar(45) DEFAULT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `conteudo` varchar(100) DEFAULT NULL,
  `imagem_comentario` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolas`
--

DROP TABLE IF EXISTS `escolas`;
CREATE TABLE IF NOT EXISTS `escolas` (
  `CNPJ` varchar(21) NOT NULL,
  `nome_escola` varchar(40) DEFAULT NULL,
  `rua_escola` varchar(50) DEFAULT NULL,
  `acessibilidade` enum('N','S') DEFAULT NULL,
  `acessibilidade_texto` varchar(400) DEFAULT NULL,
  `email_escola` varchar(70) DEFAULT NULL,
  `telefone_escola` varchar(16) DEFAULT NULL,
  `uf_escola` varchar(2) DEFAULT NULL,
  `cep_escola` varchar(30) DEFAULT NULL,
  `cidade_escola` varchar(50) DEFAULT NULL,
  `bairro_escola` varchar(40) DEFAULT NULL,
  `foto_perfil` varchar(120) DEFAULT NULL,
  `foto_banner` varchar(120) DEFAULT NULL,
  `foto_prop` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`CNPJ`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `escolas`
--

INSERT INTO `escolas` (`CNPJ`, `nome_escola`, `rua_escola`, `acessibilidade`, `acessibilidade_texto`, `email_escola`, `telefone_escola`, `uf_escola`, `cep_escola`, `cidade_escola`, `bairro_escola`, `foto_perfil`, `foto_banner`, `foto_prop`) VALUES
('12345', 'Colégio Batista Daniel de La Touche', 'Av. Inácio Mourão Rangel', NULL, NULL, 'Batista@gmail.com', NULL, 'MA', '65076-830', 'São Luís', 'Jardim Renascença', '../uceae-login/img/561d0297370a1355c4cd269e9878b23e.jfif', NULL, '../uceae-login/img/031ac493e19fc4a392f358fca0a8ba08.jfif'),
('123', 'Colégio Batista Daniel de La Touche', 'Av. Inácio Mourão Rangel', NULL, NULL, 'Batista@gmail.com', NULL, 'MA', '65076-830', 'São Luís', 'Jardim Renascença', '../uceae-login/img/2f32608a9243bb3cdf4e99263811987e.jfif', '../uceae-login/img/ec35bcfa798c917e59cbcc9e8d63e026.jfif', '../uceae-login/img/5589249f166da08d5bb36ca75d732c4d.jfif'),
('765767', 'Col', 'Av. João Pessoa', NULL, NULL, 'Vicente@gmail.com', NULL, 'MA', '65040-000', 'São Luís ', 'João Paulo', '../uceae-login/img/36afdedb58002d0b50234c7289a96928.png', '../uceae-login/img/ba25ea39c696359043ba215d475c8bb5.jfif', '../uceae-login/img/9d1046b63b1c4876dfadd582b9c1914c.jfif'),
('466765', 'Colégio Teresina', 'Av. Miguel Rosa', NULL, NULL, 'Teresina@gmail.com', NULL, 'PI', '64018-560', 'Teresina', 'Centro (Sul)', '../uceae-login/img/acba2a2c45c55e3201bbaa9addf626ae.jpeg', '../uceae-login/img/31833a02eaccd957ddf73eff9c84b7c4.jpeg', '../uceae-login/img/5747b6f5f7d7026e6c49c0b9cad50019.jpeg'),
('545455', 'Colégio Marista', 'Av. Min. Sérgio Mota', NULL, NULL, 'Marista@gmail.com', NULL, 'PI', '64012-000', 'Teresina', 'Parque Wall Ferraz', '../uceae-login/img/ddb201c94aa648132711e86794dbf7ee.jfif', '../uceae-login/img/f9ad4dd86a9d4729fd47cd86782d4314.png', '../uceae-login/img/dfa751c7dcb6a24363ac59625609e0e5.png'),
('112223', 'Criança Escola', 'R. Joaquim Nabuco', NULL, NULL, 'Criança@gmail.com', NULL, 'CE', '60125-121', 'Fortaleza', 'Dionísio Torres', '../uceae-login/img/5d4b5a08fee4bf17066b6f990a484b84.jfif', '../uceae-login/img/c662f3a76797265d105b4838f8e733f3.jfif', '../uceae-login/img/54d3d59a215928498655125a8874528a.jfif'),
('5454577', 'Colégio Medalha Milagrosa', 'Rua Padre João Piamarta', NULL, NULL, 'Medalha@gmail.com', NULL, 'CE', '60410-315', 'Fortaleza', 'Bom Futuro', '../uceae-login/img/ecbe31ebe8055106338201b4d1ac2f09.jfif', '../uceae-login/img/13dd6a1a06b4f5315c094b7b1e41426b.jfif', '../uceae-login/img/ffb06bf3167a13627d6079cb52f81ea2.jfif'),
('242345', 'Cidade Viva', 'R. Profa. Luzia Simões Bartolini', NULL, NULL, 'Viva@gmail.com', NULL, 'PB', '58036-630', 'João Pessoa', 'Aeroclube', '../uceae-login/img/387b2526062a4bca971faa8a3c687021.jfif', '../uceae-login/img/25eda7162e34c3117b5fdeebf3dcf11e.jfif', '../uceae-login/img/688fb30c48bd93ddf378e037aff6b35b.jfif'),
('664767', 'Instituto Maria Auxiliadora', 'Av. Hermes da Fonseca', NULL, NULL, 'IMA@gmail.com', NULL, 'RN', '59014-495', 'Natal', 'Petrópolis', '../uceae-login/img/d106327ea16a6a3aec96b4c568564203.jfif', '../uceae-login/img/1d6ce7ac4e155b189988ffef74425783.jfif', '../uceae-login/img/5b939bc9357bfdc265e4ec9600e9e05d.jfif'),
('768679', 'Colégio Nossa Senhora de Lourdes', 'Av. Pres. Epitácio Pessoa ', NULL, NULL, 'Lourdes@gmail.com', NULL, 'PB', '58040-000', 'João Pessoa', 'Centro', '../uceae-login/img/b97b118caa6f74c387856463cbe2c64b.jfif', '../uceae-login/img/fb0e5551cc455af15a2b733dc9bbb83d.jfif', '../uceae-login/img/d71c17c3aaf338bcf020970da1110780.jfif'),
('46575753', 'Colégio Nossa Senhora das Neves', 'Avenida Coronel Estevam', NULL, NULL, 'Neves@gmail.com', NULL, 'RN', ' 59030-000', 'Natal ', ' Alecrim', '../uceae-login/img/3fb24a79c7f0b6936f114343a83c07ca.jfif', '../uceae-login/img/890087ca2b90c1b4fa6e9be936f7ed6e.jfif', '../uceae-login/img/905e6ed51f09e08eb83b2539b15a5a9d.jfif'),
('76786243', 'American School of Recife', 'R. Sá e Souza', NULL, NULL, 'asr@gmail.com', NULL, 'PE', '51030-065', 'Recife', 'Boa Viagem', '../uceae-login/img/f4cdbc5a1a247f94bea084db9ebe1b2b.png', '../uceae-login/img/9eaeaf1bdc427112599e6fbb8f23f397.jfif', '../uceae-login/img/1a944338225b53a8a896983e9fb94736.jfif'),
('2425346', 'Colégio Adventista', 'Rua Gervasio Pires', NULL, NULL, 'adventista@gmail.com', NULL, 'PE', '436364564', 'Recife', 'Boa Vista', '../uceae-login/img/7b6426308c07b2d40f3519ec0535a54c.jfif', '../uceae-login/img/ee0bbff02c031c6a166796f087c18ee3.jfif', '../uceae-login/img/1cd37420ce49c8da83f8a0e9b9185b8f.jfif'),
('53464365', 'Colégio Maria Montessori', 'R. João Paulo I', NULL, NULL, 'Maria@gmail.com', NULL, 'AL', '57052-130', 'Maceió', 'Gruta de Lourdes', '../uceae-login/img/18b84e72ded69b137fec127ec514b26e.jfif', '../uceae-login/img/c5d3672c3ec792c45f2d7962bcb2b1e0.jfif', '../uceae-login/img/10dff5711a6737ccb78e14c4f8409615.jfif'),
('5453672', 'Escola Nossa Senhora do Amparo', 'Praça do Centenário ', NULL, NULL, 'senhor@gmail.com', NULL, 'AL', '57021-140', 'Maceió', 'Farol', '../uceae-login/img/483ada338f1f54f10bc5ec39c2769b96.jfif', '../uceae-login/img/9c39018940e84198617c677579dfe8ba.jfif', '../uceae-login/img/a1c830f0c39850b9bb84441364bd6d73.jfif'),
('4456475', 'Colégio Michelangelo Ma e Filhos', 'R. Maj. João Téles', NULL, NULL, 'michel@gmail.com', NULL, 'SE', '49095-230', ' Aracaju ', 'Jabutiana', '../uceae-login/img/e1692011ba82aad6c02eeb717b084579.png', '../uceae-login/img/efcef39d961fc25d9ee84c77dd15ea79.jfif', '../uceae-login/img/078a515626899ef75592a895f9cd5571.jfif'),
('23364365', 'Colégio Arquidiocesano ', 'R. Ten. Antônio Fontes Pitanga', NULL, NULL, 'arqui@gmail.com', NULL, 'SE', '49032-360', 'Aracaju', 'Farolândia', '../uceae-login/img/94dedc5e92bc89f54b7758d8bf229771.png', '../uceae-login/img/37ae07f94c59db143f1700e1d8d4cc81.jfif', '../uceae-login/img/90ebb7f8d51ddd5e8a09f97d77490d94.jfif'),
('2342345', 'Colégio Salesiano Dom Bosco', 'R. Santo Antônio de Pádua', NULL, NULL, 'salesiano@gmail.com', NULL, 'BA', '41250-420', 'Salvador', 'São Marcos', '../uceae-login/img/9305ebcd2aa868ddf0067bb53de5ba7e.jfif', '../uceae-login/img/1af940ab433d304160cbf807493bf73c.jfif', '../uceae-login/img/2d86f0bfdfe4801145de9061c4484471.jfif'),
('23535435', 'Colégio Marista Patamares', 'R. Manoel Antônio Galvão', NULL, NULL, 'Marista@gmail.com', NULL, 'BA', '41741-390', 'Salvador', 'Patamares', '../uceae-login/img/2faf3aff98cd3af57114ab01e8be6140.png', '../uceae-login/img/8af0b9aa6b92be1ba4d67d3c9d789218.jfif', '../uceae-login/img/7b38cb591f667a8219032753cd5a68aa.jfif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `cod_login` int(11) NOT NULL AUTO_INCREMENT,
  `CNPJ` varchar(21) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cod_login`),
  KEY `CNPJ` (`CNPJ`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`cod_login`, `CNPJ`, `login`, `senha`, `nome`, `imagem`) VALUES
(1, '12345', 'Batista@gmail.com', '123', 'Colégio Batista Daniel de La Touche', '../uceae-login/img/561d0297370a1355c4cd269e9878b23e.jfif'),
(2, '123', 'Batista@gmail.com', '123', 'Colégio Batista Daniel de La Touche', '../uceae-login/img/2f32608a9243bb3cdf4e99263811987e.jfif'),
(3, '765767', 'Vicente@gmail.com', '555', 'Col', '../uceae-login/img/36afdedb58002d0b50234c7289a96928.png'),
(4, '466765', 'Teresina@gmail.com', '545', 'Colégio Teresina', '../uceae-login/img/acba2a2c45c55e3201bbaa9addf626ae.jpeg'),
(5, '545455', 'Marista@gmail.com', '434', 'Colégio Marista', '../uceae-login/img/ddb201c94aa648132711e86794dbf7ee.jfif'),
(6, '112223', 'Criança@gmail.com', '555', 'Criança Escola', '../uceae-login/img/5d4b5a08fee4bf17066b6f990a484b84.jfif'),
(7, '5454577', 'Medalha@gmail.com', '523', 'Colégio Medalha Milagrosa', '../uceae-login/img/ecbe31ebe8055106338201b4d1ac2f09.jfif'),
(8, '343232', 'Neves@gmail.com', '545', 'Colégio Nossa Senhora das Neves', '../uceae-login/img/b0ce11946ffa63c0156cdafe2daa9ee2.jfif'),
(9, '664767', 'IMA@gmail.com', '888', 'Instituto Maria Auxiliadora', '../uceae-login/img/d106327ea16a6a3aec96b4c568564203.jfif'),
(10, '465757', 'Neves@gmail.com', '1232131', 'Colégio Nossa Senhora das Neves', NULL),
(11, '46575753', 'Neves@gmail.com', '123', 'Colégio Nossa Senhora das Neves', '../uceae-login/img/3fb24a79c7f0b6936f114343a83c07ca.jfif'),
(12, '1312351', 'Viva@gmail.com', '676', 'Cidade Viva', '../uceae-login/img/7ec15c97a5a4633748be57aa3b084746.jfif'),
(13, '13123516', 'Viva@gmail.com', '123', 'Cidade Viva', '../uceae-login/img/5cd919e203202788b04d22bd527e7741.jfif'),
(14, '242345', 'Viva@gmail.com', '166', 'Cidade Viva', '../uceae-login/img/387b2526062a4bca971faa8a3c687021.jfif'),
(15, '768679', 'Lourdes@gmail.com', '888', 'Colégio Nossa Senhora de Lourdes', '../uceae-login/img/b97b118caa6f74c387856463cbe2c64b.jfif'),
(16, '76786243', 'asr@gmail.com', '5454', 'American School of Recife', '../uceae-login/img/f4cdbc5a1a247f94bea084db9ebe1b2b.png'),
(17, '2425346', 'adventista@gmail.com', '645', 'Colégio Adventista', '../uceae-login/img/7b6426308c07b2d40f3519ec0535a54c.jfif'),
(18, '53464365', 'Maria@gmail.com', '243', 'Colégio Maria Montessori', '../uceae-login/img/18b84e72ded69b137fec127ec514b26e.jfif'),
(19, '5453672', 'senhor@gmail.com', '443', 'Escola Nossa Senhora do Amparo', '../uceae-login/img/483ada338f1f54f10bc5ec39c2769b96.jfif'),
(20, '4456475', 'michel@gmail.com', '34535', 'Colégio Michelangelo Ma e Filhos', '../uceae-login/img/e1692011ba82aad6c02eeb717b084579.png'),
(21, '23364365', 'arqui@gmail.com', '324', 'Colégio Arquidiocesano ', '../uceae-login/img/94dedc5e92bc89f54b7758d8bf229771.png'),
(22, '2342345', 'salesiano@gmail.com', '555', 'Colégio Salesiano Dom Bosco', '../uceae-login/img/9305ebcd2aa868ddf0067bb53de5ba7e.jfif'),
(23, '23535435', 'Marista@gmail.com', '23113', 'Colégio Marista Patamares', '../uceae-login/img/2faf3aff98cd3af57114ab01e8be6140.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_alunos`
--

DROP TABLE IF EXISTS `tab_alunos`;
CREATE TABLE IF NOT EXISTS `tab_alunos` (
  `cod_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `cpf_aluno` int(11) DEFAULT NULL,
  `nome_aluno` varchar(50) DEFAULT NULL,
  `sexo_aluno` enum('f','m') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `datanasc_aluno` date DEFAULT NULL,
  `cep_aluno` int(8) DEFAULT NULL,
  `rua_aluno` varchar(40) DEFAULT NULL,
  `bairro_aluno` varchar(40) DEFAULT NULL,
  `cidade_aluno` varchar(40) DEFAULT NULL,
  `uf_aluno` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`cod_aluno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
