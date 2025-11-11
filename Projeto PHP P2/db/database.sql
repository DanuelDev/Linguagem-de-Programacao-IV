CREATE SCHEMA IF NOT EXISTS ontelaria;
USE ontelaria;

CREATE TABLE hospedes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    telefone VARCHAR(20),
    cpf VARCHAR(14) UNIQUE,
    data_nascimento DATE,
    endereco TEXT,
    senha VARCHAR(100)
);

CREATE TABLE funcionarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    setor VARCHAR(50) NOT NULL,
    cpf VARCHAR(100) UNIQUE,
    senha VARCHAR(100)
);

CREATE TABLE admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    cpf VARCHAR(100) UNIQUE,
    senha VARCHAR(100)
);

CREATE TABLE quartos (
	id INT PRIMARY KEY AUTO_INCREMENT,
    hospede_id INT NOT NULL,
    numero VARCHAR(10) NOT NULL UNIQUE,
    tipo VARCHAR(50) NOT NULL,
    capacidade INT NOT NULL,
    preco_diaria DECIMAL(10, 2) NOT NULL,
    descricao TEXT,
    FOREIGN KEY (hospede_id) REFERENCES hospedes(id) ON DELETE CASCADE,
    status ENUM('disponivel', 'indisponivel', 'manutencao') DEFAULT 'disponivel'
);

CREATE TABLE reservas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    hospede_id INT NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE NOT NULL,
    status ENUM('pendente', 'confirmada', 'cancelada', 'concluida') DEFAULT 'pendente',
    valor_total DECIMAL(10,2),
    observacoes TEXT,
    FOREIGN KEY (hospede_id) REFERENCES hospedes(id) ON DELETE CASCADE,
    CHECK (data_fim > data_inicio)
);

CREATE TABLE estadias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    reserva_id INT NOT NULL,
    quarto_id INT NOT NULL,
    data_checkin DATETIME,
    data_checkout DATETIME,
    status ENUM('ativa', 'concluida', 'cancelada') DEFAULT 'ativa',
    valor_estadia DECIMAL(10,2),
    observacoes TEXT,
    FOREIGN KEY (reserva_id) REFERENCES reservas(id) ON DELETE CASCADE,
    FOREIGN KEY (quarto_id) REFERENCES quartos(id) ON DELETE RESTRICT
);