CREATE TABLE users(
    id int NOT NULL AUTO_INCREMENT,
    usuario varchar(40),
    senha varchar(50),
    PRIMARY KEY (id)
);

CREATE TABLE paciente (
  idpaciente INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  telefone VARCHAR(45) NOT NULL,
  endereco VARCHAR(45) NULL,
  emissao DATE NOT NULL,
  statusp VARCHAR(45) NOT NULL,
  cpf VARCHAR(45) NOT NULL,
  cep VARCHAR(45) NULL,
  PRIMARY KEY (idpaciente)
);

CREATE TABLE atendimento (
  idatendimento INT NOT NULL AUTO_INCREMENT,
  emissao DATE NOT NULL,
  idpaciente INT NOT NULL,
  usuario VARCHAR(45) NULL,
  prontuario VARCHAR(45) NULL,
  descprontuario TEXT NOT NULL,
  PRIMARY KEY (idatendimento)
);
