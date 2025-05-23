function createCar() {
    
localStorage.setItem("nr",0);
    var a = 0;
    for (a; a < 12; a++) {
        document.getElementById("car").innerHTML +=
            '<div class="car" onmouseover="save(' + a + ')" onclick="carInfo()"><img src="../img/' + a + '/1.jpg" alt="Car ~ Photo"><div class="txt-name">' + car[a].name + '</div><div class="txt"><div id="asdd">' + car[a].cost + ' PLN</div></div></div>';
    }
}
function carInfo() {
    window.open("../www/car.html", '_blank').focus();
}

function save(nrr) { 
    localStorage.setItem("nr",nrr);
} 

function slider() {
    nr=localStorage.getItem("nr")
    document.title = car[nr].name;
    let a = 1;
    for (a; a - 1 <= car[nr].img; a++) {
        document.getElementById("slider").innerHTML +=
            '<img class="carimg" src="../img/' + nr + '/' + a + '.jpg" alt="car ~ Photo">'
    }

    document.getElementById("info").innerHTML +=
        '<ul></li>Nazwa samochodu: ' + car[nr].name + '</li><br></li>Z miasta: ' + car[nr].city + '</li><br></li>Cena: ' + car[nr].cost + '</li><br></li>Rok produkcji: ' + car[nr].year + '</li><br></li>Paliwo: ' + car[nr].fuel + '</li><br></li>Moc: ' + car[nr].power + '</li><br></li>Telefon kontaktowy: ' + car[nr].phone + '</li><br></li>E-mail: ' + car[nr].mail + '</li></ul>';




}