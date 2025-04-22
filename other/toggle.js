function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var overlay = document.getElementById("overlay");

    sidebar.classList.toggle("active");
    overlay.classList.toggle("active");
}

function closeSidebar() {
    var sidebar = document.getElementById("sidebar");
    var overlay = document.getElementById("overlay");

    sidebar.classList.remove("active");
    overlay.classList.remove("active");
}
