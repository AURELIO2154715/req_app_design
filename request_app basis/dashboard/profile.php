<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <meta charset="utf-8" />
        
        <link rel="stylesheet" type="text/css" title="prefered" href="../styles/styles.css" />
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"> 
    </head>
    <body class="body">
        <header class="mainheader">
            <img src="../img/scisbanner.jpg">
            
        </header>
        <?php 
            include '../shared/session.php';
            include '../shared/connection.php';
            $user_id = $_SESSION['user_id'];
            $user_type = $_SESSION['user_type'];
            $user_info = "Select users.id, username, user_type, password,firstname, middlename, lastname from users inner join user_details on users.id = user_id where users.id = '$user_id';";
            
            $requests = "SELECT * FROM request_form WHERE requested_by = '$user_id' ORDER BY created_at DESC";

            $requestQuery = mysqli_query($conn,$requests) or die(mysqli_error($conn));
                
            $user_infoQ = mysqli_query($conn,$user_info) or die(mysqli_error($conn)); 
        
        ?>
        <a href="../dashboard/home.php">Home</a>
        <a href="../dashboard/change_password.php">Change Password</a>
        <h1>Profile</h1>
       
        <?php
            $user = mysqli_fetch_array($user_infoQ);
            echo "<b>User ID: </b>" . $user['id'] . "<br>";
            echo "<b>Username: </b>" . $user['username'] . "<br>";
            echo "<b>User Type: </b>" . $user['user_type'] . "<br>";
            echo "<b>First Name: </b>" . $user['firstname'] . "<br>";
            echo "<b>Middle Name: </b>" . $user['middlename'] . "<br>";
            echo "<b>Last Name: </b>" . $user['lastname'] . "<br>";
        ?>
        
        <h2>Requested Items</h2>
        <table style="width:50%" border="1" class="tableasd">
            <tr>
                <th>Request No.</th>
                <th>Request Description</th> 
                <th>Status</th>
                <th>Date Needed</th>
                <th>Action</th>
            </tr>   
        <?php
            while ($log = mysqli_fetch_array($requestQuery)) {
                echo "<tr><td> RF 00" . $log['request_id'] . "</td>";
			  	echo "<td>" . $log['use_of_item'] . "</td>";
			  	echo "<td>" . $log['request_status'] . "</td>";
			  	echo "<td>" . $log['date_needed'] . "</td>";
			  	echo "<td><a href='request_details.php?request_id=" . $log['request_id'] . "'>View Details</a></td></tr>"; 
            }
        ?>
        </table>
        
    </body>
</html>