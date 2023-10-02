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
        header("Location: /edit-contact.php");
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
    <script defer src="edit-contact.js"></script>
    <title>Edit Contact - Pokemon Manager</title>
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

    <div class="edit-contact-container">
        <form id="edit-contact-form" class="edit-contact-form">
            <fieldset>
                <legend>Edit Contact</legend>

                <p id="global-error" class="error"></p>

                <label for="first-name" class="f-name">First Name
                    <input type="text" name="first-name" id="first-name" value="<?php
                                                                                if (isset($contactInfo))
                                                                                    echo htmlspecialchars($contactInfo["first-name"]);
                                                                                ?>">
                    <p id="first-name-error" class="error"></p>
                </label>

                <label for="last-name" class="l-name">Last Name
                    <input type="text" name="last-name" id="last-name" value="<?php
                                                                                if (isset($contactInfo))
                                                                                    echo htmlspecialchars($contactInfo["last-name"]);
                                                                                ?>">
                    <p id="last-name-error" class="error"></p>
                </label>

                <label for="email" class="email">Email
                    <input type="text" name="email" id="email" value="<?php
                                                                        if (isset($contactInfo))
                                                                            echo htmlspecialchars($contactInfo["email"]);
                                                                        ?>">
                    <p id="email-error" class="error"></p>
                </label>

                <label for="phone" class="phone-num">Phone Number
                    <input type="tel" name="phone" id="phone" value="<?php
                                                                        if (isset($contactInfo))
                                                                            echo htmlspecialchars($contactInfo["phone"]);
                                                                        ?>">
                    <p id="phone-error" class="error"></p>
                </label>

                <div>
                    <?php if (isset($_GET["id"])) : ?>
                        <button id="save-changes" class="main-button right border">Save Changes</button>
                    <?php else : ?>
                        <button id="save-changes" class="main-button right border">Add Contact</button>
                        <button id="cancel" class="main-button right border">Cancel</button>
                    <?php endif; ?>
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