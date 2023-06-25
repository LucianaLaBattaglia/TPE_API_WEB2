<?php


require_once 'libs/Router.php';
require_once 'api/controller/api.php';
require_once 'api/controller/controllerApi_movies.php';
require_once 'api/controller/controllerApi_genders.php';
$controllerApi_movies=new controllerApi_movies();
$controllerApi_genders=new controllerApi_genders();
// crea el router
$router = new Router();

// define la tabla de ruteo movies
$router->addRoute('movies','GET','controllerApi_movies','get_movies');
$router->addRoute('movies/:ID', 'GET', 'controllerApi_movies', 'get_movies');
$router->addRoute('movies', 'POST', 'controllerApi_movies', 'add_movie');
$router->addRoute('movies/:ID', 'PUT', 'controllerApi_movies', 'eddit_movie');
$router->addRoute('movies/:ID', 'DELETE', 'controllerApi_movies', 'delete_movie');

//define la tabla de ruteo genders
$router->addRoute('genders','GET','controllerApi_genders','get_genders');
//$router->addRoute('genders/:ID', 'GET', 'controllerApi_genders', 'get_genders');
$router->addRoute('genders/:ID', 'PUT', 'controllerApi_genders', 'eddit_gender');
$router->addRoute('genders', 'POST', 'controllerApi_genders', 'add_gender');
$router->addRoute('genders/:ID', 'DELETE', 'controllerApi_genders', 'delete_gender');
// rutea*/
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);











/*define('URL_BASE', 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']));

include 'model/model_movies.php';
include 'controller/controllerApi_movies.php';
include 'controller/controllerApi_genders.php';
include_once 'controller/controllerApi_login.php';


// define('URL_LOGIN', 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login');
// define('URL_LOGOUT', 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/logout');


$controller_movies= new controllerApi_movies();
$controller_genders= new controllerApi_genders();
$controller_login= new controllerApi_login();

$parteURL= explode("/", $_GET["resource"]);
$parteURLapi=$parteURL."#".$_SERVER['REQUEST_METHOD'];


switch($parteURL[0]){
    
    case 'movieList':
        $controller_movies->moviesList();
        break;
    case 'movieDetail':
        $controller_movies->movieDetail($parteURL[1]);
        break;
    case'gendersList':
        $controller_genders->gendersList();
        break;
    case 'delete':
        $controller_movies->delete_movie($parteURL[1]);
        break;
    case 'movieXgender':
        $controller_movies->movieXgender($parteURL[1]);
        break;
    case 'add':
        $controller_movies->prepare_add_movie();
        break;
    case 'add_confirm':
            $controller_movies->add_movie($_POST);
            break;
    case 'prepare_edit':
        $controller_movies->prepare_edit_movie($parteURL[1]);
        break;
    case 'edit_confirm':
        $controller_movies->edit_movie($_POST);
        break;
    case 'prepare_add_gender':
        $controller_genders->prepare_add_gender();
        break;
    case 'add_gender':
        $controller_genders->add_gender($_POST);
        break;
    case 'prepare_edit_gender':
        $controller_genders->prepare_edit_gender($parteURL[1]);
        break;
    case 'edit_gender':
        $controller_genders->edit_gender($_POST);
        break;
    case 'delete_gender':
            $controller_genders->delete_gender($parteURL[1]);
            break;
    case 'login':
            $controller_login->show_login();
        break;
    case 'verify_login':
            $controller_login->verify_user($_POST);
            break;
    case 'log_out':
            $controller_login->log_out();
            break;
    default:
        $controller_movies->home();
    }
    */
?>