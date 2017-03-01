<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
<?php
	if (isset($_POST['username'])){
	include 'connection.php';
		$username = $_POST['username'];
		$password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
		$usertype = $_POST['user_type'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$status = 'disabled';

		//check if username exist
		$check = "SELECT username FROM users WHERE username = '$username'";
		$checkQuery = mysqli_query($conn,$check);
		if($checkQuery){
			$result = mysqli_num_rows($checkQuery);
			if($result > 0){
				//already exist
				header("Location: register.php?error=usernameTaken");
				die();
			}
		}else{
			echo "Error: " . $check . mysqli_error($conn);
		}

        if($password == $cpassword){
            
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $usersQuery = "INSERT INTO users (username,password,user_type,user_status,created_at,updated_at) VALUES ('$username','$password','$usertype','$status',now(),now())";
            if(mysqli_query($conn, $usersQuery)){
                $user_id = mysqli_insert_id($conn);
                $userDetailsQuery = "INSERT INTO user_details (user_id,firstname,middlename,lastname,created_at,updated_at) VALUES ($user_id,'$firstname','$middlename','$lastname',now(),now())";
                if(mysqli_query($conn,$userDetailsQuery)){
                    header("location: ../index.php");
                }else{
                    echo "Error " . $userDetailsQuery . mysqli_error($conn);
                }
            }else{
                echo "Error " . $usersQuery . mysqli_error($conn);
            }
            
        }else{
            echo "Password doesn't match!";
        }
	}

?>
	<div>
		<?php
		if(isset($_GET['error']) && $_GET['error'] == 'usernameTaken'){
			echo "Username Already Taken";
		}
		?>
        <div class = "login">
            <div class = "login-screen">
                <div class = "login-form">
		<form method="POST" action="register.php">
            <div class = "control-group">
			<input type="text" name="username" placeholder="Username"><br>
            </div>
            <div class = "control-group">
			<input type="password" name="password" placeholder="Password"><br>
            </div>
            <div class = "control-group">
            <input type="password" name="cpassword" placeholder = "Confirm Password"><br>
            </div>
			User Type:
			<select name="user_type" placeholder = "User ">
				<option value="scis">SCIS</option>	
				<option value="accounting">Accounting</option>	
			</select><br>
            <div class = "control-group">
			<input type="text" name="firstname" placeholder = "First Name"><br>
            </div>
            <div class = "control-group">
			<input type="text" name="middlename" placeholder = "Middle Name"><br>
            </div>
            <div class = "control-group">
			<input type="text" name="lastname" placeholder = "Last Name"><br>
            </div>
            <div class = "control-group">
			<input type="submit" name="register" value="Register" class = "btn btn-primary btn-large btn-block">
            </div>
		  </form>
                    </div>
                
		<a href="../index.php" class = "btn btn-primary btn-large btn-block"><center>Back</center></a>
                                                                             
        
                                                                             
            </div>
            </div>
	</div>
</body>
</html>
                                                                             
                                                                             			
