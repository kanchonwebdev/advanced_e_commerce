function showSearchMenu(){
    var menu = document.getElementById("search-box");

    menu.classList.toggle("search-display");
}

window.onscroll = function(){ menuShowFunction(); }

function menuShowFunction(){
    if (document.body.scrollTop > 220 || document.documentElement.scrollTop > 220) {
        document.getElementById("menu").className = " fix_position";
    }else{
        document.getElementById("menu").className = "menu";
    }
}

function showProductHeaderTab(catName,s_color){
    var cat_name = document.getElementById(catName);
    var class_name = document.getElementsByClassName("product-header-2-tab-block");
    var left_block = document.querySelectorAll("#left_block");

    for (let i = 0; i < class_name.length; i++) {
        class_name[i].classList.remove("shop-flex");
    }

    for (let i = 0; i < left_block.length; i++) {
        left_block[i].style.color = "gray";
    }
    

    cat_name.classList.add("shop-flex");
    s_color.style.color = "black";
}

function singleProductDisplay(des,s_color){
    var des_name = document.getElementById(des);

    var desName = document.getElementsByClassName("single-product-footer-footer");


    for (let i = 0; i < desName.length; i++) {
        desName[i].classList.remove("single-product-display");
    }

    document.getElementById("default").style.color = "gray";
    document.getElementById("information").style.color = "gray";

    des_name.classList.add("single-product-display");
    s_color.style.color = "black";
}

document.getElementById("default").click();