<?php
//   var_dump($_GET);
    session_start();
    require_once("config/config.php");
    use Controllers\Controller;
    use Controllers\HomeController;
    use Controllers\ArticleController;
    use Controllers\UserController;
    use Controllers\UserConnexion;
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
                    $page['model'] = new Models\ArticleModel();
                    $controller = new ArticleController($page);
                    $articles = $controller->selectAll();
                    $_SESSION["articles"] = $articles;
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
                    $page['model'] = new Models\UserModel();
                    $controller = new UserConnexion($page);
                    $controller->display();
                    if (isset($_POST["email"])) {
                         
                        $controller->connexion();
                     }
                break;
                case "logout":
                    $page['model'] = new Models\ArticleModel();
                    $controller = new ArticleController($page);
                    $_SESSION["connected"] = false;
                    $_SESSION["user"] = "";
                   header("Location: /Blog/home");
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
                            $controller = new ArticleController($page);
                            if($_GET['param3'] != ""){
                                $controller->delete($_GET['param3']);
                                header("Location: /Blog/home");
                            }
                            if(isset($_POST['title'])){ 
                                
                                $controller->add();
                            }
                        break;
                        case "users":
                            $page['model'] = new Models\UserModel();
                            $controller = new UserController($page);
                            $users = $controller->selectAll();
                            $_SESSION["users"] = $users;
                            $controller->display($users);
                            if($_GET['param3'] != ""){
                        
                                $controller->delete($_GET['param3']);
                            }
                        break;
                    }
                    
                break;
                case "article":
                    
                    $page['model'] = new Models\ArticleModel();
                    $controller = new ArticleController($page);
                    $article = $controller->selectOne($_GET["param2"]);
                    $_SESSION["article"] = $article;
                    $controller->display();
                break;
                default:
                break;
        }
    }else{
        header("Location: ./home");
    }