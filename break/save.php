<?php
session_start();

require_once "connect.php";

$connection = @new mysqli($host,$db_usr,$pass,$db_name); 
if (isset($_GET['s_my_money']) && isset($_GET['s_my_clicks']) && isset($_GET['s_my_num']) && isset($_GET['s_num_0']) && isset($_GET['s_num_1']) && isset($_GET['s_num_2']) && isset($_GET['s_num_3']) && isset($_GET['s_num_4']) && isset($_GET['s_num_5']) && isset($_GET['s_num_6']) && isset($_GET['s_num_7']) && isset($_GET['s_num_8']) && isset($_GET['s_num_9']) && isset($_GET['s_num_10']) && isset($_GET['s_num_11']) && isset($_GET['s_num_12']) && isset($_GET['s_num_13']) && isset($_GET['s_num_14']) && isset($_GET['s_num_15']) && isset($_GET['s_x2']) && isset($_GET['s_x3']) && isset($_GET['s_x4']))
{
    // $s_my_money= $_GET['s_my_money'];
    // $s_my_clicks= $_GET['s_my_clicks'];
    // $s_my_num= $_GET['s_my_num'];
    // $s_num_0= $_GET['s_num_0'];
    // $s_num_1= $_GET['s_num_1'];
    // $s_num_2= $_GET['s_num_2'];
    // $s_num_3= $_GET['s_num_3'];
    // $s_num_4= $_GET['s_num_4'];
    // $s_num_5= $_GET['s_num_5'];
    // $s_num_6= $_GET['s_num_6'];
    // $s_num_7= $_GET['s_num_7'];
    // $s_num_8= $_GET['s_num_8'];
    // $s_num_9= $_GET['s_num_9'];
    // $s_num_10= $_GET['s_num_10'];
    // $s_num_11= $_GET['s_num_11'];
    // $s_num_12= $_GET['s_num_12'];
    // $s_num_13= $_GET['s_num_13'];
    // $s_num_14= $_GET['s_num_14'];
    // $s_num_15= $_GET['s_num_15'];
    // $s_x2= $_GET['s_x2'];
    // $s_x3= $_GET['s_x3'];
    // $s_x4= $_GET['s_x4'];
    
}
if($connection->connect_errno!=0){
    echo"Error: ".$connection->connect_errno."Info: ".$connection->error; 
}else{
    // UPDATE `users` SET `my_money` = '1123' WHERE `users`.`id` = 11;
    $sqll = "UPDATE `users` SET `my_money`='$_GET[s_my_money]', `my_clicks`='$_GET[s_my_clicks]', `buy_items_num`='$_GET[s_my_num]', `buy_items_of_0`='$_GET[s_num_0]', `buy_items_of_1`='$_GET[s_num_1]' , `buy_items_of_2`='$_GET[s_num_2]', `buy_items_of_3`='$_GET[s_num_3]', `buy_items_of_4`='$_GET[s_num_4]', `buy_items_of_5`='$_GET[s_num_5]',`buy_items_of_6`='$_GET[s_num_6]', `buy_items_of_7`='$_GET[s_num_7]', `buy_items_of_8`='$_GET[s_num_8]' , `buy_items_of_9`='$_GET[s_num_9]', `buy_items_of_10`='$_GET[s_num_10]', `buy_items_of_11`='$_GET[s_num_11]', `buy_items_of_12`='$_GET[s_num_12]', `buy_items_of_13`='$_GET[s_num_13]', `buy_items_of_14`='$_GET[s_num_14]', `buy_items_of_15`='$_GET[s_num_15]', `buy_items_x2`='$_GET[s_x2]', `buy_items_auto`='$_GET[s_x3]' , `buy_items_time`='$_GET[s_x4]' WHERE `users`.`id`='$_SESSION[id]'";
    
    if($returnnn=@$connection->query($sqll)){
        unset($_SESSION['error']);
        header('Location: game.php');
    }else{
            
        $_SESSION['error']='<span style="color:red;"> Invalid login or password!</span>';
        header('Location: index.php');
    }
}
?>