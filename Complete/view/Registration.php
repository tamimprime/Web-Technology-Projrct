<?php

echo "<br>";
echo "<br>";

include '../model/config.php';

if(isset($_POST['submit'])){
	// if ($_SERVER['REQUEST_METHOD'] === "POST") {


		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$dob = $_POST['dob'];
		$add = $_POST['address'];
		$mail = $_POST['email'];
		$username = $_POST['username'];
		$pass = $_POST['password'];
		$phn = "null";
	
		if (empty($fname) || empty($lname) || empty($dob) || empty(isset($_POST['gender'])) || empty(isset($_POST['type']))  ||  empty($add) || empty($mail) || empty($phn) || empty($username) || empty($pass)) {
			$message = "Please Fill The Form Properly ";
			echo $message;
		} else {
	
	
			$type = $_POST['type'];
			$gender = $_POST['gender'];
			$user = validate($username);
			$user = sanitize($username);
			$pass = validate($pass);
			$fname = validate($fname);
			$fname = sanitize($fname);
			$lname = validate($lname);
			$lname = sanitize($lname);
			$dob = validate($dob);
			$gender = validate($gender);
			$type = validate($type);
			$add = validate($add);
			$add = sanitize($add);
			$mail = validate($mail);
	
	
			$hostname = "localhost";
			$username = "root";
			$password = "";
			$database = "e-commerce";
	
			$con = new mysqli($hostname, $username, $password, $database);
	
			$found = "SELECT * FROM registration WHERE username= '$user'";
			$stmt = $con->prepare($found);
			$stmt->execute();
			$result = $stmt->get_result();
			$data = $result->fetch_assoc();
			if ($data) {
				$message = "User Name already taken ";
				echo $message;
			}
	
	
			$sql = "INSERT INTO registration (username, pass,type, fname, lname, dob, gender, address, phn, email) VALUES ('$user','$pass','$type', '$fname','$lname','$dob','$gender','$add','$phn','$mail')";
			$stmt = $con->query($sql);
	
			if ($stmt === true) {
				echo "Registration Successful..!";
			} else {
				$message = "Error while saving ";
				echo $message;
			}
		}
	// }`
	
	
}







function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>




<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Registration</title>

	<link rel="stylesheet" type="text/css" href="../model/123.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
	<style>
		div.b {
			position: absolute;
			right: 20%;
			width: 220px;
			height: 250px;
			border: 5px solid blue;
		}

		.error {
			color: red;
			font-weight: lighter;
			font-size: small;
		}

		form #togglePassword {
			position: relative;
			left: 350px;
			right: 25px;
			bottom: 32px;
			cursor: pointer;
		}

		#togglePassword {
			color: #fff;
		}

		#togglePassword:hover {
			color: #212529;
		}
	</style>

	<script>
		// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var fname = document.signupForm.fname.value;
    var lname = document.signupForm.lname.value;
    var email = document.signupForm.email.value;
    var gender = document.signupForm.gender.value;
    var address = document.signupForm.address.value;
    var username = document.signupForm.username.value;
    var password = document.signupForm.password.value;
    var role = document.signupForm.role.value;

    // Defining error variables with a default value
    var fnameErr = lnameErr = genderErr = addressErr = usernameErr = passwordErr = emailErr = roleErr = true;

    // Validate first name
    if (fname == "") {
        printError("fnameErr", "Please enter your first name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(fname) === false) {
            printError("fnameErr", "Please enter a valid name");
        } else {
            printError("fnameErr", "");
            fnameErr = false;
        }
    }

    // Validate last name
    if (fname == "") {
        printError("lnameErr", "Please enter your last name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(lname) === false) {
            printError("lnameErr", "Please enter a valid name");
        } else {
            printError("lnameErr", "");
            lnameErr = false;
        }
    }

    // Validate address
    if (address == "") {
        printError("addressErr", "Please enter your address");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(address) === false) {
            printError("addressErr", "Please enter a address");
        } else {
            printError("addressErr", "");
            addressErr = false;
        }
    }

    // Validate username
    if (username == "") {
        printError("usernameErr", "Please enter your username");
    } else {
        var regex = /^[a-zA-Z0-9]+$/;
        if (regex.test(username) === false) {
            printError("usernameErr", "Your username should contain alphabets and numbers");
        } else {
            printError("usernameErr", "");
            usernameErr = false;
        }
    }

    // Validate email address
    if (email == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        var regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else {
            printError("emailErr", "");
            emailErr = false;
        }
    }

    // Validate password
    if (password == "") {
        printError("passwordErr", "Please enter your password");
    } else {
        var regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
        if (regex.test(password) === false) {
            printError("passwordErr", "Password should contain at least one number, one uppercase character and one special character");
        } else {
            printError("passwordErr", "");
            passwordErr = false;
        }
    }

    // Validate gender
    if (gender == "") {
        printError("genderErr", "Please select your gender");
    } else {
        printError("genderErr", "");
        genderErr = false;
    }

    // Validate role
    if (role == "") {
        printError("roleErr", "Please select your role");
    } else {
        printError("roleErr", "");
        roleErr = false;
    }

    // Prevent the form from being submitted if there are any errors
    if ((fnameErr || emailErr || usernameErr || passwordErr || roleErr || lnameErr || genderErr || addressErr) == true) {
        return false;
    } else {
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
            "First Name: " + fname + "\n" +
            "Last Name: " + lname + "\n" +
            "Gender" + gender +"\n" +
            "Address: " + address + "\n" +
            "Email Address: " + email + "\n" +
            "Username: " + username + "\n" +
            "Password: " + password + "\n" +
            "Role: " + role + "\n";

        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
    }

};


// Toggle password visibility
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#pass');
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

// Login validation
function loginValidate() {
    var username = document.getElementById("user").value;
    var password = document.getElementById("pass").value;
    if (username == null || username == "") {
        alert("Please enter  the username.");
        return false;
    }
    if (password == null || password == "") {
        alert("Please enter the password.");
        return false;
    }
    // alert('Login successful');

}
	</script>
</head>

<body>


	<div>

		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<h1>Registration Form</h1>

					<div class="b">
						<h2>
							<center> <br> Already Registered ?<br> <a href="../view/login.php"> Click here</a> <br>To Login </center>
						</h2>
					</div>
					<div class="form">
						<form action="" name="signupForm" onsubmit="return validateForm()" method="POST" class="signup">
							<b>Username: </b><input class="form-control input" id="username" type="text" name="username" placeholder="User name" value="">
							<div class="error" id="usernameErr"></div>
							<br>
							<b>Password: </b><input class="form-control input" id="password" type="password" name="password" placeholder="Password" value="">
							<i class="bi bi-eye-slash" id="togglePassword"></i>
							<div class="error" id="passwordErr"></div>
							<br>
							<b>First Name: </b><input class=" form-control input" type="text" name="fname" placeholder="First name" value="">
							<div class="error" id="fnameErr"></div>
							<br>
							<b>Last Name: </b><input class="form-control input" type="text" name="lname" placeholder="Last name" value="">
							<div class="error" id="lnameErr"></div>
							<br>
							<b>Choose your Gender : </b>
							<input type="radio" name="gender" value="Male">
							Male
							<input type="radio" name="gender" value="Female">
							Female
							<input type="radio" name="gender" value="other">
							Other
							<div class="error" id="genderErr"></div>
							<br><br>
							<b>Date of birth: </b><input class="form-control" type="date" name="dob">
							<br>

							<b>Choose your User Type: </b><br><br>
							<input type="radio" name="type" value="delivery">
							Delivery guy &nbsp;
							<input type="radio" name="type" value="customer">
							Customer
							<div class="error" id="roleErr"></div>
							<br><br>

							<b>Present Address: </b><input class="form-control" type="textarea" name="address" placeholder="Present Address" value="">
							<div class="error" id="addressErr"></div>
							<br>
							<b>Email: </b><input class="form-control" type="email" name="email" placeholder="E-mail" value="">
							<div class="error" id="emailErr"></div>
							<br>
							<br>
							</p>
							<br>

							<input type="submit" name="submit" id="signup-submit" class="btn btn-primary button" onclick="validateSignUp()" value="Submit">
							<!-- <input class="btn btn-primary" type="submit" name="submit" value="Sign Up">  -->
							<input class="btn btn-primary" type="reset" name="reset">
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
	<br><br>


	<script src="../model/validate.js"></script>
</body>

</html>