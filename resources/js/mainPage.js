document.getElementById('HomeIcon').src = 'resources/image/homeIcon2.png';
document.getElementById('HomeMarker').style = 'border-bottom: #74b9ff solid 3.2px';

document.getElementById('Home').classList.remove('headerSection');

document.getElementById('newPostFileInput').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var preview = document.getElementById('previewNewPostFile');
    var buttonImportFile = document.getElementById('selectFileForNewPost');

        preview.innerHTML = '';
        buttonImportFile.style.display = 'none';
    var img = document.createElement('img');
    img.src = URL.createObjectURL(file);
    img.style.width = '468px';
    img.style.display = 'block';
    img.style.borderRadius = '24px'
    preview.appendChild(img);
    document.getElementById('deleteFileForNewPost').style.display = 'block'
});


function openNewPostForm(){
    document.getElementById('modalBackGround').style.display = 'block';
};
function closeNewPostForm() {
    document.getElementById('modalBackGround').style.display = 'none';
};

function importFile(){
    document.getElementById('newPostFileInput').click();
};

function deleteCreatingPost(){
    document.getElementById('newPostFileInput').value = '';
    document.getElementById('newPostCaption').value = ''
    document.getElementById('newPostPrivacy').value = ''
    document.getElementById('previewNewPostFile').innerHTML = ''
    document.getElementById('selectFileForNewPost').style.display = 'block'
    document.getElementById('modalBackGround').style.display = 'none';
};

function deleteFile() {
    document.getElementById('previewNewPostFile').innerHTML = ''
    document.getElementById('selectFileForNewPost').style.display = 'block'
    document.getElementById('newPostFileInput').value = ''
    document.getElementById('deleteFileForNewPost').style.display = 'none'

}
