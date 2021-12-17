<?php

namespace Models;

Class ArticleModel extends Database
{

    protected $errors = [];
    protected $valids = [];

    // const BASE_DIR = realpath(dirname(__FILE__) . "/../");

    // const UPLOADS_DIR = BASE_DIR.'/uploads/';

    // const FILE_EXT_IMG = ['jpg','jpeg','gif','png'];

    // /** Déplace un fichier transmis dans un répertoire du serveur
    //  * @param $file contenu du tableau $_FILES à l'index du fichier à uploader
    //  * @param $errors la variable devant contenir les erreurs. Passage par référence ;)
    //  * @param $folder chemin absolue ou relatif où le fichier sera déplacé. Par default UPLOADS_DIR
    //  * @param $fileExtensions par defaut vaut FILE_EXT_IMG. un tableau d'extensions valident
    //  * @return array un tableau contenant les erreurs ou vide
    //  */
    // function uploadFile(array $file, array &$errors, string $folder = UPLOADS_DIR, array $fileExtensions = FILE_EXT_IMG)
    // {
    //     $filename = '';

    //     if ($file["error"] === UPLOAD_ERR_OK) {
    //         $tmpName = $file["tmp_name"];

    //         // On récupère l'extension du fichier pour vérifier si elle est dans  $fileExtensions
    //         $tmpNameArray = explode(".", $file["name"]);
    //         $tmpExt = end($tmpNameArray);
    //         if(in_array($tmpExt,$fileExtensions))
    //         {
    //             // basename() peut empêcher les attaques de système de fichiers en supprimant les éventuels répertoire dans le nom
    //             // la validation/assainissement supplémentaire du nom de fichier peut être appropriée
    //             // On donne un nouveau nom au fichier
    //             $filename = uniqid().'-'.basename($file["name"]);
    //             if(!move_uploaded_file($tmpName, $folder.$filename))
    //             {
    //                 $errors[] = 'Le fichier n\'a pas été enregistré correctement';
    //             }
    //         }
    //         else
    //             $errors[] = 'Ce type de fichier n\'est pas autorisé !';
    //     }
    //     else if($file["error"] == UPLOAD_ERR_INI_SIZE || $file["error"] == UPLOAD_ERR_FORM_SIZE) {
    //         //fichier trop volumineux
    //         $errors[] = 'Le fichier est trop volumineux';
    //     }
    //     else {
    //         $errors[] = 'Une erreur a eu lieu au moment de l\'upload';
    //     }

    //     return $filename;
    // }

    //CODE DE MATTHEW
    
    //Ajouter un article à la bdd
    public function addArticle($title, $content, $user_id, $image)
    {

        try
        {

                $addArticle = [
                    'addTitle' =>       trim(ucfirst($title)),
                    'addContent' =>     trim(ucfirst($content)),
                    'addImage' =>       $image,
                ];

                //Ajouter si admin valide, passer le addStatus à 1

                    //On vérifie que le titre n'est pas déjà présent dans la bdd
                    $sth = $this->bdd->prepare("SELECT title FROM articles WHERE title = :title");
                    $sth->bindValue('title', $addArticle['addTitle'], PDO::PARAM_STR);
                    $sth->execute();
                    $resultTitle = $sth->fetch(PDO::FETCH_ASSOC);

                    if(!empty($resultTitle))
                        $errors[] = "Cet article existe déjà !";
                    
                    if(count($errors) == 0)
                    {
                        
                        //On bind les values et on ajoute l'article dans la bdd
                        $sth = $this->bdd->prepare("INSERT INTO `articles`
                        (`id_article`,
                        `title`,
                        `content`,
                        `user_id`,
                        `created_at`,
                        `status`,
                        `image`)
                        VALUES 
                        
                        (NULL,
                        :title,
                        :content,
                        $user_id,
                        CURRENT_TIMESTAMP,
                        0,
                        :image)");

                        $sth->bindValue('title', $addArticle['addTitle'], PDO::PARAM_STR);
                        $sth->bindValue('content', $addArticle['addContent'], PDO::PARAM_STR);

                        $sth->bindvalue('image', $addArticle['addImage'], PDO::PARAM_STR);

                        $sth->execute();
                         
                        $valids[] = 'Votre demande article a bien été enregistrée.';

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
    public function updateArticle()
    {
        //Prends tout les données entrée par l'utilisateur (ils seront en placeholder dans la view)
        try{
            $updateId = $_POST["id_article"];
            $updateTitle = trim(ucfirst($_POST["title"]));
            $updateBrand = trim(ucfirst($_POST["brand"]));
            $updateContent = trim(ucfirst($_POST["content"]));
            $updateStatus = $_POST["status"];
            $updateImage = "";

            //prepare les données pour le bind value
            $sth = $this->bdd->prepare('UPDATE
                articles
                SET
                       title =:title,
                       brand = :brand,
                       content = :content,
                       status = :status,
                       image = :image,
                WHERE 
                        id_article = :id
                    
            ');
            //bindValue contre injection SQL
            $sth->bindValue('id',$updateId, PDO::PARAM_STR);
            $sth->bindValue('title',$updateTitle, PDO::PARAM_STR);
            $sth->bindValue('brand',$updateBrand, PDO::PARAM_STR);
            $sth->bindValue('content',$updateContent, PDO::PARAM_STR);
            $sth->bindValue('status',$updateStatus, PDO::PARAM_STR);
            $sth->bindValue('image',$updateImage, PDO::PARAM_STR);

            $sth->execute();

        }
        catch(PDOException $e){
            
        }
    }

    public function deleteArticles($id){
        
            $sth=$this->bdd->prepare("DELETE FROM articles WHERE id_article= :id");
            $sth->bindValue("id",$id);
            $sth->execute();
        
    }

    function selectOne($id) {
        $sql = "SELECT * FROM `articles` WHERE `id_article` = $id";
        $req = $this->bdd->query($sql);
        $result = $req->fetch();
        return $result;
    }

    function selectAll() {
        $sql = "SELECT * FROM articles";
        $req = $this->bdd->query($sql);
        $result = $req->fetchAll();
        return $result;            
    }


}