<?php
require("UserNav.php");
include("getOS.php");


if(isset($_GET['uid'])){
    appendViewed();
}
function appendViewed(){
    
    if($os === "Mac")
    {
      $db = new SQLITE3('../Database/Kuwaitt.db');
    }
    else{
      $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    }
    $sql = "UPDATE documents SET viewers=viewers||:viewer WHERE docID=:docID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':viewer',$_SESSION['name'], SQLITE3_TEXT);
    $stmt->bindParam(':docID',$docID, SQLITE3_TEXT);
    $stmt->execute();
    
  }



?>


<h1> Kuwait file management system </h1>

<iframe src="userDocuments\\<?php echo $_GET['uid']?>.pdf#toolbar=0" width="100%" height="700px">



<?php require("footer.php"); ?>