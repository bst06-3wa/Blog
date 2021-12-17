<?php

    namespace Controllers;
    
    class UserController extends Controller
    {
        
        
  
        function add() 
        {
            
            $this->model->insertUser($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['password']);
        }

        function update() 
        {               
            $this->model->updateUser($firstname,$lastname,$email,$password,$id);
        }

        function delete()
        {
            $this->model->deleteUser($id);
        }

        function selectOne()
        {
            $result = $this-model-selectOneUser($id);
            return $result;
        }

        function selectAll()
        {
            $result = $this->model->selectAllUsers();
            return $result;
        }

    }