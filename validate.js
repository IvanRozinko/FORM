$(document).ready(function () {
    //connect slider plugin
    $(".slide").slide();

    const regExps =
        [
            {name: "email", regExp: /.+@.+\..+/},
            {name: "pass", regExp: /^[\w]{8,16}$/}
        ];

    let isAllInputsValid = true;
    const validateInputs = document.getElementsByClassName("validateInput");

    Array.from(validateInputs).forEach((input) => {
        input.addEventListener("focusout", function () {
            const inputID = this.id;
            let obj = regExps.find(item => {
                return item.name === inputID
            });

            if (!isValid(this, obj.regExp)) {
                isAllInputsValid = false;
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
        return regExp.test(input.value) && input.value !== '';
    }


    //get all data from inputs
    $("form").on("submit", (event) => {
        event.preventDefault();
        if (isAllInputsValid) {
            $.ajax({
                url: "login.php",
                type: "POST",
                data: {
                    "email": $("#email").val(),
                    "pass": $("#pass").val(),
                    "agree": $("#agree").is(':checked')
                },
                success: function (data) {
                    if (data === 'ok') {
                        window.location = "form.php";
                    } else {
                        const obj = JSON.parse(data);
                        $("#error_email").text(obj.error_email);
                        $("#error_pass").text(obj.error_pass);
                        $("#error_agree").text(obj.error_agree);
                    }
                }
            })
        }
    })
});

