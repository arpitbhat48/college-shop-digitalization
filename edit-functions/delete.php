<?php
require("../db/db.php");
session_start();
$id = $_GET['id'];

$sql = "DELETE FROM inventory WHERE item_id = '$id'";
// echo $sql;
if (mysqli_query($con, $sql)) {
	echo "<script>window.open('../admin/edit.php','_self')</script>";
} else {
	echo "<script>window.alert('Something went Wrong')</script>";
}
?>