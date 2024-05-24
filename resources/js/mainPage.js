document.getElementById('homeIcon').src = 'resources/image/homeIcon2.png';
document.getElementById('mainPage').style = 'border-bottom: #74b9ff solid 2.4px';
var css = '#mainPage::hover{border-radius: 0px; background-color: #F0F2F5}';
var current=document.getElementById('mainPage');
current.classList.remove('currentSection', 'selectSection');
current.classList.add('currentSection');




