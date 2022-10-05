DROP TABLE IF EXISTS transaclot;
DROP TABLE IF EXISTS lot;
DROP TABLE IF EXISTS transacticket;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS MyGuests;



--Table de test
CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL);

--Table user #INSERT INTO user (id_user, mdp_user, tel_user, nom_user, prenom_user, mail_user, offrepub_user, condutil_user, argent_user, nbticket_user, sexe_user) VALUES ("", "mdp", "0123456789", "monnom", "monprenom", "monmail@mail.com", "1", "1", 12, 12,  "1");
CREATE TABLE `USER` (
  `id_user` int PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
  `mdp_user` varchar(64) NOT NULL,
  `tel_user` int(10) UNIQUE NOT NULL,
  `nom_user` varchar(32) NOT NULL,
  `prenom_user` varchar(64) NOT NULL,
  `mail_user` varchar(64) UNIQUE NOT NULL,
  `offrepub_user` varchar(1) NOT NULL,
  `condutil_user` varchar(1) NOT NULL,
  `argent_user` float DEFAULT 0 NOT NULL,
  `nbticket_user` int DEFAULT 0 NOT NULL,
  `sexe_user` varchar(1) DEFAULT NULL
);
--Table transacticket
CREATE TABLE TRANSACTICKET (
    id_transactik INT NOT NULL,
    id_user1 INT NOT NULL,
    id_user2 INT NOT NULL DEFAULT 0,
    nbticket_transactik INT NOT NULL,
    type_transactik INT NOT NULL,
    argent_transactik FLOAT DEFAULT 0,
    date_transacktik DATE,
PRIMARY KEY (id_transactik),
FOREIGN KEY (id_user1) REFERENCES USER(id_user),
FOREIGN KEY (id_user2) REFERENCES USER(id_user)
);
--Table lot # INSERT INTO `lot`(`id_lot`, `nom_lot`, `description_lot`, `datedébut_lot`, `datefin_lot`, `valeur_lot`, `argentenjeu_lot`, `ticketenjeu_lot`, `image_lot`, `completion_lot`) VALUES ('', 'nomlot', 'descrlot', '2022-03-14', '2022-03-15', 12, '', '', 'iùagechemin', '');
CREATE TABLE LOT (
    id_lot int PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
    nom_lot VARCHAR(255) NOT NULL,
    description_lot VARCHAR(1024) NOT NULL,
    datedébut_lot DATE,
    datefin_lot DATE,
    valeur_lot FLOAT DEFAULT 0 NOT NULL,
    argentenjeu_lot FLOAT DEFAULT 0 NOT NULL,
    ticketenjeu_lot BIGINT DEFAULT 0,
    image_lot VARCHAR(255),
    completion_lot FLOAT DEFAULT 0
    );

--Table transaclot
CREATE TABLE TRANSACLOT (
    id_transaclot INT NOT NULL,
    id_lot INT NOT NULL,
    id_user INT,
    nbticket_transaclot BIGINT,
    valeur_transaclot FLOAT,
    date_transaclot DATE,
    PRIMARY KEY (id_transaclot),
    FOREIGN KEY (id_lot) REFERENCES LOT (id_lot),
    FOREIGN KEY (id_user) REFERENCES USER (id_user));
