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
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "adv-view-plus?id=" + id, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + id);
            Seen[id] = true;
        }
    }
  });
}, {});

observer.observe(ad);
})

var aWait = 0;
function deleteAd(id) {
    document.getElementById('deleteAdReminderBackground').style.display = 'block';
    aWait = id.slice(14, id.length);
}

function doneDeleteAd(command) {
    document.getElementById('deleteAdReminderBackground').style.display = 'none';
    if (command){
        document.getElementById("adReview" + aWait).style.display = 'none';
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "adv-delete?id=" + aWait, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + aWait);
    }
}


// Kiem tra gia tien thanh toan
function sum(array) {
    let sum = 0;
    for (let i = 0; i < array.length; i++) {
        sum += array[i];
    }
    return sum;
}

var cost = [50000, 35000, 10000];
function Advertise_cost(vnd, index) {
    cost[index] = vnd
    Total = sum(cost)
    document.getElementById('FinnalCostAdv').innerHTML = 'Giá: ' + Total + ' VNĐ';
    document.getElementById('advCost').value = Total
}

document.querySelectorAll('.containerDetailsOptions select').forEach(function(select) {
    select.addEventListener("change", function() {
    if (this.value == "5") { // Gia tien cua Rate
        Advertise_cost(50000, 0);
    }else if (this.value == "10"){
        Advertise_cost(95000, 0);
    }else if (this.value == "20"){
        Advertise_cost(180000, 0);
    }
    else if (this.value == "7"){ // Gia tien cua Time
        Advertise_cost(35000, 1);
    }else if (this.value == "14"){
        Advertise_cost(65000, 1);
    }else if (this.value == "30"){
        Advertise_cost(140000, 1);
    }
    else if (this.value == "1000"){ // gia tien cua views
        Advertise_cost(10000, 2);
    }else if (this.value == "5000"){
        Advertise_cost(45000, 2);
    }else if (this.value == "10000"){
        Advertise_cost(90000, 2);
    }
  });
});