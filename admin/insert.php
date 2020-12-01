<link rel="stylesheet" href="../styles/insert.css">

<?php
$PAGE = "insert";
require('../components/header/admin_header.php');
require('../components/page-title/admin_page_title.php');
require("../db/db.php");
?>

<div class="container">
	<?php
		page_title("Insert Product");
	?>
	<form method="POST" class="insert-form" enctype="multipart/form-data">
		<h1 class="insert-title">Insert Product</h1>
		<label class="insert-name">Name
			<input type="text" name="item_name" required>
		</label>
		<label class="insert-cost">Cost
			<input type="text" name="item_cost" required>
		</label>
		<label class="insert-stock">Stock
			<input type="text" name="item_stock" required>
		</label>
		<label class="insert-image">Image
			<input type="file" name="item_image">
		</label>
		<label class="insert-desc">Description
			<textarea name="item_desc" cols="" rows=""></textarea>
		</label>
		<input class="insert-submit" type="submit" value="Insert" name="insert">
	</form>
</div>

<?php
require("../components/footer/admin_footer.php");

if (isset($_POST['insert'])) {
	$name = mysqli_real_escape_string($con, $_POST['item_name']);
	$cost = mysqli_real_escape_string($con, $_POST['item_cost']);
	$stock = mysqli_real_escape_string($con, $_POST['item_stock']);
	$desc = mysqli_real_escape_string($con, $_POST['item_desc']);
	$image = addslashes(file_get_contents($_FILES['item_image']['tmp_name']));

	$sql = "INSERT INTO inventory (item_name, cost, stock, description, image) VALUES
		('$name', '$cost', '$stock', '$desc', '$image')
	";
	if (mysqli_query($con, $sql)) {
		echo "<script>alert('Product added')</script>";
	} else {
		echo "<script>alert('Something went wrong')</script>";
	}
}
?>