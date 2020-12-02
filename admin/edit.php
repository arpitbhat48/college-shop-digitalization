<link rel="stylesheet" href="../styles/edit.css">

<?php
$PAGE = "edit";
require('../components/header/admin_header.php');
require('../components/page-title/admin_page_title.php');
require("../db/db.php");
?>

<div class="container">
	<?php
	page_title("Edit Products");
	?>
	<div class="edit-cards">
        <?php
        require('../components/edit-page-card/edit-page-card.php');
        $result = mysqli_query($con, "SELECT * FROM inventory");
        while ($row = mysqli_fetch_assoc($result)) {
            edit_card(
                $row["item_id"],
                $row["item_name"],
                $row["cost"],
                $row["stock"],
                $row["description"],
                'data:image/jpeg;base64,'.base64_encode($row["image"])
            );
        }
		?>
	</div>
</div>

<?php
require("../components/footer/admin_footer.php");

?>