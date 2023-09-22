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
                        <a href="profile.php" class="main-link border">Profile</a>
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
                    <input type="text" name="first-name" id="first-name" placeholder="First Name" readonly>
                </label>

                <label for="last-name" class="l-name">Last Name
                    <input type="text" name="last-name" id="last-name" placeholder="Last Name" readonly>
                </label>

                <label for="email" class="email">Email
                    <input type="text" name="email" id="email" placeholder="Email" readonly>
                </label>

                <label for="phone" class="phone-num">Phone Number
                    <input type="tel" name="phone" id="phone" placeholder="Phone number" readonly>
                </label>

                <label for="username" class="uname">Username
                    <input type="text" name="username" id="username" placeholder="Username" readonly>
                </label>

                <label for="password" class="pass">Password
                    <input type="password" name="password" id="password" readonly>
                </label>

                <button id="edit" class="main-button right">Edit</button>
            </fieldset>
        </form>
    </div>

    <footer>
        <div class="footer-container">
            <ul class="footer-links">
                <li>
                    <a href="profile.php" class="main-link">Profile</a>
                </li>
                <li>
                    <a href="contacts.php" class="main-link">Contacts</a>
                </li>
            </ul>
        </div>
    </footer>
</body>

</html>