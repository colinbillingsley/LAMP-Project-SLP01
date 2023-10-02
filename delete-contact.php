<?php

include_once("api/include/database.php");

session_start();

// if the user is not logged in, redirect them to the login page
if (!isset($_SESSION["user-id"])) {
    header("Location: /login.php");
    die();
}

if (isset($_GET["id"])) {
    $contactId = intval($_GET["id"]);
    $contactInfo = getContactInfo($contactId);

    if (!$contactInfo) {
        header("Location: /contacts.php");
        die();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="icon" type="image/x-icon" href="/icons/icons8-pokeball-32-2.png">
    <script defer src="signout.js"></script>
    <script defer src="delete-contact.js"></script>
    <title>Delete Contact - Pokemon Manager</title>
</head>

<body>
    <header>
        <nav class="top-nav-bar">
            <div class="left-links">
                <a href="main.php" class="top-nav-bar-logo">POKEMON MANAGER</a>
            </div>

            <div class="right-links">
                <ul class="top-nav-main-links">
                    <li>
                        <a href="profile.php" class="main-link border">Edit Profile</a>
                    </li>
                    <li>
                        <a href="contacts.php" class="main-link border">Contacts</a>
                    </li>
                </ul>

                <button id="sign-out" class="main-button border" type="submit">Sign Out</button>
            </div>
        </nav>
    </header>

    <div class="delete-contact-container">
        <form id="delete-contact-form" class="delete-contact-form">
            <fieldset>
                <legend>Are you sure you want to delete this contact?</legend>

                <p id="global-error" class="error"></p>

                <label for="first-name" class="f-name">First Name
                    <div class="information"><?php
                                                if (isset($contactInfo))
                                                    echo htmlspecialchars($contactInfo["first-name"]);
                                                ?></div>
                </label>

                <label for="last-name" class="l-name">Last Name
                    <div class="information"><?php
                                                if (isset($contactInfo))
                                                    echo htmlspecialchars($contactInfo["last-name"]);
                                                ?></div>
                </label>

                <label for="email" class="email">Email
                    <div class="information"><?php
                                                if (isset($contactInfo))
                                                    echo htmlspecialchars($contactInfo["email"]);
                                                ?></div>
                </label>

                <label for="phone" class="phone-num">Phone Number
                    <div class="information"><?php
                                                if (isset($contactInfo))
                                                    echo htmlspecialchars($contactInfo["phone"]);
                                                ?></div>
                </label>

                <div>
                    <button id="confirm-delete" class="main-button right border">Confirm Delete</button>
                    <button id="cancel" class="main-button right border">Cancel</button>
                </div>
            </fieldset>
        </form>
    </div>

    <footer>
        <div class="footer-container">
            <ul class="footer-links">
                <li>
                    <a href="profile.php" class="main-link border">Edit Profile</a>
                </li>
                <li>
                    <a href="contacts.php" class="main-link border">Contacts</a>
                </li>
            </ul>
        </div>
    </footer>
</body>

</html>