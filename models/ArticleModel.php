<?php
    namespace Models;

    class ArticleModel extends Database
    {
        function addArticle($title, $content, $user_id, $image){
            $sql = "INSERT INTO `articles` (`id_article`, `title`, `content`, `user_id`, `created_at`, `status`, `image`) VALUES (NULL, $title, $content, $user_id, CURRENT_TIMESTAMP, '0', $image);";
            $this->bdd->query($sql);
        }

        function updateArticle($title, $content, $user_id, $status, $image, $id) {
            $sql = "UPDATE `articles` SET `title` = $title, `content` = $content, `user_id` = $user_id, `image` = $image WHERE `articles`.`id_article` = $id";
            $this->bdd->query($sql);
        }

        function deleteArticle($id) {
            $sql = "DELETE FROM `articles` WHERE `articles`.`id_article` = $id";
            $this->bdd->query($sql);
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