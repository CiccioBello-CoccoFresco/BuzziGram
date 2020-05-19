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
    rap bool,
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
    email varchar(32) not null,
    password char(32) not null,
    token char(32),
    FOREIGN KEY (id) REFERENCES Studente(matricola)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

CREATE TABLE Immagine(
    id int(5) AUTO_INCREMENT PRIMARY KEY,
    frase varchar(100),
    path varchar(32) NOT NULL,
    inserimento date NOT NULL,
    ultima_modifica date NOT NULL,
    studente int(5) NOT NULL,
    FOREIGN KEY (studente) REFERENCES Studente(matricola)
       ON UPDATE CASCADE
       ON DELETE RESTRICT
);