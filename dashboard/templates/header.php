<?php
define('ROOT', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Blog Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>

<body class="h-100">
    <!-- sidebar -->
    <div class="d-flex ">
        <div style="min-height: 100vh;">
            <div class="collapse collapse-horizontal h-100 show" id="collapseWidthExample">
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100" style="width: 280px;">
                    <a href="<?= ROOT ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-4">Blog <span class="text-info">Web</span></span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li>
                            <a href="<?= ROOT . 'dashboard' ?>" class="nav-link text-white <?= str_contains($_SERVER['SCRIPT_NAME'], 'TugasBesar/dashboard/index.php') ? 'active' : '' ?>">
                                <i data-feather="home" class="me-3"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="<?= ROOT . 'dashboard/article/list.php' ?>" class="nav-link text-white <?= str_contains($_SERVER['SCRIPT_NAME'], 'TugasBesar/dashboard/article') ? 'active' : '' ?>">
                                <i data-feather="file-text" class="me-3"></i>
                                My Article
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" class="rounded-circle me-2" width="32" height="32">
                            <strong>mdo</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <main class="w-100">
            <nav class="navbar navbar-dark bg-dark ms-auto">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-controls="collapseWidthExample" aria-expanded="true">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>