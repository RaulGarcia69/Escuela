create database IF NOT EXISTS curs;
use curs;

/* Creació de les taules*/ 


CREATE TABLE IF NOT EXISTS tbl_professor(
	id_professor int(5) NOT NULL AUTO_INCREMENT,
	nom_prof varchar (20) NOT NULL,
	cognom1_prof varchar (20) NULL,
	cognom2_prof varchar (20) NULL,
	email_prof varchar(50) NULL,
	telf varchar (5) NULL, /* Son les extensions, per exemple: 32256*/
	dept int(5) NOT NULL,
	constraint pk_professor PRIMARY KEY (id_professor)
);

CREATE TABLE IF NOT EXISTS tbl_classe (
	id_classe int(5) NOT NULL AUTO_INCREMENT,
	codi_classe varchar(5) NOT NULL,
	nom_classe varchar(60) NULL,
	tutor int(5) NULL,
	constraint pk_consta PRIMARY KEY (id_classe)
);

CREATE TABLE IF NOT EXISTS tbl_alumne(
	id_alumne int(10) NOT NULL AUTO_INCREMENT,
	dni_alu varchar(9) NULL,
	nom_alu varchar(20) NOT NULL,
	cognom1_alu varchar(20) NULL,
	cognom2_alu varchar(20) NULL,
	telf_alu varchar(9) NULL,
	email_alu varchar(50) NULL,
	classe int(5) NOT NULL,
	constraint pk_alumne PRIMARY KEY (id_alumne)
);

CREATE TABLE IF NOT EXISTS tbl_dept(
	id_dept int(5) NOT NULL AUTO_INCREMENT,
	codi_dept varchar(5) NOT NULL,
	nom_dept varchar(25) NULL,
	constraint pk_imparteix PRIMARY KEY (id_dept)
);

CREATE TABLE IF NOT EXISTS tbl_administradores(
	id_admin int(5) NOT NULL AUTO_INCREMENT,
	Nom_admin varchar(25) NOT NULL,
	Email_admin varchar(50) NOT NULL,
	Password_admin varchar(100) NOT NULL,
	constraint pk_admin PRIMARY KEY (id_admin)
);

CREATE TABLE IF NOT EXISTS tbl_secretaria(
	id_secr int(5) NOT NULL AUTO_INCREMENT,
	Nom_secr varchar(25) NOT NULL,
	Email_secr varchar(50) NOT NULL,
	Password_secr varchar(100) NOT NULL,
	constraint pk_secr PRIMARY KEY (id_secr)
);
/* Modificacions de les taules per cració de les FK*/

ALTER TABLE tbl_alumne
    ADD CONSTRAINT alumne_classe_fk FOREIGN KEY (classe)
    REFERENCES tbl_classe(id_classe);
	
ALTER TABLE tbl_classe
    ADD CONSTRAINT classe_prof_fk FOREIGN KEY (tutor)
    REFERENCES tbl_professor(id_professor);

ALTER TABLE tbl_professor
    ADD CONSTRAINT prof_dept_fk FOREIGN KEY (dept)
    REFERENCES tbl_dept(id_dept);

/*INSERTS*/
/*tbl_dept*/
INSERT INTO `tbl_dept`(`codi_dept`, `nom_dept`) VALUES ('IT','Informatica');
INSERT INTO `tbl_dept`(`codi_dept`, `nom_dept`) VALUES ('LEE','LenguaExtrangera');
INSERT INTO `tbl_dept`(`codi_dept`, `nom_dept`) VALUES ('CI','Ciencias');
INSERT INTO `tbl_dept`(`codi_dept`, `nom_dept`) VALUES ('LE','Lengua');

/*tbl_profesor*/

INSERT INTO `tbl_professor`(`nom_prof`, `cognom1_prof`, `cognom2_prof`, `email_prof`, `telf`, `dept`) 
VALUES ('Sergio','Jimenez','Rodrigez','Sergio@gmail.com',69257,1);

INSERT INTO `tbl_professor`(`nom_prof`, `cognom1_prof`, `cognom2_prof`, `email_prof`, `telf`, `dept`) 
VALUES ('Agnes','Plans','Gonzalez','Agnes@gmail.com',66347,2);

INSERT INTO `tbl_professor`(`nom_prof`, `cognom1_prof`, `cognom2_prof`, `email_prof`, `telf`, `dept`) 
VALUES ('Toni','Rios','Fernandez','Toni@gmail.com',19257,3);

INSERT INTO `tbl_professor`(`nom_prof`, `cognom1_prof`, `cognom2_prof`, `email_prof`, `telf`, `dept`) 
VALUES ('Ulises','Novo','Meme','ElULO@gmail.com',69257,4);

INSERT INTO `tbl_professor`(`nom_prof`, `cognom1_prof`, `cognom2_prof`, `email_prof`, `telf`, `dept`) 
VALUES ('Dani','Garcia','Rodriguez','Dani@gmail.com',39257,1);

INSERT INTO `tbl_professor`(`nom_prof`, `cognom1_prof`, `cognom2_prof`, `email_prof`, `telf`, `dept`) 
VALUES ('Edgar','Alan','Poe','Edgar@gmail.com',28257,2);

INSERT INTO `tbl_professor`(`nom_prof`, `cognom1_prof`, `cognom2_prof`, `email_prof`, `telf`, `dept`) 
VALUES ('Manolo','Gonzalez','Reves','ManoloPF@gmail.com',27957,3);

/*tbl_clase*/
INSERT INTO `tbl_classe`(`codi_classe`, `nom_classe`, `tutor`) VALUES ('SMX1','Sistemas_Microinformaticos_Y_Redes_1',1);
INSERT INTO `tbl_classe`(`codi_classe`, `nom_classe`, `tutor`) VALUES ('SMX2','Sistemas_Microinformaticos_Y_Redes_2',2);
INSERT INTO `tbl_classe`(`codi_classe`, `nom_classe`, `tutor`) VALUES ('ASIX1','Administracion_Sistemasinformaticos_Y_Redes_1',3);
INSERT INTO `tbl_classe`(`codi_classe`, `nom_classe`, `tutor`) VALUES ('ASIX2','Administracion_Sistemasinformaticos_Y_Redes_2',4);
INSERT INTO `tbl_classe`(`codi_classe`, `nom_classe`, `tutor`) VALUES ('BATX1','Bachillerato_1',5);
INSERT INTO `tbl_classe`(`codi_classe`, `nom_classe`, `tutor`) VALUES ('BATX2','Bachillerato_2',6);
INSERT INTO `tbl_classe`(`codi_classe`, `nom_classe`, `tutor`) VALUES ('DAW2','Desarrollo_Aplicaciones_Web_2',7);


/*tbl_alumne*/
INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('58463219M','Pepe','Jimenez','Paluedo',33516,'Pepe@gmail.com',1);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('58463749P','Manolin','Gundin','Gonzalez',32268,'Manolin@gmail.com',1);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('67463749L','Arnold','Swarzeneger','Buff','32221','Arnold@gmail.com',1);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('97463749A','Victor','Quesada','Garcia',32267,'Victor@gmail.com',1);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('87463749P','Willyrex','Equide','Lemao',32269,'Wiggeta@gmail.com',2);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('43913749P','Veggeta','Siete','Siete',32214,'Vegewilly@gmail.com',2);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('43913749P','Cali','Dandee','Rageton',32264,'ElDandeee@gmail.com',2);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('43996444S','Paula','Moana','Buenarda',32264,'Inmortalmoan@gmail.com',2);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('68996495S','Antonio','Rodriguez','Raval',32264,'Antonio@gmail.com',3);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('68996495S','Victor','Swarzeneger','Gonzalez',32286,'Victorino@gmail.com',3);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('98996495S','Pepe','Swarzeneger','Gonzalez',32686,'dwadwa@gmail.com',3);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('78996495S','Manuel','Pereido','Kalie',39286,'Manue@gmail.com',3);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('44496495S','Eloi','Andrer','Perdero',32646,'Xfagno@gmail.com',3);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('18996495S','Perla','Gutierrez','Pedrero',32676,'Perpe@gmail.com',4);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('31996495S','Chavo','Delocho','Luinde',32286,'coconut@gmail.com',4);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('37996495S','Manolin','Stufed','Perdido',32286,'Skia@gmail.com',4);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('68996495S','Lumber','Reves','Undine',32286,'Lopetd@gmail.com',4);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('68996495S','Keanu','Jones','Gonzalez',32286,'Lomnue@gmail.com',7);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('68996495S','Pedro','Miguel','Pedrero',32286,'Manilon@gmail.com',7);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('68996495S','Valori','Stromboli','Gonzalez',32286,'Victorino@gmail.com',5);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('13943895S','Vitorio','Chimichanga','Jimenez',31986,'NieR@gmail.com',5);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('68939495S','Twobe','Nines','Tails',32286,'Ancient@gmail.com',5);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('46739495S','Emil','Despair','Nier',32258,'Emil@gmail.com',5);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('46939495S','Nier','Dad','Youung',32648,'Emilioo@gmail.com',5);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('46739413S','Pepito','Garcia','Contreras',58691,'Pepito@gmail.com',5);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('46736995S','Anton','Redfield','Parker',32258,'Anton@gmail.com',6);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('91739495S','Chris','Redfield','Errepede',39458,'Chris@gmail.com',6);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('46739695S','Claire','Redfield','Errepede',59558,'Claire@gmail.com',6);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('39739495S','Leon','Smith','Kenedy',36258,'Leon@gmail.com',7);

INSERT INTO `tbl_alumne`( `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`) 
VALUES ('17739495S','Victor','Garcia','Pedrero',69258,'Victoririririro@gmail.com',7);

/*tbl_administradores*/
INSERT INTO `tbl_administradores`(`Nom_admin`, `Email_admin`,`Password_admin`) VALUES ('Pedro','Admin@gmail.com',MD5('qweQWE123'));

/*tbl_secretaria*/
INSERT INTO `tbl_secretaria`(`Nom_secr`,`Email_secr`,`Password_secr`) VALUES ('Manola','Manola@gmail.com',MD5('qweQWE123'));