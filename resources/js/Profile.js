document.getElementById("button_gioithieu").onclick = function () {
    console.log("test");
    Array.prototype.forEach.call(document.getElementsByClassName("Profile2"), function (element) {
        element.style.display = "none";
    });
    document.getElementById("Profile2_AboutPage").style.display = "flex";
}


document.getElementById("button_baiviet").onclick = function () {
    console.log("test");
    Array.prototype.forEach.call(document.getElementsByClassName("Profile2"), function (element) {
        element.style.display = "none";
    });
    document.getElementById("Profile2").style.display = "block";
}


//phần chỉnh sửa của Overview__Work
function OpenOverview(a) {
    console.log("test");
    Array.prototype.forEach.call(document.getElementsByClassName("Overview__Content__btn"), function (element) {
        // element.style.display = "none";
    });
    var idParts = a.id.split('__');
    if (idParts.length >= 3) {
        var detail = idParts[2];
        var targetElement = document.getElementById(detail);
        if (targetElement) {
            targetElement.style.display = 'block';
        } else {
            console.log('No element found with id: ' + detail);
        }
    } else {
        console.log('Invalid id format');
    }
}       //click vào thì hiện ra



function CloseOverview(a) {
    console.log("test");
    var editElements = document.getElementsByClassName('Profile__About__Edit');
    Array.prototype.forEach.call(editElements, function(element) {
        element.style.display = 'none';
    });
}
//click vào thì ẩn đi


//Thay ảnh đại diện

function openChangeForm() {
    document.getElementById('modalBackGround').style.display = 'block';
};


function closeChangeForm() {
    document.getElementById('modalBackGround').style.display = 'none';
};