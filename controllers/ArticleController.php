<?php

    namespace Controllers;
    
    class ArticleController extends Controller
    {
        
        
  
        function add() 
        {
            
            $this->model->addArticle($_POST['title'],$_POST['content'],$_POST['user_id'],$_POST['image']);
        }

        function update() 
        {               
            $this->model->updateArticle($_POST['title'],$_POST['content'],$_POST['user_id'],$_POST['status'],$_POST['image'],$_POST['id']);
        }

        function delete()
        {
            $this->model->deleteArticle($id);
        }

        function selectOne()
        {
            $result = $this-model-selectOne($id);
            return $result;
        }

        function selectAll()
        {
            $result = $this->model->selectAll();
            return $result;
        }

    }