<?php
require_once CLASSES .'/User.php';
global $db;
$title = 'Регистрция';

$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $user->register($_POST['email'], $_POST['password'], $_POST['password2']);
}

require_once '../views/registration.tpl.php';