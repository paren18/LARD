<?php
session_start();
require_once CLASSES .'/User.php';
global $db;
$title = 'Авторизация';
$user = new User($db);
$login_user = $_SESSION['user'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $user->login($_POST['email'], $_POST['password']);
}
require_once '../views/login.tpl.php';
?>
