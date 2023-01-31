CREATE DATABASE testePratico;
USE testePratico;

CREATE TABLE tb_usuario(
    idUsuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    dataNascimento DATE NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    PRIMARY KEY(idUsuario)
);

SELECT * FROM tb_usuario;
