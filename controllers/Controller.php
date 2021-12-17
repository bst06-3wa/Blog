<?php
    namespace Controllers;

    abstract class Controller
    {
        protected string $view;
        protected $model;
    
        function __construct(array $data = [])
        {
           
            if(!empty($data))
            {
                $this->view = $data["name"];
                $this->model = $data["model"];
            }else
            {
                $this->view = "home";
            }

        }
        public function display(array $array = []):bool
        {
            $data = $array;
            $data['view'] = $this->view;
            // var_dump($data);
            require_once VIEW_DIR . "/page.phtml";
            return true;
        }
    }
