<?php
$PAGE = "login";
require("./partials/header/header.php");
?>
<link rel="stylesheet" type="text/css" href="styles/registration.css">

<div>
	<h1>Register</h1>
</div>

<div class="centre">
	<form action="index.php" method="post">
		<div class="names">
			<label>First Name
				<input class="inputs" type="text" name="fname" required>
			</label>
			<label>Last Name
				<input class="inputs" type="text" name="lname" required>
			</label>
		</div>

		<div class="numbers">
			<label>Roll No.
				<input class="inputs" type="text" name="roll" required>
			</label>
			<label>Phone No.
				<input class="inputs" type="tel" name="phone" required>
			</label>
		</div>
		<div class="email">
			<label>E-mail
				<input class="inputs" type="email" name="email" required>
			</label>
		</div>
		<div class="pwds">
			<label>Password
				<input class="inputs" type="password" name="pwd" required>
			</label>
			<label>Confirm Password
				<input class="inputs" type="password" name="confPwd" required>
			</label>
		</div>
		<div class="buttons">
			<a href="login.php">
				<input type="button" class="btn" value="Login">
			</a>
			<input class="btn btn-inv" type="submit" value="Sign Up">
		</div>

	</form>
</div>
<?php
require("./partials/footer/footer.php");
?>