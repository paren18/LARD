<?php
session_start();

global $db;
$title = 'Главная';

$posts = $db->query("SELECT * FROM article")->fetchAll();

require_once '../views/index.tpl.php';
