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
        "model"=> new Models\ArticleModel()
    ];


    if(isset($_GET['path'])){
        switch($_GET['path']){
                case "home":
                    $controller = new HomeController($page);
                    $controller->add();
                    $controller->select();
                    $controller->display();

                break;
                case "test":
                    $controller = new HomeController($page);
                    $controller->display();
                break;
        }
    }else{
        header("Location: ./home");
    }