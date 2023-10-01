function reportErrors(errors) {
    // reset all errors
    for (var error of document.querySelectorAll(".error"))
        error.innerText = "";

    // and report the new errors
    for (var error of errors)
        document.getElementById(`${error.field}-error`).innerText = error.message;
}

var btn = document.getElementById("save-changes");
var defaultText = btn.innerText;

var cancel = document.getElementById("cancel");
if (cancel) {
    cancel.addEventListener("click", e => {
        e.preventDefault();
        location.href = "/contacts.php";
    });
}

let modifiedFields = new Set();
let initialValues = {};
for (let field of ["first-name", "last-name", "email", "phone"]) {
    let input = document.getElementById(field);
    initialValues[field] = input.value;
    input.addEventListener("input", () => {
        if (input.value !== initialValues[field]) {
            input.style.fontStyle = "italic";
            modifiedFields.add(field);
        }
        else {
            input.style.fontStyle = "";
            modifiedFields.delete(field);
        }
    });
}

var form = document.getElementById("edit-contact-form");
form.addEventListener("submit", e => {
    e.preventDefault();

    btn.innerText = "Please wait...";
    btn.disabled = true;

    function reset() {
        btn.innerText = defaultText;
        btn.disabled = false;
    }

    var data = {
        "first-name": document.getElementById("first-name").value,
        "last-name": document.getElementById("last-name").value,
        "email": document.getElementById("email").value,
        "phone": document.getElementById("phone").value,
    };
    var searchParams = new URLSearchParams(location.search);
    var id = searchParams.get("id");
    if (id !== null)
        data["id"] = id;
    var json = JSON.stringify(data);
    var xhr = new XMLHttpRequest();
    xhr.addEventListener("readystatechange", () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            try {
                var res = JSON.parse(xhr.responseText);
                if (res.success) {
                    location.href = searchParams.get("return") ?? "/contacts.php";
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
    xhr.open("POST", "/api/edit-contact.php");
    xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhr.send(json);
});
