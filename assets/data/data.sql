create database MiniCaisseSupermarche;
use MiniCaisseSupermarche;

create table if not exists `categorie`(
  `Code_categorie` char(5) not null,
  `Nom_categorie` varchar(25) not null,
  primary key(`code_categorie`)
)engine = innodb default charset=latin1;



create table if not exists `produit`(
	`Ref_produit` char(3) not null,
	`Designation` varchar(50) not null,
	`Prix_Unitaire` int not null,
	`QuantiteStock` int not null,
	`Images` varchar(50) not null,
	`Code_categorie` char(5) not null,
	primary key(`Ref_produit`),
	foreign key(`Code_categorie`) references `categorie`(`Code_categorie`)
)engine = innodb default charset=latin1;



create table if not exists `achat`(
	`idAchat` int not null auto_increment,
	`Ref_produit` char(3) not null,
	`Quantite` int not null,
	`Prix_Total` int not null,
	primary key(`idAchat`),
	foreign key(`Ref_produit`) references `produit`(`Ref_produit`)
)engine = innodb default charset=latin1;



create table if not exists `caisse`(
	`NumCaisse` char(3) not null,
	`NomCaisse` varchar(40) not null
)engine = innodb default charset=latin1;



create table if not exists `payement`(
	`idPayement` int not null auto_increment,
	`idAchat` int not null,
	`NumCaisse` char(3) not null,
	`Date_Heure` datetime not null,
	primary key(`idPayement`),
	foreign key(`idAchat`) references `achat`(`idAchat`),
	foreign key(`NumCaisse`) references `caisse`(`NumCaisse`)
)default charset=latin1;




create table if not exists `administrateur`(
	`Login` varchar(30) not null,
	`MotDePasse` varchar(100) not null
)default charset=latin1;



insert into administrateur values('administrateur@gmail.com', sha1('admin'));


insert into categorie values('1001', 'Fourniture scolaire');
insert into categorie values('1002', 'Boissons');
insert into categorie values('1003', 'Boulangerie');


insert into produit values('001', 'Cahier', 15000, 200, 'cahier.jpg', '1001');
insert into produit values('002', 'Stylo', 3000, 500, 'stylo.jpg', '1001');
insert into produit values('003', 'Crayon', 100, 100, 'crayon.jpg', '1001');
insert into produit values('004', 'Cartable', 40000, 300, 'cartable.jpeg', '1001');
insert into produit values('005', 'Gomme', 500, 400, 'gomme.jpg', '1001');
insert into produit values('006', 'Coca cola', 4000, 500, 'coca.png', '1002');
insert into produit values('007', 'Fanta pomme', 4000, 600, 'fanta-pomme.jpg', '1002');
insert into produit values('008', 'Fanta ananana', 4000, 600, 'Fanta_ananas.jpg', '1002');
insert into produit values('009', 'Bière', 5000, 1000, 'thb.jpg', '1002');
insert into produit values('010', 'Limonade', 4000, 800, 'Bonbon-anglais.png', '1002');
insert into produit values('011', 'Pain au choco', 1500, 100, 'pain-au-choco.jpg', '1003');
insert into produit values('012', 'Croissant', 2000, 200, 'croissants.jpeg', '1003');
insert into produit values('013', 'Madelènne', 1000, 150, 'madelene.jpg', '1003');
insert into produit values('014', 'Pain au raisin', 3000, 100, 'pain_raisin.jpg', '1003');
insert into produit values('015', 'Pain de mie', 3000, 350, 'pain_de_mie.jpg', '1003');



insert into achat values(null, '004', 1, 40000);
insert into achat values(null, '007', 5, 20000);
insert into achat values(null, '011', 4, 6000);
insert into achat values(null, '002', 10, 30000);
insert into achat values(null, '014', 4, 12000);
insert into achat values(null, '008', 10, 40000);

insert into caisse values('101', 'Caisse 1');
insert into caisse values('102', 'Caisse 2');
insert into caisse values('103', 'Caisse 3');

insert into payement values(null, 1, '101', '2021-07-06 08:14:03');
insert into payement values(null, 2, '102', '2021-07-06 08:15:52');
insert into payement values(null, 3, '103', '2021-07-06 09:45:52');
insert into payement values(null, 4, '103', '2021-07-06 09:46:02');
insert into payement values(null, 5, '102', '2021-07-06 09:46:19');
insert into payement values(null, 6, '101', '2021-07-06 09:46:52');

create view v_produit as select
	categorie.Code_categorie,
	categorie.Nom_categorie,
	produit.Ref_produit,
	produit.Designation,
	produit.Prix_Unitaire,
	produit.QuantiteStock,
	produit.images,
	achat.Quantite,
	achat.Prix_Total,
	caisse.NumCaisse,
	caisse.NomCaisse,
	payement.Date_Heure

from caisse join payement on caisse.NumCaisse = payement.NumCaisse join achat on payement.idAchat = achat.idAchat join produit on 
achat.Ref_produit = produit.Ref_produit join categorie on produit.Code_categorie = categorie.Code_categorie ;

