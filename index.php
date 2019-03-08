<?php
date_default_timezone_set('Asia/Barnaul');
require 'vendor/autoload.php';

use Sibers\main;
use Sibers\dataBase;

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
    //echo var_dump(file_get_contents("php://input"));
    $inputText =  file_get_contents("php://input");
    //echo $inputText;

    if(empty($inputText)){
        $main->showLoginForm();
        return;
    } else {
        $db = new dataBase();
    }

    $main->inputText = $inputText;
    //$main->inputMessage();


} else {
	header('HTTP/1.1 404 Not Found');
	$main->show404();
}

//// Серверная информация по рабоботе страницы
//$main->show_info($_POST['showServerInfo']);