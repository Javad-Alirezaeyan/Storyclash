var openSidebar = false;

function toggleSidebar(){
    let el = document.getElementById("submenu")
    if (openSidebar){
        el.style.display = "none";
        el.style.left = "-300px";
        openSidebar = false;
    }
    else{
        el.style.display = "block";
        el.style.left = "60px";
        openSidebar = true;
    }
}










