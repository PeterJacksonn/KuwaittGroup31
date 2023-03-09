<?php include("navBar.php");
require_once("adminAuth.php");
$passwordErr = $idErr = $invalidMesg = "";

if (isset($_POST['submit'])) {

    if ($_POST["password"]=="") {
        $passwordErr = "Password is required";
    } 
      
    if ($_POST["id"]==null) {
        $idErr = "ID is required";
    }

    if($_POST['password'] != null && $_POST["id"] !=null)
    {
        $array_user = verifyStaff();
        
        if ($array_user != null) {

		
		

            if ($array_user[0]['role'] == "Staff") {
                if ($array_user[0]['status'] == "Active") {
                    session_start();
                    $_SESSION['id'] = $array_user[0]['id'];
                    $_SESSION['fname'] = $array_user[0]['fname'];
                    header("Location: manageCustomer.php");
                    exit();
                }
                else{
                    $invalidMesg = "This staff account is suspended";
                }
            }
            if ($array_user[0]['role'] == "admin") {
                session_start();
                $_SESSION['id'] = $array_user[0]['id'];
                $_SESSION['fname'] = $array_user[0]['fname'];
                header("Location: manageStaff.php");
                exit();
            }
               
        }
        else{
            $invalidMesg = "Invalid ID/Password!";
        }
        
    }
}
?>

<body style="background-image: url('equipmentPicture.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
<div class="container">
        <main role="main" class="pb-3">
            <div class="center bgColor">
                    <form method="post">
                        <h1>Staff/Manager Login</h1>

                        <div class="form-group logincenter">
                                <label class="control-label labelFont">Staff ID</label>
                                <input class="form-control" type="text" name = "id">
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
