<!DOCTYPE html>
<html>

<head>

	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="../model/123.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<style>
		div.b {
			position: absolute;
			right: 20%;
			width: 220px;
			height: 250px;
			border: 5px solid blue;
		}
	</style>

</head>

<body>

	<div>

		<div class="container">
			<div class="row">
				<div class="col-sm-3">

					<br>

					<div class="b">
						<h2> <br> Not Registered ?<br><a href="registration.php"> Click here</a> <br>to register </h2>
					</div>
					<div class="form">
						<h1> <i>User Login </i></h1>
						<form name="login" action="../controller/loginAction.php" method="POST">

							<b>Username: </b><input class="form-control" type="text" name="username" placeholder="User name">
							<br>
							<b>Password: </b><input class="form-control" type="password" name="pass" placeholder="Password"><br>
							<b>Choose your User Type : </b><br><br>
							<select name="type" value="">
								<option value="admin">Admin</option>
								<option value="delivery">Delivary Guy</option>
								<option value="customer">Customer</option>
							</select>
							</p>


							<br>

							<input class="btn btn-primary" type="submit" name="submit" value="Sign In"> <input class="btn btn-primary" type="reset" name="reset"> <br> <br>
						</form>


					</div>
				</div>
			</div>
		</div>




		<br> <br>
</body>

</html>