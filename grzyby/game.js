var hero = document.getElementById("hero");
var show_it = document.getElementById("show_it");
var hide_it = document.getElementById("hide_it");

var shop = document.getElementById("shop_thing");
var show_s = document.getElementById("show_shop");
var hide_s = document.getElementById("hide_shop");

function hide_items() {
    hero.style.display = "none";
    hide_it.style.display = "none";
    show_it.style.display = "block";
}
hide_items();
function show_items() {
    hero.style.display = "flex";
    hide_it.style.display = "block";
    show_it.style.display = "none";
}
function hide_shop() {
    shop.style.display = "none";
    hide_s.style.display = "none";
    show_s.style.display = "block";
}
hide_shop();
function show_shop() {
    shop.style.display = "flex";
    hide_s.style.display = "block";
    show_s.style.display = "none";
}
//alternative exit -> from shop (ESC) or click X
document.onkeydown = function(evt) {
    evt = evt;
    if (evt.keyCode == 27) {
        hide_shop();
        hide_items();
    }
};
// -----------------animation shop-----------------------------
function create_anim(t){
    var i = document.createElement("div");
    i.className = "can_afford_text";
    i.innerHTML="$$$";
    i.addEventListener('animationend', function () { i.parentElement.removeChild(i); }.bind(this));
    t.appendChild(i);
    can_do_anim=0;
    setTimeout(function(){
        can_do_anim=1;
     },500);
}

can_do_anim=1;
function shop_mouse_in(t){
    let price=t.firstElementChild.innerHTML;
    let money=document.getElementById("money").innerHTML;
    if(!isNaN(parseInt(price))&&parseInt(price)<=parseInt(money)){
        t.style.animation="shop_green 1s linear infinite none";
        if (can_do_anim){
            create_anim(t);
        }
    }else{
        t.style.animation="shop_red 1s linear infinite none";
        
    }
    
}
function shop_mouse_out(t){
    t.style.animation="";
}
// ---------------QUESTS-------------------------------------
function create_section(arr){
    var r='<section id="mission"> <h1>';
    r+=arr['title'];
    r+='</h1><p>';
    r+=arr['content'];
    r+='</p>';
    for(var i=arr['num_of_buttons'];i>0;i--){
        r+='<input type="button" value="'+arr["button"+(arr['num_of_buttons']-i).toString()]+'">';
    }
    r+='<p id="time">mission time: <span id="mission_time">';
    r+=arr["mission_time"]
    r+='</span></p><p id="time">expires in: <span id="mission_expires">';
    r+=arr["mission_expire"]
    r+='</span></p></section>';
    return(r);
}
// DELETE IT!
var arr={
    title:"Search for missions",
    content:"It will take 1 day and u will find some easy missions or not &#128522;",
    num_of_buttons:1,
    button0:'Search',
    button1:'',
    button2:'',
    button3:'',
    button4:'',
    button5:'',
    button6:'',
    button7:'',
    mission_time:'2 days',
    mission_expire:'365 days',
}
document.getElementById("game").innerHTML+=create_section(arr); 
// ------------------------- QUESTS-------------------------------------
//-------------------------- AJAX --------------------------------------------------------

function make_money(str) {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function () {
        document.getElementById("money").innerHTML = this.responseText;
        console.log(this.responseText);
    }
    xmlhttp.open("GET", "update.php?q=" + str + "&f=switch");
    xmlhttp.send();
}
var items_type = ["wood", "steel", "gold", "dimond", "poisoned", "unreal", "unexpected"];

function sell(element) {
    let id=element.firstElementChild.id;
    let id_num=id.substr(id.length - 1);

    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function () {
            document.getElementById("shop_sell_" + id_num).innerHTML = this.responseText;
            document.getElementById("shop_my_" + id_num).innerHTML = items_type[(((typeof this.responseText)==='number')&&this.responseText>=0&&7>this.responseText)?this.responseText:0];
            console.log(this.responseText);
        }
        xmlhttp.open("GET", "update.php?q=" + id_num + "&f=sell");
        xmlhttp.send();
    }
    
    function buy(element) {
        let id=element.firstElementChild.id;
        let id_num=id.substr(id.length - 1);
        console.log(id);
        console.log(id_num);
        
        if (document.getElementById("shop_buy_" + id_num).innerHTML == '') { return }
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            document.getElementById("shop_buy_" + id_num).innerHTML = this.responseText;
            document.getElementById("shop_name_" + id_num).innerHTML = items_type[(((typeof this.responseText)==='number')&&this.responseText>=0&&7>this.responseText)?this.responseText:0];
            console.log(this.responseText);
        }
        xmlhttp.open("GET", "update.php?q=" + id_num + "&f=buy");
        xmlhttp.send();
    }
    
    
    
