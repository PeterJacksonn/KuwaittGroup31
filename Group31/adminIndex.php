<?php require("adminNav.php");
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
    <h1 class="pagefont"><u>Admin Home Page</u></h1>

    <h2 class="greetingUser">Hello, <?php echo $name ?></h2>

    <nav class="box3">
        <h2 class="documentfont">My Documents</h2>
        <div class="column1">
            <ul>
                <li><a class="sideBarfont" href="adminIndex.php"><b>My Documents</b></a></li>
                <li><a class="sideBarfont" href="adminIndexAddDoc.php"><b>Scan / Upload File</b></a></li>
                <li><a class="sideBarfont" href=""><b>Archived Files</b></a></li>
                <li><a class="sideBarfont" href=""><b>Deleted Files</b></a></li>
            </ul>
        </div>
    </nav>
</body>

</html>


<?php require("footer.php"); ?>