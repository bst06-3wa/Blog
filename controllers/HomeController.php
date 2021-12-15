<?php
    namespace Controllers;

    class HomeController
    {
        
        
        public function display(array $data = []):bool
        {
            $view = 'home';
            $datas = !empty($data) ? $data : [];
            require_once VIEW_DIR . "/page.phtml";
            return true;
        }
    }