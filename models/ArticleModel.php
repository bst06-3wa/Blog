<?php

namespace Models;

Class ArticleModel extends Database
{

    protected $errors = [];
    protected $valids = [];



    //CODE DE MATTHEW
    
    //Ajouter un article à la bdd
    private function addArticle()
    {
        $addArticle = [
            'addTitle' =>       '',
            'addBrand' =>       '',
            'addContent' =>     '',
            'addUserId' =>      '',
            'addStatus' =>      '',
            'addImage' =>       '',
        ];

        try
        {
            if(array_key_exists('title', $_POST))
            {

                $addArticle = [
                    'addTitle' =>       trim(ucfirst($_POST['title'])),
                    'addBrand' =>       trim(ucfirst($_POST['brand'])),
                    'addContent' =>     trim(ucfirst($_POST['content'])),
                    'addUserId' =>      $_Session['id_user'],     //On récupère l'id de user avec le $_Session
                    'addStatus' =>      0,      //Par défaut la valeur est 0, soit en attente de validation
                    'addImage' =>       '',
                ];

                //Ajouter si admin valide, passer le addStatus à 1

                //On vérifie que les input sont remplis
                if($addArticle['addTitle'] == '')
                    $errors[] = "Veuillez remplir le champ 'Titre' !";

                if($addArticle['addBrand'] == '')
                    $errors[] = "Veuillez remplir le champ 'Marque' !";

                if($addArticle['addContent'] == '')
                    $errors[] = "Veuillez remplir le champ 'Description' !";

                if(count($errors) == 0)
                {

                    //On vérifie que le titre n'est pas déjà présent dans la bdd
                    $sth = $this->bdd->prepare("SELECT title FROM articles WHERE title = :title");
                    $sth->bindValue('title', $addArticle['addTitle'], PDO::PARAM_STR);
                    $sth->execute();
                    $resultTitle = $sth->fetch(PDO::FETCH_ASSOC);

                    if(!empty($resultTitle))
                        $errors[] = "Cet article existe déjà !";
                    
                    if(count($errors) == 0)
                    {
                        //On upload l'image
                        if(isset($_FILES['image']) && $_FILES['image']['name'] != '')
                            $addArticle['addImage'] = uploadFile($_FILES['image'], $errors, UPLOADS_DIR);
                        
                        //On bind les values et on ajoute l'article dans la bdd
                        $sth = $dbh->prepare('INSERT INTO `articles`
                        ( `title`,
                        `brand`,
                        `content`,
                        `user_id`,
                        `status`,
                        `image`)
                        VALUES 
                        
                        (:title,
                        :brand,
                        :content,
                        :user_id, 
                        :status,
                        :image)');

                        $sth->bindValue('title', $addArticle['addTitle'], PDO::PARAM_STR);
                        $sth->bindValue('brand', $addArticle['addBrand'], PDO::PARAM_STR);
                        $sth->bindValue('content', $addArticle['addContent'], PDO::PARAM_STR);
                        $sth->bindValue('user_id', $addArticle['addUserId'], PDO::PARAM_STR);
                        $sth->bindValue('status', $addArticle['addStatus'], PDO::PARAM_STR);

                        $sth->bindvalue('image', $addArticle['addImage'], PDO::PARAM_STR);

                        $sth->execute();
                
                        $addArticle = [
                                'addTitle'       => '',
                                'addUndertitle'      => '',
                                'addDescription'          => '',
                                'addDate'       => '',
                                'addPrice'  => '',
                                'addImage'  => '',
                            ];
                         
                        $valids[] = 'Votre demande article a bien été enregistrée.';

                    }

                }  

            }

        }
        catch(PDOException $e)
        {
            $view = 'error';
            $errors[] = 'Une erreur de connexion a eu lieu :'.$e->getMessage();
        }
    }


    //CODE DE PAUL

    //Mettre a jour un article
    private function updateArticle()
    {
        if($_SESSION['role'])
        $updateArray = [];
        try{
            $updateTitle = trim(ucfirst($_POST["title"]));
            $updateBrand = trim(ucfirst($_POST["brand"]));
            $updateContent = trim(ucfirst($_POST["content"]));
            $updateStatus = $_POST["status"];
            $updateImage = "";

            
            $sth = $this->bdd->prepare('INSERT INTO
                articles
                    (
                       title,
                       brand,
                       content,
                       status,
                       image,
                    )
                VALUES
                    (
                        :title,
                        :brand,
                        :content,
                        :status,
                        :image
                    )
            ');

            $sth->bindValue('title',$updateTitle, PDO::PARAM_STR);
            $sth->bindValue('brand',$updateBrand, PDO::PARAM_STR);
            $sth->bindValue('content',$updateContent, PDO::PARAM_STR);
            $sth->bindValue('status',$updateStatus, PDO::PARAM_STR);
            $sth->bindValue('image',$updateImage, PDO::PARAM_STR);

            var_dump($sth);

            $sth->execute();

        }
        catch(PDOException $e){
            
        }
    }


}