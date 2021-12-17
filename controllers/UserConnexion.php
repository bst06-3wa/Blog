<?php

namespace Controllers;

    class UserConnexion extends Controller{

        function connexion(){
        
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $this->model->selectOneUser($email);
            var_dump($result);
            if($email == $result['email'] && $password == $result['password']){
                $_SESSION['connected'] = true;
                $_SESSION['user'] = [
                                    "id_user"=>$result['id_user'],
                                    "firstname"=>$result['firstname'],
                                    "lastname"=>$result['lastname'],
                                    "email"=>$result['email'],
                                    "role"=>$result['role']
                                ];
                header('Location: ../index.php');
                exit();
            }
            else{
                echo "Erreur de connexion";
                echo "Le site se dédouane de toute perte de donnée liée à une faille de sécurité qui aurait malencontrueusement été laissée béante par ses développeurs.";
            }
        }
    }