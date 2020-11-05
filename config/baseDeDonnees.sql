-- Suppression des tables.
drop table if exists TypeUtilisateur;
drop table if exists Utilisateur;
drop table if exists Post;
drop table if exists EtatCommentaire;
drop table if exists Commentaire;


-- Création des tables.

create table TypeUtilisateur (
    IdTypeUtilisateur int not null auto_increment,
    NomTypeUtilisateur char(40) not null,
    primary key(IdTypeUtilisateur)
);

create table Utilisateur (
    IdUtilisateur int not null auto_increment,
    NomUtilisateur char(50) not null,
    PrenomUtilisateur char(50) not null,
    AdresseUtilisateur varchar(80) not null,
    Adresse2Utilisateur varchar(80) null,
    EtageUtilisateur varchar(10) null,
    NumBatimentUtilisateur varchar(10) null,
    CodePostaleUtilisateur int(5) not null,
    VilleUtilisateur varchar(50) not null,
    TelUtilisateur int not null,
    MailUtilisateur varchar(80) not null,
    VerifMailUtilisateur varchar(80) not null,
    PseudoUtilisateur varchar(20) not null,
    MdpUtilisateur varchar(200) not null,
    IdTypeUtilisateur int not null,
    primary key(IdUtilisateur),
    foreign key(IdTypeUtilisateur)
    references TypeUtilisateur(IdTypeUtilisateur)
);

create table Post (
    IdPost int not null auto_increment,
    NomPost varchar(50) not null,
    ChapoPost varchar(50) not null,
    ContenuPost varchar(500) not null,
    AuteurPost varchar(20) not null,
    DateCreationPost date not null,
    DateDerniereModifPost date not null,
    IdUtilisateur int not null,
    primary key(IdPost),
    foreign key(IdUtilisateur)
    references Utilisateur(IdUtilisateur)
);

create table EtatCommentaire (
    IdEtatCommentaire int not null auto_increment,
    NomEtatCommentaire char(50) not null,
    primary key(IdEtatCommentaire)
);

create table Commentaire (
    IdCommentaire int not null auto_increment,
    ContenuCommentaire varchar(500) not null,
    DateCommentaire date not null,
    IdEtatCommentaire int not null,
    IdUtilisateur int not null,
    IdPost int not null,
    primary key(IdCommentaire),
    foreign key(IdEtatCommentaire)
    references EtatCommentaire(IdEtatCommentaire),
    foreign key(IdUtilisateur)
    references Utilisateur(IdUtilisateur),
    foreign key(IdPost)
    references Post(IdPost)
);

-- Jeux d'essais

insert into TypeUtilisateur values (1,'Administrateur');
insert into TypeUtilisateur values (2,'Auteur');

-- mot de passe 
-- '@ezoTi48'
insert into Utilisateur values (1,'Monte','Richard','99 Avenue le roi', ' ', '8', 'B', 13000, 'Marseille', '0606060606', 'MonteR@gmail.com','Validé', 'MonteR', '$2y$10$jinr2UpNF6S6siADoC5ycO0xbFGtKskaf5JqZPuo.MiAodAPgvZeK', 2 );
-- '#feaO570'
insert into Utilisateur values (2,'Marte','Martin','Lotissement Juan', ' ', '','' , 75000, 'Paris', '0607070707', 'MarteM@gmail.com','Non validé' ,'MarteM', '$2y$10$jvXtj/.L2wglcOZlWmO0OOVBNPzzArN/3HHMh1Bb1nBwdrwYrUm2W', 1 );
-- 'test'
insert into Utilisateur values (3,'test','test','test', ' ', '','' , 75000, 'Paris', '0607070707', 'test@gmail.com','Non validé' ,'xibougta', '$2y$10$rX.g9UhjPCGTB9AzW5dYSu9YEAf5ZAvqAyt43hkmTnY35f.tRoDEK', 2 );

insert into Post values (1,'Post test', 'Post test', 'Juste pour tester la base de données', 'Blabla', '2020-05-15', '2020-05-15',1);
insert into Post values (2,'Post test2', 'Post test2', 'Juste pour tester la base de données2', 'Blabla2', '2020-05-18', '2020-05-18',3);

insert into EtatCommentaire values(1,'Validé');
insert into EtatCommentaire values(2,'Attente');
insert into EtatCommentaire values(3,'Refusé');

insert into Commentaire values(1,'Commentaire test','2020-05-16',1,1,1);
