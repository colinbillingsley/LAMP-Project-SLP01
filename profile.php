<?php

include_once("api/include/database.php");

session_start();

// if the user is not logged in, redirect them to the login page
if (!isset($_SESSION["user-id"])) {
    header("Location: /login.php");
    die();
}

$profile = profileInfo($_SESSION["user-id"]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="icon" type="image/x-icon" href="/icons/icons8-pokeball-32-2.png">
    <script defer src="signout.js"></script>
    <script defer src="profile.js"></script>
    <title>Edit Profile - Pokemon Manager</title>
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

    <div class="profile-container">
        <form id="profile-form" class="profile-form" action="" method="">
            <fieldset>
                <legend>Profile</legend>

                <p id="global-error" class="error"></p>

                <label for="first-name" class="f-name">First Name
                    <input type="text" name="first-name" id="first-name" value="<?php
                                                                                echo htmlspecialchars($profile["first-name"]);
                                                                                ?>">
                    <p id="first-name-error" class="error"></p>
                </label>

                <label for="last-name" class="l-name">Last Name
                    <input type="text" name="last-name" id="last-name" value="<?php
                                                                                echo htmlspecialchars($profile["last-name"]);
                                                                                ?>">
                    <p id="last-name-error" class="error"></p>
                </label>

                <label for="email" class="email">Email
                    <input type="text" name="email" id="email" value="<?php
                                                                        echo htmlspecialchars($profile["email"]);
                                                                        ?>">
                    <p id="email-error" class="error"></p>
                </label>

                <label for="phone" class="phone-num">Phone Number
                    <input type="tel" name="phone" id="phone" value="<?php
                                                                        echo htmlspecialchars($profile["phone"]);
                                                                        ?>">
                    <p id="phone-error" class="error"></p>
                </label>

                <label for="username" class="uname">Username
                    <input type="text" name="username" id="username" value="<?php
                                                                            echo htmlspecialchars($profile["username"]);
                                                                            ?>">
                    <p id="username-error" class="error"></p>
                </label>

                <label for="password" class="pass">Password
                    <input type="password" name="password" id="password" placeholder="(unchanged)" autocomplete="new-password">
                    <p id="password-error" class="error"></p>
                </label>

                <button id="save-changes" class="main-button save-changes right border">Save Changes</button>
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