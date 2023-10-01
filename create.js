function reportErrors(errors) {
    // reset all errors
    for (var error of document.querySelectorAll(".error"))
        error.innerText = "";

    // and report the new errors
    for (var error of errors)
        document.getElementById(`${error.field}-error`).innerText = error.message;
}

var form = document.getElementById("signup-form");
form.addEventListener("submit", e => {
    e.preventDefault();

    var btn = document.getElementById("create");
    var txt = document.getElementById("submit-text");
    txt.innerText = "Please wait...";
    btn.disabled = true;

    function reset() {
        txt.innerText = "Create Account";
        btn.disabled = false;
    }

    var json = JSON.stringify({
        "first-name": document.getElementById("first-name").value,
        "last-name": document.getElementById("last-name").value,
        "email": document.getElementById("email").value,
        "phone": document.getElementById("phone").value,
        "username": document.getElementById("username").value,
        "password": document.getElementById("password").value,
    });
    var xhr = new XMLHttpRequest();
    xhr.addEventListener("readystatechange", () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            try {
                var res = JSON.parse(xhr.responseText);
                if (res.success) {
                    location.href = "/main.php";
                }
                else {
                    reset();
                    reportErrors(res.errors);
                }
            }
            catch (e) {
                console.error(e);
                reset();
                reportErrors([{
                    field: "global",
                    message: "An unknown error occurred. Please try again.",
                }]);
            }
        }
    });
    xhr.addEventListener("error", () => {
        reset();
        reportErrors([{
            field: "global",
            message: "A network error occurred. Please try again.",
        }]);
    });
    xhr.open("POST", "/api/signup.php");
    xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhr.send(json);
});
