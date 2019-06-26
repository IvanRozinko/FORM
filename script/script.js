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
        return regExp.test(input.value) && !input.value.empty();
    }


    //get all data from inputs
    $("input[name=send]").on("click", (event) => {
        event.preventDefault();
        const name = $("#name");
        const age = $("#age");
        const errorName = $("#error_name");
        const errorAge = $("#error_age");
        const result = $("#saved");
        $.ajax({
            url: "saveUserData.php",
            type: "POST",
            data: {
                "name": name.val(),
                "age": age.val(),
                "gender": $("input[name=gender]").val(),
                "breed": $(".breed_selector option:selected").text()
            },
            success: function (data) {
                const obj = JSON.parse(data);
                if (obj.isValid) {
                    result.text("Your data has been saved");
                    name.val("");
                    age.val("");
                    errorName.text("");
                    errorAge.text("");
                } else {
                    errorName.text(obj.error_name);
                    errorAge.text(obj.error_age);
                }
            }
        })
    })
});

