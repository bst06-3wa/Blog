<?php
    namespace Models;

    class UserModel extends Database
    {
        function insertUser($firstname, $lastname, $email, $password){
            $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`) VALUES ('$firstname','$lastname', '$email','$password')";
            $this->bdd->query($sql);
        }

        
    }