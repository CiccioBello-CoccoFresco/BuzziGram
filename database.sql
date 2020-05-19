CREATE DATABASE Buzzigram;

USE Buzzigram;

CREATE TABLE Classe(
    id int(3) AUTO_INCREMENT PRIMARY KEY,
    anno tinyint NOT NULL,
    sezione varchar(2) NOT NULL,
    anno_scolastico char(5) NOT NULL 
);
--esempio 19/20
CREATE TABLE Studente(
   matricola int(5) AUTO_INCREMENT PRIMARY KEY,
   nome varchar(32) NOT NULL,
   cognome varchar(32) NOT NULL,
   classe int(3) NOT NULL,
   rap boolean,
   FOREIGN KEY (classe) REFERENCES Classe(id)
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