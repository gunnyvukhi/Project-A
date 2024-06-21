document.getElementById('WatchIcon').src = 'resources/image/watchIcon2.png';
document.getElementById('WatchMarker').style = 'border-bottom: #74b9ff solid 3.2px';
document.getElementById('Watch').classList.remove('headerSection');

document.getElementById('watchMainPageIcon').src = 'resources/image/watchMainPageIcon2.png';
document.getElementById('TrangChu').style.backgroundColor = '#e1e2e3'

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
