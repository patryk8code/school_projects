// addEventListener("load", (event) => {});         add it when will be added saves 
//check how much u have current money

var currentMoney = 0;
var addMoney = 1;
var clicks = 0;
var multip = 1;
var autoClick_time = 1110;
var number_of_autocliks = 0;
var add_money_per_sec = 0;

//do not touch it!!
var emergency = 0;
var wait_to_check_buy = 10;
//

var sound_click = new Audio('music/click.mp3');
var buy_item_sound = new Audio('music/buy.mp3');
var bubble = new Audio('music/czekolada.mp3');
// var cre_monkey = new Audio('music/monkey.mp3');
var win = new Audio('music/win.mp3');

var refresh_time = 100;

/// now there next in DB and add in PHP :)
var tab_addmoney = [1,  3,   5,   10,  15,  25,  35,  50,  75,  100, 150, 200, 300, 1000, 1000 ,1000     ];
var tab_persec =   [2,  3,   4,   5,   10,  10,  11,  13,  14,  15,  16,  17,  10,  10,   1    ,1      ];
var tab_cost =     [50, 100, 125, 200, 150, 250, 300, 400, 500, 600, 700, 800, 900, 1000, 1000 ,1     ];
var tab_current =  [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

/// create element of left side> i mean "buy item"
var number_of_buy_divs = 0;
function createBuyItem(i) {
    if (i < tab_addmoney.length) {
        var buy_item = `
        <div id="buy-`+ i + `" class="buy" style="display: flex;" onclick="buy_per_sec(` + i + `)">
        <div id="buy-item">
        <div id="buyImg"><img src="img/cent.png" alt='Bonus "imagine yourself"'></div>
        <div id="buyR">
        <div id="buyP">
        <p>Add Money per <span id="per-`+ i + `">` + tab_persec[i] + `</span> sec</p>
        <p>Add <span id="add-`+ i + `">` + tab_addmoney[i] + `</span> $</p>
        <p>Current: <span id="current-`+ i + `">0</span> upgrades</p>
        </div>
        <div id="buyPP">
        <p>Cost: <span id="cost-item-`+ i + `">` + tab_cost[i] + `</span> $</p>
        </div>
        </div>
        <div style="clear: both;"></div>
        </div>
        </div>
        `;
        document.getElementById("buying").innerHTML += buy_item;
    }
    number_of_buy_divs++;
}

function buy_per_sec(id_number) {
    var per_sec          = Number(tab_persec[id_number]);
    var how_much_add     = Number(tab_addmoney[id_number]);
    var current          = Number(tab_current[id_number]);
    var cost_of_upgrade  = Number(tab_cost[id_number]);

    /// now add money per x seconds
    if (cost_of_upgrade <= currentMoney) {

        if (number_of_buy_divs == (id_number + 1) && number_of_buy_divs < tab_addmoney.length) {
            createBuyItem(number_of_buy_divs);
        }

        currentMoney -= cost_of_upgrade;
        sound_click.volume = 0.35;
        buy_item_sound.play();
        
        tab_current[id_number]=current+1;
        document.getElementById("current-" + id_number).innerHTML = tab_current[id_number];
                //not exist?!?!?!
        ///in 250'000 crush game; proposial repair:
        
        if (current % 3 == 0) {//mean too much
            emergency = 1;
            buy_per_sec_again(id_number);
        }
        add_money_per_second(per_sec, how_much_add, 0);
    }
}
function buy_per_sec_again(id_number) {
    var per_sec = Number(document.getElementById("per-" + id_number).innerHTML);
    var how_much_add = Number(document.getElementById("add-" + id_number).innerHTML);
    var current = Number(document.getElementById("current-" + id_number).innerHTML);
    add_money_per_second(per_sec, how_much_add * current, 1);


}

function add_money_per_second(how_much_sec, how_much_per_sec_add, can_i_go) {
    if (emergency == 1) {
        emergency = 0;
        //now more ram available hehe   
    }
    else if (can_i_go == 1 || emergency != 1) {
        currentMoney += Number(how_much_per_sec_add);
        /// im idiot just forget what is the second and what is milisecond ... *1000 !!!!
        setTimeout(add_money_per_second.bind(null, how_much_sec, how_much_per_sec_add, 0), how_much_sec * 1000);
    }

}

//////////////////// A N I M A T I O N ////////////////////////////////////
function coinClick(event) {
    coinClic(event.clientX, event.clientY);
    if (number_of_buy_divs == 0) {
        createBuyItem(0);
        main();
    }
    //////waring waring!! must_work
}

function coinClic(x, y) {
    // document.getElementById("buy").style.display = "flex";
    sound_click.volume = 0.15;
    sound_click.play();
    clicks++;
    document.getElementById("clicks").innerHTML = clicks + 1;
    currentMoney += addMoney * multip;

    // making circles    
    var d = document.createElement("div");

    d.className = "clickEffect";
    d.style.top = y + "px";
    d.style.left = x + "px";
    document.body.appendChild(d);
    d.addEventListener('animationend', function () { d.parentElement.removeChild(d); }.bind(this));
    ////////////////////////////////////////
    // making coin ico

    var i = document.createElement("img");

    i.src = "img/coin.svg";
    i.className = "coin";
    i.style.top = y + "px";
    i.style.left = x + "px";
    document.body.appendChild(i);
    i.addEventListener('animationend', function () { i.parentElement.removeChild(i); }.bind(this));
    ////////////////////////////////////
    ///add refresh
}

var clic_down = function () {
    document.getElementById("clicker").style.transform = 'scale(1.2)';
}

var clic_up = function () {
    document.getElementById("clicker").style.transform = 'scale(1)';

}

document.getElementById("icon").addEventListener("click", coinClick);
document.getElementById("icon").addEventListener("mouseup", clic_up);
document.getElementById("icon").addEventListener("mousedown", clic_down);
//////////////////// A N I M A T I O N ////////////////////////////////////



function main() { //updating money on screen
    document.getElementById("money").innerHTML = currentMoney;
    wait_to_check_buy--;
    if (wait_to_check_buy <= 0) {
        if (currentMoney > 0) {
            for (var ir = 0; ir < 4; ir++) {
                check_buy(ir);
            }
            for (var it = 0; it < number_of_buy_divs; it++) {
                check_buy_left_side(it);
            }
        }
        wait_to_check_buy = 10;
    }
    setTimeout(main, refresh_time);
}
///green available, red-not
var check_buy = function (number_id) {
    var cost_buy_item = document.getElementById("up-top-" + number_id).innerHTML;
    if (currentMoney < cost_buy_item) {
        document.getElementById("up-" + number_id).style.background = "#a33";
    }
    else {
        document.getElementById("up-" + number_id).style.background = "#3a3";
    }
}
var check_buy_left_side = function (number_id) {
    var cost_buy_item = document.getElementById("cost-item-" + number_id).innerHTML;
    if (currentMoney < cost_buy_item) {
        document.getElementById("buy-" + number_id).style.background = "#a33";
    }
    else {
        document.getElementById("buy-" + number_id).style.background = "#3a3";
    }
}
function multiplication() {
    var price = document.getElementById("up-top-0").innerHTML;
    if (currentMoney >= Number(price)) {
        currentMoney -= Number(price);
        multip = multip * 2;
        document.getElementById("up-top-0").innerHTML = price * 4;

        sound_click.volume = 0.35;
        buy_item_sound.play();
    }


}
function autoClick() {
    var price = document.getElementById("up-top-1").innerHTML;
    var time = document.getElementById("auto-currently").innerHTML;
    if (Number(time) * 1000 == 10) {
        document.getElementById("auto-currently").innerHTML += " ~ MAX"
    }
    if (currentMoney >= Number(price) && (Number(time) * 1000) > 10) {
        currentMoney -= Number(price);
        autoClick_time -= 100;
        number_of_autocliks++;
        if (number_of_autocliks == 1) {
            autoClicker();
        }
        document.getElementById("up-top-1").innerHTML = price * 2;
        document.getElementById("auto-currently").innerHTML = autoClick_time / 1000;

        sound_click.volume = 0.35;
        buy_item_sound.play();
    }
}
function buy_autoClick() {
    var price = document.getElementById("up-top-2").innerHTML;
    var how_much_auto = document.getElementById("autoclicker-how-much").innerHTML;
    if (how_much_auto == 20) {
        document.getElementById("autoclicker-how-much").innerHTML += " ~ MAX"
    }
    if (currentMoney >= Number(price) && Number(how_much_auto) < 20) {
        currentMoney -= Number(price);
        number_of_autocliks++;
        autoClicker();
        document.getElementById("up-top-2").innerHTML = price * 2;
        document.getElementById("autoclicker-how-much").innerHTML = number_of_autocliks;

        sound_click.volume = 0.35;
        buy_item_sound.play();
    }
}
function win_ez() {
    var price = document.getElementById("up-top-3").innerHTML;
    if (currentMoney >= Number(price)) {
        currentMoney -= Number(price);

        document.getElementById("mainn").innerHTML = `
    <div style="
    background-color: green;
    display: flex;
    border: 9px dashed red;
    font-size: 5em;
    text-align: center;
    justify-content: center;
    align-items: center;
    margin:0 auto;
">
        <h1>$$$ YOU WIN!! $$$</h1>
    </div>`;

        sound_click.volume = 1;
        win.play();
    }
}
function autoClicker() {
    //document.getElementById('icon').click(); not work, click to (0,0) position :(
    var coin_position = document.getElementById("icon").getBoundingClientRect();
    //console.log(coin_position.top, coin_position.right, coin_position.bottom, coin_position.left);
    coinClic(getRandomInt() + coin_position.left, getRandomInt() + coin_position.top)
    setTimeout(autoClicker, autoClick_time);

}
function getRandomInt() {
    return Math.floor(Math.random() * 200);
}

/// not let refresh and lose progres!
window.onbeforeunload = function () {
    return "Dude, are you want to do it??? Progres will be lost.. forever";
}
var load_resources=function(num_of_items,buy_items,tab_r){
    for(var i=0;i<num_of_items;i++){
        tab_current[i]=buy_items[i];
        if (number_of_buy_divs < tab_addmoney.length) {
            createBuyItem(number_of_buy_divs);
        }
        for(var j=0;j<buy_items[i];j++){
            var per_sec          = Number(tab_persec[i]);
            var how_much_add     = Number(tab_addmoney[i]);
            add_money_per_second(per_sec, how_much_add, 0);
            document.getElementById("current-" + i).innerHTML = tab_current[i];        

        }
    }    
    if(number_of_buy_divs<buy_items.length)createBuyItem(number_of_buy_divs);
    main();
    //created left side buy items per sec ^^^ 

//-------------------------------------------------------------------------------

    //now create right things 
    for(var i=0;i<Number(tab_r[0]);i++){
        var price = document.getElementById("up-top-0").innerHTML;
        multip = multip * 2;
        document.getElementById("up-top-0").innerHTML = price * 4;
    }
    for(var i=0;i<Number(tab_r[1]);i++){
        var price = document.getElementById("up-top-1").innerHTML;
        var time = document.getElementById("auto-currently").innerHTML;
        if (Number(time) * 1000 == 10) {
            document.getElementById("auto-currently").innerHTML += " ~ MAX"
        }
        autoClick_time -= 100;
        number_of_autocliks++;
        if (number_of_autocliks == 1) {
            autoClicker();
        }
        document.getElementById("up-top-1").innerHTML = price * 2;
        document.getElementById("auto-currently").innerHTML = autoClick_time / 1000;

    }
    for(var i=0;i<Number(tab_r[2]);i++){
    var price = document.getElementById("up-top-2").innerHTML;
    var how_much_auto = document.getElementById("autoclicker-how-much").innerHTML;
    if (how_much_auto == 20) {
        document.getElementById("autoclicker-how-much").innerHTML += " ~ MAX"
    }
        number_of_autocliks++;
        autoClicker();
        document.getElementById("up-top-2").innerHTML = price * 2;
        document.getElementById("autoclicker-how-much").innerHTML = number_of_autocliks;    
    }

}
