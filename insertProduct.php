<link rel="stylesheet" href="styles/insertProduct.css">

<?php
$PAGE = "cart";
require('./components/header/header.php');
require('./components/page-title/page-title.php');
require("db/db.php");
?>

<div class="container">
    <?php
        page_title("Admin");
        require('./components/cart-page-card/cart-page-card.php');
    ?>
</div>

<div class="container">
	<form method="POST" class="container" enctype="multipart/form-data">
		<h1 class="">Insert Product</h1>
		<label>Name
			<input type="text" class="inputs" name="item_name" required>
		</label>
		<label>Cost
			<input type="text" class="inputs" name="item_cost" required>
		</label>
		<label>Stock
			<input type="text" class="inputs" name="item_stock" required>
		</label>
		<label>Image
			<input type="file" class="inputs" name="item_image">
		</label>
		<label>Description
			<textarea name="item_desc" class="inputs" cols="30" rows="3"></textarea>
		</label>

		<input type="submit" value="Insert" name="insert">
	</form>
</div>

<?php
require("./components/footer/footer.php");
require("db/db.php");

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