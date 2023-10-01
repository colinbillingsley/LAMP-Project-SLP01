const signOut = document.getElementById("sign-out");
signOut.addEventListener("click", () => {
    var xhr = new XMLHttpRequest();
    xhr.addEventListener("readystatechange", () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            try {
                var res = JSON.parse(xhr.responseText);
                if (res.success) {
                    location.href = "/";
                }
                else {
                    alert("An unknown error occurred. Please try again.");
                }
            }
            catch (e) {
                alert("An unknown error occurred. Please try again.");
            }
        }
    });
    xhr.addEventListener("error", () => {
        alert("A network error occurred");
    });
    xhr.open("POST", "/api/signout.php");
    xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhr.send(JSON.stringify({}));
});
