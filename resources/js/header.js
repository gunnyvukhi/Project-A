/* chuyển động của thanh tìm kiếm */
document.getElementById('searchBox').addEventListener('mouseover', function() {
    document.getElementById('searchBoxInput').style = 'width: 280px; border-radius: 16px;';
    document.getElementById('searchImage').style.display = 'none';
    document.getElementById('searchBoxInput').placeholder = "Bạn đang tìm kiếm gì"
});

document.getElementById('searchBox').addEventListener('mouseout', function() {
    search_content = document.getElementById('searchBoxInput');
    if (search_content.value == '') {
        search_content.blur();
        search_content.style = 'width: 48px; border-radius: 24px;';
        document.getElementById('searchImage').style.display = 'unset';
        document.getElementById('searchBoxInput').placeholder = ""
    }
});

/*                                     */
/* chuyển động của thanh Nemu bên phải */
/*                                     */

CurrentUserBtnClicked = 0;
NotificationBtnClicked = 0;
MenuBtnClicked = 0;

/* chuyển động nemu logout */

function logout_nemu() {
    if (CurrentUserBtnClicked % 2 == 0){
        document.getElementById('logoutNemuContainer').style.display = 'block';
        if (NotificationBtnClicked % 2 == 1){
            notification_box();
        } else if (MenuBtnClicked % 2 == 1){
            Menu_box()
        }
        
    }else{
        document.getElementById('logoutNemuContainer').style.display = 'none'
    }
    CurrentUserBtnClicked += 1;
}

document.getElementById('CurrentUserBtn').addEventListener('click', logout_nemu);

/* chuyển động của nút thông báo */

function notification_box(){
    if (NotificationBtnClicked % 2 == 0){
        document.getElementById('newNotificationContainer').style.display = 'flex';
        NotificationBtnMove();
        if (CurrentUserBtnClicked % 2 == 1){
            logout_nemu();
        }else if (MenuBtnClicked % 2 == 1){
            Menu_box()
        }
    }else{
        document.getElementById('newNotificationContainer').style.display = 'none'
        document.getElementById('NotificationBtn').blur();
        NotificationBtnBack();
        
    }
    NotificationBtnClicked += 1;
}

document.getElementById('NotificationBtn').addEventListener('click', notification_box);


document.getElementById('NotificationBtn').addEventListener('mouseover', function(){
    NotificationBtnMove();
});
document.getElementById('NotificationBtn').addEventListener('mouseout', function(){
    if (NotificationBtnClicked % 2 == 0){
        NotificationBtnBack();
    }
});

function NotificationBtnMove(){
    document.getElementById('NotificationBtn').childNodes[1].style = 'transform: scaleX(0);transform-origin: left;transition: transform .5s; background: #46A3FF';
    document.getElementById('NotificationBtn').childNodes[3].style = 'transform: scale(1); transform-origin: top; transition: transform .5s; background: #46A3FF';
    document.getElementById('NotificationBtn').childNodes[5].style = 'transform: scaleX(0);transform-origin: right; transition: transform .5s; background: #46A3FF';
    document.getElementById('NotificationBtn').childNodes[7].style = 'transform: scale(1); transform-origin: bottom; transition: transform .5s; background: #46A3FF';
    document.getElementById('NotificationImg').src = 'resources/image/notificationIcon2.png';
}

function NotificationBtnBack(){
    document.getElementById('NotificationBtn').childNodes[1].style = '';
    document.getElementById('NotificationBtn').childNodes[3].style = '';
    document.getElementById('NotificationBtn').childNodes[5].style = '';
    document.getElementById('NotificationBtn').childNodes[7].style = '';
    document.getElementById('NotificationImg').src = 'resources/image/notificationIcon1.png';
}

/* chuyển động của nút NEMU khác */

function Menu_box(){
    if (MenuBtnClicked % 2 == 0){
        document.getElementById('MenuContainer').style.display = 'flex';
        menuBtnMove();
        if (CurrentUserBtnClicked % 2 == 1){
            logout_nemu();
        } else if (NotificationBtnClicked % 2 == 1){
            notification_box();
        }
    }else{
        document.getElementById('MenuContainer').style.display = 'none'
        document.getElementById('menuBtn').blur();
        menuBtnnBack();
        
    }
    MenuBtnClicked += 1;
}

document.getElementById('menuBtn').addEventListener('click', Menu_box);



function menuBtnMove(){
    document.getElementById('menuBtn').childNodes[1].style = 'transform: scaleX(0);transform-origin: left;transition: transform .5s; background: #46A3FF';
    document.getElementById('menuBtn').childNodes[3].style = 'transform: scale(1); transform-origin: top; transition: transform .5s; background: #46A3FF';
    document.getElementById('menuBtn').childNodes[5].style = 'transform: scaleX(0);transform-origin: right; transition: transform .5s; background: #46A3FF';
    document.getElementById('menuBtn').childNodes[7].style = 'transform: scale(1); transform-origin: bottom; transition: transform .5s; background: #46A3FF';
    document.getElementById('menuImg').src = 'resources/image/nemuOptionIcon2.png';
}

function menuBtnnBack(){
    document.getElementById('menuBtn').childNodes[1].style = '';
    document.getElementById('menuBtn').childNodes[3].style = '';
    document.getElementById('menuBtn').childNodes[5].style = '';
    document.getElementById('menuBtn').childNodes[7].style = '';
    document.getElementById('menuImg').src = 'resources/image/nemuOptionIcon1.png';
}
document.getElementById('menuBtn').addEventListener('mouseover', function() {
    menuBtnMove()
});
document.getElementById('menuBtn').addEventListener('mouseout', function() {
    if (MenuBtnClicked % 2 == 0){
        menuBtnnBack();
    }
});

/* chuyển động của nút Message */

function messageBtnMove(){
    document.getElementById('messageBtn').childNodes[1].style = 'transform: scaleX(0);transform-origin: left;transition: transform .5s; background: #46A3FF';
    document.getElementById('messageBtn').childNodes[3].style = 'transform: scale(1); transform-origin: top; transition: transform .5s; background: #46A3FF';
    document.getElementById('messageBtn').childNodes[5].style = 'transform: scaleX(0);transform-origin: right; transition: transform .5s; background: #46A3FF';
    document.getElementById('messageBtn').childNodes[7].style = 'transform: scale(1); transform-origin: bottom; transition: transform .5s; background: #46A3FF';
    document.getElementById('messageImg').src = 'resources/image/messageIcon2.png';
}

function messageBtnnBack(){
    document.getElementById('messageBtn').childNodes[1].style = '';
    document.getElementById('messageBtn').childNodes[3].style = '';
    document.getElementById('messageBtn').childNodes[5].style = '';
    document.getElementById('messageBtn').childNodes[7].style = '';
    document.getElementById('messageImg').src = 'resources/image/messageIcon1.png';
}
document.getElementById('messageBtn').addEventListener('mouseover', function() {
    messageBtnMove()
});
document.getElementById('messageBtn').addEventListener('mouseout', function() {
    messageBtnnBack()
});
