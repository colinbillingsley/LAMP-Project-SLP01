const search = document.getElementById("search");
const searchValue = search.value;
search.addEventListener("keydown", e => {
    if (e.key === "Enter") {
        if (search.value === "") {
            location.href = "/contacts.php";
        }
        else {
            location.href = `/contacts.php?q=${encodeURIComponent(search.value)}`;
        }
    }
});

document.getElementById("add-contact").addEventListener("click", () => {
    location.href = "/edit-contact.php";
});

const prevPage = document.getElementById("prev-page");
const nextPage = document.getElementById("next-page");

function navigationHandler() {
    if (searchValue !== "")
        location.href = `/contacts.php?page=${this.getAttribute("data-page")}&q=${encodeURIComponent(searchValue)}`;
    else
        location.href = `/contacts.php?page=${this.getAttribute("data-page")}`;
}

if (prevPage)
    prevPage.addEventListener("click", navigationHandler);

if (nextPage)
    nextPage.addEventListener("click", navigationHandler);

for (const editButton of document.querySelectorAll(".edit-button")) {
    editButton.addEventListener("click", function() {
        const contactId = this.parentElement.parentElement.getAttribute("data-contact-id");
        location.href = `/edit-contact.php?id=${contactId}&return=${encodeURIComponent(location.pathname + location.search)}`;
    });
}

for (const deleteButton of document.querySelectorAll(".delete-button")) {
    deleteButton.addEventListener("click", function() {
        const contactId = this.parentElement.parentElement.getAttribute("data-contact-id");
        location.href = `/delete-contact.php?id=${contactId}`;
    });
}
