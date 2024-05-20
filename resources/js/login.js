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




