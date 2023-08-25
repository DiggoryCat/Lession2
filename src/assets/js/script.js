const form = document.getElementById('form-register');
var isValid = false;
function processFormData(e) {
    e.preventDefault();
    // Validate Form
    validateForm();
    // Submit if Valid
    if(isValid){
        form.su
    }
}

function validateForm() {
    let pw = document.getElementById("pwd1").value;
    let cfpw = document.getElementById("pwd2").value;
    let message = document.getElementById("message");
    if (cfpw === pw) {
        document.getElementById("pwd2").style.borderColor = "green";
        message.style.display="none";
        isValid = true;
        return;
    } else {
        document.getElementById("pwd2").style.borderColor = "red";
        message.textContent='Passwords do not match!'
        isValid = false;
        return;

    }
}
// form.addEventListener('submit', processFormData);


