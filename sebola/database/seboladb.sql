create database sebolaDB;
use sebolaDB;

-- ---------------------LIVROS--------------------------------------
CREATE TABLE livro(
	id_livro int primary key auto_increment,
    titulo varchar(60) NOT NULL,
    autor varchar(50) NOT NULL,
    data_publicacao varchar(10) NOT NULL,
    descricao text NOT NULL,
    categoria varchar(42) NOT NULL,
    preco int NOT NULL,
	isbn varchar(13),
    thumbnail varchar(120) NOT NULL
);
DELIMITER //
CREATE TRIGGER tradutor_categoria
BEFORE INSERT ON livro
FOR EACH ROW
BEGIN
    IF NEW.categoria = 'Fiction' THEN
        SET NEW.categoria = 'Ficção';
    ELSEIF NEW.categoria = 'Computers' THEN
        SET NEW.categoria = 'Computadores';
    ELSEIF NEW.categoria = 'Philosophy' THEN
        SET NEW.categoria = 'Filosofia';
    ELSEIF NEW.categoria = 'Psychology' THEN
        SET NEW.categoria = 'Psicologia';
    ELSEIF NEW.categoria = 'Juvenile Fiction' THEN
        SET NEW.categoria = 'Juvenil';
    END IF;
END;//
DELIMITER ;

select * FROM livro;
desc livro;

-- ------------------USUARIOS-----------------------------------

CREATE TABLE usuarios (
    id_usuarios INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    isAdmin boolean default false
);
desc usuarios;
select * from usuarios;
UPDATE usuarios SET isAdmin = TRUE WHERE id_usuarios = 1;


-- -------------------LISTA DE DESEJOS----------------------------------------

CREATE TABLE lista_desejo (
    id_usuarios INT,
    id_livro INT,
    PRIMARY KEY(id_usuarios, id_livro),
    FOREIGN KEY (id_usuarios) REFERENCES usuarios(id_usuarios),
    FOREIGN KEY (id_livro) REFERENCES livro(id_livro)
);

select * from lista_desejo;

-- ----------------------COMENTARIOS-------------------------------------

CREATE TABLE comentarios (
    id_comentario INT NOT NULL AUTO_INCREMENT,
    id_usuarios INT NOT NULL,
    id_livro INT NOT NULL,
    comentario TEXT,
    data_comentario TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_comentario),
    FOREIGN KEY (id_usuarios) REFERENCES usuarios(id_usuarios),
    FOREIGN KEY (id_livro) REFERENCES livro(id_livro)
);

select * from comentarios;
