<?php
    //for processing orders

    $PAGE = "";

    date_default_timezone_set('Asia/Kolkata');
    require('../components/header/header.php');
    require("../db/db.php");
   
    if(isset($_SESSION['rollno'])){
        $rno =$_SESSION['rollno'];

        $query = "select * from cart where user_rno = $rno";

        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $x = $row['item_id'];
            $insert_order_query = "insert into orders(user_rno, item_id, date_time) values ($rno, $x, now())";
            if (mysqli_query($con, $insert_order_query)) {

                // echo "<script>alert('SucessFully added');</script>";

                //after inserting to orders table delete from cart table
                $empty_cart = "delete from cart where user_rno = $rno and item_id = $x";
                if (mysqli_query($con, $empty_cart)) {
                    // echo "<script>alert('SucessFully deleted');</script>";
                } else {
                    echo "<script>alert('Error');</script>";
                    break;
                }

            } else {
                echo "<script>alert('Error');</script>";
                break;
            }
        }
        echo "<script>window.open('order_page.php','_self')</script>";
    }else{
        echo "<script>window.alert('please login first')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
