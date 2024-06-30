$UserId = 1;
$SessionId = 1;

// Kiểm tra xem người dùng có quyền chỉnh sửa hay không
if ($SessionId != $UserId) {
    document.querySelectorAll('.Overview__Content__btn').forEach(function(btn) {
        btn.style.display = 'none';
    });
}


// document.getElementByClass("ProfileChangePage").onclick = function () {
//     console.log("test");
//     Array.prototype.forEach.call(document.getElementsByClassName("Profile2"), function (element) {
//         element.style.display = "none";
//     });
//     document.getElementById("Profile2").style.display = "block";

// }
document.querySelectorAll('.ProfileChangePage').forEach(button => {
    button.addEventListener('click', () => {
        document.querySelectorAll('.Profile2').forEach(element => {
            element.style.display = 'none';
        });
        var idParts = button.id.split('_');
        if (idParts.length >= 2) {
            var detail = idParts[1];
            console.log(detail);
            var targetElement = document.getElementById(detail);
            if (targetElement) {
                if (detail == "ProfileAbout") {
                    targetElement.style.display = 'flex';
                    console.log("flex");
                }
                else {
                    targetElement.style.display = 'block';
                    console.log("block");

                }
            } else {
                console.log('No element found with id: ' + detail);
            }
        } else {
            console.log('Invalid id format');
        }
    });
});



//phần chỉnh sửa của Overview__Work
// function OpenOverview(a) {
    
//     console.log("test");
//     Array.prototype.forEach.call(document.getElementsByClassName("Overview__Content__btn"), function (element) {
//         // element.style.display = "none";
//     });
//     var idParts = a.id.split('__');
//     if (idParts.length >= 3) {
//         var detail = idParts[2];
//         console.log(detail);
//         var targetElement = document.getElementById(detail);
//         if (targetElement) {
//             targetElement.style.display = 'block';
//             console.log("done");
//         } else {
//             console.log('No element found with id: ' + detail);
//         }
//     } else {
//         console.log('Invalid id format');
//     }
// }       //click vào thì hiện ra

function OpenOverview() {
    // Ẩn thẻ div có id 'Overview'
    document.getElementById('Overview').style.display = 'none';

    // Hiển thị thẻ div có id 'Profile__About__Edit'
    document.getElementById('Profile__About__Edit').style.display = 'block';

}

// Thêm event listener cho thẻ div có id 'Overview'



function CloseOverview(event) {
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

function importFile(){
    document.getElementById('newPostFileInput').click();
};



function deleteCreatingPost(){
    document.getElementById('newPostFileInput').value = '';
    document.getElementById('newPostCaption').value = ''
    document.getElementById('newPostPrivacy').value = ''
    document.getElementById('previewNewPostFile').innerHTML = ''
    document.getElementById('selectFileForNewPost').style.display = 'block'
    document.getElementById('modalBackGround').style.display = 'none';
};


function closeChangeForm1() {
    document.getElementById('modalBackGround1').style.display = 'none';
};


//Thay ảnh đại diện

function openChangeFormAva() {
    document.getElementById('modalBackGroundAva').style.display = 'block';
};


function closeChangeFormAva() {
    document.getElementById('modalBackGroundAva').style.display = 'none';
};


document.getElementById('newAvaFileInput').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var preview = document.getElementById('previewNewAvaFile');
    var buttonImportFile = document.getElementById('selectFileForNewAva');

        preview.innerHTML = '';
        buttonImportFile.style.display = 'none';
    var img = document.createElement('img');
    img.src = URL.createObjectURL(file);
    img.style.width = '468px';
    img.style.display = 'block';
    img.style.borderRadius = '24px'
    preview.appendChild(img);
    document.getElementById('deleteFileForNewAva').style.display = 'block'
});


function importAvaFile(){
    document.getElementById('newAvaFileInput').click();
};

function deleteCreatingAva(){
    document.getElementById('newAvaFileInput').value = '';
    document.getElementById('newAvaCaption').value = ''
    document.getElementById('newAvaPrivacy').value = ''
    document.getElementById('previewNewAvaFile').innerHTML = ''
    document.getElementById('selectFileForNewAva').style.display = 'block'
    document.getElementById('modalBackGroundAva').style.display = 'none';
};

function deleteAvaFile() {
    document.getElementById('previewNewAvaFile').innerHTML = ''
    document.getElementById('selectFileForNewAva').style.display = 'block'
    document.getElementById('newAvaFileInput').value = ''
    document.getElementById('deleteFileForNewAva').style.display = 'none'

}


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