<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<title>Login Page</title>

	<link rel="stylesheet" href="styles/login.css">
</head>

<body>
	<?php
	$PAGE = "login";
	require("./partials/header/header.php");
	?>

	<h1>Log In —————————————————</h1>
	<div class="centre">
		<form action="#" method="POST">
			<div>
				<label for="roll">Roll Number</label>
				<input type="text" class="inputs" name="roll" required>
			</div>
			<div>
				<label for="password">Password</label>
				<a class="forgot" href="#">Forgot Password</a>
				<input type="password" class="inputs" name="password" required>

			</div>
			<div>
				<a href="registration.php">
					<input type="button" class="btn" value="Register">
				</a>
				<input type="submit" class="login btn" value="Log In">
			</div>
		</form>
	</div>

	<?php
	require("./partials/footer/footer.php");
	?>
</body>

</html>