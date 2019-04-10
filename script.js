<<<<<<< HEAD
//email validation
const email = document.getElementById("email");
email.addEventListener("focusout", () => {
    if (!isEmailValid(email)) {
        email.style.borderBottomColor = "red";
        email.removeEventListener("focusout", () => {
        });
    }
    email.addEventListener(("keyup"), () => {
        if (!isEmailValid(email)) {
            email.style.borderBottomColor = "red";
        } else {
            email.style.borderBottomColor = "";
        }
    });
});

function isEmailValid(email) {
    return /.+@.+\..+/.test(email.value);
}

//pass validation
const pass = document.getElementById("pass");
pass.addEventListener("focusout", () => {
    if (!isPassValid(pass)) {
        pass.style.borderBottomColor = "red";
        pass.removeEventListener("focusout", () => {
        });
    }
    pass.addEventListener(("keyup"), () => {
        if (!isPassValid(pass)) {
            pass.style.borderBottomColor = "red";
        } else {
            pass.style.borderBottomColor = "";
        }
    });
});

function isPassValid(pass) {
    return pass.value.length <= 8 && pass.value.length >= 6
}

//checkbox validation
const isAgree = document.getElementById("agree");

//submit form
function continueOrNot() {
    if (isEmailValid(email) && isPassValid(pass) && isAgree.checked) {
        return true;
    } else {
        alert("Please fill the form");
        return false;
    }
}

=======
//email validation
const email = document.getElementById("email");
email.addEventListener("focusout", () => {
    if (!isEmailValid(email)) {
        email.style.borderBottomColor = "red";
        email.removeEventListener("focusout", () => {
        });
    }
    email.addEventListener(("keyup"), () => {
        if (!isEmailValid(email)) {
            email.style.borderBottomColor = "red";
        } else {
            email.style.borderBottomColor = "";
        }
    });
});

function isEmailValid(email) {
    return /.+@.+\..+/.test(email.value);
}

//pass validation
const pass = document.getElementById("pass");
pass.addEventListener("focusout", () => {
    if (!isPassValid(pass)) {
        pass.style.borderBottomColor = "red";
        pass.removeEventListener("focusout", () => {
        });
    }
    pass.addEventListener(("keyup"), () => {
        if (!isPassValid(pass)) {
            pass.style.borderBottomColor = "red";
        } else {
            pass.style.borderBottomColor = "";
        }
    });
});

function isPassValid(pass) {
    return pass.value.length <= 8 && pass.value.length >= 6
}

//checkbox validation
const isAgree = document.getElementById("agree");

//submit form
function continueOrNot() {
    if (isEmailValid(email) && isPassValid(pass) && isAgree.checked) {
        return true;
    } else {
        alert("Please fill the form");
        return false;
    }
}

>>>>>>> 7289427dfb1753cdb16901b1dab501c62538e44a
