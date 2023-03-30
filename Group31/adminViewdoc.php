<?php
require("AdminNav.php");
include("session.php");


$path = "adminLogin.php";
session_start(); //must start a session in order to use session in this page.
if (!isset($_SESSION['id'])) {

    session_unset();
    session_destroy();
    header("Location:" . $path); //return to the login page
}
$fname = $_SESSION['name'];
$lname = $_SESSION['lname'];
$name = $fname.' '.$lname; //this value is obtained from the login page when the user is verified

checkSession($path); //calling the function from session.php


if(isset($_GET['uid'])){
    appendViewed($name);
}
function appendViewed($name){
    $db = new SQLite3('..\\Database\\Kuwaitt.db');
    $sql = "UPDATE documents SET viewers= viewers|| :viewer WHERE docID=:docID";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':viewer'," ".$name.": ".date("d/m/Y h:i:s").",\n", SQLITE3_TEXT);
    $stmt->bindValue(':docID',$_GET['uid'], SQLITE3_TEXT);
    $stmt->execute();
    
  }



?>

<iframe src="userDocuments\\<?php echo $_GET['uid'] ?>.pdf#toolbar=0" width="100%" height="800px"></iframe>

<?php require("footer.php"); ?>