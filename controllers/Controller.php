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
        public function display(array $data = []):bool
        {
            $data['view'] = $this->view;
            $datas = !empty($data) ? $data : [];
            require_once VIEW_DIR . "/page.phtml";
            return true;
        }
    }
