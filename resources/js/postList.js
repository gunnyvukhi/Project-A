
function LikeButton(id){
    postId = id.slice(10, id.length);
    id_ = postId.slice(10, postId.length);
    like_Number_all = document.getElementById('likeNumber' + postId).innerHTML;
    like_Number = String(like_Number_all).split(">")[1].split(" ")[0];
    like_Number = parseInt(like_Number);

    if (pressed[id_] % 2 == 1) {
        document.getElementById(id).style.color = '#46A3FF';
        document.getElementById('likeButtonImg' + postId).src = 'resources/image/likeIcon2.png';
        like_Number += 1;
        document.getElementById('likeNumber' + postId).innerHTML = String(like_Number_all).split(">")[0] + ">" + String(like_Number) + " lượt thích" ;

        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "likePost", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        postId = postId.slice(10, postId.length);
        xhttp.send("postId=" + postId + "&like=1");
    } else {
        document.getElementById(id).style.color = '#686868';
        document.getElementById('likeButtonImg' + postId).src = 'resources/image/likeIcon1.png';
        like_Number -= 1;
        document.getElementById('likeNumber' + postId).innerHTML = String(like_Number_all).split(">")[0] + ">" + String(like_Number) + " lượt thích" ;

        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "unlikePost", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        postId = postId.slice(10, postId.length);
        xhttp.send("postId=" + postId + "&unlike=1");
    }
    pressed[id_] = pressed[id_] + 1;
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
    xhttp.open("POST", "deletePost", true);
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
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "revertPost", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    postDeleteId = postDeleteId.slice(10, postDeleteId.length);
    xhttp.send("postId=" + postDeleteId + "&revertPost=0");
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


display_comments = Array(999).fill(2);
last_display_comments = Array(999).fill(0);
function More_comments(id){
    postId = id.slice(12, id.length);
    id_ = postId.slice(10, postId.length);

    if ((display_comments[id_]) > 2){
        last_display_comments[id_] = display_comments[id_]-2;
    }
    
    for (let i = last_display_comments[id_]; i <= display_comments[id_]; i++){
        if (i >= All_comments[id_].length) {continue};
        postComments = document.getElementById("commentsContainer" + postId)

        container = document.createElement('div');
        container.className = 'comments';

        avatar = document.createElement('a')
        avatar.className = "PostAva";
        avatar.href = "#"

        avatar_picture = document.createElement('img');
        if (All_comments[id_][i]["avatar"]){
            avatar_picture.src = All_comments[id_][i]["avatar"];
        } else { avatar_picture.src = 'resources/image/demoPersonIcon.png' }
        

        content = document.createElement('div');
        content.className = "othersComments";

        Name = document.createElement('p');
        Name.className = "UserCommentName";
        Name.innerHTML = All_comments[id_][i]['user_name'];
        content.appendChild(Name);

        comment_content = document.createElement('p');
        comment_content.className = "OthersUserCommentContent";
        comment_content.innerHTML = All_comments[id_][i]['comment_content'];
        content.appendChild(comment_content);

        avatar.appendChild(avatar_picture);
        container.appendChild(avatar);
        container.appendChild(content);
        postComments.appendChild(container);
    };
    last_display_comments[id_] = display_comments[id_] + 1;
    display_comments[id_] = display_comments[id_] + 3;
    if (last_display_comments[id_] > All_comments[id_].length){
        document.getElementById("moreComments" + postId).style.display = 'none';
    }
    document.getElementById("lessComments" + postId).style.display = "block";
    document.getElementById(commentsContainerId).style.maxHeight = '2000px';
}

function LessComments(id) {
    postId = id.slice(12, id.length);
    id_ = postId.slice(10, postId.length);
    postComments = document.getElementById("commentsContainer" + postId)
    last_display_comments[id_] = 0;
    display_comments[id_] = 1;
    document.getElementById(commentsContainerId).style.maxHeight = '600px';
    others_Comments = document.getElementsByClassName('comments');
    document.getElementById("lessComments" + postId).style.display = "none";
    while (others_Comments[0]){
        others_Comments[0].remove();
    }
    document.getElementById("moreComments" + postId).style.display = 'block';
}

function send_comment(commentId){
    postId = commentId.slice(13, commentId.length);
    id_ = postId.slice(10, postId.length);
    comment_Text_Id = document.getElementById('newComment' + postId);
    comment_Text = comment_Text_Id.value
    comment_Text_Id.value = '';
    current_comment = [];
    current_comment['user_name'] = document.getElementById('currentUserName').innerHTML;
    current_comment['avatar'] = document.getElementById('currentUserAvatarLink').src;
    current_comment['comment_content'] = comment_Text;
    All_comments[id_].splice(0, 0, current_comment)

    others_Comments = document.getElementsByClassName('comments');
    while (others_Comments[0]){
        others_Comments[0].remove();
    }

    for (let i = 0; i <= display_comments[id_]-2; i++){
        if (i >= All_comments[id_].length) {continue};
        postComments = document.getElementById("commentsContainer" + postId)

        container = document.createElement('div');
        container.className = 'comments';

        avatar = document.createElement('a')
        avatar.className = "PostAva";
        avatar.href = "#"

        avatar_picture = document.createElement('img');
        if (All_comments[id_][i]["avatar"]){
            avatar_picture.src = All_comments[id_][i]["avatar"];
        } else { avatar_picture.src = 'resources/image/demoPersonIcon.png' }
        

        content = document.createElement('div');
        content.className = "othersComments";

        Name = document.createElement('p');
        Name.className = "UserCommentName";
        Name.innerHTML = All_comments[id_][i]['user_name'];
        content.appendChild(Name);

        comment_content = document.createElement('p');
        comment_content.className = "OthersUserCommentContent";
        comment_content.innerHTML = All_comments[id_][i]['comment_content'];
        content.appendChild(comment_content);

        avatar.appendChild(avatar_picture);
        container.appendChild(avatar);
        container.appendChild(content);
        postComments.appendChild(container);
    };
    display_comments[id_] += 1;
    document.getElementById("lessComments" + postId).style.display = "block";

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "commentPost", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    postId = postId.slice(10, postId.length);
    xhttp.send("postId=" + postId + "&comment=" + comment_Text);
}