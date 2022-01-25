//show season menu
function show_season_menu(s_menu){

    var season = document.getElementsByClassName("add-product-season");

    for (let i = 0; i < season.length; i++) {
        season[i].style.display = "none";
    }

    document.getElementById(s_menu).style.display = "flex";
    
}

//shwo main category
function show_main_category_block(select_value){
    var main_category = document.getElementsByClassName("main-category-block");

    for (let i = 0; i < main_category.length; i++) {
        main_category[i].style.display = "none";
    }

    document.getElementById(select_value).style.display = "flex";
}

//shwo featured menu
function show_feature_category(m_menu){

    var featured = document.getElementsByClassName("feature-category-block");

    for (let i = 0; i < featured.length; i++) {
        featured[i].style.display = "none";
    }

    document.getElementById(m_menu).style.display = "flex";
}