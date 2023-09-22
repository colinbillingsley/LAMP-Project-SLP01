<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>Profile - Pokemon Manager</title>
</head>

<body>
    <header>
        <a href="main.html" class="main-logo">POKEMON MANAGER</a>
        <nav class="main-nav-container">
            <ul class="main-nav-links">
                <li>
                    <a href="profile.html" class="main-link">Profile</a>
                </li>
                <li>
                    <a href="contacts.html" class="main-link">Contacts</a>
                </li>
            </ul>
            <form action="https://httpbin.org/post" method="post">
                <button id="sign-out" class="main-button" type="submit">Sign Out</button>
            </form>
        </nav>
    </header>

    <div class="profile-container">
        <form class="profile-form" action="" method="">
            <fieldset>
                <legend>Profile</legend>

                <label for="first-name" class="f-name">First Name
                    <input type="text" name="first-name" id="first-name" readonly>
                </label>

                <label for="last-name" class="l-name">Last Name
                    <input type="text" name="last-name" id="last-name" readonly>
                </label>

                <label for="email" class="email">Email
                    <input type="text" name="email" id="email" readonly>
                </label>

                <label for="phone" class="phone-num">Phone Number
                    <input type="tel" name="phone" id="phone" readonly>
                </label>

                <label for="username" class="uname">Username
                    <input type="text" name="username" id="username" readonly>
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
                    <a href="profile.html" class="main-link">Profile</a>
                </li>
                <li>
                    <a href="contacts.html" class="main-link">Contacts</a>
                </li>
            </ul>
        </div>
    </footer>
</body>

</html>