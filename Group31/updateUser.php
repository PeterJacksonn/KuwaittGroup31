<?php
require("adminNav.php");

    $db = new SQLite3('..\\Database\\Kuwaitt.db');
    $sql = "UPDATE credentials SET fname = :fname, lname = :lname, email = :email, password = :pwd WHERE id = :ids"; //remove s from (id = :ids to update user correctly)
    $stmt = $db->prepare($sql);
  
    $stmt->bindParam(':fname',$_POST['fname'], SQLITE3_TEXT);
    $stmt->bindParam(':lname',$_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':email',$_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':pwd',$_POST['pwd'], SQLITE3_TEXT);
    $stmt->bindParam(':id',$_GET['id'], SQLITE3_TEXT);
  
  
    $stmt->execute();
  {
    header('Location:viewUser.php');
  }
  
?>

<h1><u>Update user page</u></h1>

<a>Update user <?php echo $_GET['id'];?>?</a>



<?php require("footer.php"); ?>