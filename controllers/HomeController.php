<?php
    namespace Controllers;

    class HomeController extends Controller
    {
        
        function add()
        {
            $_POST = ['addTitle' =>       'C4',
            'addContent' =>     'Lorem Ipsum',   
            'id' => '1',
            'addImage' =>       'https://www.citroen.fr/content/dam/citroen/master/b2c/models/new-c4-e/visualizer/front-view/New%20E-C4%20and%20C4_0MP00NWP_Blanc%20Banquise_FR_1280_720.png',
        ];
            $this->model->addArticle($_POST['addTitle'],$_POST['addContent'],$_POST['id'],$_POST['addImage']);

        }
        function select()
        {
            $test = $this->model->selectAll();
            var_dump($test);
        }
       
    }