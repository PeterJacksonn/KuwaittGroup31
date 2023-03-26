<?php
require("UserNav.php");


if (isset($_GET['uid'])) {
  appendViewed();
}
function appendViewed()
{
  $db = new SQLite3('..\\Database\\Kuwaitt.db');
  $sql = "UPDATE documents SET viewers=viewers||:viewer WHERE docID=:docID";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':viewer', $_SESSION['name'], SQLITE3_TEXT);
  $stmt->bindParam(':docID', $docID, SQLITE3_TEXT);
  $stmt->execute();
}



?>


<h1> Kuwait file management system </h1>

<iframe src="userDocuments\\<?php echo $_GET['uid'] ?>.pdf#toolbar=0" width="100%" height="700px"></iframe>



<?php require("footer.php"); ?>