
const emailRegExp = /.+@.+\..+/;
const passwordRegExp = /^[\w\d]{8,}$/;


//email validation
const email = document.getElementById("email");
email.addEventListener("focusout", () => {
    if (!isValid(email, emailRegExp)) {
        email.removeEventListener("focusout", () =>{});
    }
    email.addEventListener(("keyup"), () => {isValid(email, emailRegExp)});
});

//pass validation
const pass = document.getElementById("pass");
pass.addEventListener("focusout", () => {
    if (!isValid(pass, passwordRegExp)) {
        pass.removeEventListener("focusout", () =>{});
    }
    pass.addEventListener(("keyup"), () => {isValid(pass, passwordRegExp)});
});

/**
 * Checking is string from input matches the regular expression and returning boolean answer
 * @param input
 * @param regExp
 * @returns {boolean}
 */
function isValid(input, regExp) {
    if (!regExp.test(input.value)){
        input.className = "invalid";
        return false;
    }else {
        input.className = "";
    }
    return true;
}

//checkbox validation
const isAgree = document.getElementById("agree");

/**
 * Checking is all inputs are valid, if yes - opening next page
 * @returns {boolean}
 */
function continueOrNot() {
    return isValid(email, emailRegExp) && isValid(pass, passwordRegExp) && isAgree.checked;
}
