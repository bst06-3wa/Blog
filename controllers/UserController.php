<?php

    namespace Controller;
    
    class UserController extends Controller
    {
        
    private $firstname = trim($_POST['firstname']);
    private $lastname  = trim($_POST['lastname']);
    private $email     = trim($_POST['email']);
    private $password  = trim($_POST['password']);
    private $id = $_SESSION['id_user']; 
        
        function add() 
        {
            $this->model->insertUser($firstname,$lastname,$email,$password)
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
            $result = $this-model-selectAllUsers();
            return $result;
        }

    }