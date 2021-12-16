#Développement du  projet:
-création de l'achitecture (format MVC) ✔
-création de la base de données
-création des différents models
-création des différents Controllers
-création de la partie front-end
-mise en place du Responsive


#Itération 1

-création de la BDD:
-> Tables:
    -> users : id - firstname - lastname - role - email - password 
    -> users_articles : id_user - id_article
    -> articles : id - title - content - author - created_at - status
    -> comments : content - id_user

-création du model User:
->méthods:
    -insertUser;
    -updateUser;
    -deleteUser;
    -selectAllUsers;
    -selectOneUser;
-création du model Article:
->méthod:
    -insertArticle;
    -updateArticle;
    -deleteArticle;
    -selectAllArticles;
    -selectOneArticle;

#Itération 2:

-création du Controller User
->méthods:
    -add();
    -connect();
    -update();
    -getAll();

-création du Controller Article
->méthods:
    -add();
    -update();
    -getAll();

#Itération 3 (bonus)
-Optimisation du Code
    -utilisation d'interfaces

