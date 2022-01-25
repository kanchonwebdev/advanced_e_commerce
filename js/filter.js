function filter_product(filter, evt){
    var featured = document.querySelectorAll("#Featured");
    var newest = document.querySelectorAll("#Newest");
    var product_id = document.getElementsByClassName('product-block');
    var load_btn = document.getElementsByClassName("load-btn");

    for (let i = 0; i < load_btn.length; i++) {
        load_btn[i].style.display = "none";
    }

    for (let i = 0; i < product_id.length; i++) {
        product_id[i].style.display = "none";  
        
    }

    if (filter == "featured") {
        if (featured.length <= 6) {
            for (let i = 0; i < featured.length; i++) {
                featured[i].style.display = "block";
            }
        }else{
            for (let i = 0; i < 6; i++) {
                featured[i].style.display = "block";
            }
        }

        document.getElementById("featured_load_btn").style.display = "block";
    }

    if (filter == "newest") {
        if (newest.length <= 6) {
            for (let i = 0; i < newest.length; i++) {
                newest[i].style.display = "block"; 
            }
        }else{
            for (let i = 0; i < 6; i++) {
                newest[i].style.display = "block"; 
            }
        }
        
        document.getElementById("newest_load_btn").style.display = "block";
    }
        
    document.getElementById("active_filter").style.color = "gray";
    document.getElementById("second_filter").style.color = "gray";

    evt.style.color = "black";
}


document.getElementById("active_filter").click();