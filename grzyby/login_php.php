<?php
session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['password']))) {
    // header('Location: login_page.php');
    // exit();
}
if ($_SESSION["logged"]==true) {
    header('Location: game.php');
    exit();
}

require_once "connect.php";

try {
    
    $login = $_POST['login'];
    $pass = $_POST['password'];
    
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $pass = htmlentities($pass, ENT_QUOTES, "UTF-8");
    
    $mysqli = mysqli_connect($fields["host"],$fields["user"],$fields["pass"], str_replace('/', '',$fields["path"]),$fields["port"]);

    $sql = "SELECT * FROM users WHERE login='$login' AND password='$pass'";
    
    $result = $mysqli->query("$sql");
    
    $_SESSION["good"] = false;
    foreach ($result as $row) {
        $sql = "update users set last_login='".date('Y-m-d H:i:s')."' WHERE login='$login' AND password='$pass'";
        $mysqli->query("$sql");
        if ($row) {
            $_SESSION["good"] = true;
            $_SESSION["logged"] = true;
            
            $_SESSION['name']=$row['name'];
            $_SESSION['surrname']=$row['surrname'];
            $_SESSION['login']=$row['login'];
            $_SESSION['password']=$row['password'];
            $_SESSION['date_come']=$row['date_come'];
            $_SESSION['last_login']=$row['last_login'];
            $_SESSION['money']=$row['money'];
            $_SESSION['exp']=$row['exp'];
            
            $_SESSION['i_helmet']=$row['i_helmet'];
            $_SESSION['i_gloves']=$row['i_gloves'];
            $_SESSION['i_armor']=$row['i_armor'];
            $_SESSION['i_pants']=$row['i_pants'];
            $_SESSION['i_shoes']=$row['i_shoes'];
            $_SESSION['i_sword']=$row['i_sword'];
            $_SESSION['i_shield']=$row['i_shield']; 
            
            unset($_SESSION['error']);
            header('Location: game.php');
            exit();
        }
    }
    if (!$_SESSION["good"]) {
            $_SESSION['error'] = '<i style="color:red;"> Invalid login or password!</i >';
            $result -> free_result();
            $mysqli -> close();
            header('Location: login_page.php');
            exit();
        }
        
        
    } catch (Exception $e) {
        $result -> free_result();
        $mysqli -> close();
        $_SESSION['error'] = '<i style="color:red;">SO SPRRY!</i >( ' . $e . ' )';
        header('Location: login_page.php');
        exit();
    }
    ?>