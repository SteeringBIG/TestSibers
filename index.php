<?php
date_default_timezone_set('Asia/Barnaul');
require 'vendor/autoload.php';

use Sibers\main;
use Sibers\dataBase;

$main = new main();

session_start(); //Start new session

if (empty($_SESSION['user_data'])) {
    session_regenerate_id();
    //echo ("Открыт новый сеанс, идентификатор пользователя сохранен. ");
    $_SESSION['user_data'] = $main->user_check;
}
if (strcmp($_SESSION['user_data'], $main->user_check) !== 0) {
    session_regenerate_id();
    //echo ("Предупреждение, дублирующий сеанс!");
    $_SESSION = array();
    $_SESSION['user_data'] = $main->user_check;
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//echo $uri;
if ('/' === $uri) {

	$main->showHome();
	
} elseif ('/panel' === $uri) {


    //echo var_dump($_POST) . PHP_EOL;

    $action = $_POST['action'];
    //echo 'action: ' . var_dump($_POST['action']) . " var: " . $action . PHP_EOL;

    if (empty($action)) {
        $main->showLoginForm();
        //return;
    } else {
        $db = new dataBase();


        if ($action === "auth"){
            $db->user_login = $db->cleanSQL($_POST['login']);
            $db->user_pass = hash('ripemd160', 'prefix_' . $_POST['pass'] . '_suffix');

            $userData = $db->getUserInfo('auth');
            if (isset($userData) === true){
                $_SESSION['login'] = $db->user_login;
                $_SESSION['access'] = $userData['access'];

                $main->showUserData($userData);
            } else {

                $main->showLoginForm();
                return;
            }
        } elseif ($action === 'footerBtn') {

                if ($_POST['submit'] === 'list') {
                    $main->showListUsers($db->getAllUsers());

                } elseif ($_POST['submit'] === 'add') {
                    $main->showInsertUser();

                } elseif ($_POST['submit'] === 'login') {
                    $_SESSION['login'] = $db->user_login;
                    $_SESSION['access'] = $userData['access'];
                    $main->showLoginForm();
                }

        } elseif ($action === 'userInfo') {
            $db->user_login = $db->cleanSQL($_POST['login']);
            $userData = $db->getUserInfo('auth');
            if (isset($userData) === true) {
                $main->showUserData($userData);
            } elseif ($_SESSION['access'] === 1) {
                $main->showListUsers($db->getAllUsers());
            } else {
                $main->showUserData();
            }

        } elseif ($action === 'userListBtn') {
            $db->user_login = $db->cleanSQL($_POST['login']);
            $userData = $db->getUserInfo('infoUser');

            //echo var_dump($userData);

            if (isset($userData) === true) {
                if ($_POST['submit'] === 'edit') {
                    $main->showEditUser($userData);
                } elseif ($_POST['submit'] === 'info') {
                    $main->showUserData($userData);
                } elseif ($_POST['submit'] === 'delete') {
                    $main->showDeleteUser($userData);
                }
            } elseif ($_SESSION['access'] === 1) {
                $main->showListUsers($db->getAllUsers());
            } else {
                $main->showUserData();
            }

        } elseif ($action === 'userDelete') {
            $db->user_login = $db->cleanSQL($_POST['login']);

            if ($_POST['submit'] === 'delete') {
                $db->deleteUser();
                $main->showListUsers($db->getAllUsers());
            } elseif ($_POST['submit'] === 'cancel') {
                if ($_SESSION['access'] === 1) {
                    $main->showListUsers($db->getAllUsers());
                }
            }

        } elseif ($action === 'setUserInfo') {

            if ($_POST['submit'] === 'save') {
                $db->editUserInfo($_POST);
                $main->showListUsers($db->getAllUsers());
            } elseif ($_POST['submit'] === 'cancel') {
                if ($_SESSION['access'] === 1) {
                    $main->showListUsers($db->getAllUsers());
                }
            }
        } elseif ($action === 'addNewUser') {

                if ($_POST['submit'] === 'save') {
                    $db->addNewUser($_POST);
                    $main->showUserData($_POST);
                } elseif ($_POST['submit'] === 'cancel') {
                    if ($_SESSION['access'] === 1) {
                        $main->showListUsers($db->getAllUsers());
                    }
                }
            }

    }


} else {
	header('HTTP/1.1 404 Not Found');
	$main->show404();
}

//// Серверная информация по рабоботе страницы
//$main->show_server_info($_POST['showServerInfo']);