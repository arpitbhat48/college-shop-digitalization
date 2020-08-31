<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Shop Digitization</title>
</head>

<body>

    <?php require("reset.styles.php"); ?>
    <?php require("header.styles.php") ?>
    <?php
    $pages = array("home" => "index.php", "shop" => "shop.php", "cart" => "cart.php", "login" => "login.php");
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