function toggleForms() {
    const loginForm = document.getElementById('Loginformcontainer');
    const registerForm = document.getElementById('registercontainer');
    loginForm.style.display = loginForm.style.display === 'none' ? 'block' : 'none';
    registerForm.style.display = registerForm.style.display === 'none' ? 'block' : 'none';
    document.getElementById('message').innerHTML = '';
}