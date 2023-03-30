<?php
require('UserNav.php');
include("session.php");

$path = "adminLogin.php"; //this path is to pass to checkSession function from session.php

session_start(); //must start a session in order to use session in this page.

if (!isset($_SESSION['id'])) {

    session_unset();
    session_destroy();
    header("Location:" . $path); //return to the login page

}

$name = $_SESSION['name']; //this value is obtained from the login page when the user is verified

checkSession($path); //calling the function from session.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 class="pagefont"><u>Staff Reports</u></h1>

    <nav class="box4">
        <h2 class="documentfont">All Reports</h2>
        <div class="column1">
            <ul>
                <li><a class="sideBarfont" href="userReports.php"><b>All Reports</b></a></li>
                <li><a class="sideBarfont" href="userMonthlyReports.php"><b>Monthly Reports</b></a></li>
        </div>
    </nav>
</body>

<?php require("footer.php"); ?>