<?php
    namespace Models;

    class ArticleModel extends Database
    {
        function addArticle($title, $content, $user_id, $image){
            $sql = "INSERT INTO articles('title', 'content', 'user_id', 'status', 'image') VALUES ('$title','$content','$user_id','0','$image')";
            var_dump($sql);
            $this->bdd->query($sql);
        }

        function updateArticle($id, $title, $content, $status, $image) {
            $sql = "UPDATE articles SET title='[$title]',content='[$content]',status='[$status]',image='[$image]' WHERE id_article = $id";
            $this->bdd->query($sql);
        }

        function deleteArticle($id) {
            $sql = "DELETE FROM articles WHERE id_article = $id";
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