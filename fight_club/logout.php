<?php
session_start();
$_SESSION['admin_loged']=false;
header('Location: index.php');
exit();
?>