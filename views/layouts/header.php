﻿<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>test</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/template/css/style.css" rel="stylesheet">


</head>

<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/page-1">Test</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" >
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/create-task">Создать задачу</a>
                </li>
                <?php if (Admin::isGuest()): ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/admin">Авторизация</a>
                    </li>

                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/admin/logout">Выход</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

