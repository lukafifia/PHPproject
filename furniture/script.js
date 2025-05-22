const container = document.getElementById('container');
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const overlayRight = document.querySelector('.overlay-right p');
const overlayRightH1 = document.querySelector('.overlay-right h1');
const overlayLeft = document.querySelector('.overlay-left p');
const overlayLeftH1 = document.querySelector('.overlay-left h1');

signUpButton.addEventListener('click', () => {
    container.classList.toggle('right-panel-active');
    if (container.classList.contains('right-panel-active')) {
        signUpButton.textContent = 'Log In';
        overlayRightH1.textContent = 'Already have an account?';
        overlayRight.textContent = 'Please log in with your personal info';
    } else {
        signUpButton.textContent = 'Sign Up';
        overlayRightH1.textContent = 'Hello, Friend!';
        overlayRight.textContent = 'Enter your personal details and start journey with us';
    }
});

signInButton.addEventListener('click', () => {
    container.classList.toggle('right-panel-active');
    if (container.classList.contains('right-panel-active')) {
        signUpButton.textContent = 'Log In';
        overlayRightH1.textContent = 'Already have an account?';
        overlayRight.textContent = 'Please log in with your personal info';
    } else {
        signUpButton.textContent = 'Sign Up';
        overlayRightH1.textContent = 'Hello, Friend!';
        overlayRight.textContent = 'Enter your personal details and start journey with us';
    }
});

function signUp() {
    const name = document.getElementById('signUpName').value;
    const email = document.getElementById('signUpEmail').value;
    const password = document.getElementById('signUpPassword').value;

    alert(`Sign Up successful!\nName: ${name}\nEmail: ${email}`);
}

function signIn() {
    const email = document.getElementById('signInEmail').value;
    const password = document.getElementById('signInPassword').value;

    alert(`Sign In successful!\nEmail: ${email}`);
}
