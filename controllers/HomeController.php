<?php
    namespace Controllers;

    class HomeController extends Controller
    {
        
        function add()
        {
            $_POST = ['addTitle' =>       'C4',
            'addBrand' =>       'Citroën',
            'addContent' =>     'Lorem Ipsum',
            'addUserId' =>      1,     
            'addStatus' =>      0,      
            'addImage' =>       'https://www.citroen.fr/content/dam/citroen/master/b2c/models/new-c4-e/visualizer/front-view/New%20E-C4%20and%20C4_0MP00NWP_Blanc%20Banquise_FR_1280_720.png',
        ];
            $this->model->addArticle();
        }
       
    }