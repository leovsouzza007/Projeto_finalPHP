-- CONFIGURAÇÃO INICIAL DO BANCO
CREATE DATABASE IF NOT EXISTS sistema_hotel
DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE sistema_hotel;

-- --------------------------------------------------------

-- TABELA DE QUARTOS
CREATE TABLE IF NOT EXISTS quartos (
  id int(11) PRIMARY KEY AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  descricao text NOT NULL,
  preco float NOT NULL,
  capacidade int(11) DEFAULT 2,
  status varchar(20) DEFAULT 'Disponível',
  data_criacao timestamp NOT NULL DEFAULT current_timestamp()
);

-- --------------------------------------------------------

-- TABELA DE USUÁRIOS
CREATE TABLE IF NOT EXISTS usuarios (
  id int(11) PRIMARY KEY AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  senha varchar(255) NOT NULL,
  data_criacao timestamp NOT NULL DEFAULT current_timestamp()
)

-- --------------------------------------------------------

-- TABELA DE FUNCIONÁRIOS
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(70) NOT NULL,
    email VARCHAR(70) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cargo ENUM('admin','funcionario') NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);