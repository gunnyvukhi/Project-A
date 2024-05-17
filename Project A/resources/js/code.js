
success = 0
function login() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username === 'admin' && password === 'password123') {
        document.getElementById('message').innerHTML = 'Login successful!';
    } else {
        document.getElementById('message').innerHTML = 'Invalid username or password.';
    }
}

