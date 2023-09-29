// create delete button
    const deleteBtn = document.createElement("button");
    deleteBtn.textContent = "X";
    deleteBtn.onclick = "deleteContact";
    deleteBtn.setAttribute("id", "delete-btn");
    deleteBtn.classList.add("main-button");
    deleteBtn.classList.add("delete");

    // create done button
    const doneBtn = document.createElement("button");
    doneBtn.textContent = "Done";
    doneBtn.setAttribute("id", "done-button");
    doneBtn.classList.add("main-button");
    doneBtn.classList.add("border");

    // create cancel button
    const cancelBtn = document.createElement("button");
    cancelBtn.textContent = "Cancel";
    cancelBtn.setAttribute("id", "cancel-button")
    cancelBtn.classList.add("main-button");
    cancelBtn.classList.add("border");

function addContact() {
    // get table
    const contactTable = document.getElementById("contacts-table");

    // create input boxes for table
    const firstName = document.createElement("input");
    firstName.required = true;
    const lastName = document.createElement("input");
    lastName.required = true;
    const email = document.createElement("input");
    email.required = true;
    const phone = document.createElement("input");
    phone.required = true;
    const username = document.createElement("input");
    username.required = true;

    // set input boxes type
    firstName.type = "text";
    lastName.type = "text";
    email.type = "text";
    phone.type = "phone";
    username.type = "text";

    // create new row
    const newRow = contactTable.insertRow(-1);

    // insert new cells in the row
    const deleteCell = newRow.insertCell(0);
    const fNameCell = newRow.insertCell(1);
    const LNameCell  = newRow.insertCell(2);
    const emailCell = newRow.insertCell(3);
    const phoneCell = newRow.insertCell(4);
    const userCell = newRow.insertCell(5);

    // add the input boxes into each cell
    fNameCell.appendChild(firstName);
    LNameCell.appendChild(lastName);
    emailCell.appendChild(email);
    phoneCell.appendChild(phone);
    userCell.appendChild(username);

    // get the number of rows
    const rowCount = contactTable.rows.length;

    // once add contact is clicked, button displays none
    const addBtn = document.getElementById("add-contact");
    addBtn.style.display = "none";
    doneBtn.style.display = "flex";
    cancelBtn.style.display = "flex";

    // add the done and cancel buttons to table footer
    const contactFooter = document.getElementById("table-footer");
    contactFooter.appendChild(doneBtn);
    contactFooter.appendChild(cancelBtn);

    // listen for click on cancel
    cancelBtn.addEventListener("click", cancel);
    doneBtn.addEventListener("click", done);

    function cancel() {
        // delete the last row
        contactTable.deleteRow(rowCount - 1);

        // add contact should display again
        // done and cancel display none
        doneBtn.style.display = "none";
        cancelBtn.style.display = "none";
        addBtn.style.display = "flex";
    }

    // !!! temporary until solution finalized !!!
    function done() {
        // delete the last row
        contactTable.deleteRow(rowCount - 1);

        // add contact should display again
        // done and cancel display none
        doneBtn.style.display = "none";
        cancelBtn.style.display = "none";
        addBtn.style.display = "flex";
    }
}

// delete contact in contact table
function deleteContact (event) {
    // return a confirmation message when wanting to delete a contact
    if (confirm("Are you sure you want to delete this contact?")) {
        // get the row index
        const index = event.parentNode.parentNode.rowIndex;
        // delete the row
        document.getElementById("contacts-table").deleteRow(index);
    } 
    // user presses cancel, we leave the function
    else {
        return;
    }
}