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
    document.getElementById('deleteFileForNewPost').style.display = 'block'
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
    document.getElementById('newPostFileInput').value = '';
    document.getElementById('newPostCaption').value = ''
    document.getElementById('newPostPrivacy').value = ''
    document.getElementById('previewNewPostFile').innerHTML = ''
    document.getElementById('selectFileForNewPost').style.display = 'block'
    document.getElementById('modalBackGround').style.display = 'none';
};

function deleteFile() {
    document.getElementById('previewNewPostFile').innerHTML = ''
    document.getElementById('selectFileForNewPost').style.display = 'block'
    document.getElementById('newPostFileInput').value = ''
    document.getElementById('deleteFileForNewPost').style.display = 'none'

}

var pressed = 1;
function LikeButton(id){
    postId = id.slice(10, id.length);
    if (pressed % 2 == 1) {
        document.getElementById(id).style.color = '#46A3FF';
        document.getElementById('likeButtonImg' + postId).src = 'resources/image/likeIcon2.png';
    } else {
        console.log(pressed);
        document.getElementById(id).style.color = '#686868';
        document.getElementById('likeButtonImg' + postId).src = 'resources/image/likeIcon1.png';
    }
    pressed = pressed + 1;
}

var array_style = []
function DeletePost(postDeleteId){
    postDeleteId = postDeleteId.slice(6, postDeleteId.length);
    postDelete = document.getElementById(postDeleteId);
    var nodes = postDelete.childNodes;
    let array = ['div', 'a', 'form', 'input', 'select', 'button', 'textarea', 'img']
    for(var i=0; i<nodes.length; i++) {
        if (array.includes(nodes[i].nodeName.toLowerCase())) {
            array_style[i] = nodes[i].style.display;
            nodes[i].style.display = 'none';
        }
    }
    document.getElementById("deleteText" + postDeleteId).style.display = "block"
    document.getElementById("undoDelete" + postDeleteId).style.display = "block"
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/deletePost", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    postDeleteId = postDeleteId.slice(10, postDeleteId.length);
    xhttp.send("postId=" + postDeleteId + "&deletePost=1");
}

function UndoDeletePost(postDeleteId){
    postDeleteId = postDeleteId.slice(10, postDeleteId.length);
    postDelete = document.getElementById(postDeleteId);
    var nodes = postDelete.childNodes;
    let array = ['div', 'a', 'form', 'input', 'select', 'button', 'textarea', 'img']
    for(var i=0; i<nodes.length; i++) {
        if (array.includes(nodes[i].nodeName.toLowerCase())) {
            nodes[i].style.display = array_style[i];
        }
    }
    document.getElementById("deleteText" + postDeleteId).style.display = "none"
    document.getElementById("undoDelete" + postDeleteId).style.display = "none"
    xhttp.open("POST", "/revertPost", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    postDeleteId = postDeleteId.slice(10, postDeleteId.length);
    xhttp.send("postId=" + postDeleteId + "&deletePost=0");
}


function display_Comment(id){
    postId = id.slice(13, id.length);
    commentsContainerId = "commentsContainer" + postId;
    if (document.getElementById(commentsContainerId).style.maxHeight == '0px' || document.getElementById(commentsContainerId).style.maxHeight == ''){
        document.getElementById(commentsContainerId).style.maxHeight = '600px';
    } else {
        document.getElementById(commentsContainerId).style.maxHeight = '0px';
    }
    
}

function send_comment(commentId){
    postId = commentId.slice(13, commentId.length);
    comment_Text_Id = document.getElementById('newComment' + postId);
    comment_Text = comment_Text_Id.value
    comment_Text_Id.value = '';
    console.log(comment_Text);
}
