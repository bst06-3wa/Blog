<?php
//   var_dump($_GET);
    require_once("config/config.php");
    use Controllers\HomeController;
    spl_autoload_register(function($class){
        $path = lcfirst(str_replace("\\","/",$class));
        require_once $path.".php";
    });

    $page = [
        "name"=> $_GET['path'],
        "model"=> ""
    ];


    if(isset($_GET['path'])){
        switch($_GET['path']){
                case "home":
                    $controller = new HomeController($page);
                    $controller->display();
                break;
                case "register":
                    $controller = new HomeController($page);
                    $controller->display();
                break;
                case "login":
                    $controller = new HomeController($page);
                    $controller->display();
                break;
                case "logout":
                    $controller = new HomeController($page);
                    $controller->display();
                break;
                case "dashboard":
                    $_GET['param2'] = $_GET['param2'] != "" ? $_GET['param2'] : "profile";
                    $controller = new HomeController($page);
                    $controller->display();
                break;
                case "article":
                    $controller = new HomeController($page);
                    $controller->display();
                break;
        }
    }else{
        header("Location: ./home");
    }