<?php
session_start();
/*if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
}*/
require_once 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

//if(isset($_POST['btn-signup'])) {
	
	$Uid = $_POST['userid'];
	$Fname = $_POST['firstname'];
	$Lname = $_POST['lastname'];
	$Birthday = $_POST['birthday'];
	$Gender = $_POST['gender'];
	$Email = $_POST['email'];
	$Pass = $_POST['password'];
	$Address = $_POST['address'];
	$Contact = $_POST['contact'];
	
	
	
	$hashed_password = sha1($Pass); 
	
	$check_id = $DBcon->query("SELECT userid FROM details WHERE userid = '$Uid'");
	$count=$check_id->num_rows;
	
	if ($count==0) {

		$sql = "INSERT INTO details (userid,firstname,lastname,birthday,gender,email,password,address,contact) VALUES ('$Uid','$Fname','$Lname','$Birthday','$Gender','$Email','$hashed_password','$Address','$Contact')";

		if ($DBcon->query($sql)) {
			$msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
					</div>";
		}else {
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
		}
		
	} else {
		
		
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry ID already taken !
				</div>";
			
	}
	
	$DBcon->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon" />
        
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Form</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>

<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="registerform" name="registerform" onSubmit="return formValidation();">
      
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        
        <?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
          
        <div class="form-group">
        <label><b>User ID</b></label>
        <input type="name" class="form-control" placeholder="User ID" name="userid" required />
        </div>

        <div class="form-group">
        <label><b>First Name</b></label>
        <input type="name" class="form-control" placeholder="First name" name="firstname" required  />
        </div>

        <div class="form-group">
        <label><b>Last Name</b></label>
        <input type="name" class="form-control" placeholder="last Name" name="lastname" required  />
        </div>

        <div class="form-group">
        <label><b>Date of Birth</b></label>
        <input type="date" class="form-control" placeholder="birtday" name="birthday" max="12/31/2017" min="01/01/1920" required  />
        </div>

        <div class="form-group">
        <label><b>Gender</b></label><br>
          <input type="radio" name="gender" value="Male" checked> Male
          <input type="radio" name="gender" value="Female"> Female
          <input type="radio" name="gender" value="Other"> Other
        </div>

        <div class="form-group">
        <label><b>Email</b></label>
        <input type="email" class="form-control" placeholder="Email address" name="email" required  />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <label><b>Password</b></label>
        <input type="password" class="form-control" placeholder="Password" name="password" required  />
        </div>

        <div class="form-group">
        <label><b>Address</b></label>
        <input type="name" class="form-control" placeholder="address" name="address" required  />
        </div>

        <div class="form-group">
        <label><b>Contact</b></label>
        <input type="name" class="form-control" placeholder="contact" name="contact" maxlength='10' minlength='10' required  />
        </div>
        
     	<hr />
        
        <div class="form-group">
            <input type="submit" class="btn btn-default" value="Sign Up">
			<button type="Reset" class="btn btn-default" name="Cancel">
    		<span class=""></span> &nbsp; Cancel
			</button> 
            <a href="index.php" class="btn btn-default" style="float:right;">Log In Here</a>
        </div> 
      
      </form>

    </div>
    
</div>

<script type="text/javascript">
        function test() {
            alert("test");
        return false;
        }
        

</script>

<script type="text/javascript">
            function formValidation() {
             
            //var shouldSubmitForm = true;

            //event.preventDefault();
            var uid = document.registerform.userid;  
            var fname = document.registerform.firstname;  
            var lname = document.registerform.lastname;  
            //var bday = document.registerform.birthday;  
            //var sgender = document.registerform.gender;  
            var smail = document.registerform.email;  
            var pass = document.registerform.password;  
            var saddress = document.registerform.address;
            var phone = document.registerform.contact;

        //var error_elem = $("#error_msg");

        if (allnumeric(uid)) {
            if (allLetter(fname)) {
                if (allLetter(lname)) {
                    if (ValidateEmail(smail)) {
                        if (alphanumeric(pass)) {
                            if (alphanumeric(saddress)) {
                                if (allnumeric(phone))
                                    {
                                        return true; 
                                    }
                                    
                                }
                            }
                        }
                    }
                }
            }
        
        //$("#error_msg").html("please field requied field");
        return false;
        }
        
        
        function allnumeric(uid) {
            var numbers = /[0-9]$/;
            if (uid.value.match(numbers)) {
                return true;
            } else {
                //document.getElementById('error4').innerHTML="this is invalid Phone number ";
                alert('User Id must have numeric characters only');
                uid.focus();
                return false;
            }
        }


        function allLetter(fname) {
            var letters = /[A-Za-z ]$/;
            if (fname.value.match(letters)) {
                return true;
            } else {
                //document.getElementById('error2').innerHTML="this is invalid Company name ";
                alert('name must have alphabet characters only');
                fname.focus();
                return false;
            }
        }

        function allLetter(lname) {
            var letters = /[A-Za-z ]$/;
            if (lname.value.match(letters)) {
                return true;
            } else {
                //document.getElementById('error2').innerHTML="this is invalid Company name ";
                alert('name must have alphabet characters only');
                lname.focus();
                return false;
            }
        }

        function ValidateEmail(smail) {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (smail.value.match(mailformat)) {
                return true;
            } else {
                //document.getElementById('error1').innerHTML="this is invalid email ";
                alert("You have entered an invalid email address!");
                smail.focus();
                return false;
            }
        }

        function alphanumeric(pass) {
            var letters = /[A-Za-z0-9 -]$/;
            if (pass.value.match(letters)) {
                return true;
            } else {
                //document.getElementById('error3').innerHTML="this is invalid Address ";
                alert('Password Required ');
                pass.focus();
                return false;
            }
        }


        function alphanumeric(saddress) {
            var letters = /[A-Za-z0-9 -]$/;
            if (saddress.value.match(letters)) {
                return true;
            } else {
                //document.getElementById('error5').innerHTML="this is invalid digree ";
                alert('Address Required');
                saddress.focus();
                return false;
            }
        }

       function allnumeric(phone) {
            var numbers = /[0-9]$/;
            if (phone.value.match(numbers)) {
                return true;
            } else {
                //document.getElementById('error4').innerHTML="this is invalid Phone number ";
                alert('its must have numeric characters only');
                phone.focus();
                return false;
            }
        }
        

    </script>
</body>
</html>