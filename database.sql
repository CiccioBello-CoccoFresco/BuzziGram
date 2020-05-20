CREATE DATABASE Buzzigram;

USE Buzzigram;


CREATE TABLE Classe(
    id int(3) AUTO_INCREMENT PRIMARY KEY,
    anno tinyint NOT NULL,
    sezione varchar(2) NOT NULL,
    anno_scolastico char(5) NOT NULL 
);

CREATE TABLE Studente(
   matricola int(5) AUTO_INCREMENT PRIMARY KEY,
   nome varchar(32) NOT NULL,
   cognome varchar(32) NOT NULL
);

CREATE TABLE Frequenta(
    studente int(5),
    classe int(3),
    rap boolean,
    PRIMARY KEY(studente, classe),
    FOREIGN KEY (classe) REFERENCES Classe(id)
       ON UPDATE CASCADE
       ON DELETE RESTRICT,
    FOREIGN KEY (studente) REFERENCES Studente(matricola)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

CREATE TABLE Utente(
    id int(5) PRIMARY KEY,
    email varchar(32) not null UNIQUE,
    password char(32) not null,
    token char(32),
    FOREIGN KEY (id) REFERENCES Studente(matricola)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);


CREATE TABLE Immagine(
    id int(5) AUTO_INCREMENT UNIQUE,
    frase varchar(100),
    file blob NOT NULL,
    inserimento date NOT NULL,
    ultima_modifica date NOT NULL,
    studente int(5) NOT NULL,
    classe int(3) NOT NULL,
    PRIMARY KEY(studente, classe),
    FOREIGN KEY (studente) REFERENCES Studente(matricola)
       ON UPDATE CASCADE
       ON DELETE RESTRICT,
    FOREIGN KEY (classe) REFERENCES Classe(id)
       ON UPDATE CASCADE
       ON DELETE RESTRICT
);

INSERT INTO `classe` (`id`, `anno`, `sezione`, `anno_scolastico`) VALUES
(1, 1, 'A', '19/20'),
(2, 5, 'Q', '19/20'),
(3, 5, 'DS', '18/19'),
(4, 2, 'F', '17/18'),
(5, 5, 'H', '19/20'),
(6, 5, 'L', '19/20'),
(7, 5, 'C', '19/20'),
(8, 3, 'F', '19/20');

INSERT INTO `studente` (`matricola`, `nome`, `cognome`) VALUES
(1, 'prova', 'prova');

INSERT INTO `utente` (`id`, `email`, `password`, `token`) VALUES
(1, 'prova@prova.com', '189bbbb00c5f1fb7fba9ad9285f193d1', NULL);