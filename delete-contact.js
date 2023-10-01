function reportErrors(errors) {
    // reset all errors
    for (var error of document.querySelectorAll(".error"))
        error.innerText = "";

    // and report the new errors
    for (var error of errors)
        document.getElementById(`${error.field}-error`).innerText = error.message;
}

var btn = document.getElementById("confirm-delete");
var defaultText = btn.innerText;

var cancel = document.getElementById("cancel");
if (cancel) {
    cancel.addEventListener("click", e => {
        e.preventDefault();
        location.href = "/contacts.php";
    });
}

var form = document.getElementById("delete-contact-form");
form.addEventListener("submit", e => {
    e.preventDefault();

    btn.innerText = "Please wait...";
    btn.disabled = true;

    function reset() {
        btn.innerText = defaultText;
        btn.disabled = false;
    }

    var searchParams = new URLSearchParams(location.search);
    var json = JSON.stringify({ "id": searchParams.get("id") });
    var xhr = new XMLHttpRequest();
    xhr.addEventListener("readystatechange", () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            try {
                var res = JSON.parse(xhr.responseText);
                if (res.success) {
                    location.href = "/contacts.php";
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
    xhr.open("POST", "/api/delete-contact.php");
    xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhr.send(json);
});
