function show_menu(){
    var menu = document.getElementById("menu-2");

    if (menu.className === "menu-container-2") {
        menu.className += " menu-display-2";
    }else{
        menu.className = "menu-container-2";
    }
}