<?php
session_start();
session_unset();
header("Location: /../views/users/login.php"); 
?>