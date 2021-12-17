<?php
    namespace Models;

    class UserModel extends Database
    {
        function insertUser($firstname, $lastname, $email, $password){
            $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`) VALUES ('$firstname','$lastname', '$email','$password')";
            $this->bdd->query($sql);
        }

        function updateUser($firstname, $lastname, $email, $password, $id) {
            $sql = "UPDATE users SET firstname='[$firstname]',lastname='[$lastname]',email='[$email]',password='[$password]' WHERE id_user = $id";
            $this->bdd->query($sql);
        }

        function deleteUser($id) {
            $sql = "DELETE FROM users WHERE id_user = $id";
            $this->bdd->query($sql);
        }

        function selectOneUser($email) {
            $sql = "SELECT `id_user`, `firstname`, `lastname`, `role`, `email`, `password` FROM `users` WHERE `email` = $email";
            $req = $this->bdd->query($sql);
            $result = $req->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }

        function selectAllUsers() {
            $sql = "SELECT * FROM users";
            $req = $this->bdd->query($sql);
            $result = $req->fetchAll(\PDO::FETCH_ASSOC);
            return $result;            
        }
        
    }
