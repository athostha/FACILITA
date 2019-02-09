-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jun-2018 às 15:56
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facilita`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `solicitacao_id` int(11) NOT NULL,
  `finalizado` tinyint(4) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `local` varchar(45) DEFAULT NULL,
  `comentario` mediumtext,
  `comparecimento` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `data`, `solicitacao_id`, `finalizado`, `usuario_id`, `local`, `comentario`, `comparecimento`) VALUES
(1, '2018-04-26 11:00:00', 2, 1, 3, 'Sala 2, 2º andar', '', 1),
(2, '2018-04-26 03:00:00', 1, 0, 2, 'Sala 2, 2º andar', NULL, NULL),
(3, '2018-04-20 16:00:00', 3, 0, 4, 'Sala 3, 2º andar', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `solicitacao_id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `conteudo` mediumtext NOT NULL,
  `lido` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `solicitacao_id`, `usuario_id`, `conteudo`, `lido`, `created`, `modified`) VALUES
(1, 2, 3, 'Dummy text is also used to demonstrate the appearance of different typefaces and layouts, and in general the content of dummy text is nonsensical. Due to its widespread use as filler text for layouts, non-readability is of great importance: human perception is tuned to recognize certain patterns and repetitions in texts. If the distribution of letters and \'words\' is random, the reader will not be distracted from making a neutral judgement on the visual impact and readability of the typefaces (typography), or the distribution of text on the page (layout or type area).', 1, '2018-03-28 11:39:02', '2018-03-28 11:39:02'),
(2, 2, 1, 'If the distribution of letters and \'words\' is random, the reader will not be distracted from making a neutral judgement on the visual impact and readability of the typefaces (typography), or the distribution of text on the page (layout or type area).', 1, '2018-03-28 11:39:49', '2018-03-28 11:39:49'),
(3, 1, 1, 'If the distribution of letters and \'words\' is random, the reader will not be distracted from making a neutral judgement on the visual impact and readability of the typefaces (typography), or the distribution of text on the page (layout or type area).', 1, '2018-03-28 11:40:02', '2018-03-28 11:40:02'),
(4, 2, 3, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! \"Now fax quiz Jack!\" my brave ghost pled. Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box. Quick brown dogs jump over the lazy fox. The jay, pig, fox, zebra, and my wolves quack! Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch \"Jeopardy!\", Alex Trebek\'s fun TV quiz game.', 1, '2018-04-02 10:00:08', '2018-04-02 10:00:08'),
(5, 1, 1, 'It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather.', 1, '2018-04-02 11:56:37', '2018-04-02 11:56:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivos`
--

CREATE TABLE `motivos` (
  `id` int(11) NOT NULL,
  `motivo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `motivos`
--

INSERT INTO `motivos` (`id`, `motivo`) VALUES
(1, 'Problemas no trabalho'),
(2, 'Dificuldade de ambientação'),
(3, 'Luto'),
(4, 'Problemas de saúde'),
(5, 'Problemas interpessoais'),
(6, 'Problemas pessoais'),
(7, 'Visita técnica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivos_solicitacoes`
--

CREATE TABLE `motivos_solicitacoes` (
  `id` int(11) NOT NULL,
  `solicitacao_id` int(11) NOT NULL,
  `motivo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `motivos_solicitacoes`
--

INSERT INTO `motivos_solicitacoes` (`id`, `solicitacao_id`, `motivo_id`) VALUES
(1, 2, 2),
(5, 3, 6),
(6, 3, 5),
(7, 4, 2),
(8, 4, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `descricao` mediumtext NOT NULL,
  `motivo_outros` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `fechado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `solicitacoes`
--

INSERT INTO `solicitacoes` (`id`, `usuario_id`, `descricao`, `motivo_outros`, `created`, `modified`, `fechado`) VALUES
(1, 2, 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es.Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. ', '', '2018-03-28 11:35:46', '2018-03-28 11:35:46', 0),
(2, 3, 'Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill text\'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a \'ready-made\' text to sing with the melody. Dummy texts have been in use by typesetters since the 16th century.', '', '2018-03-28 11:38:46', '2018-03-28 11:38:46', 0),
(3, 4, 'It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer.', '', '2018-04-02 10:02:47', '2018-04-02 10:02:47', 0),
(4, 2, 'teste', '', '2018-05-02 11:18:19', '2018-05-02 11:18:19', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(10) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `estado_civil` varchar(20) NOT NULL,
  `setor` varchar(10) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `realizou_atendimento_psicologico` tinyint(4) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `psicologo` tinyint(4) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `data_nascimento`, `matricula`, `email`, `telefone`, `sexo`, `estado_civil`, `setor`, `cargo`, `realizou_atendimento_psicologico`, `admin`, `psicologo`, `created`) VALUES
(1, 'Athos Hounsell', '$2a$10$iAt6/m7sk4G0kDfqfA64YuGoMYkcW7RwyFH/SCAeNjZF/EXS4nn1C', '1999-03-08', '111111', 'athos2@athos212.com', '1234567890', 'm', 'solteiro', '111111', 'psicologo', 1, 1, 1, '2018-03-28 11:33:13'),
(2, 'Athos Almeida', '$2a$10$74XMAXJynfTwlVFxgERx/.zbwUfDCzobrVVyTT5V5TtV1YijluVje', '1988-12-31', '222222', 'athos2@athos2', '1234567892', 'm', 'solteiro', 'DTI', 'desenvolvedor de sistemas', 1, 0, 0, '2018-03-28 11:35:13'),
(3, 'Athos Tavares', '$2a$10$aeV.5vro7vreTlgYHTeSKe/xHQnn266.V4anh0POzZTUTk5J1YZYi', '1955-03-09', '333333', 'athos2@athos212.com', '1234567890', 'f', 'solteiro', 'DTI', 'estagiário', 1, 0, 0, '2018-03-28 11:38:04'),
(4, 'João Dias', '$2a$10$yLPdLIbRdpHYvrFupihIU.BYmoRi/90kgRVEEiN1tp.VmRmlCrcCS', '1980-02-02', '444444', 'athos2@athos212.com', '1111112141', 'm', 'solteiro', '111111', 'estagiário', 1, 0, 0, '2018-04-02 10:02:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_agendamentos_solicitacoes1_idx` (`solicitacao_id`),
  ADD KEY `fk_agendamentos_usuarios1_idx` (`usuario_id`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_table1_solicitacoes1_idx` (`solicitacao_id`),
  ADD KEY `fk_table1_usuarios1_idx` (`usuario_id`);

--
-- Indexes for table `motivos`
--
ALTER TABLE `motivos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motivos_solicitacoes`
--
ALTER TABLE `motivos_solicitacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_motivos_solitacoes_solicitacoes1_idx` (`solicitacao_id`),
  ADD KEY `fk_motivos_solitacoes_motivos1_idx` (`motivo_id`);

--
-- Indexes for table `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_solicitacoes_usuarios_idx` (`usuario_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula_UNIQUE` (`matricula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `motivos`
--
ALTER TABLE `motivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `motivos_solicitacoes`
--
ALTER TABLE `motivos_solicitacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `fk_agendamentos_solicitacoes1` FOREIGN KEY (`solicitacao_id`) REFERENCES `solicitacoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_agendamentos_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `fk_table1_solicitacoes1` FOREIGN KEY (`solicitacao_id`) REFERENCES `solicitacoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `motivos_solicitacoes`
--
ALTER TABLE `motivos_solicitacoes`
  ADD CONSTRAINT `fk_motivos_solitacoes_motivos1` FOREIGN KEY (`motivo_id`) REFERENCES `motivos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_motivos_solitacoes_solicitacoes1` FOREIGN KEY (`solicitacao_id`) REFERENCES `solicitacoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD CONSTRAINT `fk_solicitacoes_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
