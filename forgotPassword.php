<?php
$PAGE = "login";
require('./components/header/header.php');
require('./components/page-title/page-title.php')
?>

<link rel="stylesheet" href="styles/login.css">

<div class="container">
	<?php
	page_title("Forgot Password")
	?>
</div>

<div class="centre">
	<form action="" method="POST" onsubmit="return validateForm()">
		<div class="roll">
			<label>Roll Number
				<input type="text" class="inputs" name="roll" required>
			</label>
		</div>
		<div class="email">
			<label>E-mail
				<input class="inputs" type="email" name="email">
			</label>
		</div>
		<div class="pwd">
			<label>New Password
				<input type="password" class="inputs" name="pwd" required>
			</label>
		</div>
		<div>
			<label>Re-type Password
				<input class="inputs" type="password" name="rePwd">
			</label>
		</div>
		
		<div class="buttons">
			<a href="login.php">
				<input class="btn" type="button" value="Login">
			</a>
			<input class="btn btn-inv" type="submit" name="confirm" value="Confirm">
		</div>
	</form>
</div>

<script src="./scripts/validate.js"></script>

<?php
require("./components/footer/footer.php");
require("db/db.php");

if (isset($_POST['confirm'])) {
	$rno = $_POST['roll'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$repwd = $_POST['rePwd'];

	if ($pwd == $repwd) {
		$password = password_hash($pwd, PASSWORD_DEFAULT);
		$sql = "UPDATE users SET password = '$password' 
				WHERE user_rno = '$rno'";

		if (mysqli_query($con, $sql)) {
			echo "<script>alert('Password changed');</script>";
			echo "<script>window.open('login.php','_self')</script>";
		} else {
			echo "<script>alert('Invalid Details');</script>";
		}
	} else {
		echo "<script>alert('Passwords don't match');</script>";
	}
}

?>