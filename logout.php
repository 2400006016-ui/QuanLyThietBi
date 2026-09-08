<?php
session_start();
session_unset();
session_destroy();
header("Location: Login-pages/login.php");
exit();
?>