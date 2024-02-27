function onRecaptchaSuccess() {
    document.getElementById("email").removeAttribute("disabled");
    document.getElementById("password").removeAttribute("disabled");
    document.getElementById("password2").removeAttribute("disabled");
    document.getElementById("submitBtn").removeAttribute("disabled");
}