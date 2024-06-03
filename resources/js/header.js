
var justScroll  = 0;
window.addEventListener('scroll', function() {
    let scrolled = Number(window.scrollY);
    haveScroll = scrolled - justScroll;
    justScroll = scrolled;
});

document.getElementById('NemuOtherOptionsBtn').addEventListener('mouseover', function() {
    document.getElementById('NemuOtherOptions').src = 'resources/image/nemuOptionIcon2.png';
});
document.getElementById('NemuOtherOptionsBtn').addEventListener('mouseout', function() {
    document.getElementById('NemuOtherOptions').src = 'resources/image/nemuOptionIcon1.png';
});


document.getElementById('messageBtn').addEventListener('mouseover', function() {
    document.getElementById('messageImg').src = 'resources/image/messageIcon2.png';
});
document.getElementById('messageBtn').addEventListener('mouseout', function() {
    document.getElementById('messageImg').src = 'resources/image/messageIcon1.png';
});


document.getElementById('NotificationBtn').addEventListener('mouseover', function() {
    document.getElementById('NotificationImg').src = 'resources/image/notificationIcon2.png';
});
document.getElementById('NotificationBtn').addEventListener('mouseout', function() {
    document.getElementById('NotificationImg').src = 'resources/image/notificationIcon1.png';
});


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

CurrentUserBtnClicked = 0;
NotificationBtnClicked = 0;

function logout_nemu() {
    if (CurrentUserBtnClicked % 2 == 0){
        document.getElementById('logoutNemuContainer').style.display = 'block';
        if (NotificationBtnClicked % 2 == 1){
            notification_box();
        }
        
    }else{
        document.getElementById('logoutNemuContainer').style.display = 'none'
    }
    CurrentUserBtnClicked += 1;
}

function notification_box(){
    if (NotificationBtnClicked % 2 == 0){
        document.getElementById('newNotificationContainer').style.display = 'flex';
        document.getElementById('NotificationBtn').focus();
        document.getElementById('NotificationImg').src = 'resources/image/notificationIcon2.png';
        if (CurrentUserBtnClicked % 2 == 1){
            logout_nemu();
        }
    }else{
        document.getElementById('newNotificationContainer').style.display = 'none'
        document.getElementById('NotificationBtn').blur();
        document.getElementById('NotificationImg').src = 'resources/image/notificationIcon1.png';
    }
    NotificationBtnClicked += 1;
}

document.getElementById('CurrentUserBtn').addEventListener('click', logout_nemu);

document.getElementById('NotificationBtn').addEventListener('click', notification_box);