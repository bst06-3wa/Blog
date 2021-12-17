<?php

    namespace Controllers;
    
    class ArticleController extends Controller
    {
        
        
  
        function add() 
        {
            $id_user = $_SESSION["user"]['id_user'];
            $this->model->addArticle($_POST['title'],$_POST['content'],$id_user,$_POST['image']);
        }

        function update() 
        {               
            $this->model->updateArticle($_POST['title'],$_POST['content'],$_POST['user_id'],$_POST['status'],$_POST['image'],$_POST['id']);
        }

        function delete($id)
        {
            $this->model->deleteArticle($id);
        }

        function selectOne($id)
        {
            $result = $this->model->selectOne($id);
            return $result;
        }

        function selectAll()
        {
            $result = $this->model->selectAll();
            return $result;
        }

    }