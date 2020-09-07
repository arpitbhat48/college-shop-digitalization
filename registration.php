<?php
$PAGE = "login";
require("./partials/header/header.php");
?>
<link rel="stylesheet" type="text/css" href="styles/registration.css">

<div>
	<h1>Register</h1>
</div>

<div class="centre">
	<form>
		<div class="names">
			<label>First Name
				<input class="inputs" type="text" name="fname">
			</label>
			<label>Last Name
				<input class="inputs" type="text" name="lname">
			</label>
		</div>

		<div class="numbers">
			<label>Roll No.
				<input class="inputs" type="text" name="roll">
			</label>
			<label>Phone No.
				<input class="inputs" type="tel" name="phone">
			</label>
		</div>
		<div class="email">
			<label>E-mail
				<input class="inputs" type="email" name="email">
			</label>
		</div>
		<div class="pwds">
			<label>Password
				<input class="inputs" type="password" name="pwd">
			</label>
			<label>Confirm Password
				<input class="inputs" type="password" name="confPwd">
			</label>
		</div>
		<div class="buttons">
			<a href="login.php">
				<input type="button" class="btn" value="Login">
			</a>
			<input class="btn btn-inv" type="submit" onClick="validateForm()" value="Sign Up">
		</div>

	</form>
</div>
<script src="./scripts/validate.js"></script>
<script src="./scripts/register.js"></script>
<?php
require("./partials/footer/footer.php");
?>