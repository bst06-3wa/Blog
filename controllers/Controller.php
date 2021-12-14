<?php
    namespace Controllers;

    class Controller
    {
        protected $view;
        protected $model;
        protected $scripts;
        protected $styles;
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
            $view = 'home';
            $datas = !empty($data) ? $data : [];
            require_once VIEW_DIR . "/page.phtml";
            return true;
        }
    }