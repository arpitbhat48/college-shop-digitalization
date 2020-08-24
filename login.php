<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Login Page</title>
</head>

<body>
    <?php
		require("./partials/header/header.php");
		require("./styles/login.styles.php");
    ?>

	<h1>Log In——————————————————</h1>
	<div class="centre">
		<form action="#" method="POST">
			<div>
				<label for="name">Roll Number</label>
				<input type="number" class="inputs" name="name" required>
			</div>
			<div>
				<label for="password">Password</label>
				<a href="#">Forgot Password</a>
				<input type="password" class="inputs" name="password" required>
				
			</div>
			<div>
				<input type="button" class="btn" value="Register">
				<input type="submit" class="login btn" value="Log In">
			</div>
		</form>
	</div>
	
    <?php
    	require("./partials/footer/footer.php");
    ?>
</body>

</html>