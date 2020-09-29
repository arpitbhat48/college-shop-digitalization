<?php
$PAGE = "login";
require('./components/header/header.php');
require('./components/page-title/page-title.php')
?>

<link rel="stylesheet" href="styles/login.css">

<div class="container">
	<?php
	page_title("Login")
	?>
</div>

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
require("./components/footer/footer.php");
require("db/db.php");

if (isset($_POST['login'])) {
	$rno = $_POST['roll'];
	$pwd = $_POST['pwd'];

	$query = "SELECT * FROM users WHERE user_rno = '$rno'";
	$run_query = mysqli_query($con, $query);

	if (mysqli_num_rows($run_query) == 0) {
		echo "<script>alert(`Wrong Roll Number`)</script>";
	} else {
		$row = mysqli_fetch_array($run_query);
		$password = $row['password'];

		if (password_verify($pwd, $password)) {
			// echo "<script>alert('Login')</script>";
			$_SESSION['rollno'] = $rno;
			echo "<script>window.open('index.php','_self')</script>";
		} else {
			echo "<script>alert('Incorrect password')</script>";
		}
	}
}
?>