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
                <h1>Requisition Slip System</h1>
            </div>
            <div class = "login-form">
                
	<center>
          <form method="POST" action="index.php">
            <div class = "control-group">
            <input type="text" name="username" placeholder="Username"><br>
            </div>
            <div class = "control-group">
            <input type="password" name="password" placeholder="Password"><br>
            </div>
            <br>
            <input type="submit" name="login" value="Login" class = "btn btn-primary btn-large btn-block">
            <p>Not a member yet?</p><a class="login-link" href="shared/register.php">Register</a>
        </form>
    </center>
            </div>
        </div>
	</div>
</body>
</html>

