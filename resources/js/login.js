// Remember me function
function rememberMechecked() {
    document.getElementById('rememberMe').checked = (!(document.getElementById('rememberMe').checked));
}

// login function 
// Nếu Login thất bại thì success = 0;
let success = 1;
function login() {
    if (!success) {
        document.getElementById('result').innerHTML = 'Sai tài khoản email hoặc mật khẩu';
    }
}

