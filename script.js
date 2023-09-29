// create delete button
    let deleteBtn = document.createElement("button");
    deleteBtn.textContent = "X";
    deleteBtn.setAttribute("id", "delete-btn");
    deleteBtn.classList.add("main-button");
    deleteBtn.classList.add("delete");

    // create done button
    let doneBtn = document.createElement("button");
    doneBtn.textContent = "Done";
    doneBtn.setAttribute("id", "done-button");
    doneBtn.classList.add("main-button");
    doneBtn.classList.add("border");

    // create cancel button
    let cancelBtn = document.createElement("button");
    cancelBtn.textContent = "Cancel";
    cancelBtn.setAttribute("id", "cancel-button")
    cancelBtn.classList.add("main-button");
    cancelBtn.classList.add("border");

function addContact() {
    // get table
    let contactTable = document.getElementById("contacts-table");

    // create input boxes for table
    let lastName = document.createElement("input");
    let firstName = document.createElement("input");
    let email = document.createElement("input");
    let phone = document.createElement("input");
    let username = document.createElement("input");

    // set input boxes type
    lastName.type = "text";
    firstName.type = "text";
    email.type = "text";
    phone.type = "phone";
    username.type = "text";

    // create new row
    let newRow = contactTable.insertRow(-1);

    // insert new cells in the row
    let deleteCell = newRow.insertCell(0);
    let fNameCell = newRow.insertCell(1);
    let LNameCell  = newRow.insertCell(2);
    let emailCell = newRow.insertCell(3);
    let phoneCell = newRow.insertCell(4);
    let userCell = newRow.insertCell(5);

    // add the input boxes into each cell
    deleteCell.appendChild(deleteBtn);
    fNameCell.appendChild(firstName);
    LNameCell.appendChild(lastName);
    emailCell.appendChild(email);
    phoneCell.appendChild(phone);
    userCell.appendChild(username);

    // get the number of rows
    let rowCount = contactTable.rows.length;

    // once add contact is clicked, button displays none
    let addBtn = document.getElementById("add-contact");
    addBtn.style.display = "none";
    doneBtn.style.display = "flex";
    cancelBtn.style.display = "flex";

    // add the done and cancel buttons to table footer
    let contactFooter = document.getElementById("table-footer");
    contactFooter.appendChild(doneBtn);
    contactFooter.appendChild(cancelBtn);

    // listen for click on cancel
    document.getElementById("cancel-button").addEventListener("click", cancel);

    function cancel() {
        // delete the last row
        contactTable.deleteRow(rowCount - 1);

        // add contact should display again
        // done and cancel display none
        doneBtn.style.display = "none";
        cancelBtn.style.display = "none";
        addBtn.style.display = "flex";
    }
}