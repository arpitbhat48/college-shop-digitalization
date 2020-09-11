<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>College Shop Digitization</title>
</head>

<body>

    <?php require("reset.styles.php"); ?>
    <?php require("header.styles.php") ?>
	<?php
	
    // $pages = array("home" => "index.php", "shop" => "shop.php", "cart" => "cart.php", $status => "login.php");
	$pages = array("home" => "index.php", "shop" => "shop.php", "cart" => "cart.php");
	if (isset($_SESSION['rollno'])) {
		$pages['logout'] = "logout.php";
	} else {
		$pages['login'] = "login.php";
    }
    ?>
    <div class="wrapper">
        <header>
            <div class="logo">
                <a href="index.php">
                    <span class="logo1">college</span><span class="logo2">shop</span>
                </a>
            </div>
            <ul class="nav-links">
                <?php
                foreach ($pages as $p => $path) {
                    $active_nav = "";
                    if ($PAGE == $p) $active_nav = "active-nav";
                    echo ('<li class="navs ' . $active_nav . '"><a href="' . $path . '">' .
                        ucfirst($p) . '</a>' . '</li>');
                }
                ?>
            </ul>
        </header>