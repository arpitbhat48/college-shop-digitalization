<?php
    require("db/db.php");
    // echo $con;
    session_start();
    if(isset($_SESSION['rollno'])){
        $rno =$_SESSION['rollno'];
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            echo $rno;
            echo $id;
            $query = "INSERT INTO cart VALUES ($rno, $id)";
            if (mysqli_query($con, $query)) {
                echo "<script>alert('SucessFully added');</script>";
            } else {
                echo "<script>alert('Error');</script>";
            }
            echo "<script>window.open('shop.php','_self')</script>";
        }else{
            echo "<script>window.open('shop.php','_self')</script>";
        }
    }else{
        echo "<script>window.alert('please login first')</script>";
    }
?>