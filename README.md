# blog-ecf
Squad : Clément,Marie-claude,Julien,Jérémy
trello squad : https://trello.com/b/PDCK1kZs


**userStories:** 
* 1.USER CASES - Utilisateur

En tant qu'utilisateur,
je veux pouvoir consulter mes postes
via l'index du site 
afin de consulter les posts existants.

* 2.USER CASES - Utilisateur

En tant qu'utilisateur, 
je veux pouvoir naviguer facilement au travers des posts les plus anciens à l'aide de la pagination
afin de pouvoir consulter les posts dans un ordre chronologique.

* 3.USER CASES - Utilisateur

En tant qu'utilisateur,
je veux pouvoir faire une recherche d'un ou plusieurs posts à l'aide de filtre(s)	
afin de cibler ma recherche.

* 4.USER CASES - Utilisateur

En tant qu'utilisateur,
je veux pouvoir consulter les posts via des pages dédiées selon la taxonomie employée	
afin de faciliter ma recherche.

* 5.USER CASES - Utilisateur

En tant qu'utilisateur, 
je veux pouvoir commenter des posts et les liker
afin d'émettre mon avis.

* 6.USER CASES- Administrateur

En tant qu'administrateur,
je veux pouvoir m'authentifier via un formulaire
afin d'avoir la main mise sur le blog et d'avoir plus de sécurité.

* 7.USER CASES- Administrateur

En tant qu'administrateur,
je veux pouvoir accéder directement à mon tableau de bord dès que je me connecte
afin consulter les commentaires et les valider.

* 8.USER CASES- Administrateur

En tant qu'administrateur,
je veux pouvoir me déconnecter à tout moment 
afin de pouvoir vaquer à mes occupations.

* 9.USER CASES- Administrateur

En tant qu'administrateur,
je veux pouvoir faire un CRUD de mes articles
afin d'être maitre de mon blog.

* 10.USER CASES- Administrateur

En tant qu'administrateur,
je veux pouvoir être modérateur
afin de valider et de publier les articles.

* 11.USER CASES- Administrateur

En tant qu'administrateur,
je veux pouvoir structurer le blog à l'aide de catégorie(s) et de tag(s) associés aux articles
afin d'aider l'utilisateur à filtrer ses recherches.

**Schéma base de données :** 
![alt text](https://trello-attachments.s3.amazonaws.com/60d91951bbfdff08d80e3e0b/60d9196508e4073dc4132568/fa3a4b7077340953aa99d47c08bddcf9/Capture_d%E2%80%99%C3%A9cran_(51).png)

**Arborescence du blog:**
![alt text](https://trello-attachments.s3.amazonaws.com/60d91951bbfdff08d80e3e0b/60da8c2f6cf94b843f392dfc/54f47614bd62548780ae35f290eb46ab/Capture_d%E2%80%99%C3%A9cran_(86).png)

### Spécificités Techniques :
Spécificité 
-----------

Nous avons décidé d'utilisé bootstrap pour faciliter le développement côté front-end pour livrer dans les délais.Du côté back-end nous utilisons le langage php en procédural, et nous testons chaque donnée reçu via un formulaire et aussi les données récupérer via l'url et nous redirigons s'il y a un probléme rencontré.

Structure de dossier
--------------------
- Pour la structure du dossier nous avons séparé les vues dans le dossier `views` et séparé en sous-dossier le côté administrateur dans `views/admin` et le côté formulaire dans `views/forms`.

- Dans le dossier `functions`, chaque sous dossier concerne une table de la bdd(e.g `functions/categories`) et dans chaque dossier se trouve un ou plusieurs fichiers comportant une/deux requêtes spécifique a la table.

- La connexion a la base de données est séparée dans un dossier `helper` comportant  un fichier `db-connect.php` qui est appelé en premier dans le fichier `index.php` qui se trouve a la racine du dossier project, ce qui permet de transmettre la connexion à tous les fichiers qui en ont besoin.

- Le fichier `index.php` est un "routeur" qui permet de rediriger l'utilisateur pour les diverses fonctionnalités et permet une convention de nommage pour les liens (e.g `href="index.php?target=post&action=update"`).

Cette structure a permis de bien séparer les fonctionnalités et de pouvoir travailler sereinement en groupe pour que chacun puisse travailler sur un fichier spécifique.
```
project
│   README.md
│   index.php    
│
└───functions
│   │   file011.txt
│   │   file012.txt
│   │
│   └───admin
│   |    │   admin.php
│   |    │   logout.php
│   |    
│   |
│   └─── categories
|   |       | getAllCategories.php
|   |       
|   |       
|   |
|   └────── comments
|   |         | createComments.php
|   |         | getAllComments.php
|   |
|   |
|   |
|   └────── mentions
|   |           | addLike.php
|   |           
|
|              
└───helper
|   │   db-connect.php
|
|
|
|
└───views
     |
     |
     |
     └───────── admin
     |            | adminComments.php
     |            | adminHome.php
     |
     |
     └───────── forms
     |           | createArticles.php
     |           | updateArticle.php
     |
     |
     | 404.php
     | archive.php
     | search.php
     | signInAdmin.php
     | singlePost.php
     | template.php
     | templateAdmin.php
```
