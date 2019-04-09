//validate name
const name = document.getElementById("name");
name.addEventListener("focusout", () => {
    if (!isNameValid(name)) {
        name.style.borderBottomColor = "red";
        name.removeEventListener("focusout", () => {
        });
    }
    name.addEventListener("keyup", () => {
        if (!isNameValid(name)) {
            name.style.borderBottomColor = "red";
        } else {
            name.style.borderBottomColor = "";
        }
    });
});

function isNameValid(name) {
    return /^[A-Za-z]+$/.test(name.value);
}

//validate age
const age = document.getElementById("age");
age.addEventListener("focusout", () => {
    if (!isAgeValid(age)) {
        age.style.borderBottomColor = "red";
        age.removeEventListener("focusout", () => {
        });
    }
    age.addEventListener("keyup", () => {
        if (!isAgeValid(age)) {
            age.style.borderBottomColor = "red";
        } else {
            age.style.borderBottomColor = "";
        }
    });
});

function isAgeValid(age) {
    return /^\d{0,2}$/.test(age.value);
}