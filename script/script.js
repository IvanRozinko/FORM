

$(document).ready(function () {
    //connect dropdown plugin
    $("select").niceSelect();
    //connect slider plugin
    $(".slide").slide();


    /**
     * Checking is all inputs are valid, if yes - opening next page
     * @returns {boolean}
     */
    $("#submit").on("click", function () {
        if (isValid(email, emailRegExp) && isValid(pass, passwordRegExp) && isAgree.checked) {
            const $formEnter =  $("#form");
            const $formOne =  $("#form1");
            $formEnter.addClass("hidden");
            $formOne.removeClass("hidden");
            $formOne.addClass("form");
        }
    });
});



const emailRegExp = /.+@.+\..+/;
//email validation
const email = document.getElementById("email");
email.addEventListener("focusout", () => {
    if (!isValid(email, emailRegExp)) {
        email.removeEventListener("focusout", () =>{});
    }
    email.addEventListener(("keyup"), () => {isValid(email, emailRegExp)});
});

const passwordRegExp = /^[\w\d]{8,}$/;
//pass validation
const pass = document.getElementById("pass");
pass.addEventListener("focusout", () => {
    if (!isValid(pass, passwordRegExp)) {
        pass.removeEventListener("focusout", () =>{});
    }
    pass.addEventListener(("keyup"), () => {isValid(pass, passwordRegExp)});
});


//checkbox validation
const isAgree = document.getElementById("agree");


//validate name
const name = document.getElementById("name");
name.addEventListener("focusout", () => {
    if (!isValid(name, nameRegExp)) {
        name.removeEventListener("focusout", () =>{});
    }
    name.addEventListener(("keyup"), () => {isValid(name, nameRegExp)});
});

//validate age
const age = document.getElementById("age");
age.addEventListener("focusout", () => {
    if (!isValid(age, ageRegExp)) {
        age.removeEventListener("focusout", () =>{});
    }
    age.addEventListener(("keyup"), () => {isValid(age, ageRegExp)});
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
    } else {
        input.className = "";
    }
    return true;
}