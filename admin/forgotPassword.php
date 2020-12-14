<?php
$PAGE = "user";
require('../components/header/admin_header.php');
require('../components/page-title/admin_page_title.php');

if (!isset($_SESSION['admin'])) {
    echo "<script>window.alert('please login first')</script>";
    echo "<script>window.open('login.php','_self')</script>";
}
?>

<link rel="stylesheet" href="../styles/login.css">

<div class="container">
	<?php
	page_title("Forgot Password");
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
			<label>New Password
				<input type="password" class="inputs" name="pwd" required>
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

<script src="../scripts/validate.js"></script>
<script src="../scripts/login.js"></script>

<?php
require("../components/footer/admin_footer.php");
require("../db/db.php");

if (isset($_POST['confirm'])) {
	$rno = $_POST['roll'];
	$pwd = $_POST['pwd'];

	$password = password_hash($pwd, PASSWORD_DEFAULT);
	$sql = "UPDATE users SET password = '$password' 
			WHERE user_rno = '$rno'";
	$run = mysqli_query($con, $sql);

	if (mysqli_num_rows($run) > 0) {
		echo "<script>alert('Password changed');</script>";
		echo "<script>window.open('edit.php','_self')</script>";
	} else {
		echo "<script>alert('Invalid Details');</script>";
	}
}
?>