<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="logincss.css">
    <title>Login</title>
</head>
<body>
    <div class="loginBox">
        <h1>Login</h1>
        <form class="loginform" id="login" method="post" action="loginPHP.php">
            <div class="login_input1">
                <input type="text" name="email" class="loginemail" placeholder = "Enter email">
                <?php
                session_start();
                if (isset($_SESSION['loginerror1'])) {
                    echo '<div class="error_messages">'.$_SESSION['loginerror1'].'</div>';
                    unset($_SESSION['loginerror1']);
                }
                ?>
            </div>
        <div class="login_password">
            <input type="password" name="password" class="loginpassword" placeholder="Enter password">
            <?php
                if (isset($_SESSION['loginerror'])) {
                    echo '<div class="error_messages">'.$_SESSION['loginerror'].'</div>';
                    unset($_SESSION['loginerror']);
                }
                ?>
        </div>
            <button class="loginbutton" type="submit">Login</button>
        </form>
<div class="signup">
    <a href="signup.html" class="signtext">Create Account</a>
</div>
</div>
</body>
</html>