<?php
$PAGE = "login";
require('../components/header/admin_header.php');
require('../components/page-title/admin_page_title.php');

if (isset($_SESSION['admin'])) {
	header("Location: insert.php");
}
?>

<link rel="stylesheet" href="../styles/login.css">

<div class="container">
	<?php
	page_title("Admin");
	?>
</div>

<div class="centre">
	<form action="" method="POST" onsubmit="return validateForm()">
		<div class="roll">
			<label>Username
				<input type="text" class="inputs" name="username" required>
			</label>
		</div>
		<div class="pwd">
			<label>Password
				<input type="password" class="inputs" name="pwd" required>
			</label>
		</div>
		<div class="buttons">
			<input class="btn btn-inv" type="submit" name="login" value="Log In">
		</div>
	</form>
</div>
<script src="../scripts/validate.js"></script>
<script src="../scripts/login.js"></script>

<?php
require("../components/footer/admin_footer.php");
require("../db/db.php");

if (isset($_POST['login'])) {

	$username = mysqli_real_escape_string($con, $_POST['username']);
	$pwd = mysqli_real_escape_string($con, $_POST['pwd']);

	$query = "SELECT * FROM admin WHERE username = '$username'";
	$run_query = mysqli_query($con, $query);

	if (mysqli_num_rows($run_query) == 0) {
		echo "<script>alert(`Invalid Credentials`)</script>";
	} else {
		$row = mysqli_fetch_array($run_query);
		$password = $row['password'];

		if ($password == $pwd) {
			$_SESSION['admin'] = $username;
			echo "<script>window.open('insert.php','_self')</script>";
		} else {
			echo "<script>alert('Incorrect password')</script>";
		}
	}
}
?>