<?php
require("adminNav.php");
include_once("viewUserSQL.php");

if (isset($_POST['submit'])){

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

}

$user = getUsers();

?>
      <div class="bgColor">
              <main role="main" class="pb-3">
                    <h2 class="title center">Update Account Details</h2>
  
                    <div class="row">
              <div class="col-11">
                  <form method="post">
  
                  <div class="form-group col-md-3">
                          <label class="control-label labelFont">First Name</label>
                          <input class="form-control" placeholder="<?php echo $user[0]['fname']?>" type="text" name = "fname">
                     </div>
  
                     <div class="form-group col-md-3">
                          <label class="control-label labelFont">Last Name</label>
                          <input class="form-control" placeholder="<?php echo $user[0]['lname']?>" type="text" name = "lname">
                     </div>
  
                     <div class="form-group col-md-3">
                          <label class="control-label labelFont">Email</label>
                          <input class="form-control" placeholder="<?php echo $user[0]['email']?>" type="text" name = "email">
                     </div>
  
                     <div class="form-group col-md-3">
                          <label class="control-label labelFont">Password</label>
                          <input class="form-control" placeholder="<?php echo $user[0]['password']?>" type="password" name = "pwd">
                     </div>
  
                     <div class="form-group col-md-3">
                         <input type="submit" name="submit" value="Update" class="btn btn-primary">
                     </div>
                     <div class="form-group col-md-3"><a href="viewUser.php">Back</a></div>
                  </form>
  
              </div>
          </div>
          </main>
      </div>
  


<?php 
require("footer.php");
?>