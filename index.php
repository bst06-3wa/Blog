<?php
//   var_dump($_GET);
    session_start();
    require_once("config/config.php");
    use Controllers\Controller;
    use Controllers\HomeController;
    use Controllers\UserController;
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
                    $page['model'] = new Models\UserModel();
                    $controller = new UserController($page);
                    $controller->display();
                    if (isset($_POST["firstname"])) {
                         
                       $controller->add();
                    }
                break;
                case "login":
                    $controller = new UserController($page);
                    $controller->display();
                    if (isset($_POST["email"])) {
                         
                        $controller->add();
                     }
                break;
                case "logout":
                    $controller = new HomeController($page);
                    $controller->display();
                break;
                case "dashboard":
                    $_GET['param2'] = $_GET['param2'] != "" ? $_GET['param2'] : "profile";
                    $controller = new UserController($page);
                    $controller->display();
                    switch($_GET['param2']){
                        case "":
                            $page['model'] = new Models\UserModel();
                            $controller = new UserController($page);
                        break;
                        case "profile":
                            $page['model'] = new Models\UserModel();
                            $controller = new UserController($page);
                        break;
                        case "articles":
                            $page['model'] = new Models\ArticleModel();
                        break;
                        case "users":
                            $page['model'] = new Models\UserModel();
                            $controller = new UserController($page);
                            $users = $controller->selectAll();
                            $_SESSION["users"] = $users;
                            $controller->display($users);
                        break;
                    }
                    
                break;
                case "article":
                    $controller = new HomeController($page);
                    $controller->display();
                break;
        }
    }else{
        header("Location: ./home");
    }