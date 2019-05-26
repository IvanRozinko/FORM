$(document).ready(function () {
    //connect dropdown plugin
    $(".breed_selector").niceSelect();
    //connect slider plugin
    $(".slide").slide();

    const regExps =
        [
            {name: "email", regExp: /.+@.+\..+/},
            {name: "pass", regExp: /^[\w]{8,16}$/},
            {name: "name", regExp: /^[A-Za-z]+$/},
            {name: "age", regExp: /^[0-9]{1,2}$/}
        ];

    const validateInputs = document.getElementsByClassName("validateInput");

    Array.from(validateInputs).forEach((input) => {
        input.addEventListener("focusout", function () {
            const inputID = this.id;
            let obj = regExps.find(item => {
                return item.name === inputID
            });

            if (!isValid(this, obj.regExp)) {
                this.className = "invalid";
                this.removeEventListener("focusout", () => {
                });
            }
            this.addEventListener("keyup", () => {
                this.className = isValid(this, obj.regExp) ? "" : "invalid";
            });
        });
    });

    /**
     * Checking is string from input matches the regular expression and returning boolean answer
     * @param input
     * @param regExp
     * @returns {boolean}
     */
    function isValid(input, regExp) {
        return regExp.test(input.value);
    }
});

