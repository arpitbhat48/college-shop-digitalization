<?php
$PAGE = "login";
require("./partials/header/header.php");
?>
<link rel="stylesheet" href="styles/login.css">
<h1>Log In</h1>
<div class="centre">
	<form action="" method="POST" onsubmit="return validateForm()">
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
			<input class="btn btn-inv" type="submit" name="login" value="Log In">
		</div>
	</form>
</div>
<script src="./scripts/validate.js"></script>
<script src="./scripts/login.js"></script>

<?php
require("./partials/footer/footer.php");
require("db.php");

if (isset($_POST['login'])) {
	$rno = $_POST['roll'];
	$pwd = $_POST['pwd'];

	$query = "SELECT * FROM users
	WHERE user_rno = '$rno'";

	// echo $password;
	$get_query = mysqli_query($con, $query);


	if (mysqli_num_rows($get_query) == 0) {
		echo "<script>alert(`Wrong Roll Number`)</script>";
	} else {
		while ($row = mysqli_fetch_array($get_query)) {
			$password = $row['password'];
		}

		// echo password_verify($pwd, $password);
		if (password_verify($pwd, $password)) {
			echo "<script>alert('Login')</script>";
		}
	}
}
?>