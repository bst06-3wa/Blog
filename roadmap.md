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
    -> users : id_user(Clé étrangere) - firstname - lastname - role - email - password
    -> articles : id_article - title - content - user_id(Clé étrangere) - created_at - status - image
    -> comments : id_comment - content - user_id(Clé étrangere)

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

