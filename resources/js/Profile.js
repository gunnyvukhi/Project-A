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
        console.log(detail);
        var targetElement = document.getElementById(detail);
        if (targetElement) {
            targetElement.style.display = 'block';
            console.log("done");
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
    Array.prototype.forEach.call(editElements, function (element) {
        element.style.display = 'none';
    });
}
//click vào thì ẩn đi

//thay anh bia

function openChangeForm1() {
    document.getElementById('modalBackGround1').style.display = 'block';
    
};


function closeChangeForm1() {
    document.getElementById('modalBackGround1').style.display = 'none';
};


//Thay ảnh đại diện

function openChangeForm() {
    document.getElementById('modalBackGround').style.display = 'block';
};


function closeChangeForm() {
    document.getElementById('modalBackGround').style.display = 'none';
};


//About Button

document.querySelectorAll('.Intro__button').forEach(button => {
    button.addEventListener('click', () => {
        document.querySelectorAll('.Profile__About').forEach(element => {
            element.style.display = 'none';
        });
        var idParts = button.id.split('__');
        if (idParts.length >= 2) {
            var detail = idParts[1];
            console.log(detail);
            var targetElement = document.getElementById(detail);
            if (targetElement) {
                targetElement.style.display = 'block';
                console.log("done");
            } else {
                console.log('No element found with id: ' + detail);
            }
        } else {
            console.log('Invalid id format');
        }
    });
});

function OpenIntro__EditArea() {
    document.getElementById('Intro__EditArea').style.display = 'block';
}

function CloseIntro__EditArea() {
    document.getElementById('Intro__EditArea').style.display = 'none';
}