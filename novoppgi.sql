-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 09-Dez-2016 às 23:46
-- Versão do servidor: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novoppgi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_afastamentos`
--

CREATE TABLE `j17_afastamentos` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nomeusuario` varchar(60) NOT NULL,
  `emailusuario` varchar(60) NOT NULL,
  `local` varchar(40) NOT NULL,
  `tipo` smallint(6) NOT NULL,
  `datasaida` date NOT NULL,
  `dataretorno` date NOT NULL,
  `justificativa` longtext NOT NULL,
  `dataenvio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reposicao` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_aluno`
--

CREATE TABLE `j17_aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) CHARACTER SET utf8 NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(40) CHARACTER SET utf8 NOT NULL,
  `matricula` varchar(15) CHARACTER SET utf8 NOT NULL,
  `area` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `endereco` varchar(160) CHARACTER SET utf8 DEFAULT NULL,
  `bairro` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cidade` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `uf` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `cep` varchar(9) CHARACTER SET utf8 DEFAULT NULL,
  `datanascimento` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `sexo` char(1) CHARACTER SET utf8 DEFAULT NULL,
  `nacionalidade` int(11) DEFAULT NULL,
  `estadocivil` varchar(15) CHARACTER SET utf8 NOT NULL,
  `cpf` varchar(14) CHARACTER SET utf8 NOT NULL,
  `rg` varchar(10) CHARACTER SET utf8 NOT NULL,
  `orgaoexpeditor` varchar(10) CHARACTER SET utf8 NOT NULL,
  `dataexpedicao` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `telresidencial` varchar(18) CHARACTER SET utf8 DEFAULT NULL,
  `telcomercial` varchar(18) CHARACTER SET utf8 DEFAULT NULL,
  `telcelular` varchar(18) CHARACTER SET utf8 DEFAULT NULL,
  `nomepai` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `nomemae` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `regime` int(11) DEFAULT NULL,
  `bolsista` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `financiadorbolsa` varchar(45) DEFAULT NULL,
  `dataimplementacaobolsa` date DEFAULT NULL,
  `agencia` varchar(30) CHARACTER SET utf8 NOT NULL,
  `pais` varchar(30) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `dataingresso` date NOT NULL,
  `idiomaExameProf` varchar(20) DEFAULT NULL,
  `conceitoExameProf` varchar(9) DEFAULT NULL,
  `dataExameProf` varchar(10) DEFAULT NULL,
  `tituloQual2` varchar(180) DEFAULT NULL,
  `dataQual2` varchar(10) DEFAULT NULL,
  `conceitoQual2` varchar(9) DEFAULT NULL,
  `tituloTese` varchar(180) DEFAULT NULL,
  `dataTese` varchar(10) DEFAULT NULL,
  `conceitoTese` varchar(9) DEFAULT NULL,
  `horarioQual2` varchar(10) DEFAULT NULL,
  `localQual2` varchar(100) DEFAULT NULL,
  `resumoQual2` text NOT NULL,
  `horarioTese` varchar(10) DEFAULT NULL,
  `localTese` varchar(100) DEFAULT NULL,
  `resumoTese` text NOT NULL,
  `tituloQual1` varchar(180) DEFAULT NULL,
  `numDefesa` int(11) DEFAULT NULL,
  `dataQual1` varchar(10) DEFAULT NULL,
  `examinadorQual1` varchar(60) DEFAULT NULL,
  `conceitoQual1` varchar(9) DEFAULT NULL,
  `cursograd` varchar(100) DEFAULT NULL,
  `instituicaograd` varchar(100) DEFAULT NULL,
  `crgrad` varchar(10) DEFAULT NULL,
  `egressograd` int(11) DEFAULT NULL,
  `dataformaturagrad` varchar(10) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `orientador` int(11) NOT NULL,
  `anoconclusao` date NOT NULL,
  `sede` varchar(2) NOT NULL DEFAULT 'AM'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_banca_has_membrosbanca`
--

CREATE TABLE `j17_banca_has_membrosbanca` (
  `banca_id` int(11) NOT NULL,
  `membrosbanca_id` int(11) NOT NULL,
  `funcao` text,
  `passagem` char(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_candidatos`
--

CREATE TABLE `j17_candidatos` (
  `id` bigint(20) NOT NULL,
  `posicaoEdital` smallint(6) NOT NULL,
  `idEdital` varchar(20) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `inicio` datetime DEFAULT NULL,
  `fim` datetime DEFAULT NULL,
  `passoatual` int(1) NOT NULL DEFAULT '0',
  `nome` varchar(60) DEFAULT '',
  `nomesocial` varchar(60) DEFAULT NULL,
  `endereco` varchar(160) DEFAULT '',
  `bairro` varchar(50) DEFAULT '',
  `cidade` varchar(40) DEFAULT '',
  `uf` varchar(2) DEFAULT '',
  `cep` varchar(9) DEFAULT '',
  `email` varchar(50) DEFAULT NULL,
  `datanascimento` varchar(10) DEFAULT NULL,
  `nacionalidade` int(11) DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `passaporte` varchar(20) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT '',
  `sexo` char(1) DEFAULT '',
  `telresidencial` varchar(18) DEFAULT NULL,
  `telcelular` varchar(18) DEFAULT NULL,
  `cursodesejado` int(11) DEFAULT NULL,
  `regime` int(11) DEFAULT NULL,
  `inscricaoposcomp` varchar(20) DEFAULT '',
  `anoposcomp` int(11) DEFAULT NULL,
  `notaposcomp` varchar(5) DEFAULT '',
  `solicitabolsa` char(1) DEFAULT NULL,
  `tituloproposta` varchar(100) DEFAULT NULL,
  `cartaorientador` longtext,
  `motivos` longtext,
  `proposta` longtext,
  `curriculum` longtext,
  `comprovantepagamento` longtext,
  `cursograd` varchar(50) DEFAULT NULL,
  `instituicaograd` varchar(50) DEFAULT NULL,
  `egressograd` int(11) DEFAULT NULL,
  `dataformaturagrad` varchar(10) DEFAULT NULL,
  `cursopos` varchar(50) DEFAULT NULL,
  `instituicaopos` varchar(50) DEFAULT NULL,
  `tipopos` int(11) DEFAULT NULL,
  `egressopos` int(11) DEFAULT NULL,
  `dataformaturapos` varchar(10) DEFAULT NULL,
  `periodicosinternacionais` int(11) DEFAULT NULL,
  `periodicosnacionais` int(11) DEFAULT NULL,
  `conferenciasinternacionais` int(11) DEFAULT NULL,
  `conferenciasnacionais` int(11) DEFAULT NULL,
  `resultado` int(11) DEFAULT NULL,
  `periodo` varchar(10) NOT NULL,
  `cotas` char(1) NOT NULL DEFAULT '0',
  `cotaTipo` varchar(10) DEFAULT NULL,
  `deficiencia` char(1) DEFAULT NULL,
  `deficienciaTipo` varchar(20) NOT NULL,
  `status` smallint(6) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `idLinhaPesquisa` int(20) DEFAULT NULL,
  `declaracao` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_candidato_experiencia_academica`
--

CREATE TABLE `j17_candidato_experiencia_academica` (
  `id` bigint(20) NOT NULL,
  `idCandidato` bigint(20) NOT NULL,
  `instituicao` varchar(30) NOT NULL,
  `atividade` varchar(30) DEFAULT NULL,
  `periodo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_candidato_publicacoes`
--

CREATE TABLE `j17_candidato_publicacoes` (
  `id` int(11) NOT NULL,
  `idCandidato` bigint(20) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `ano` int(4) NOT NULL,
  `local` varchar(300) NOT NULL,
  `tipo` smallint(1) NOT NULL,
  `natureza` varchar(100) NOT NULL,
  `autores` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_contproj_agencias`
--

CREATE TABLE `j17_contproj_agencias` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `sigla` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_contproj_bancos`
--

CREATE TABLE `j17_contproj_bancos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(5) DEFAULT NULL,
  `nome` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_contproj_despesas`
--

CREATE TABLE `j17_contproj_despesas` (
  `id` int(11) NOT NULL,
  `rubricasdeprojetos_id` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `valor_despesa` double NOT NULL,
  `tipo_pessoa` varchar(11) NOT NULL,
  `data_emissao` date NOT NULL,
  `ident_nf` varchar(100) NOT NULL,
  `nf` varchar(100) NOT NULL,
  `ident_cheque` varchar(70) NOT NULL,
  `data_emissao_cheque` date NOT NULL,
  `valor_cheque` double NOT NULL,
  `favorecido` varchar(150) NOT NULL,
  `cnpj_cpf` varchar(20) NOT NULL,
  `comprovante` varchar(200) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_unitario` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_contproj_projetos`
--

CREATE TABLE `j17_contproj_projetos` (
  `id` int(11) NOT NULL,
  `nomeprojeto` varchar(200) NOT NULL,
  `orcamento` double NOT NULL DEFAULT '0',
  `saldo` double NOT NULL DEFAULT '0',
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `data_fim_alterada` date NOT NULL DEFAULT '0000-00-00',
  `coordenador_id` int(11) NOT NULL,
  `agencia_id` int(11) NOT NULL,
  `banco_id` int(11) NOT NULL,
  `agencia` varchar(11) NOT NULL,
  `conta` varchar(11) NOT NULL,
  `edital` varchar(150) NOT NULL,
  `proposta` varchar(200) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_contproj_prorrogacoes`
--

CREATE TABLE `j17_contproj_prorrogacoes` (
  `id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `data_fim_alterada` date NOT NULL,
  `descricao` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_contproj_receitas`
--

CREATE TABLE `j17_contproj_receitas` (
  `id` int(11) NOT NULL,
  `rubricasdeprojetos_id` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `valor_receita` double NOT NULL,
  `data` date NOT NULL,
  `ordem_bancaria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_contproj_registradatas`
--

CREATE TABLE `j17_contproj_registradatas` (
  `id` int(11) NOT NULL,
  `evento` varchar(150) NOT NULL,
  `data` date NOT NULL,
  `projeto_id` int(5) NOT NULL,
  `observacao` varchar(200) NOT NULL,
  `tipo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_contproj_rubricas`
--

CREATE TABLE `j17_contproj_rubricas` (
  `id` int(11) NOT NULL,
  `codigo` varchar(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_contproj_rubricasdeprojetos`
--

CREATE TABLE `j17_contproj_rubricasdeprojetos` (
  `id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `rubrica_id` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `valor_total` double NOT NULL,
  `valor_gasto` double NOT NULL,
  `valor_disponivel` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_contproj_transferenciassaldorubricas`
--

CREATE TABLE `j17_contproj_transferenciassaldorubricas` (
  `id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `rubrica_origem` int(11) NOT NULL,
  `rubrica_destino` int(11) NOT NULL,
  `valor` double NOT NULL,
  `data` date NOT NULL,
  `autorizacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_defesa`
--

CREATE TABLE `j17_defesa` (
  `idDefesa` int(11) NOT NULL,
  `titulo` varchar(180) DEFAULT NULL,
  `tipoDefesa` char(2) DEFAULT NULL,
  `data` varchar(10) DEFAULT NULL,
  `conceito` varchar(9) DEFAULT NULL,
  `horario` varchar(10) DEFAULT NULL,
  `local` varchar(100) DEFAULT NULL,
  `resumo` text NOT NULL,
  `numDefesa` int(11) DEFAULT NULL,
  `examinador` text,
  `emailExaminador` text,
  `reservas_id` int(10) DEFAULT NULL,
  `banca_id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `previa` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `justificativa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_edital`
--

CREATE TABLE `j17_edital` (
  `numero` varchar(20) CHARACTER SET utf8 NOT NULL,
  `vagas_doutorado` smallint(11) DEFAULT NULL,
  `cotas_doutorado` smallint(11) DEFAULT NULL,
  `cartaorientador` char(1) NOT NULL,
  `vagas_mestrado` smallint(11) DEFAULT NULL,
  `cotas_mestrado` smallint(11) DEFAULT NULL,
  `cartarecomendacao` char(1) NOT NULL,
  `datainicio` date NOT NULL,
  `datafim` date NOT NULL,
  `documento` varchar(300) NOT NULL,
  `curso` char(1) NOT NULL,
  `datacriacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` smallint(6) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_ferias`
--

CREATE TABLE `j17_ferias` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nomeusuario` varchar(60) NOT NULL,
  `emailusuario` varchar(60) NOT NULL,
  `tipo` smallint(6) NOT NULL,
  `dataSaida` date NOT NULL,
  `dataRetorno` date NOT NULL,
  `dataPedido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_linhaspesquisa`
--

CREATE TABLE `j17_linhaspesquisa` (
  `id` int(20) NOT NULL,
  `nome` varchar(60) NOT NULL DEFAULT '',
  `icone` varchar(20) DEFAULT NULL,
  `sigla` varchar(20) NOT NULL,
  `cor` char(7) DEFAULT NULL,
  `descricao` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_lista_alunos`
--

CREATE TABLE `j17_lista_alunos` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `curso` varchar(5) NOT NULL,
  `anoIngresso` int(11) NOT NULL,
  `anoEvasao` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `ultimaAtualizacao` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Status -> 0 (matriculado) e 1 (formado)';

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_membrosbanca`
--

CREATE TABLE `j17_membrosbanca` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `filiacao` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idProfessor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_oferta_disciplinas`
--

CREATE TABLE `j17_oferta_disciplinas` (
  `id` int(11) NOT NULL,
  `idRH` int(11) NOT NULL,
  `codDisciplina` varchar(10) NOT NULL,
  `codTurma` varchar(10) NOT NULL,
  `dia` smallint(1) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `horaInicio` int(11) DEFAULT NULL,
  `horaFim` int(11) DEFAULT NULL,
  `creditos` int(11) NOT NULL,
  `semestre` smallint(6) NOT NULL,
  `ano` int(11) NOT NULL,
  `vagasOferecidas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_orientacoes`
--

CREATE TABLE `j17_orientacoes` (
  `id` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `aluno` varchar(100) NOT NULL,
  `ano` int(4) NOT NULL,
  `natureza` varchar(100) DEFAULT NULL,
  `tipo` smallint(1) NOT NULL,
  `status` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='- Tipo (1 - Graduação, 2 - Mestrado, 3 - Doutorado) - Status (1 - Em Andamento, ';

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_portaria`
--

CREATE TABLE `j17_portaria` (
  `id` int(11) NOT NULL,
  `responsavel` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `data` date NOT NULL,
  `documento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_premios`
--

CREATE TABLE `j17_premios` (
  `id` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `entidade` varchar(200) NOT NULL,
  `ano` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_projetos`
--

CREATE TABLE `j17_projetos` (
  `id` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `descricao` text NOT NULL,
  `inicio` int(4) NOT NULL,
  `fim` int(4) DEFAULT NULL,
  `papel` varchar(15) NOT NULL,
  `financiadores` varchar(500) NOT NULL,
  `integrantes` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_prorrogacoes`
--

CREATE TABLE `j17_prorrogacoes` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `dataSolicitacao` date NOT NULL,
  `dataInicio` date NOT NULL,
  `qtdDias` int(11) NOT NULL,
  `documento` text NOT NULL,
  `justificativa` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_publicacoes`
--

CREATE TABLE `j17_publicacoes` (
  `id` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `ano` int(4) NOT NULL,
  `local` varchar(300) DEFAULT NULL,
  `tipo` smallint(1) NOT NULL,
  `natureza` varchar(10) DEFAULT NULL,
  `autores` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_recomendacoes`
--

CREATE TABLE `j17_recomendacoes` (
  `id` int(11) NOT NULL,
  `dataEnvio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dataResposta` datetime NOT NULL,
  `prazo` date NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(50) NOT NULL,
  `titulacao` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `instituicaoTitulacao` varchar(100) NOT NULL,
  `anoTitulacao` int(11) DEFAULT NULL,
  `instituicaoAtual` varchar(100) NOT NULL,
  `dominio` smallint(6) NOT NULL,
  `aprendizado` smallint(6) NOT NULL,
  `assiduidade` smallint(6) NOT NULL,
  `relacionamento` smallint(6) NOT NULL,
  `iniciativa` smallint(6) NOT NULL,
  `expressao` smallint(6) NOT NULL,
  `classificacao` float NOT NULL,
  `informacoes` text NOT NULL,
  `anoContato` smallint(6) DEFAULT NULL,
  `conheceGraduacao` smallint(6) NOT NULL DEFAULT '0',
  `conhecePos` smallint(6) NOT NULL DEFAULT '0',
  `conheceEmpresa` smallint(6) NOT NULL DEFAULT '0',
  `conheceOutros` smallint(6) NOT NULL DEFAULT '0',
  `outrosLugares` varchar(60) DEFAULT NULL,
  `orientador` smallint(6) NOT NULL DEFAULT '0',
  `professor` smallint(6) NOT NULL DEFAULT '0',
  `empregador` smallint(6) NOT NULL DEFAULT '0',
  `coordenador` smallint(6) NOT NULL DEFAULT '0',
  `colegaCurso` smallint(6) NOT NULL DEFAULT '0',
  `colegaTrabalho` smallint(6) NOT NULL DEFAULT '0',
  `outrosContatos` smallint(6) NOT NULL DEFAULT '0',
  `outrasFuncoes` varchar(60) DEFAULT NULL,
  `passo` char(1) NOT NULL DEFAULT '1',
  `idCandidato` bigint(20) NOT NULL,
  `edital_idEdital` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_reservas`
--

CREATE TABLE `j17_reservas` (
  `id` int(10) NOT NULL,
  `dataReserva` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sala` int(20) NOT NULL,
  `idSolicitante` int(10) NOT NULL,
  `atividade` varchar(50) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `dataInicio` date NOT NULL,
  `dataTermino` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaTermino` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_reservas_salas`
--

CREATE TABLE `j17_reservas_salas` (
  `id` int(10) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `numero` int(5) DEFAULT NULL,
  `localizacao` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_trancamentos`
--

CREATE TABLE `j17_trancamentos` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `dataSolicitacao` date NOT NULL,
  `dataInicio` date NOT NULL,
  `prevTermino` date NOT NULL,
  `dataTermino` date DEFAULT NULL,
  `justificativa` varchar(250) NOT NULL,
  `documento` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `j17_user`
--

CREATE TABLE `j17_user` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `visualizacao_candidatos` datetime NOT NULL,
  `visualizacao_candidatos_finalizados` datetime NOT NULL,
  `visualizacao_cartas_respondidas` datetime NOT NULL,
  `administrador` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coordenador` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `secretaria` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `professor` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aluno` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `siape` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dataIngresso` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telcelular` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telresidencial` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unidade` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulacao` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `classe` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nivel` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regime` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `turno` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idLattes` bigint(20) DEFAULT NULL,
  `formacao` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resumo` text COLLATE utf8_unicode_ci,
  `alias` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ultimaAtualizacao` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idRH` int(11) DEFAULT NULL,
  `cargo` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `j17_afastamentos`
--
ALTER TABLE `j17_afastamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_aluno`
--
ALTER TABLE `j17_aluno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orientador` (`orientador`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `j17_banca_has_membrosbanca`
--
ALTER TABLE `j17_banca_has_membrosbanca`
  ADD PRIMARY KEY (`banca_id`,`membrosbanca_id`),
  ADD KEY `fk_banca_membrobanca` (`membrosbanca_id`);

--
-- Indexes for table `j17_candidatos`
--
ALTER TABLE `j17_candidatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_j17_candidato_j17_idEdital_idx` (`idEdital`),
  ADD KEY `idLinhaPesquisa` (`idLinhaPesquisa`);

--
-- Indexes for table `j17_candidato_experiencia_academica`
--
ALTER TABLE `j17_candidato_experiencia_academica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCandidato` (`idCandidato`);

--
-- Indexes for table `j17_candidato_publicacoes`
--
ALTER TABLE `j17_candidato_publicacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_j17_candidato_publicacoes_j17_candidatos_idx` (`idCandidato`);

--
-- Indexes for table `j17_contproj_agencias`
--
ALTER TABLE `j17_contproj_agencias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_contproj_bancos`
--
ALTER TABLE `j17_contproj_bancos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_contproj_despesas`
--
ALTER TABLE `j17_contproj_despesas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_contproj_projetos`
--
ALTER TABLE `j17_contproj_projetos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomeprojeto` (`nomeprojeto`),
  ADD UNIQUE KEY `nomeprojeto_2` (`nomeprojeto`),
  ADD UNIQUE KEY `nomeprojeto_3` (`nomeprojeto`),
  ADD UNIQUE KEY `nomeprojeto_4` (`nomeprojeto`);

--
-- Indexes for table `j17_contproj_prorrogacoes`
--
ALTER TABLE `j17_contproj_prorrogacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projeto_id` (`projeto_id`);

--
-- Indexes for table `j17_contproj_receitas`
--
ALTER TABLE `j17_contproj_receitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_contproj_registradatas`
--
ALTER TABLE `j17_contproj_registradatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_contproj_rubricas`
--
ALTER TABLE `j17_contproj_rubricas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `j17_contproj_rubricasdeprojetos`
--
ALTER TABLE `j17_contproj_rubricasdeprojetos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_contproj_transferenciassaldorubricas`
--
ALTER TABLE `j17_contproj_transferenciassaldorubricas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_defesa`
--
ALTER TABLE `j17_defesa`
  ADD PRIMARY KEY (`idDefesa`),
  ADD KEY `banca_id` (`banca_id`);

--
-- Indexes for table `j17_edital`
--
ALTER TABLE `j17_edital`
  ADD PRIMARY KEY (`numero`);

--
-- Indexes for table `j17_ferias`
--
ALTER TABLE `j17_ferias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_linhaspesquisa`
--
ALTER TABLE `j17_linhaspesquisa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `j17_lista_alunos`
--
ALTER TABLE `j17_lista_alunos`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `j17_oferta_disciplinas`
--
ALTER TABLE `j17_oferta_disciplinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_orientacoes`
--
ALTER TABLE `j17_orientacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_portaria`
--
ALTER TABLE `j17_portaria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_premios`
--
ALTER TABLE `j17_premios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_prorrogacoes`
--
ALTER TABLE `j17_prorrogacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Indexes for table `j17_publicacoes`
--
ALTER TABLE `j17_publicacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_recomendacoes`
--
ALTER TABLE `j17_recomendacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_j17_recomendacoes_j17_candidatos1_idx` (`idCandidato`),
  ADD KEY `edital_idEdital` (`edital_idEdital`);

--
-- Indexes for table `j17_reservas`
--
ALTER TABLE `j17_reservas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_reservas_salas`
--
ALTER TABLE `j17_reservas_salas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j17_trancamentos`
--
ALTER TABLE `j17_trancamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Indexes for table `j17_user`
--
ALTER TABLE `j17_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `j17_afastamentos`
--
ALTER TABLE `j17_afastamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=569;
--
-- AUTO_INCREMENT for table `j17_aluno`
--
ALTER TABLE `j17_aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=717;
--
-- AUTO_INCREMENT for table `j17_candidatos`
--
ALTER TABLE `j17_candidatos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `j17_candidato_experiencia_academica`
--
ALTER TABLE `j17_candidato_experiencia_academica`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `j17_candidato_publicacoes`
--
ALTER TABLE `j17_candidato_publicacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT for table `j17_contproj_agencias`
--
ALTER TABLE `j17_contproj_agencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `j17_contproj_bancos`
--
ALTER TABLE `j17_contproj_bancos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `j17_contproj_despesas`
--
ALTER TABLE `j17_contproj_despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1073;
--
-- AUTO_INCREMENT for table `j17_contproj_projetos`
--
ALTER TABLE `j17_contproj_projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `j17_contproj_prorrogacoes`
--
ALTER TABLE `j17_contproj_prorrogacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `j17_contproj_receitas`
--
ALTER TABLE `j17_contproj_receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `j17_contproj_registradatas`
--
ALTER TABLE `j17_contproj_registradatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `j17_contproj_rubricas`
--
ALTER TABLE `j17_contproj_rubricas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `j17_contproj_rubricasdeprojetos`
--
ALTER TABLE `j17_contproj_rubricasdeprojetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT for table `j17_contproj_transferenciassaldorubricas`
--
ALTER TABLE `j17_contproj_transferenciassaldorubricas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `j17_ferias`
--
ALTER TABLE `j17_ferias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=423;
--
-- AUTO_INCREMENT for table `j17_linhaspesquisa`
--
ALTER TABLE `j17_linhaspesquisa`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `j17_oferta_disciplinas`
--
ALTER TABLE `j17_oferta_disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
--
-- AUTO_INCREMENT for table `j17_orientacoes`
--
ALTER TABLE `j17_orientacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3656;
--
-- AUTO_INCREMENT for table `j17_premios`
--
ALTER TABLE `j17_premios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=952;
--
-- AUTO_INCREMENT for table `j17_prorrogacoes`
--
ALTER TABLE `j17_prorrogacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `j17_publicacoes`
--
ALTER TABLE `j17_publicacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `j17_recomendacoes`
--
ALTER TABLE `j17_recomendacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `j17_reservas`
--
ALTER TABLE `j17_reservas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3412;
--
-- AUTO_INCREMENT for table `j17_reservas_salas`
--
ALTER TABLE `j17_reservas_salas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `j17_trancamentos`
--
ALTER TABLE `j17_trancamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `j17_user`
--
ALTER TABLE `j17_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `j17_aluno`
--
ALTER TABLE `j17_aluno`
  ADD CONSTRAINT `fk_aluno_iduser` FOREIGN KEY (`idUser`) REFERENCES `j17_user` (`id`),
  ADD CONSTRAINT `fk_aluno_orientador` FOREIGN KEY (`orientador`) REFERENCES `j17_user` (`id`);

--
-- Limitadores para a tabela `j17_candidatos`
--
ALTER TABLE `j17_candidatos`
  ADD CONSTRAINT `fk_j17_candidatos_idEdital` FOREIGN KEY (`idEdital`) REFERENCES `j17_edital` (`numero`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `j17_candidato_experiencia_academica`
--
ALTER TABLE `j17_candidato_experiencia_academica`
  ADD CONSTRAINT `fk_instituicao_idCandidato` FOREIGN KEY (`idCandidato`) REFERENCES `j17_candidatos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `j17_candidato_publicacoes`
--
ALTER TABLE `j17_candidato_publicacoes`
  ADD CONSTRAINT `fk_j17_candidato_publicacoes_j17_candidatos` FOREIGN KEY (`idCandidato`) REFERENCES `j17_candidatos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `j17_defesa`
--
ALTER TABLE `j17_defesa`
  ADD CONSTRAINT `fk_defesa_id_banca` FOREIGN KEY (`banca_id`) REFERENCES `j17_banca_has_membrosbanca` (`banca_id`);

--
-- Limitadores para a tabela `j17_prorrogacoes`
--
ALTER TABLE `j17_prorrogacoes`
  ADD CONSTRAINT `fk_prorrogacao_aluno` FOREIGN KEY (`idAluno`) REFERENCES `j17_aluno` (`id`);

--
-- Limitadores para a tabela `j17_recomendacoes`
--
ALTER TABLE `j17_recomendacoes`
  ADD CONSTRAINT `fk_j17_recomendacoes_j17_candidatos1` FOREIGN KEY (`idCandidato`) REFERENCES `j17_candidatos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_j17_recomendacoes_j17_edital_idEdital` FOREIGN KEY (`edital_idEdital`) REFERENCES `j17_edital` (`numero`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `j17_trancamentos`
--
ALTER TABLE `j17_trancamentos`
  ADD CONSTRAINT `fk_trancamento_aluno` FOREIGN KEY (`idAluno`) REFERENCES `j17_aluno` (`id`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `atualizaFinalizado` ON SCHEDULE EVERY 1 DAY STARTS '2016-09-29 19:05:44' ON COMPLETION PRESERVE ENABLE DO UPDATE j17_contproj_projetos SET status = 'Encerrado' WHERE data_fim_alterada < CURDATE()$$

CREATE DEFINER=`root`@`localhost` EVENT `atualizaIniciado` ON SCHEDULE EVERY 1 DAY STARTS '2016-09-29 19:05:14' ON COMPLETION PRESERVE ENABLE DO UPDATE j17_contproj_projetos SET status = 'Ativo' WHERE status != 'Ativo' AND data_inicio >= CURDATE()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
