<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <script defer src="create.js"></script>
    <title>Create Account - Pokemon Manager</title>
</head>

<body>
    <header>
        <nav class="top-nav-bar">
            <!-- Logo or name of contact manager -->
            <a href="index.php" class="top-nav-bar-logo">POKEMON MANAGER</a>

            <img class="" src="/icons/icons8-pokeball-32-2.png" alt="hello" title="">
        </nav>
    </header>

    <div class="form-container">
        <form id="signup-form">
            <fieldset>
                <legend>Create Account</legend>

                <p id="global-error" class="error"></p>

                <label for="first-name" class="f-name">First Name
                    <input type="text" name="first-name" id="first-name" placeholder="Enter your first name here" required>
                    <p id="first-name-error" class="error"></p>
                </label>

                <label for="last-name" class="l-name">Last Name
                    <input type="text" name="last-name" id="last-name" placeholder="Enter your last name here">
                    <p id="last-name-error" class="error"></p>
                </label>

                <label for="email" class="email">Email
                    <input type="text" name="email" id="email" placeholder="Enter your email here" required>
                    <p id="email-error" class="error"></p>
                </label>

                <label for="phone" class="phone-num">Phone Number
                    <input type="tel" name="phone" id="phone" placeholder="(XXX)-XXX-XXXX" required>
                    <p id="phone-error" class="error"></p>
                </label>

                <label for="username" class="uname">Username
                    <input type="text" name="username" id="username" placeholder="Enter username here" required>
                    <p id="username-error" class="error"></p>
                </label>

                <label for="password" class="pass">Password
                    <input type="password" name="password" id="password" placeholder="Enter password here" required>
                    <p id="password-error" class="error"></p>
                </label>

                <button type="submit" id="create" class="form-button"><svg class="pointer" width="13" height="13" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="Group 1">
                            <rect id="Rectangle 1" x="29" y="14" width="12" height="60" fill="black" />
                            <rect id="Rectangle 2" x="41" y="14" width="12" height="60" fill="black" />
                            <rect id="Rectangle 3" x="53" y="26" width="12" height="36" fill="black" />
                            <rect id="Rectangle 4" x="65" y="38" width="12" height="12" fill="black" />
                            <rect id="Rectangle 5" x="65" y="50" width="12" height="12" fill="black" />
                            <rect id="Rectangle 6" x="53" y="62" width="12" height="12" fill="black" />
                            <rect id="Rectangle 7" x="41" y="74" width="12" height="12" fill="black" />
                            <rect id="Rectangle 8" x="29" y="74" width="12" height="12" fill="black" />
                        </g>
                    </svg> <span id="submit-text">Create Account</span></button>
            </fieldset>
        </form>
    </div>

    <footer>
        <div class="index-footer">
            Icons by <a target="_blank" href="https://icons8.com/icon/JN8zUjd5tqJZ/pokeball" class="icons8-link">Icons8</a>
        </div>
    </footer>
</body>

</html>