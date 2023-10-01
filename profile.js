function reportErrors(errors) {
    // reset all errors
    for (var error of document.querySelectorAll(".error"))
        error.innerText = "";

    // and report the new errors
    for (var error of errors)
        document.getElementById(`${error.field}-error`).innerText = error.message;
}

let modifiedFields = new Set();
let initialValues = {};
for (let field of ["first-name", "last-name", "email", "phone", "username"]) {
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

var btn = document.getElementById("save-changes");

btn.addEventListener("mouseout", () => {
    if (btn.innerText === "Saved")
        btn.innerText = "Save Changes";
});

var form = document.getElementById("profile-form");
form.addEventListener("submit", e => {
    e.preventDefault();

    btn.innerText = "Please wait...";
    btn.disabled = true;

    function reset() {
        btn.innerText = "Save Changes";
        btn.disabled = false;
    }

    var fields = {};
    for (let field of modifiedFields)
        fields[field] = document.getElementById(field).value;
    if (document.getElementById("password").value !== "")
        fields["password"] = document.getElementById("password").value;
    var json = JSON.stringify(fields);
    var xhr = new XMLHttpRequest();
    xhr.addEventListener("readystatechange", () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            try {
                var res = JSON.parse(xhr.responseText);
                if (res.success) {
                    for (let field in fields) {
                        document.getElementById(field).style.fontStyle = "";
                        initialValues[field] = fields[field];
                    }
                    modifiedFields.clear();
                    btn.innerText = "Saved";
                    btn.disabled = false;
                    reportErrors([]);
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
    xhr.open("POST", "/api/edit-profile.php");
    xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhr.send(json);
});
