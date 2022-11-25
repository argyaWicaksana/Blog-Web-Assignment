<?php
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
define('ROOT', dirname(__DIR__, 2));
session_start();
session_destroy();
?>
<script language="javascript">
    window.alert("Logged Out Successfully !");
    window.location.href = "../index.php";
</script>';