
function singleProductDisplay(des,s_color){
    var des_name = document.getElementById(des);

    var desName = document.getElementsByClassName("admin-single-product-footer-footer-block");


    for (let i = 0; i < desName.length; i++) {
        desName[i].classList.remove("flex");
    }

    document.getElementById("default").style.color = "gray";
    document.getElementById("information").style.color = "gray";

    des_name.classList.add("flex");
    s_color.style.color = "black";
}

document.getElementById("default").click();