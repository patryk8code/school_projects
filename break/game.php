<?php
require_once "connect.php";
session_start();
if(!isset($_SESSION['usr_loged'])){
    header('Location: index.php');
    exit();
}
?>    

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Break</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="body">
    <header>
<?php    
    echo"
    <p>Witaj '".$_SESSION['nick'].'\' !> 
    <a id="logout" href="logout.php">Logout</a><  <a id="save" onclick="save_link()">     SAVE</a></p>';  
    // echo"<p>Jesteś z namie od ".$_SESSION['date'].", WOW!";  
?>
<nav><!--make pos Absolute and will be img show absilute panel log or else settings or string "SETTINGS"-->
</nav>

    </header>
    <main id="mainn"><!-- there will be all content-->
        <section id="buying">
            <!-- <div id="buy" style="display: flex;" onclick="buy_per_sec(0)">
                    <div id="buy-item">
                        <div id="buyImg"><img src="img/cent.png" alt="Bonus &quot;imagine yourself&quot;"></div>
                        <div id="buyR">
                            <div id="buyP">
                                <p>Add Money per <span id="per-0">10</span> sec</p>
                                <p>Add <span id="add-0">1</span></p>
                                <p>Current: <span id="current-0">0</span></p>
                            </div>
                            <div id="buyPP">
                                <p>Cost: <span id="cost-item-0">20</span> $</p>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </div> -->

        </section>
        <section id="center">
            <div id="cent-h">
                <p>Earned money: <span id="money">0</span></p>
                <p>Your number of clicks: <span id="clicks">0</span></p>
            </div>
            <div id="cent-c">
                <div id="icon">
                    <img src="img/cent.png" alt="CLICK THIS, MAN" id="clicker">
                </div>

            </div>

        </section>
        <section id="upgrades">
            <div id="up-0" onclick="multiplication()">
                <h1>Multiplication by 2</h1>
                <p>Price: <span id="up-top-0">50</span></p>
                <p>Currently: x<span id="mul-currently">1</span></p>
            </div>
            <div id="up-2" onclick="buy_autoClick()">
                <h1>Buy more autoclicker</h1>
                <p>Price: <span id="up-top-2">100</span></p>
                <p>Currently: <span id="autoclicker-how-much">0</span></p>
            </div>
            <div id="up-1" onclick="autoClick()">
                <h1>Autoclicks 1sec more often</h1>
                <p>Price: <span id="up-top-1">50</span></p>
                <p>Currently: <span id="auto-currently">1.1</span>sec</p>
            </div>
            <!-- Maybe in update game -->
            <!-- <div id="up-3">
                    <h1>Reset Game</h1>
                    <p>Price: <span id="up-top-3">5000000000</span></p>
                    <p>Get permanent bonus: 5x</p>
                </div> -->
            <div id="up-3" onclick="win_ez()">
                <h1>Win Game</h1>
                <p>Price: <span id="up-top-3">99999</span></p>
                <p>Just win :)</p>
            </div>
        </section>
    </main>
    <footer>
        <p>Autor: Patryk Marzęda</p>
    </footer>
    <script src="js/script.js"></script>
    <script>
        //why now work in .js file? cuz of session?? #help
        var currentMoney=Number("<?= $_SESSION['my_money'] ?>");
        document.getElementById("money").innerHTML=currentMoney;

        var clicks=Number("<?= $_SESSION['my_clicks'] ?>");
        document.getElementById("clicks").innerHTML=clicks;

        //create buy items: >>
        var number_buy_items = <?=$_SESSION['buy_items_num']?>;
        var buy_items_tab=[
            <?=$_SESSION['buy_items_of_0']?>,
            <?=$_SESSION['buy_items_of_1']?>,
            <?=$_SESSION['buy_items_of_2']?>,
            <?=$_SESSION['buy_items_of_3']?>,
            <?=$_SESSION['buy_items_of_4']?>,
            <?=$_SESSION['buy_items_of_5']?>,
            <?=$_SESSION['buy_items_of_6']?>,
            <?=$_SESSION['buy_items_of_7']?>,
            <?=$_SESSION['buy_items_of_8']?>,
            <?=$_SESSION['buy_items_of_9']?>,
            <?=$_SESSION['buy_items_of_10']?>,
            <?=$_SESSION['buy_items_of_11']?>,
            <?=$_SESSION['buy_items_of_12']?>,
            <?=$_SESSION['buy_items_of_13']?>,
            <?=$_SESSION['buy_items_of_14']?>,
            <?=$_SESSION['buy_items_of_15']?>
        ];
        var tab_r=[
            <?=$_SESSION['buy_items_x2']?>,
            <?=$_SESSION['buy_items_auto']?>,
            <?=$_SESSION['buy_items_time']?>
        ];
        // console.log(buy_items_tab); //to check if it works ~ and work!

        load_resources(number_buy_items,buy_items_tab,tab_r);       
	function save_link(){
            var link="save.php?";
            link+="s_my_money="+currentMoney;
            link+="&s_my_clicks="+clicks;
            link+="&s_my_num="+number_of_buy_divs;
            for(var i=0;i<16;i++){
                link+="&s_num_"+i+"="+tab_current[i];
            }
            link+="&s_x2="+(multip/2);
            link+="&s_x3="+document.getElementById("auto-currently").innerHTML;
            link+="&s_x4="+document.getElementById("autoclicker-how-much").innerHTML;
            window.open(link);
        }  
    </script>
<?php
/// make variables needed for backup
session_unset();
?>
</body>

</html>
