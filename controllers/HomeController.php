<?php
    namespace Controllers;

    class HomeController extends Controller
    {
       function update() {
           $this->model->updateUser('update','update','update','update',1);
       }
        
       
    }