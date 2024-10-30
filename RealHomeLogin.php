<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="title" content="RealHome">
        <meta name="keywords" content="RealHome, Property, Properties, Rent, Buy Home">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Author" content="Brandon Goncalves">
        <link rel="stylesheet" type="text/css" href="./RealHomeLogin.css">
        <title>Real Home | Sign up and Login</title>
    </head>
<body>
    <header>
        <br/>
        <img src="./RealHome.webp" alt="RealHome Logo" class="RealHomeLogo">
        <br/>
    </header>
    <br/>
    <img src="./RealHome.webp" alt="RealHome Logo" id="RealHomeLoginImage">
    <div id="Loginformcontainer">
        <form id="LoginForm" name="LoginForm" method="post" action="realhomeregister.php">
                <h2 class="formheading">Enter your login details:</h2>
                <label for="Username">Email :</label>
                <br/>
                <div id="inputtext">
                <input id="LoginEmail" name="Email" type="text" placeholder="Email Address" required/>
                </div>
                <br/>
                <br/>
                <label for="LoginPassword">Password :</label>
                <br/>
                <div id="inputtext">
                <input id="Passwords" name="Password" type="password" placeholder="Password" required/>
                </div>
                <br/>
                <br/>
                <input type="submit" class="button" value="Login" name="Login">
        </form>
        <br/>
        <div class="toggle">
            Don't have an account? <a href="#" onclick="toggleForms()"><b>Register</b></a>
        </div>
        <br/>
    </div>

    <div id="registercontainer" style="display:none;">
        <form name="RegisterForm" method="post" action="realhomeregister.php">
            <h2 class="formheading">Enter your registration details:</h2>
            <label for="Username">Username :</label>
            <br/>
            <div id="inputtext">
                <input id="registerUsernames" name="Username" type="text" placeholder="Username" required/>
            </div>
            <br/>
            <br/>
            <label for="Password">Password :</label>
            <br/>
            <div id="inputtext">
                <input id="registerPasswords" name="Password" type="password" placeholder="Password" required/>
            </div>
            <br/>
            <br/>
            <label for="Email">Email Address :</label>
            <br/>
            <div id="inputtext">
                <input id="registerEmails" name="Email" type="email" placeholder="Email Address" required>
            </div>
            <br/>
            <input type="submit" class="button" value="Register" name="Register">
            <br/>
            </form>
            <br/>
            <div class="toggle">
                Already have an account? <a href="#" onclick="toggleForms()"><b>Login</b></a>
            </div>
        <br/>
    </div>

    <div id="message"></div>
    <script type="text/javascript" src="./RealHomeLogin.js"></script>
    <footer>
        <p id="footerinformation">&copy; RealHome. All Rights Reserved.<br/>
            Brandon Goncalves, 20240835
        </p> 
    </footer>
</body>
</html>