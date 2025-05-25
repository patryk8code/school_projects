<?php
//alwayes on file start
session_start();

if ((!isset($_POST['login']))||(!isset($_POST['password']))){
    header('Location index.php');
    exit();
}


//if no file (connect) > fatal error 

require_once "connect.php";

// @ - if error -> *silence*

$connection = @new mysqli($host,$db_usr,$pass,$db_name); 

//in if >>> 0 - mission complete
if($connection->connect_errno!=0){
    echo"Error: ".$connection->connect_errno."Info: ".$connection->error; 
}else{
    $login = $_POST['login'];
    $pass = $_POST['password'];

    $login=htmlentities($login, ENT_QUOTES, "UTF-8");
    $pass=htmlentities($pass, ENT_QUOTES, "UTF-8");
    
    $sql = "SELECT * FROM users WHERE login='$login' AND password='$pass'";
    
    if($returnn=@$connection->query($sql)){
        //requier of login and pass
        $num_users=$returnn->num_rows; 
        if($num_users>0){
            $_SESSION['usr_loged']=true;
            
            $row=$returnn->fetch_assoc(); //evry require from DB after THIS line 
            $_SESSION['id']                 =$row['id'];
            $_SESSION['user']               =$row['login'];
            $_SESSION['password']           =$row['password'];
            $_SESSION['nick']               =$row['nick'];
            $_SESSION['my_money']           =$row['my_money'];
            $_SESSION['my_clicks']          =$row['my_clicks'];
            $_SESSION['buy_items_num']      =$row['buy_items_num'];
            $_SESSION['buy_items_of_0']     =$row['buy_items_of_0'];
            $_SESSION['buy_items_of_1']     =$row['buy_items_of_1'];
            $_SESSION['buy_items_of_2']     =$row['buy_items_of_2'];
            $_SESSION['buy_items_of_3']     =$row['buy_items_of_3'];
            $_SESSION['buy_items_of_4']     =$row['buy_items_of_4'];
            $_SESSION['buy_items_of_5']     =$row['buy_items_of_5'];
            $_SESSION['buy_items_of_6']     =$row['buy_items_of_6'];
            $_SESSION['buy_items_of_7']     =$row['buy_items_of_7'];
            $_SESSION['buy_items_of_8']     =$row['buy_items_of_8'];
            $_SESSION['buy_items_of_9']     =$row['buy_items_of_9'];
            $_SESSION['buy_items_of_10']    =$row['buy_items_of_10'];
            $_SESSION['buy_items_of_11']    =$row['buy_items_of_11'];
            $_SESSION['buy_items_of_12']    =$row['buy_items_of_12'];
            $_SESSION['buy_items_of_13']    =$row['buy_items_of_13'];
            $_SESSION['buy_items_of_14']    =$row['buy_items_of_14'];
            $_SESSION['buy_items_of_15']    =$row['buy_items_of_15'];
            $_SESSION['buy_items_x2']       =$row['buy_items_x2'];
            $_SESSION['buy_items_auto']     =$row['buy_items_auto'];
            $_SESSION['buy_items_time']     =$row['buy_items_time'];
            $_SESSION['date_create']        =$row['data_create_account'];
            
            unset($_SESSION['error']);
            $returnn->close();   //close db free memory
            header('Location: game.php');
        }else{
            
            $_SESSION['error']='<span style="color:red;"> Invalid login or password!</span>';
            header('Location: index.php');
        }
    }
    
    $connection->close();
}

?>