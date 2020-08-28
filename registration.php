<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	<link rel="stylesheet" href="styles/registration.css">
</head>

<body>
	<?php
	$PAGE = "login";
	require("./partials/header/header.php");
	?>
	<div>
		<h1>Register </h1>
	</div>

	<div class="centre">
		<form action="index.php" method="post">
			<label for="name">Name</label>
			<input class="inputs" type="text" name="name" required>
			<label for="roll">Roll No.</label>
			<input class="inputs" type="text" name="roll" required>
			<label for="phone">Phone No.</label>
			<input class="inputs" type="tel" name="phone" required>
			<label for="email">E-mail</label>
			<input class="inputs" type="email" name="email" required>
			<label for="pwd">Password</label>
			<input class="inputs" type="password" name="pwd" required>
			<label for="confPwd">Confirm Password</label>
			<input class="inputs" type="password" name="confPwd" required>

			<div class="centre">
				<input class="btn" type="submit" value="Sign Up">
			</div>
			
		</form>
	</div>
	<?php
	require("./partials/footer/footer.php");
	?>
</body>

</html>