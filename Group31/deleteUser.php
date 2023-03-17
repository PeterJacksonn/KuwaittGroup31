<?php
require("adminNav.php");?>


<h1><u> Delete User Page </u></h1>

<?php
$db = new SQLite3('..\\Database\\Kuwaitt.db');
$sql = "SELECT id, fname, lname, email, password, role FROM credentials WHERE id=:id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $_GET['id'], SQLITE3_TEXT); 
$result= $stmt->execute();

while($row=$result->fetchArray(SQLITE3_NUM)){ 
    $arrayResult [] = $row; 
}

if (isset($_POST['delete'])){ 

    $db = new SQLite3('..\\Database\\Kuwaitt.db');

    $stmt = "DELETE FROM credentials WHERE id = :ids";//to make the code actually delete from db remove the
    $sql = $db->prepare($stmt);                    //s at the end of (id = :ids)
    $sql->bindParam(':id', $_POST['id'], SQLITE3_TEXT);

    $sql->execute();
    header("Location:viewUser.php?deleted=true"); //return to view user but passes deleted=true in order to display a success message
}


?>

<div class="bgColor">
    <main role="main" class="pb-3">
        <h4 style="color: red;">Are you sure want to delete this User?</h4><br>
        
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
                <label style="font-size: 20px; color:blue; font-weight: bold;">First Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Last Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][2] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Email</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][3] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">password</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][4] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">DocID</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][5] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <form method="post">
                     <input type="hidden" name="id" value = "<?php echo $_GET['id'] ?>"><br>
                    <input type="submit" value="Delete" class="btn btn-danger" name="delete"><a href="viewUser.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
            </div>
        </div>

            
            </main>

</div>

<?php require("footer.php"); ?>