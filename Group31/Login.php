<?php include("navBar.php");
require_once("loginCheck.php");
$passwordErr = $idErr = $invalidMesg = "";

if (isset($_POST['submit'])) {

    if ($_POST["password"]=="") {
        $passwordErr = "Password is required";
    } 
      
    if ($_POST["email"]==null) {
        $idErr = "Email is required";
    }

    if($_POST['email'] != null && $_POST["password"] !=null)
    {
        $array_user = verifyUser(); 

        if ($array_user != null) {

            if($array_user[0]['role']== "admin"){
                session_start();
                $_SESSION['id']= $array_user[0]['id'];
                $_SESSION['name'] = $array_user[0]['fname'];
                header("Location: adminIndex.php"); 
                exit();
            }
            if($array_user[0]['role']== "staff" || $array_user[0]['role']== "manager"){
                session_start();
                $_SESSION['id']= $array_user[0]['id'];
                $_SESSION['name'] = $array_user[0]['fname'];
                header("Location: userIndex.php"); 
                exit();  
            } 
        }
        else{
            $invalidMesg = "Invalid email and password!";
        }
    }
}
        
    

?>

<div class="container">
        <main role="main" class="pb-3">
            <div class="center bgColor">
                    <form method="post">
                        <h1>Bank User Login</h1>

                        <div class="form-group logincenter">
                                <label class="control-label labelFont">Email</label>
                                <input class="form-control" type="text" name = "email">
                                <span class="text-danger"><?php echo $idErr; ?></span>
                        </div>
                        <div class="form-group logincenter">
                                <label class="control-label labelFont">Password</label>
                                <input class="form-control" type="text" name = "password">
                                <span class="text-danger"><?php echo $passwordErr; ?></span>
                        </div>

                        <input type="hidden"><span class="text-danger"><?php echo $invalidMesg; ?></span>

                        <div class="form-group col-md-4 logincenter">
                            <input class="btn btn-primary" type="submit" value="Login" name ="submit">
                        </div>
                        <a href="Index.php">Cancel</a>
                    </form>
            </div>




	</main>
</div>
</body>
<?php include("navBar.php");
require_once("loginCheck.php");
$passwordErr = $idErr = $invalidMesg = "";

if (isset($_POST['submit'])) {

    if ($_POST["password"]=="") {
        $passwordErr = "Password is required";
    } 
      
    if ($_POST["email"]==null) {
        $idErr = "Email is required";
    }

    if($_POST['email'] != null && $_POST["password"] !=null)
    {
        $array_user = verifyUser(); 

        if ($array_user != null) {

            if($array_user[0]['role']== "admin"){
                session_start();
                $_SESSION['id']= $array_user[0]['id'];
                $_SESSION['name'] = $array_user[0]['fname'];
                header("Location: adminIndex.php"); 
                exit();
            }
            if($array_user[0]['role']== "staff" || $array_user[0]['role']== "manager"){
                session_start();
                $_SESSION['id']= $array_user[0]['id'];
                $_SESSION['name'] = $array_user[0]['fname'];
                header("Location: userIndex.php"); 
                exit();  
            } 
        }
        else{
            $invalidMesg = "Invalid email and password!";
        }
    }
}
        
    

?>

<div class="container">
        <main role="main" class="pb-3">
            <div class="center bgColor">
                    <form method="post">
                        <h1>Bank User Login</h1>

                        <div class="form-group logincenter">
                                <label class="control-label labelFont">Email</label>
                                <input class="form-control" type="text" name = "email">
                                <span class="text-danger"><?php echo $idErr; ?></span>
                        </div>
                        <div class="form-group logincenter">
                                <label class="control-label labelFont">Password</label>
                                <input class="form-control" type="text" name = "password">
                                <span class="text-danger"><?php echo $passwordErr; ?></span>
                        </div>

                        <input type="hidden"><span class="text-danger"><?php echo $invalidMesg; ?></span>

                        <div class="form-group col-md-4 logincenter">
                            <input class="btn btn-primary" type="submit" value="Login" name ="submit">
                        </div>
                        <a href="Index.php">Cancel</a>
                    </form>
            </div>




	</main>
</div>
</body>
<?php require("footer.php");?>