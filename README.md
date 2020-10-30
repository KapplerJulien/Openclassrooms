# Projet 5 Openclassrooms

## Contexte

Ce projet consiste en un blog, développé de a à z par moi-même (Kappler Julien) il permet de voir des articles, de s'inscrire en tant qu'auteur et donc de pouvoir créer modifier ou supprimer ses articles.
La partie administration est présente aussi car sur les articles, les personnes connectés peuvent écrire des commentaires. Donc l'administrateur est là pour valider ou refuser les commentaires.

## Récupération du code

Pour récupérer le code présent dans le git, au dessus du readme que vous être en train de lire, il y a les fichiers et dossiers, et juste au dessus à peine sur la droite, il y a un bouton "Code", cliquez dessus et vous pouvez télécharger le projet au format .ZIP

Si vous possédez git sur votre ordinateur et que vous voulez faire un git clone, je vous mets directement le lien ici : https://github.com/KapplerJulien/Openclassrooms.git. 

## Installation des logiciels pour le bon fonctionnement du site

Tout d'abord je vous préviens ici, ce tutoriel pour installer le site ne sera que pour la partie local (donc sur votre ordinateur) et fait avec le logiciel WAMPServer.
Téléchargeable ici : [WampServer](https://www.wampserver.com/).

Si tout se passe bien, lorsque vous lancez WAMPServer il y a un petit icône dans vos icônes en bas à droite, un W dans une case, si c'est vert, tout est ok, sinon je vous conseille de chercher votre erreur sur internet, il en existe beaucoup trop pour que je puisse tout vous expliquer ici.
Si tout est ok, faites un clic gauche sur l'icône de WAMPServer, regardez la version de PHP et retenez la. D'ailleurs, si jamais vous voulez la changer, mettez votre souris sur PHP, puis versions et selectionnez la version que vous souhaitez.

Après Wamp Server, on va avoir besoin de composer. Trouvable ici : [Composer](https://getcomposer.org/).

Composer va vous demander votre version de PHP, c'est pour cela que je vous ai demandé de la retenir.
Faites l'installation classique et tout se passera bien.

## Installation de la base de données

Ouvrez une page web et dans la barre de saisie d'adresse web, mettez "localhost". Je vous conseille de chercher sur internet comment forcer le passage par Localhost lorsque l'on rentre dans un projet, sinon vous allez devoir rentrer à chaque fois le mot "localhost" juste après "http:/".

Dans "Vos Alias" il y a phpmyadmin, cliquez dessus. 
Vous arrivez sur une page de connexion, normalement l'utilisateur de base c'est "root" et sans mot de passe.
On arrive sur vos base de données.
A gauche dans la liste de base de données vous avez un bouton "Nouvelle base de données" cliquez dessus.
Pour le nom : "bddp5Oc" et mettre en utf8_général_ci dans la liste déroulante à côté.

Si vous changez le nom de la base. Il faut changer aussi dans le fichier qui se situe dans le projet web, dans le dossier src/DAO et c'est le fichier DAO.php
ligne 9 -> "...dbname=bddp5Oc..." il faut changer le nom ici.

Une fois créée, vous tombez directement dans la base de données, dans le menu de navigation en haut, appuyez sur "Importer", vous faites le chemin jusque dans le projet web et la base de données se trouve dans le dossier config.
Et voilà la base de données est prête.

## Installation du site web

Récupérer le dossier qui contient tous les dossiers du site web.
Dans votre explorateur de fichier, allez dans "Ce PC", normalement si vous n'avez pas changé le chemin d'installation de WAMPServer, il doit être dans le disque principal, c'est à dire (C:).
Puis allez dans Wamp64 ou 32 tout dépend la version que vous avez pris. Puis dans www, vous mettez le projet.
Une fois mis ici, il suffit de retourner sur localhost dans votre page web. Puis il apparaitra dans "Vos projets", il suffira de cliquer dessus, puis de cliquer sur public.

## Test du site

Je vous mets à disposition les pseudos et mot de passe présent dans la base de données en tant que jeux d'essais, si jamais vous avez envie de tester.

Comptes utilisateurs test : 

Pseudo : MonteR  
Mdp : @ezoTi48  
Type : Auteur   

Pseudo : xibougta  
Mdp : test  
Type : Auteur  

Pseudo : MarteM  
Mdp : #feaO570  
Type : Administrateur  
