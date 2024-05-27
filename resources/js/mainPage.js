document.getElementById('homeIcon').src = 'resources/image/homeIcon2.png';
document.getElementById('mainPage').style = 'border-bottom: #74b9ff solid 2.4px';
var css = '#mainPage::hover{border-radius: 0px; background-color: #F0F2F5}';
var current=document.getElementById('mainPage');
current.classList.remove('currentSection', 'selectSection');
current.classList.add('currentSection');

document.getElementById('newPostFileInput').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var preview = document.getElementById('previewNewPostFile');
    var buttonImportFile = document.getElementById('selectFileForNewPost');

        preview.innerHTML = '';
        buttonImportFile.style.display = 'none';
    var img = document.createElement('img');
    img.src = URL.createObjectURL(file);
    img.style.width = '468px';
    img.style.display = 'block';
    img.style.borderRadius = '24px'
    preview.appendChild(img);
});


function openNewPostForm(){
    document.getElementById('modalBackGround').style.display = 'block';
};
function closeNewPostForm() {
    document.getElementById('modalBackGround').style.display = 'none';
};

function importFile(){
    document.getElementById('newPostFileInput').click();
};

function deleteCreatingPost(){
    document.getElementById('newPostFileInput').value = ''
    document.getElementById('newPostCaption').value = ''
    document.getElementById('newPostPrivacy').value = ''
    document.getElementById('previewNewPostFile').innerHTML = ''
    document.getElementById('selectFileForNewPost').style.display = 'block'
    document.getElementById('modalBackGround').style.display = 'none';
};

var pressed = 1;
function LikeButton(){
    if (pressed % 2 == 1) {
        document.getElementById('likeButton').style.color = '#46A3FF';
        document.getElementById('likeButtonImg').src = 'resources/image/likeIcon2.png';
    } else {
        console.log(pressed);
        document.getElementById('likeButton').style.color = '#686868';
        document.getElementById('likeButtonImg').src = 'resources/image/likeIcon1.png';
    }
    pressed = pressed + 1;
}