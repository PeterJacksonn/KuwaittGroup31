<?php require("adminNav.php");
include("getOS.php");
$os = getOS();
if($os === "Mac")
{
    $db = new SQLITE3('../Database/Kuwaitt.db');
}
else{
    $db = new SQLITE3('..\\Database\\Kuwaitt.db');
}
$sql = "SELECT * FROM documents WHERE docID=:uid";
$stmt = $db->prepare($sql);
$stmt->bindParam(':uid', $_GET['uid'], SQLITE3_TEXT);
$result= $stmt->execute();

    
if (isset($_POST['submit'])){

    $os = getOS();
    if($os === "Mac")
    {
      $db = new SQLITE3('../Database/Kuwaitt.db');
    }
    else{
      $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    }
    $sql = "UPDATE documents SET archive = 'yes' WHERE docID = :uid";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':uid',$_GET['uid'], SQLITE3_TEXT); //discuss this!
    $stmt->bindParam(':deleted',$_POST['deleted'], SQLITE3_TEXT);

    $stmt->execute();

    header('Location: adminDocument.php');
}

while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

?>
<div class="home">
<h2 class="text">Archive Document ID: <?php echo $_GET['uid'];?></h2><br>
        <h2 style="color: red;">Are you sure want to Archive Document: <?php echo $arrayResult[0][0] ?>?</h2><br>
        
        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Document ID:</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][0] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Owner:</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <form method="post">
                     <input type="hidden" name="uid" value = "yes"><br>
                    <input type="submit" value="Archive" class="btn-primary" name="submit"><a href="adminDocument.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
            </div>
        </div>