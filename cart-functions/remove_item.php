<?php
    require("../db/db.php");

    session_start();
    if(isset($_SESSION['rollno'])){
        $rno = $_SESSION['rollno'];
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "DELETE FROM cart WHERE  id = $id";
            if (mysqli_query($con, $query)) {
                // echo "<script>alert('Sucessfully removed');</script>";
            } else {
                echo "<script>alert('Error');</script>";
            }
            echo "<script>window.open('../cart-page.php','_self')</script>";
        }else{
            echo "<script>window.open('../cart-page.php','_self')</script>";
        }
    }else{
        echo "<script>window.alert('please login first')</script>";
    }
?>