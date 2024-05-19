// Remember me function
function rememberMechecked() {
    document.getElementById('rememberMe').checked = (!(document.getElementById('rememberMe').checked));
}

// login function
// Nếu Login thất bại thì success = 0;
let success = 1;
function login() {
    if ((!document.getElementById('Email').value) || (!document.getElementById('password').value)){
        success = 0;
    }
    if (!success) {
        document.getElementById('result').innerHTML = 'Sai tài khoản email hoặc mật khẩu';
    }
}

function ReturnToSignIn(){
    document.getElementById("loginContainer").style.display = 'none';
    document.getElementById("SignInContainer").style.display = 'unset';
    document.getElementById("forgotPasswordContainer").style.display = 'none';
    document.getElementById("messageContainer").style.display = 'none';
}


const signInList = document.getElementsByClassName('signIn')
for(let i = 0; i < signInList.length; i++) {
    signInList[i].addEventListener("click", ReturnToSignIn);
}

function ReturnToLogIn(){
    document.getElementById("loginContainer").style.display = 'unset';
    document.getElementById("SignInContainer").style.display = 'none';
    document.getElementById("forgotPasswordContainer").style.display = 'none';
    document.getElementById("messageContainer").style.display = 'none';
}


const logInList = document.getElementsByClassName('logIn')
for(let i = 0; i < logInList.length; i++) {
    logInList[i].addEventListener("click", ReturnToLogIn);
}

function goToForgotPassword(){
    document.getElementById("loginContainer").style.display = 'none';
    document.getElementById("SignInContainer").style.display = 'none';
    document.getElementById("forgotPasswordContainer").style.display = 'unset';
    document.getElementById("messageContainer").style.display = 'none';
}

document.getElementById("forgotPassword").addEventListener("click", goToForgotPassword);

let khoiPhucMatKhau = 0;
function afterForgotPassword(){
    if (khoiPhucMatKhau){
        document.getElementById("forgotPasswordContainer").style.display = 'none';
        document.getElementById("messageContainer").style.display = 'unset';
    }else{
        document.getElementById('passwordResult').innerHTML = 'Tài khoản email không hợp lệ';
    }
}



