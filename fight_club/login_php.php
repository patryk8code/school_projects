<?php
//alwayes on file start
session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['password']))) {
    header('Location: login_page.php');
    exit();
}
if (((isset($_SESSION['login'])) && (isset($_SESSION['password'])))) {
    header('Location: admin.php');
    exit();
}
//if no file (connect) > fatal error 

require_once "connect.php";

// @ - if error -> *silence*

try {
    
    $login = $_POST['login'];
    $pass = $_POST['password'];
    
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $pass = htmlentities($pass, ENT_QUOTES, "UTF-8");
    
    $mysqli = mysqli_connect($fields["host"],$fields["user"],$fields["pass"], str_replace('/', '',$fields["path"]),$fields["port"]);

    $sql = "SELECT * FROM admins WHERE login='$login' AND password='$pass'";
    
    $result = $mysqli->query("$sql");
    
    $_SESSION["good"] = false;
    foreach ($result as $row) {
        if ($row) {
            $_SESSION["good"] = true;
            $_SESSION['admin_loged'] = true;
            $_SESSION['usr_loged'] = true;
            $_SESSION['imie'] = $row['imie'];
            $_SESSION['nazwisko'] = $row['nazwisko'];
            
            
            unset($_SESSION['error']);
            header('Location: admin.php');
        }
    }
    if (
        !$_SESSION["good"]
        ) {
            $_SESSION['error'] = '<i style="color:red;"> Invalid login or password!</i >';
            $result -> free_result();
            $mysqli -> close();
            header('Location: login_page.php');
        }
        
        
    } catch (Exception $e) {
        $result -> free_result();
        $mysqli -> close();
        $_SESSION['error'] = '<i style="color:red;">SO SPRRY!</i >( ' . $e . ' )';
        header('Location: login_page.php');
    }
    
    ?>