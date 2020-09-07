<?php
$PAGE = "login";
require("./partials/header/header.php");
?>
<link rel="stylesheet" href="styles/login.css">
<h1>Log In</h1>
<div class="centre">
	<form>
		<div class="roll">
			<label>Roll Number
				<input type="text" class="inputs" name="roll" required>
			</label>
		</div>
		<div class="pwd">
			<label>Password
				<a class="forgot" href="#">Forgot Password</a>
				<input type="password" class="inputs" name="pwd" required>
			</label>
		</div>
		<div class="buttons">
			<a href="registration.php">
				<input class="btn" type="button" value="Register">
			</a>
			<input class="btn btn-inv" type="submit" onclick="validateForm()" value="Log In">
		</div>
	</form>
</div>
<script src="./scripts/validate.js"></script>
<script src="./scripts/login.js"></script>

<?php
require("./partials/footer/footer.php");
?>