<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Profile - Pokemon Manager</title>
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
        <form class="profile-form" action="" method="">
            <fieldset>
                <legend>Profile</legend>

                <label for="first-name" class="f-name">First Name
                    <input type="text" name="first-name" id="first-name">
                </label>

                <label for="last-name" class="l-name">Last Name
                    <input type="text" name="last-name" id="last-name">
                </label>

                <label for="email" class="email">Email
                    <input type="text" name="email" id="email">
                </label>

                <label for="phone" class="phone-num">Phone Number
                    <input type="tel" name="phone" id="phone">
                </label>

                <label for="username" class="uname">Username
                    <input type="text" name="username" id="username">
                </label>

                <label for="password" class="pass">Password
                    <input type="password" name="password" id="password">
                </label>

                <button id="save-changes" class="main-button right border">Save Changes</button>
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