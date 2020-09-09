<?php
$PAGE = "login";
require("./partials/header/header.php");
?>
<link rel="stylesheet" type="text/css" href="styles/registration.css">

<div>
	<h1>Register</h1>
</div>

<div class="centre">
	<form action="" method="POST">
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
				<input class="inputs" type="text" name="phone">
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
			<input class="btn btn-inv" type="submit" name="register" onClick="validateForm()" value="Sign Up">
		</div>

	</form>
</div>
<!-- <script src="./scripts/validate.js"></script>
<script src="./scripts/register.js"></script> -->

<?php
require("./partials/footer/footer.php");
require("db.php");

if (isset($_POST['register'])) {

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$rno = $_POST['roll'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$confPwd = $_POST['confPwd'];
	$name = $fname . " " . $lname;

	$password = password_hash($pwd, PASSWORD_DEFAULT);
	// echo $name;

	if (strcmp($pwd, $confPwd) == 0) {
		$query = "INSERT INTO users VALUES (
			'$rno',
			'$name',
			'$email',
			'$phone',
			'$password')";

		if (mysqli_query($con, $query)) {
			echo "<script>alert('SucessFully Registered');</script>";
		} else {
			echo "<script>alert('Error');</script>";
		}
	}
}

?>