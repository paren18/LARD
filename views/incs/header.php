<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?? 'Заголовок' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/main.css">
</head>
<body>
<div class="wrapper">
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <span class="navbar-brand">ПроектЛард</span>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Главная</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-flex">
                <?php if (!empty($_SESSION['user'])): ?>
                    <a class="nav-link px-2 " style="color: white" href="lk">Личный кабинет</a>
                <?php else: ?>
                <a class="nav-link px-2" style="color: white" href="registration">Регистрация</a>
                <a class="nav-link px-2" style="color: white" href="login">Авторизация</a>
            </div>
         <?php endif; ?>
        </nav>
    </header>