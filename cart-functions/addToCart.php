<?php
	require("../db/db.php");
    session_start();

	if(isset($_SESSION['rollno'])){

		$id = $_POST['id'];
		$rno = $_SESSION['rollno'];
		
		$sql = "INSERT INTO cart(user_rno, item_id) VALUES ($rno, $id)";
		// echo $sql;
		if (mysqli_query($con, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo json_encode(array("statusCode"=>201));
		}
	} else {
		echo json_encode(array("statusCode"=>202));
	}
?>