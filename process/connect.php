<?php
$namaHost = "localhost";
$username = "root";
$password = "";
$database = "blogweb";

$connect = mysqli_connect($namaHost, $username, $password, $database);

if ($connect) {
    echo "Connected to MySQL !";
} else {
    echo "Failed to connect MSQL !" . mysqli_connect_error();
}
