function ch_data() {

    can_send = 1;

    // dodaj zajęcia
    var nazwa = document.getElementById("nazwa").value;
    var cena = document.getElementById("cena").value;
    var imie = document.getElementById("imie").value;
    var alert = document.getElementById("alert_imie");
    alert.style.display = "none"
    if (!(
        isNaN(nazwa) &&
        !isNaN(cena) &&
        isNaN(imie)
    )) {
        alert.style.display = "block"
    }

    // end dodaj zajęcia
    // data startustart_DD
    var start_DD = document.getElementById("start_DD").value;
    var start_MM = document.getElementById("start_MM").value;
    var start_YYY = document.getElementById("start_YYY").value;
    var start_HH = document.getElementById("start_HH").value;
    var start_MI = document.getElementById("start_MI").value;
    var start_SS = document.getElementById("start_SS").value;
    var alert_start = document.getElementById("alert_start");
    alert_start.style.display = "none"
    if (!(
        (start_DD < 32 && 0 < start_DD) &&
        (start_MM < 13 && 0 < start_MM) &&
        (start_YYY < 2050 && 2020 <= start_YYY) &&
        (start_HH < 21 && 0 <= start_HH) &&
        (start_MI < 60 && 0 <= start_MI) &&
        (start_SS < 60 && 0 <= start_SS)
        && start_DD && start_MM && start_YYY && start_HH && start_MI && start_SS
    )
    ) {
        alert_start.style.display = "block"
        can_send = 0;
    }
    var time=start_YYY+start_MM+start_DD+start_HH+start_MI+start_SS;
    // end data startu
    // data end-u
    var end_DD = document.getElementById("end_DD").value;
    var end_MM = document.getElementById("end_MM").value;
    var end_YYY = document.getElementById("end_YYY").value;
    var end_HH = document.getElementById("end_HH").value;
    var end_MI = document.getElementById("end_MI").value;
    var end_SS = document.getElementById("end_SS").value;
    var alert_end = document.getElementById("alert_end");
    alert_end.style.display = "none"

    if (!(
        (end_DD > 0 && 32 > end_DD) &&
        (end_MM > 0 && 13 > end_MM) &&
        (end_YYY >= 2020 && 2100 > end_YYY) &&
        (end_HH >= 0 && 60 > end_HH) &&
        (end_MI >= 0 && 60 > end_MI) &&
        (end_SS >= 0 && 60 > end_SS) &&
        end_DD && end_MM && end_YYY && end_HH && end_MI && end_SS&&
        (time<(end_YYY+end_MM+end_DD+end_HH+end_MI+end_SS))
    )) {
        alert_end.style.display = "block";
        console.log((end_YYY+end_MM+end_DD+end_HH+end_MI+end_SS));
        can_send = 0;
    }
    // end data end-u
    //opis
    var opis_text = document.getElementById("opis_text").value;
    var alert_text = document.getElementById("alert_text");
    alert_text.style.display = "none";
    if (!opis_text) {
        alert_text.style.display = "block";
        can_send = 0;
    }

    if (can_send) {
        document.my_form.submit();
    }
    can_send = 1;


}