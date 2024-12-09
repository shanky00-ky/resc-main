const passwordInput = document.getElementById('password');
const strengthDisplay = document.getElementById('password-strength');

passwordInput.addEventListener('input', function() {
  const password = passwordInput.value;
  let strength = '';


  if (password.length < 8) {
    strength = 'Weak';
    strengthDisplay.style.color = 'red';
  } else if (password.length >= 8 && password.length <= 12) {
    strength = 'Medium';
    strengthDisplay.style.color = 'orange';
  } else if (password.length > 12) {
    strength = 'Strong';
    strengthDisplay.style.color = 'green';
  }

  strengthDisplay.innerHTML = 'Password Strength: ' + strength;
});