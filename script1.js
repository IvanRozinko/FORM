const nameRegExp = /^\w+$/;
const ageRegExp = /^\d{1,2}$/;


//validate name
const name = document.getElementById("name");
name.addEventListener("focusout", () => {
    if (!isValid(email, emailRegExp)) {
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
    }else {
        input.className = "";
    }
    return true;
}