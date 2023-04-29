<?php

include ("registercode.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="favicons/user.png">
</head>
<body>
    <div id="navbar">
        <h3 id="home">Fake Estate</h3>
        <nav>
        <ul class="links">
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
        </nav>
        <a href="index.html" id="homelink">Home</a>
    </div>

    <div id="logindiv">
    <h1>Register</h1>
    <form method="POST" action="">

    <div class="fieldbox">
            <input id="first" name="first" type="text">
            <label>First Name</label>
            <span></span>
    </div>
    <div class="fieldbox">
			<input id="last" name="last" type="text">
            <label>Last Name</label>
            <span></span>
    </div>
    <div class="fieldbox">
			<input id="user" name="user" type="text">
            <label>Username</label>
            <span></span>
    </div>
    <div class="fieldbox">
			<input id="pass" name="pass" type="password">
            <label>Password</label>
            <span></span>
    </div>
    <div class="fieldbox">
            <input id="confirm" name="confirm" type="password">
            <label>Confirm Password</label>
            <span></span>
    </div>
    <div class="fieldbox">
            <input id="email" name="email" type="text">
            <label>Email</label>
            <span></span>
    </div>


            <p><input id="type" name="type" type="radio" value="buyer">
            <label>Buyer</label></p>
            <p><input id="type" name="type" type="radio" value="seller">
            <label>Seller</label></p>

            <div class="butt">
			<button class="button">Register<input type="submit" name="submit" value="" class="shownone"></button>
            </div>

            <div class="signup">
                <a href="login.php" class="registered"><p>Already Have an Account?</p></a>
            </div>
	</form>
    <p class="error" style="color: red;"><?php echo $error;?></p>
    </div>

</body>
</html>