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

function displayMoreUser(id, name, avatar, about) {

  li = document.createElement("li");

  UsersContainer = document.createElement("div")
  UsersContainer.classList.add("UsersContainer");
  
  // Avatar
  userAvatarLink = document.createElement("a");
  userAvatarLink.classList.add("userAvatarLink");
  userAvatarLink.href = "http://localhost/project-a/profile?id=" + id;

  userAvatar = document.createElement("img")
  userAvatar.classList.add("userAvatar");
  if (avatar) {
    userAvatar.src = "resources\\image\\userAvater\\" + avatar;
  } else {userAvatar.src = "resources\\image\\demoPersonIcon.png"}
  

  // xong avatar
  userAvatarLink.appendChild(userAvatar);
  UsersContainer.appendChild(userAvatarLink);

  // Ten va thong tin
  userInfomationContainer = document.createElement("div")
  userInfomationContainer.classList.add("userInfomationContainer");

  userName = document.createElement("a")
  userName.classList.add("userName");
  userName.innerHTML = name;
  userName.href = "http://localhost/project-a/profile?id=" + id;

  otherInfomation = document.createElement("p")
  otherInfomation.classList.add("otherInfomation");
  otherInfomation.innerHTML = about;

  //Xong ten va thong tin
  userInfomationContainer.appendChild(userName);
  userInfomationContainer.appendChild(otherInfomation);
  UsersContainer.appendChild(userInfomationContainer);

  //Nut di den trang ca nhan
  seeProfileBtn = document.createElement("a")
  seeProfileBtn.classList.add("seeProfileBtn");
  seeProfileBtn.innerHTML = "Xem trang cá nhân";
  seeProfileBtn.href = "http://localhost/project-a/profile?id=" + id;

  li.appendChild(UsersContainer);
  li.appendChild(seeProfileBtn);
  document.getElementById('DisplayUserResult').appendChild(li);
}

// hien thi mac định
for (var i = 0; i < All_user.length; i++) {
  if (i == 5) {break;}
  displayMoreUser(All_user[i]['user_id'], All_user[i]['user_name'], All_user[i]['avatar'], "Song tai Hanoi")
}