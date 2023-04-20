<?php require("managerNav.php");
$db = new SQLite3('..\\Database\\Kuwaitt.db');
$sql = "SELECT * FROM documents WHERE docID=:uid";
$stmt = $db->prepare($sql);
$stmt->bindParam(':uid', $_GET['uid'], SQLITE3_TEXT);
$result= $stmt->execute();

    
if (isset($_POST['submit'])){

    $db = new SQLite3('..\\Database\\Kuwaitt.db');
    $sql = "UPDATE documents SET deleted = 'yes' WHERE docID = :uid";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':uid',$_GET['uid'], SQLITE3_TEXT); //discuss this!
    $stmt->bindParam(':deleted',$_POST['deleted'], SQLITE3_TEXT);

    $stmt->execute();

    header('Location: managerIndex.php');
}

while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

?>
<div class="home">
<h2 class="text">Delete Document ID: <?php echo $_GET['uid'];?></h2><br>
        <h2 style="color: red;">Are you sure want to Delete Document: <?php echo $arrayResult[0][0] ?>?</h2><br>
        
        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">ID</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][0] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Owner</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <form method="post">
                     <input type="hidden" name="uid" value = "yes"><br>
                    <input type="submit" value="Delete" class="btn-primary" name="submit"><a href="adminDocument.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
            </div>
        </div>