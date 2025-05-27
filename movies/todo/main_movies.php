<?php
session_start();
if ($_SESSION["logged"] == false) {
    header("Location: login_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mushrooms</title>
    <link rel="stylesheet" href="css/black.css">
    <link rel="stylesheet" href="css/game.css">
    <link rel="stylesheet" href="css/ico.css">
</head>

<body onload="">
    <header>
        <h3>
            <?php
            print ($_SESSION["name"] . " " . $_SESSION["surrname"]);
            ?>
            <a href="logout.php" style="margin-left:10px;">Log out</a>
        </h3>
    </header>
    <main>
        <div id="navbar">
            <p>Current money: <span id="money"><?php print ($_SESSION['money']); ?></span></p>
            <p>Current exp: <span id="exp"><?php print ($_SESSION['exp']); ?></span></p>
            <input id="make_money" type="button" onclick="make_money(0)" value="MAKE MONEY">
            <input id="show_shop" type="button" onclick="show_shop()" value="Show Shop items">
            <input id="hide_shop" type="button" onclick="hide_shop()" value="Hide Shop items">

            <input id="show_it" type="button" onclick="show_items()" value="Show Hero items">
            <input id="hide_it" type="button" onclick="hide_items()" value="Hide Hero items">
        </div>
        <div id="shop_thing">
            <div>
                <a href="#" class="close" onclick="hide_shop()"></a>
                <table id="shop">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Sword</th>
                            <th>Shield</th>
                            <th>Helmet</th>
                            <th>Gloves</th>
                            <th>Armor</th>
                            <th>Pants</th>
                            <th>Shoes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>U have:</th>
                            <th><span id="shop_my_0"><?php echo type_it($_SESSION['i_sword']) ?></span></th>
                            <th><span id="shop_my_1"><?php echo type_it($_SESSION['i_shield']) ?></span></th>
                            <th><span id="shop_my_2"><?php echo type_it($_SESSION['i_helmet']) ?></span></th>
                            <th><span id="shop_my_3"><?php echo type_it($_SESSION['i_gloves']) ?></span></th>
                            <th><span id="shop_my_4"><?php echo type_it($_SESSION['i_armor']) ?></span></th>
                            <th><span id="shop_my_5"><?php echo type_it($_SESSION['i_pants']) ?></span></th>
                            <th><span id="shop_my_6"><?php echo type_it($_SESSION['i_shoes']) ?></span></th>
                        </tr>
                        <tr>
                            <th>sell for:</th>
                            <th onclick="sell(this)" onmouseover="shop_mouse_in(this)" onmouseout="shop_mouse_out(this)"><span id="shop_sell_0"><?php echo ($_SESSION['last_price_sword'])?></span></th>
                            <th onclick="sell(this)" onmouseover="shop_mouse_in(this)" onmouseout="shop_mouse_out(this)"><span id="shop_sell_1"><?php echo ($_SESSION['last_price_shield'])?></span></th>
                            <th onclick="sell(this)" onmouseover="shop_mouse_in(this)" onmouseout="shop_mouse_out(this)"><span id="shop_sell_2"><?php echo ($_SESSION['last_price_helmet'])?></span></th>
                            <th onclick="sell(this)" onmouseover="shop_mouse_in(this)" onmouseout="shop_mouse_out(this)"><span id="shop_sell_3"><?php echo ($_SESSION['last_price_gloves'])?></span></th>
                            <th onclick="sell(this)" onmouseover="shop_mouse_in(this)" onmouseout="shop_mouse_out(this)"><span id="shop_sell_4"><?php echo ($_SESSION['last_price_armor'])?></span></th>
                            <th onclick="sell(this)" onmouseover="shop_mouse_in(this)" onmouseout="shop_mouse_out(this)"><span id="shop_sell_5"><?php echo ($_SESSION['last_price_pants'])?></span></th>
                            <th onclick="sell(this)" onmouseover="shop_mouse_in(this)" onmouseout="shop_mouse_out(this)"><span id="shop_sell_6"><?php echo ($_SESSION['last_price_shoes'])?></span></th>
                        </tr> 
                        <tr>
                            <th>In Shop:</th>
                            <th><span id="shop_name_0"><?php echo type_it($_SESSION['i_sword'] + 1) ?></span></th>
                            <th><span id="shop_name_1"><?php echo type_it($_SESSION['i_shield'] + 1) ?></span></th>
                            <th><span id="shop_name_2"><?php echo type_it($_SESSION['i_helmet'] + 1) ?></span></th>
                            <th><span id="shop_name_3"><?php echo type_it($_SESSION['i_gloves'] + 1) ?></span></th>
                            <th><span id="shop_name_4"><?php echo type_it($_SESSION['i_armor'] + 1) ?></span></th>
                            <th><span id="shop_name_5"><?php echo type_it($_SESSION['i_pants'] + 1) ?></span></th>
                            <th><span id="shop_name_6"><?php echo type_it($_SESSION['i_shoes'] + 1) ?></span></th>
                        </tr>

                        <tr>
                            <th>upgrade for:</th>
                            <th onclick="buy(this)" onmouseover="shop_mouse_in(this)" onmouseout="shop_mouse_out(this)"><span id="shop_buy_0"><?php echo ($_SESSION['current_price_sword'])?></span></th>
                            <th onclick="buy(this)" onmouseover="shop_mouse_in(this)" onmouseout="shop_mouse_out(this)"><span id="shop_buy_1"><?php echo ($_SESSION['current_price_shield'])?></span></th>
                            <th onclick="buy(this)" onmouseover="shop_mouse_in(this)" onmouseout="shop_mouse_out(this)"><span id="shop_buy_2"><?php echo ($_SESSION['current_price_helmet'])?></span></th>
                            <th onclick="buy(this)" onmouseover="shop_mouse_in(this)" onmouseout="shop_mouse_out(this)"><span id="shop_buy_3"><?php echo ($_SESSION['current_price_gloves'])?></span></th>
                            <th onclick="buy(this)" onmouseover="shop_mouse_in(this)" onmouseout="shop_mouse_out(this)"><span id="shop_buy_4"><?php echo ($_SESSION['current_price_armor'])?></span></th>
                            <th onclick="buy(this)" onmouseover="shop_mouse_in(this)" onmouseout="shop_mouse_out(this)"><span id="shop_buy_5"><?php echo ($_SESSION['current_price_pants'])?></span></th>
                            <th onclick="buy(this)" onmouseover="shop_mouse_in(this)" onmouseout="shop_mouse_out(this)"><span id="shop_buy_6"><?php echo ($_SESSION['current_price_shoes'])?></span></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="hero">
            <div>
                <a href="#" class="close" onclick="hide_items()"></a>
                <table>
                    <tr>
                        <th>Item</th>
                        <th>Sword</th>
                        <th>Shield</th>
                        <th>Helmet</th>
                        <th>Gloves</th>
                        <th>Armor</th>
                        <th>Pants</th>
                        <th>Shoes</th>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <th><?php echo type_it($_SESSION['i_sword']) ?></th>
                        <th><?php echo type_it($_SESSION['i_shield']) ?></th>
                        <th><?php echo type_it($_SESSION['i_helmet']) ?></th>
                        <th><?php echo type_it($_SESSION['i_gloves']) ?></th>
                        <th><?php echo type_it($_SESSION['i_armor']) ?></th>
                        <th><?php echo type_it($_SESSION['i_pants']) ?></th>
                        <th><?php echo type_it($_SESSION['i_shoes']) ?></th>
                    </tr>
                    <tr>
                        <th>Damage</th>
                        <th>-</th>
                        <th>0</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>
                    </tr>
                    <tr>
                        <th>Defence</th>
                        <th>-</th>
                        <th>1</th>
                        <th>1</th>
                        <th>1</th>
                        <th>1</th>
                        <th>1</th>
                        <th>1</th>
                    </tr>
                </table>
            </div>
        </div>
        <div id="game">
            <!-- quests here! -->
        </div>
        <div id="left_side"></div>
    </main>
    <footer>do not copy!</footer>
    <?php
    function type_it($nr): string
    {
        $items_type = ["-", "wood", "steel", "gold", "dimond", "poisoned", "unreal", "unexpected"];

        return $items_type[$nr];
    }
    // function price_it($id): string
    {
        // $items_price = [$];

        // return $items_type[$nr];
    }

    ?>
    <script src="game.js"></script>
</body>

</html>