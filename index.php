<?php
    // Dépandance
    use Controllers\HomeController;
    spl_autoload_register(function($class){
        $path = lcfirst(str_replace("\\","/",$class));
        require_once $class.".php";   
    });
    $page = [
        "name" => $GET["path"],
        "model" => ""
    ];
    // ROUTER
    if(isset($GET["path"]))
    {
        
        switch($GET["path"]){
            case "home":
                
            $controller = new HomeController($page);
            $controller->display();
            break;
        }
    }else{
        header("Location: ./?path=home");
    }