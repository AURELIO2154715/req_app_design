<?php
session_start();
if(isset($_SESSION['user_id'])){
	header('Location: dashboard/home.php');
}
include 'shared/auth.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Request App</title>
	<link rel="stylesheet" type="text/css" title="prefered" href="styles/styles.css" />
</head>
<body class = "body">
<header class="mainheader">
            <img src="img/scisbanner.jpg">
        </header>
        <div class = "login">
        <div class = "login-screen">
            <div class = "app-title">
                <h1 align="center">Requisition Slip System</h1>
            </div>
            <div id = "login-form" align="center">

		<form method="POST" action="index.php" id="form_login">
            <div class = "control-group">
            Username: <input type="text" name="username" placeholder="Username"><br>
            </div>
            <div class = "control-group">
            Password:<input type="password" name="password" placeholder="Password"><br>
            </div>
            <br>
            <input type="submit" name="login" value="Login" class = "btn btn-primary btn-large btn-block">
            <p>Not a member yet?</p><a class="login-link" href="shared/register.php">Register</a>
        </form>
		</div><br><br>
		</div>
		</div>
</body>
</html>
