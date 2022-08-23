-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220822.84e30c2c86
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Ago-2022 às 06:07
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.4

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

CREATE TABLE `comentarios` (
  `titulo` varchar(45) DEFAULT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `conteudo` varchar(100) DEFAULT NULL,
  `imagem_comentario` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolas`
--

CREATE TABLE `escolas` (
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
  `foto_prop` varchar(120) DEFAULT NULL
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
('23535435', 'Colégio Marista Patamares', 'R. Manoel Antônio Galvão', NULL, NULL, 'Marista@gmail.com', NULL, 'BA', '41741-390', 'Salvador', 'Patamares', '../uceae-login/img/2faf3aff98cd3af57114ab01e8be6140.png', '../uceae-login/img/8af0b9aa6b92be1ba4d67d3c9d789218.jfif', '../uceae-login/img/7b38cb591f667a8219032753cd5a68aa.jfif'),
('223827837238', 'CENTRO MUNICIPAL DE EDUCACAO INFANTIL JO', 'RUA CAMPINAS, S/N', NULL, NULL, 'cmefp@gmail.com', NULL, 'GO', '75345-000 ', ' Abadia de Goiás', 'QD. 01 LT. 16. CENTRO', '../uceae-login/img/261998f950dde169d566680341be90fb.png', '../uceae-login/img/7e0521c65b7b4efdbf08e6a678561ad0.png', '../uceae-login/img/af62697a376433fdd4542da0e0d19ca8.png'),
('223382932999', 'COLEGIO ESTADUAL MANOEL LIBANIO DA SILVA', 'R GOIANIA C TRINDADE, SN', NULL, NULL, 'cemls@gmail.com', NULL, 'GO', '75345-000 ', ' Abadia de Goiás', 'VILA GOIANY', '../uceae-login/img/92e3edb70854f202d05c27bcf35c6e86.png', '../uceae-login/img/694ad9973beca3d6b9f1e3fee206191f.png', '../uceae-login/img/6930dbd88a744ec2eaa65208c3ec1ade.png'),
('2324423212', 'Creche Municipal Arco Iris', ' AV MOISES DORNELES MONTIEL, 02', NULL, NULL, 'cemls@gmail.com', NULL, 'MT', '75345-000 ', 'Alto Boa Vista', 'SETOR BANEIRANTES', '../uceae-login/img/99c4fc273e1010b2f74a6338a767dc79.png', '../uceae-login/img/b0b6192d8b7e378867b2ef504fec2323.png', '../uceae-login/img/5c60a3d2058d4a1084a5d446ee8fa2de.png'),
('293898999', 'EE JOAO REZENDE DE AZEVEDO', 'AVENIDA BRASIL, 700 ', NULL, NULL, 'eejrd@gmail.com', NULL, 'MT', '78665-000', 'Alto Boa Vista', 'CENTRO', '../uceae-login/img/ed7c3776c9ada5a57588876472ce70ae.png', '../uceae-login/img/329a951c1bfb9126bf18d8abba302c87.png', '../uceae-login/img/f26ae68abc912a0b9afb51e5b7acc212.png'),
('29389899953', 'EE BRAZ SINIGAGLIA', 'RUA ARLINDO RAMOS, 1811', NULL, NULL, 'braz@gmail.com', NULL, 'MS', '79760-000', 'Batayporã', 'CENTRO', '../uceae-login/img/389715a5491384a5acc40ce3c35e92bb.png', '../uceae-login/img/8570664b38f21f113855d3741d9f4a4e.png', '../uceae-login/img/12ad61bd6b6215543ce2e923138686a0.png'),
('3423444953', 'EE JAN ANTONIN BATA', 'RUA JONAS PEDRO NUNES, 1260 ', NULL, NULL, 'jan@gmail.com', NULL, 'MS', '79760-000 ', 'Batayporã', 'CENTRO', '../uceae-login/img/467bec7c47d00a4935457c602b0e5b6d.png', '../uceae-login/img/04e8385f82e4a2dea4d2031de0cdbbb5.png', '../uceae-login/img/2b5718b8c56dc638b9b0354d4efc26ad.png'),
('3231243232', 'EE JAN ANTONIN BATA', 'RUA JONAS PEDRO NUNES, 1260 ', NULL, NULL, 'jan@gmail.com', NULL, 'DF', '79760-000 ', 'Batayporã', 'CENTRO', '../uceae-login/img/158fb364607fcf48929875db75389ebe.png', '../uceae-login/img/a7571dcbb0bf853b9684affb9c3c0952.png', '../uceae-login/img/3776a7729f780c71d72cd9461a79ae1d.png'),
('323124323239', 'AFMA C DE EDUC INF - UNIDADE AGUAS CLARA', 'R 36 NORTE LT 9 LJ 1 E LJ 2', NULL, NULL, 'afma@gmail.com', NULL, 'DF', '71919-180', 'Brasilia', 'AGUAS CLARAS', '../uceae-login/img/7b95aedadfe7c7af27e8ff670dae73c0.png', '../uceae-login/img/f50e28b96c253234e756b8ae194948d4.png', '../uceae-login/img/160f81f21c0cddf9ea0019e48508166d.png'),
('29737237677', 'Caic Prof Walter Jose De Moura', 'QUADRA QS 7 AREA ESPECIAL 4/10', NULL, NULL, 'caic@gmail.com', NULL, 'TO', '71967-005', 'Alto Bom Novo', 'AREAL AGUAS CLARAS', '../uceae-login/img/15c93a344418c6a266889181da32dc87.png', '../uceae-login/img/e806a359d5288a3b2b83452b8c6f5f93.png', '../uceae-login/img/bb08692b8ffeb9484cc4fb13bde4115f.png'),
('29713937237677', 'ESC BOM JESUS', 'RAMAL GRANADA KM 16, SN', NULL, NULL, 'caic@gmail.com', NULL, 'AC', '69945-000', 'Acrelândia', 'ZONA RURAL', '../uceae-login/img/fde3df25cdf4d6892b8d1ab2980869b5.png', '../uceae-login/img/80a9b56b7e1ba2da301bd63da9237622.png', '../uceae-login/img/d82c35e091945307e6497bc47f23bdcd.png'),
('29713237677', 'ESC BRANCA DE NEVE', 'AVENIDA PARANA, 366', NULL, NULL, 'branca@gmail.com', NULL, 'AC', '69945-000', 'Acrelândia', 'CENTRO', '../uceae-login/img/990364e051a472e4e244ca78e9cf0b43.png', '../uceae-login/img/eb88e2661a6f9531bcbd3ebd05bd2a66.png', '../uceae-login/img/b67c7f11807bea90819fd60e1b260590.png'),
('2971323767798', 'CENTRO DE CONVIVENCIA E FORTALECIMENTO D', 'RUA JOSE SOARES, S/N ', NULL, NULL, 'convivencia@gmail.com', NULL, 'AM', '69265-000 ', 'Apuí ', 'SAO SEBASTIAO', '../uceae-login/img/b6adb12e9218445a0ebae3fc880a3bba.png', '../uceae-login/img/1ff6682b7b9110192e3f01658b1caf9c.png', '../uceae-login/img/6c38d69d79d087d4713251675effd581.png'),
('2971323767765', 'ESCOLA MUNICIPAL NOSSA SENHORA DO CARMO', 'RUA JOSE SOARES, S/N ', NULL, NULL, 'carmo@gmail.com', NULL, 'AM', '69265-000', 'Apuí ', 'SAO SEBASTIAO', '../uceae-login/img/14d5a0e9c8d9f9088a4c87c76704a085.png', '../uceae-login/img/c652b47a4c29d402df53e1e8c0220755.png', '../uceae-login/img/1bebf86f165f2df25be8c62c29d30f17.png'),
('9991323767765', 'Esc Est Colonia De Agua Branca', 'ROD. AYRTON SENNA DA SILVA, 1021 ', NULL, NULL, 'colonia@gmail.com', NULL, 'AP', '68948-000 ', 'Serra do Navio ', 'AGUA BRANCA', '../uceae-login/img/29dc99a346376bebe14bb4a32257e5fb.png', '../uceae-login/img/bc233344dbcd7cbbfd1e3eae20032c26.png', '../uceae-login/img/ad4b3a607b013e26385f5ec991a796f8.png'),
('999132376776576', 'ESC EST SETE DE SETEMBRO', 'VILA DO CACHACO, S/N ', NULL, NULL, 'setembro@gmail.com', NULL, 'AP', '68948-000', 'Serra do Navio ', 'DISTRITO DO CACHACO', '../uceae-login/img/21fb38293a510d2284deed2cb07e8f12.png', '../uceae-login/img/b17a045119ffd142b6d7ef814be05c0a.png', '../uceae-login/img/058edf14d6bb99a47c6a05aa4dcdc9c3.png'),
('9237372777765', 'E M E F NOVA JERUSALEM', 'RIO JACUNDA, SN', NULL, NULL, 'jerusalem@gmail.com', NULL, 'PA', '68475-000', 'Serra do Navio ', 'VILA SABA SOZINHO RURAL', '../uceae-login/img/eeb7c1da40e77cab02b45fa8adaddf03.png', '../uceae-login/img/390c4158f0b2f0b47029510afbfffaa9.png', '../uceae-login/img/1130441390c91e62ab21ac60868f36f6.png'),
('53122111765', 'E M E F NOVA PALESTINA', 'RIO CARARUAZINHO, SN', NULL, NULL, 'palestina@gmail.com', NULL, 'PA', '68475-000 ', 'Bagre', 'COMUNIDADE PALESTINA ZONA RURAL', '../uceae-login/img/7308787986903ce0f5dd194968224ffc.png', '../uceae-login/img/8b6b92b6e528dd7421efa4fa4ec7f64d.png', '../uceae-login/img/93e1ae50a7c53ab6757d859bd2784c0e.png'),
('53122111765451', 'CENTRO EDUCACIONAL DR ANTONIO LAZARO DE ', 'AV MINAS GERAIS, 4405', NULL, NULL, 'moura@gmail.com', NULL, 'RO', '76954-000 ', 'Alta Floresta D\'Oeste', 'CIDADE ALTA', '../uceae-login/img/c3fcf0731aec305034d46c0f55be8fa3.png', '../uceae-login/img/dd54b5af53e723fc0b05ea3fb9c33765.png', '../uceae-login/img/e01f59a507ce7421ba826aa32ff20b58.png'),
('1937778787878', 'AMERICA SABINO COIMBRA', 'AV Bom Pastor, 4405', NULL, NULL, 'sabino@gmail.com', NULL, 'RO', '76487-000 ', 'Alta Floresta D\'Oeste', 'CIDADE DO OCASO', '../uceae-login/img/ff660be20816c63548251eb0e0f26287.png', '../uceae-login/img/76d79f05f10c2155d6e670f0096ccff2.png', '../uceae-login/img/46ab16f684354f79685b679e3e03919b.png'),
('242323222178', 'EE HEITOR CONIVAL ', 'AV Creta 2008, 4405', NULL, NULL, 'conival@gmail.com', NULL, 'TO', '69787-000 ', 'Alta Floresta D\'Oeste', 'CIDADE DEPENDURADA', '../uceae-login/img/221d9c2e0fbf3192914ba1960f596e37.png', '../uceae-login/img/f401b68d778ba148eb58a753059a0987.png', '../uceae-login/img/ff0fd2959b9e6e2fe3fe590b0ddd1c3c.png'),
('83288877776', 'Colégio Estadual Militarizado Fernando G', 'ALAMEDA DEPUTADO CONIFER, 4405', NULL, NULL, 'ceMili@gmail.com', NULL, 'RR', '38887-000 ', 'Roralândia', 'COMUNIDADE', '../uceae-login/img/afa49ff94f9ab6a213c39eda373241a0.png', '../uceae-login/img/a9d3c8da11d0433fb42eb886aff4ffd4.png', '../uceae-login/img/d3c977698dc497c51d9e9fe2c4316c25.png'),
('83288877776122', 'Escola Estadual Luiz Ribeiro de Lima', 'Rua Antônio Batista de Miranda, 1183 ', NULL, NULL, 'luizRib@gmail.com', NULL, 'RR', '69317-302', 'Boa Vista', 'Jardim Equatorial', '../uceae-login/img/62d05297aea7997984a597e565a20501.png', '../uceae-login/img/a76b1a011f4defa608d751219df57966.png', '../uceae-login/img/919bf885b0dc008a73b829782b9104fa.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `cod_login` int(11) NOT NULL,
  `CNPJ` varchar(21) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(23, '23535435', 'Marista@gmail.com', '23113', 'Colégio Marista Patamares', '../uceae-login/img/2faf3aff98cd3af57114ab01e8be6140.png'),
(24, '223827837238', 'cmefp@gmail.com', '123', 'CENTRO MUNICIPAL DE EDUCACAO INFANTIL JO', '../uceae-login/img/261998f950dde169d566680341be90fb.png'),
(25, '223382932999', 'cemls@gmail.com', '123', 'COLEGIO ESTADUAL MANOEL LIBANIO DA SILVA', '../uceae-login/img/92e3edb70854f202d05c27bcf35c6e86.png'),
(26, '2324423212', 'cemls@gmail.com', '123', 'Creche Municipal Arco Iris', '../uceae-login/img/99c4fc273e1010b2f74a6338a767dc79.png'),
(27, '293898999', 'eejrd@gmail.com', '123', 'EE JOAO REZENDE DE AZEVEDO', '../uceae-login/img/ed7c3776c9ada5a57588876472ce70ae.png'),
(28, '29389899953', 'braz@gmail.com', '123', 'EE BRAZ SINIGAGLIA', '../uceae-login/img/389715a5491384a5acc40ce3c35e92bb.png'),
(29, '3423444953', 'jan@gmail.com', '123', 'EE JAN ANTONIN BATA', '../uceae-login/img/467bec7c47d00a4935457c602b0e5b6d.png'),
(30, '3231243232', 'jan@gmail.com', '123', 'EE JAN ANTONIN BATA', '../uceae-login/img/158fb364607fcf48929875db75389ebe.png'),
(31, '323124323239', 'afma@gmail.com', '123', 'AFMA C DE EDUC INF - UNIDADE AGUAS CLARA', '../uceae-login/img/7b95aedadfe7c7af27e8ff670dae73c0.png'),
(32, '29737237677', 'caic@gmail.com', '123', 'Caic Prof Walter Jose De Moura', '../uceae-login/img/15c93a344418c6a266889181da32dc87.png'),
(33, '29713937237677', 'caic@gmail.com', '123', 'ESC BOM JESUS', '../uceae-login/img/fde3df25cdf4d6892b8d1ab2980869b5.png'),
(34, '29713237677', 'branca@gmail.com', '123', 'ESC BRANCA DE NEVE', '../uceae-login/img/990364e051a472e4e244ca78e9cf0b43.png'),
(35, '2971323767798', 'convivencia@gmail.co', '123', 'CENTRO DE CONVIVENCIA E FORTALECIMENTO D', '../uceae-login/img/b6adb12e9218445a0ebae3fc880a3bba.png'),
(36, '2971323767765', 'carmo@gmail.com', '123', 'ESCOLA MUNICIPAL NOSSA SENHORA DO CARMO', '../uceae-login/img/14d5a0e9c8d9f9088a4c87c76704a085.png'),
(37, '9991323767765', 'colonia@gmail.com', '123', 'Esc Est Colonia De Agua Branca', '../uceae-login/img/29dc99a346376bebe14bb4a32257e5fb.png'),
(38, '999132376776576', 'setembro@gmail.com', '123', 'ESC EST SETE DE SETEMBRO', '../uceae-login/img/21fb38293a510d2284deed2cb07e8f12.png'),
(39, '9237372777765', 'jerusalem@gmail.com', '123', 'E M E F NOVA JERUSALEM', '../uceae-login/img/eeb7c1da40e77cab02b45fa8adaddf03.png'),
(40, '53122111765', 'palestina@gmail.com', '123', 'E M E F NOVA PALESTINA', '../uceae-login/img/7308787986903ce0f5dd194968224ffc.png'),
(41, '53122111765451', 'moura@gmail.com', '123', 'CENTRO EDUCACIONAL DR ANTONIO LAZARO DE ', '../uceae-login/img/c3fcf0731aec305034d46c0f55be8fa3.png'),
(42, '1937778787878', 'sabino@gmail.com', '123', 'AMERICA SABINO COIMBRA', '../uceae-login/img/ff660be20816c63548251eb0e0f26287.png'),
(43, '242323222178', 'conival@gmail.com', '123', 'EE HEITOR CONIVAL ', '../uceae-login/img/221d9c2e0fbf3192914ba1960f596e37.png'),
(44, '83288877776', 'ceMili@gmail.com', '123', 'Colégio Estadual Militarizado Fernando G', '../uceae-login/img/afa49ff94f9ab6a213c39eda373241a0.png'),
(45, '83288877776122', 'luizRib@gmail.com', '123', 'Escola Estadual Luiz Ribeiro de Lima', '../uceae-login/img/62d05297aea7997984a597e565a20501.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_alunos`
--

CREATE TABLE `tab_alunos` (
  `cod_aluno` int(11) NOT NULL,
  `cpf_aluno` int(11) DEFAULT NULL,
  `nome_aluno` varchar(50) DEFAULT NULL,
  `sexo_aluno` enum('f','m') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `datanasc_aluno` date DEFAULT NULL,
  `cep_aluno` int(8) DEFAULT NULL,
  `rua_aluno` varchar(40) DEFAULT NULL,
  `bairro_aluno` varchar(40) DEFAULT NULL,
  `cidade_aluno` varchar(40) DEFAULT NULL,
  `uf_aluno` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `escolas`
--
ALTER TABLE `escolas`
  ADD PRIMARY KEY (`CNPJ`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`cod_login`),
  ADD KEY `CNPJ` (`CNPJ`);

--
-- Índices para tabela `tab_alunos`
--
ALTER TABLE `tab_alunos`
  ADD PRIMARY KEY (`cod_aluno`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `cod_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `tab_alunos`
--
ALTER TABLE `tab_alunos`
  MODIFY `cod_aluno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
