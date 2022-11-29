<?php
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
define('ROOT', dirname(__DIR__, 2));
// include "dashboard/process/throw.php";
// Check or throw
session_start();
if (isset($_SESSION['username']) == false) {
    header("location:../login.php");
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
$id = $_SESSION['user_id'];

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
    <link rel="stylesheet" href="<?= baseURL ?>css/style.css?v=<?= time() ?>">
</head>

<body>
    <!-- sidebar -->
    <div class="d-flex">
        <div style="min-height: 100vh;">
            <div class="collapse collapse-horizontal show sticky-top" id="collapseWidthExample" style="height: 100vh;">
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height:100vh;">
                    <a href="<?= baseURL ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-4">Blog <span class="text-info">Web</span></span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li>
                            <a href="<?= baseURL . 'dashboard' ?>" class="nav-link text-white <?= str_contains($_SERVER['SCRIPT_NAME'], 'dashboard/index.php') ? 'active' : '' ?>">
                                <i data-feather="home" class="me-3"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="<?= baseURL . 'dashboard/article/list.php' ?>" class="nav-link text-white <?= str_contains($_SERVER['SCRIPT_NAME'], 'dashboard/article') ? 'active' : '' ?>">
                                <i data-feather="file-text" class="me-3"></i>
                                My Article
                            </a>
                        </li>
                        <?php
                        if ($role == 1) {
                        ?>
                            <li>
                                <a href="<?= baseURL . 'dashboard/category/list.php' ?>" class="nav-link text-white <?= str_contains($_SERVER['SCRIPT_NAME'], 'dashboard/category') ? 'active' : '' ?>">
                                    <i data-feather="folder" class="me-3"></i>
                                    Category
                                </a>
                            </li>
                            <li>
                                <a href="<?= baseURL . 'dashboard/users/list.php' ?>" class="nav-link text-white <?= str_contains($_SERVER['SCRIPT_NAME'], 'dashboard/users') ? 'active' : '' ?>">
                                    <i data-feather="users" class="me-3"></i>
                                    Users
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>
                    <hr>
                    <div class="dropdown" id="profileimg">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i data-feather="user-check" class="me-2"></i>
                            <?php echo $username ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="<?= baseURL ?>dashboard/profile">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= baseURL . 'process/logout.php' ?>">Sign out</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <main class="w-100">
            <nav class="navbar navbar-dark bg-dark ms-auto sticky-top">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-controls="collapseWidthExample" aria-expanded="true">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="dropdown d-md-none">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i data-feather="user-check" class="me-2"></i>
                            <?php echo $username ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="<?= baseURL ?>dashboard/profile">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <article class="mt-4 mx-md-5 Article">