// infinit post scrolling
document.getElementById('mainContainer').style.overflow = 'hidden';
document.getElementById('mainContainer').style.height = 'fit-content';
document.getElementById('mainContainer').style.maxHeight = '4000px';

maxScroll = 0.00;
time = 0;
window.addEventListener('scroll', function() {
    if (window.scrollY > maxScroll){
        maxScroll = window.scrollY;
        console.log(maxScroll);
    }
    temp = Math.floor(maxScroll/2000);
    if (temp > time) {
        time = temp;
        console.log(time); //
        newheight = time * 2000 + 4000
        document.getElementById('mainContainer').style.maxHeight = newheight.toString() +"px";
    }
  });
