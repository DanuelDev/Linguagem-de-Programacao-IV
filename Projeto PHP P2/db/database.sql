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

-- -----------------------------------------------------
-- Valores iniciais de quartos
-- -----------------------------------------------------

INSERT INTO `ontelaria`.`quartos` (`numero`, `tipo`, `capacidade`, `preco_diaria`) VALUES ('1', 'suite', '3', '100.00');
INSERT INTO `ontelaria`.`quartos` (`numero`, `tipo`, `capacidade`, `preco_diaria`) VALUES ('2', 'suite', '3', '100.00');
INSERT INTO `ontelaria`.`quartos` (`numero`, `tipo`, `capacidade`, `preco_diaria`) VALUES ('3', 'luxotriplo', '4', '300.00');
INSERT INTO `ontelaria`.`quartos` (`numero`, `tipo`, `capacidade`, `preco_diaria`) VALUES ('4', 'luxotriplo', '4', '300.00');
INSERT INTO `ontelaria`.`quartos` (`numero`, `tipo`, `capacidade`, `preco_diaria`) VALUES ('5', 'luxoduplo', '4', '200.00');
INSERT INTO `ontelaria`.`quartos` (`numero`, `tipo`, `capacidade`, `preco_diaria`) VALUES ('6', 'luxoduplo', '4', '200.00');
INSERT INTO `ontelaria`.`quartos` (`numero`, `tipo`, `capacidade`, `preco_diaria`) VALUES ('7', 'luxocasal', '2', '50.00');
INSERT INTO `ontelaria`.`quartos` (`numero`, `tipo`, `capacidade`, `preco_diaria`) VALUES ('8', 'luxocasal', '2', '50.00');
INSERT INTO `ontelaria`.`quartos` (`numero`, `tipo`, `capacidade`, `preco_diaria`) VALUES ('9', 'suiteconjugada', '5', '600.00');
INSERT INTO `ontelaria`.`quartos` (`numero`, `tipo`, `capacidade`, `preco_diaria`) VALUES ('10', 'suiteconjugada', '5', '600.00');
INSERT INTO `ontelaria`.`quartos` (`numero`, `tipo`, `capacidade`, `preco_diaria`) VALUES ('11', 'apartamentomini', '6', '1000.00');
INSERT INTO `ontelaria`.`quartos` (`numero`, `tipo`, `capacidade`, `preco_diaria`) VALUES ('12', 'apartamentomini', '6', '1000.00');

INSERT INTO `ontelaria`.`funcionarios` (`nome`, `email`, `setor`, `cpf`, `senha`) VALUES ('Funcionário dos Santos', 'funcionario@email.com', 'Registro', '654894256', '$2y$10$/mN4DWqP8eEk0EHc3eQLJO94nZzVGkG0wSJKQF2V6P5keLcZ7Gvte');
