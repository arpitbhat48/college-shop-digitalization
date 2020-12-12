<?php
require("../db/db.php");
session_start();

if (isset($_SESSION['rollno'])) {

	$id = $_POST['id'];
	$rno = $_SESSION['rollno'];

	$check_inv = "SELECT stock FROM inventory WHERE item_id = $id";
	$res = mysqli_query($con, $check_inv);

	$row = mysqli_fetch_assoc($res);
	$stock = $row['stock'];

	if ($stock > 0) {
		$sql = "INSERT INTO cart(user_rno, item_id) VALUES ($rno, $id)";
		if (mysqli_query($con, $sql)) {
			echo json_encode(array("statusCode" => 200, "meow" => "nyahello"));
		} else {
			echo json_encode(array("statusCode" => 201));
		}
	}
} else {
	echo json_encode(array("statusCode" => 202));
}
