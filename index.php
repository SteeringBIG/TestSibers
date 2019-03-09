<?php
date_default_timezone_set('Asia/Barnaul');
require 'vendor/autoload.php';

use Sibers\main;
use Sibers\dataBase;
use Sibers\user;

$main = new main();

session_start(); //Start new session

$user_check = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);

if (empty($_SESSION['user_data'])) {
    session_regenerate_id();
    //echo ("Открыт новый сеанс, идентификатор пользователя сохранен. ");
    $_SESSION['user_data'] = $user_check;
}
if (strcmp($_SESSION['user_data'], $user_check) !== 0) {
    session_regenerate_id();
    //echo ("Предупреждение, дублирующий сеанс!");
    $_SESSION = array();
    $_SESSION['user_data'] = $user_check;
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//echo $uri;
if ('/' === $uri) {

	$main->showHome();
	
} elseif ('/panel' === $uri) {

    //echo var_dump($_POST['action']) . PHP_EOL;
    $action = $_POST['action'];
    //echo 'action: ' . var_dump($_POST['action']) . " var: " . $action . PHP_EOL;

    if (empty($action)){
        $main->showLoginForm();
        return;
    } else {
        $db = new dataBase();

        if ($action === "auth"){

            $db->user_login = $db->cleanSQL($_POST['login']);
            $db->user_pass = hash('ripemd160', 'prefix_' . $_POST['pass'] . '_suffix');

            //echo $db->user_pass;

            $userData = $db->authUser();
            if (isset($userData) === true){
                $_SESSION['login'] = $db->user_login;
                $_SESSION['access'] = $userData['access'];

                $main->showUserData($userData);
            } else {
                $main->showLoginForm();
                return;
            }
            //echo 'login: ' . $user->login . PHP_EOL;
        }

    }

    //$main->inputText = $inputText;
    //$main->inputMessage();

} else {
	header('HTTP/1.1 404 Not Found');
	$main->show404();
}

//// Серверная информация по рабоботе страницы
$main->show_server_info($_POST['showServerInfo']);