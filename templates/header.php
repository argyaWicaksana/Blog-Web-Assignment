<?php
// Session Check
session_start();
include 'connect.php';
$cek = 0;
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
    $cek = 1;
    $id = $_SESSION['user_id'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if (isset($_GET['a_id'])) {
        $a_id = $_GET['a_id'];
        $title = mysqli_query($connect, "SELECT title FROM article WHERE article_id=$a_id");
        $title = $title->fetch_assoc();
    ?>
        <title><?= $title['title'] ?> | Blog Web</title>
    <?php
    } else {
    ?>
        <title>Home | Blog Web</title>
    <?php
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css?v=<?= time() ?>">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Blog <span class="text-info">Web</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= str_contains($_SERVER['SCRIPT_NAME'], 'index.php') ? 'active' : '' ?>" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= str_contains($_SERVER['SCRIPT_NAME'], 'categories.php') ? 'active' : '' ?>" href="categories.php">Categories</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item me-lg-3">
                            <form class="d-flex" role="search" action="index.php" method="GET">
                                <?php
                                if (isset($_GET['c_id']) && isset($_GET['c_name'])) {
                                ?>
                                    <input type="hidden" name="c_id" value="<?= $_GET['c_id'] ?>">
                                    <input type="hidden" name="c_name" value="<?= $_GET['c_name'] ?>">
                                <?php
                                }
                                ?>
                                <input class="form-control me-2" type="search" placeholder="Search" name="s" aria-label="Search">
                                <button class="btn btn-outline-light" type="submit">Search</button>
                            </form>
                        </li>
                        <?php
                        if ($cek != 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php" name="login">
                                    <i data-feather="log-in"></i>
                                    <span class="d-lg-none">Login</span>
                                </a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard/index.php" name="dashboard">
                                    <i data-feather="user"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="process/logout.php" name="logout">
                                    <i data-feather="log-out"></i>
                                    <span class="d-lg-none">Log-out</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </nav>