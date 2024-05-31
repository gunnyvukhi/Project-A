document.getElementById("button_gioithieu").onclick = function() {
    console.log("test");
    Array.prototype.forEach.call(document.getElementsByClassName("Profile2"), function(element) {
        element.style.display = "none";
    });
    document.getElementById("Profile2_DecriptionPage").style.display = "flex";
}


document.getElementById("button_baiviet").onclick = function() {
    console.log("test");
    Array.prototype.forEach.call(document.getElementsByClassName("Profile2"), function(element) {
        element.style.display = "none";
    });
    document.getElementById("Profile2").style.display = "block";
}