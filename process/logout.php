<?php
session_start();
session_destroy();
?>
<script language="javascript">
    window.alert("Logged Out Successfully !");
    window.location.href = "../index.php";
</script>';