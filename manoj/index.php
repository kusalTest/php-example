<?php
session_start();
require_once 'dbconnect.php';

/*if (isset($_SESSION['userid'])!="") {
	header("Location: home.php");
	exit;
}*/
//if ($_SERVER[REQUEST_METHOD]="POST")

if (isset($_POST['btn-login'])) {

	
	$username = strip_tags($_POST['userid']);
	//$password = strip_tags($_POST['password']);
	
	$username = $DBcon->real_escape_string($username);
	//$password = $DBcon->real_escape_string($password);


	//$hashed_password = sha1($password);
	
	$query = $DBcon->query("SELECT userid FROM details WHERE userid='$username'");
	$row=$query->fetch_array();
	
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	
	if ($count==1) {
        $_SESSION['userid']=$username;
		header("Location: home.php");
	} else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username!
				</div>";
	}
	$DBcon->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Login
        </title>

        
        <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon" />
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        
        
        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Log In </h2><hr/>
        
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>
        
        <div class="form-group">
        <label><b>User ID</b></label>
        <input type="name" class="form-control" placeholder="User ID" name="userid" required />
        <span id="check-e"></span>
        </div>
        
        <!--<div class="form-group">
        <label><b>Password</b></label>
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </div>-->
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
            
            <a href="register.php" class="btn btn-default" style="float:right;">Sign UP Here</a>
            
        </div>  
        
        
      
      </form>

    </div>
    
</div>

</body>
</html>