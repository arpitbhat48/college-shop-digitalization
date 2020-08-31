<?php
$PAGE = "login";
require("./partials/header/header.php");
?>
<link rel="stylesheet" href="styles/login.css">
<h1>Log In</h1>
<div class="centre">
	<form action="#" method="POST">
		<div class="roll">
			<label>Roll Number
				<input type="text" class="inputs" name="roll" required>
			</label>
		</div>
		<div class="pwd">
			<label>Password
				<a class="forgot" href="#">Forgot Password</a>
				<input type="password" class="inputs" name="password" required>
			</label>
		</div>
		<div class="buttons">
			<a href="registration.php">
				<input class="btn" type="button" value="Register">
			</a>
			<input class="btn btn-inv" type="submit" value="Log In">
		</div>
	</form>
</div>

<?php
require("./partials/footer/footer.php");
?>