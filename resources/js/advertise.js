function openAdvertiseNemu() {
    document.getElementById("adBackGround").style.display = "block";
}
function closeAdvertiseNemu() {
    document.getElementById("adBackGround").style.display = "none";
}

function closeNewAdvertiseForm(){
    document.getElementById("NewAdvertiseBackGround").style.display = "none";
    document.getElementById("adBackGround").style.display = "block";
}

function openNewAdvertiseForm(){
    document.getElementById("NewAdvertiseBackGround").style.display = "block";
    document.getElementById("adBackGround").style.display = "none";
}

// Thay ảnh khi tạo Advertise
document.getElementById('newAdFileInput').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var preview = document.getElementById('previewNewAdFile');
    var buttonImportFile = document.getElementById('selectFileForNewAd');

        preview.innerHTML = '';
        buttonImportFile.style.display = 'none';
    var img = document.createElement('img');
    img.src = URL.createObjectURL(file);
    img.style.width = '468px';
    img.style.display = 'block';
    img.style.borderRadius = '24px'
    preview.appendChild(img);
    document.getElementById('deleteFileForNewAd').style.display = 'block'
});


function importAdFile(){
    document.getElementById('newAdFileInput').click();
};

function deleteCreatingAd(){
    document.getElementById('newAdFileInput').value = '';
    document.getElementById('newAdCaption').value = ''
    document.getElementById('previewNewAdFile').innerHTML = ''
    document.getElementById('selectFileForNewAd').style.display = 'block'
    closeNewAdvertiseForm();
};

function deleteAdFile() {
    document.getElementById('previewNewAdFile').innerHTML = ''
    document.getElementById('selectFileForNewAd').style.display = 'block'
    document.getElementById('newAdFileInput').value = ''
    document.getElementById('deleteFileForNewAd').style.display = 'none'

}

/* chuyển động của thanh add Url */
document.getElementById('adLinkToBox').addEventListener('mouseover', function() {
    document.getElementById('adLinkToBoxInput').style = 'width: 160px; border-radius: 16px;';
    document.getElementById('adLinkToImage').style.display = 'none';
    document.getElementById('adLinkToBoxInput').placeholder = "Nhập URL tại đây"
});

document.getElementById('adLinkToBox').addEventListener('mouseout', function() {
    adLinkTo_content = document.getElementById('adLinkToBoxInput');
    if (adLinkTo_content.value == '') {
        adLinkTo_content.blur();
        adLinkTo_content.style = 'width: 40px; border-radius: 20px;';
        document.getElementById('adLinkToImage').style.display = 'unset';
        document.getElementById('adLinkToBoxInput').placeholder = ""
    }
});



const ads = document.querySelectorAll(".advLink");
Seen = Array(ads.length).fill(false);
ads.forEach(function (ad) {
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
        id = ad.id.slice(3, ad.id.length);

        if (!Seen[id]){
            console.log(id);
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "adv-view-plus?id=" + id, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + id);
            Seen[id] = true;
            console.log("Done");
        }
    }
  });
}, {});

observer.observe(ad);
})