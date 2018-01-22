<?php 
session_start();
$_SESSION['logged_on_user'] = '';
$_SESSION['admin_logged'] = false;
header('Location: http://e3r13p1.42.fr:8080/rush_00/');
?>