create database examen_1;

CREATE TABLE agence(
Id int NOT NULL,
ville varchar(50),
adresse varchar(150),
numéro_accueil varchar(20),
directeur_agence varchar(50)
) ; 
insert into agence values(1,"lille","5 rue louis","06.06.06.06.06","Mr Henri");
insert into agence values(2,"roubaix","7 allé pasteur","06.01.01.01.01","Mlle Rich");


CREATE TABLE conseiller(
Id int NOT NULL,
Nom  varchar(50),
prenom varchar(50),
age int not null,
annee_anciennete int,
nombre_client int 
) ;
Insert  into conseiller values (1,"Mop","Tim",45,2,4);
Insert  into conseiller values (2,"Pot","Léa",45,2,4);


CREATE TABLE client(
Id int NOT NULL,
Nom  varchar(50),
prenom varchar(50),
age int not null,
situation_familiale varchar(50),
annee_anciennete int,
numero_compte int not null
) ;
Insert into client values (1,"map","paul",62,"marié",40,123123);
Insert into client values (1,"map","Marie",60,"mariée",38,123124);


CREATE TABLE compte_client(
Id int NOT NULL,
numero_compte int not null,
type_comtpe varchar(50),
decouvert_autorise int,
type_carte varchar(50),
plafond_carte int
) ;
Insert into compte_client values (1, 123123,"epargne",0,"debit",5000);
Insert into compte_client values (2, 123124,"epargne",0,"debit",5000);

CREATE TABLE ligne_compte (
Id_transaction int NOT NULL,
Montant_transaction int not null,
Objet_transaction varchar(50),
Type_transaction varchar(50),
Autorise boolean
) ;

Insert into ligne_compte values (1,50,"zara","payement",true);
Insert into ligne_compte values (2,150,"virement de loyer","virement",true);
