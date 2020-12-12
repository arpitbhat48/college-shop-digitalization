<?php
if (!isset($_SESSION)) {
   session_start();
}

if (isset($_SESSION['rollno'])) {
   unset($_SESSION['rollno']);
}
header("Location: login.php");
