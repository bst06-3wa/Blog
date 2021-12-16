<?php
    namespace Controllers;

    class HomeController extends Controller
    {
        function selectAll() {
            $result = $this->model->selectOne(2);
            return $result;
        }
        
       
    }