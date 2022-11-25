<?php
require('connect.php');

// Collect Input
if (isset($_POST['username'])) {
    $user = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
    ];
    var_dump($user);

    $query = "INSERT into `user` (username, email, password)
    VALUES ('$username', '" . $password . "', '$email')";
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "<div class='form'>
    <h3>You are registered successfully.</h3>
    <br/>Click here to <a href='../login.php'>Login</a></div>";
    }
} else {
}
