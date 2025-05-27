// function read_data(){
//     var action='read_data';
//     $.ajax({
//         url:'connect.php',
//         method:"POST",
//         data:{action:action}
//     })
//     console.log("as");
// }
// $("main#main").innerHTML=read_data();
let header = document.getElementById("header");
let search_box = document.getElementById("search_box");
let sort = document.getElementById("select_sort");
let genere = document.getElementById("filter_genere");
let likes_from = document.getElementById("options_likes_from");
let likes_to = document.getElementById("options_likes_to");
let l1,l2=0;

function read_data() {
    header.remove();
    if(likes_to.value!=null &&likes_from.value!=null&& likes_from.value>likes_to.value){
        likes_from.value=0;
        likes_to.value=0;
        return 0;
    }
    if(likes_to.value==0 &&likes_from.value==0){
        l1=-1000000;
        l2=1000000;
    }
    
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "read_php.php");
    
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === XMLHttpRequest.DONE && xmlhttp.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
        }
    }
    
    xmlhttp.send("action=read_data&order=" + sort.value + "&genere=" + genere.value+
        '&likes_from='+l1+'&likes_to='+l2+"&search_box="+search_box.value
    );

}

read_data();