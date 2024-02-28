<?php
session_start();
require_once CLASSES . '/User.php';
global $db;
$title = 'Личный кабинет';
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user->logout();
}
$login_user = $_SESSION['user'];

require_once '../views/lk.tpl.php';
