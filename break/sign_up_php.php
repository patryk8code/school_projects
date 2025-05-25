<?php
//alwayes on file start
session_start();

if ((!isset($_POST['reg_login']))||(!isset($_POST['reg_password']))){
    header('Location index.php');
    exit();
}


//if no file (connect) > fatal error 

require_once "connect.php";

// @ - if error -> *silence*

$connection = @new mysqli($host,$db_usr,$pass,$db_name); 

if($connection->connect_errno!=0){
    echo"Error: ".$connection->connect_errno."Info: ".$connection->error; 
}else{
    $r_login = $_POST['reg_login'];
    $r_nick = $_POST['reg_nick'];
    $r_pass = $_POST['reg_password'];
    $r_login=htmlentities($r_login, ENT_QUOTES, "UTF-8");
    $r_nick=htmlentities($r_nick, ENT_QUOTES, "UTF-8");
    $r_pass=htmlentities($r_pass, ENT_QUOTES, "UTF-8");
    $my_date="2222-11-11 05:05:05";
    
    $sqll = "INSERT INTO `users` VALUES (NULL, '$r_login', '$r_pass', '$r_nick','0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$my_date');";
    
    if($returnnn=@$connection->query($sqll)){
        unset($_SESSION['error']);
        header('Location: index.php');
    }else{
            
        $_SESSION['error']='<span style="color:red;"> Invalid login or password!</span>';
        header('Location: index.php');
    }
}
?>