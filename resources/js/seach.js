document.getElementById("allResult").click();

function fillterSelect(id, img){

  document.querySelectorAll(".fuctionLink").forEach(function(element){element.style.backgroundColor = '';});

  document.querySelectorAll(".fuctionLink img").forEach(function(other){
    other.src = 'resources\\image\\' + other.id + '1.png';
  });
  
  document.getElementById(id).style.backgroundColor = '#e1e2e3'
  document.getElementById(img).src = 'resources\\image\\' + img + '2.png';

}



// play video khi ở trong màn hình
const targets = document.querySelectorAll('.playVideoIcon');

function handleIntersection(entries) {
    entries.map((entry) => {
        if (entry.isIntersecting) {
            postId = entry.target.id.slice(13, entry.target.id.length);
            document.getElementById('playVideoIcon' + postId).style.display = 'none';
        }
    });
  }

const observer = new IntersectionObserver(handleIntersection);
targets.forEach(video => observer.observe(video));


const videos = document.querySelectorAll(".postContainer video");
videos.forEach(function (video) {
    let playState = null;

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (!entry.isIntersecting) {
      video.pause();
      playState = false;
    } else {
      video.play();
      playState = true;
    }
  });
}, {});

observer.observe(video);

const onVisibilityChange = () => {
  if (document.hidden || !playState) {
    video.pause();
  } else {
    video.play();
  }
};

document.addEventListener("visibilitychange", onVisibilityChange);
})
