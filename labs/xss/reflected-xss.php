<!-- 
    This is just a dummy app to show how real-life web apps are vulnerable to XSS in similar situations.
    XSS Lab By VulnerableWebLab
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reflected XSS Lab | VulnerableWebLab</title>
</head>
<body>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

        body {
        background: #456;
        font-family: 'Open Sans', sans-serif;
        }

        .login {
        width: 400px;
        margin: 16px auto;
        font-size: 16px;
        }

        /* Reset top and bottom margins from certain elements */
        .login-header,
        .login p {
        margin-top: 0;
        margin-bottom: 0;
        }

        /* The triangle form is achieved by a CSS hack */
        .login-triangle {
        width: 0;
        margin-right: auto;
        margin-left: auto;
        border: 12px solid transparent;
        border-bottom-color: #28d;
        }

        .login-header {
        background: #28d;
        padding: 20px;
        font-size: 1.4em;
        font-weight: normal;
        text-align: center;
        text-transform: uppercase;
        color: #fff;
        }

        .login-container {
        background: #ebebeb;
        padding: 12px;
        }

        /* Every row inside .login-container is defined with p tags */
        .login p {
        padding: 12px;
        }

        .login input {
        box-sizing: border-box;
        display: block;
        width: 100%;
        border-width: 1px;
        border-style: solid;
        padding: 16px;
        outline: 0;
        font-family: inherit;
        font-size: 0.95em;
        }

        .login input[type="email"],
        .login input[type="password"] {
        background: #fff;
        border-color: #bbb;
        color: #555;
        }

        /* Text fields' focus effect */
        .login input[type="email"]:focus,
        .login input[type="password"]:focus {
        border-color: #888;
        }

        .login input[type="submit"] {
        background: #28d;
        border-color: transparent;
        color: #fff;
        cursor: pointer;
        }

        .login input[type="submit"]:hover {
        background: #17c;
        }

        /* Buttons' focus effect */
        .login input[type="submit"]:focus {
        border-color: #05a;
        }

        #error {
            background-color: #d9534f;
            color: white;
            padding: 15px;
            width: 370px;
            font-family: Arial;
            border-style: solid;
            border-width: 1px;
            border-color: white;
            border-radius: 5px;
            box-shadow: 0 0 2px black;
        }
    </style>
    <div class="login">
    <div class="login-triangle"></div>
    
    <h2 class="login-header">Log in</h2>

    <form class="login-container" action="#" method="GET">
        <p><input type="text" name="name" placeholder="Name"></p>
        <p><input type="password" name="password" placeholder="Password"></p>
        <p><input type="submit" value="Log in"></p>
    </form>
    <br><br>
    <p id="error">
    <?php

        if (isset($_GET['name']) && isset($_GET['password'])) {
            $name = $_GET['name'];
            $password = md5(sha1($_GET['password']));

            echo "ERROR: User named ";
            echo $name;
            echo " does not exist!";
        }

    ?>
    </p>
    </div>
</body>
</html>