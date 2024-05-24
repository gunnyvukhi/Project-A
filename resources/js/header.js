
var justScroll  = 0;
window.addEventListener('scroll', function() {
    let scrolled = Number(window.scrollY);
    haveScroll = scrolled - justScroll;
    justScroll = scrolled;
});
