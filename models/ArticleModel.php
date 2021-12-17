<?php
    namespace Models;

    class ArticleModel extends Database
    {
        function addArticle($title, $content, $user_id, $image){
            $sql = "INSERT INTO `articles` (`id_article`, `title`, `content`, `user_id`, `created_at`, `status`, `image`) VALUES (NULL, 'test3', 'comment 3', '3', CURRENT_TIMESTAMP, '0', 'img 3');";
            var_dump($sql);
            $this->bdd->query($sql);
        }

        function updateArticle($id, $title, $content, $status, $image) {
            $sql = "UPDATE `articles` SET `title` = 'test modif 3', `content` = 'comment modif 3', `user_id` = '2', `image` = 'img modif 3' WHERE `articles`.`id_article` = 10";
            $this->bdd->query($sql);
        }

        function deleteArticle($id) {
            $sql = "DELETE FROM `articles` WHERE `articles`.`id_article` = 11";
            $this->bdd->query($sql);
        }

        function selectOne($id) {
            $sql = "SELECT `id`, `title`, `brand`, `content`, `image` FROM `users` WHERE `id` = $id";
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