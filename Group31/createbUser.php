<?php require("adminNav.php");
include_once("insertUser.php");
$errorfname = $errorlname = $erroruname = $erroruid = $errorpwd = "";
$allFields = "yes";

if (isset($_POST['submit'])) {

    if ($_POST['fname'] == "") {
        $errorfname = "First name is mandatory";
        $allFields = "no";
    }
    if ($_POST['lname'] == null) {
        $errorlname = "Last name is mandatory";
        $allFields = "no";
    }

    if ($_POST['email'] == "") {
        $erroruid = "Email is mandatory";
        $allFields = "no";
    }

    if ($_POST['password'] == "") {
        $errorpwd = "Default password mandatory";
        $allFields = "no";
    }

    if ($allFields == "yes") {
        $createUser = createUser();
        header('Location: adminIndex.php?createUser=' . $createUser);
    }
}

?>

<h1 class="pagefont">Create User Form</h1>

<body>
    <nav class="box4">
        <div class="row">
            <div class="col-8">
                <form method="post">
                    <div class="form-group col-md-7">
                        <label style="letter-spacing: 2px; font-family: 'Segou UI', Tahoma, Geneva, Verdana, sans-serif; color: white; position:relative; left:1%; top:10%"><b>First Name</b></label>
                        <input class="form-control" type="text" name="fname" style="left: 30%; position: relative;">
                        <span class="alert alert-danger position1"><?php echo $errorfname; ?></span>
                    </div>

                    <div class="form-group col-md-7">
                        <label style="letter-spacing: 2px; font-family: 'Segou UI', Tahoma, Geneva, Verdana, sans-serif; color: white; position:relative; left:1%; top:20%"><b>Last Name</b></label>
                        <input class="form-control" type="text" name="lname" style="left: 30%; position: relative;">
                        <span class="alert alert-danger position1"><?php echo $errorlname; ?></span>
                    </div>


                    <div class="form-group col-md-7">
                        <label style="letter-spacing: 2px; font-family: 'Segou UI', Tahoma, Geneva, Verdana, sans-serif; color: white; position:relative; left:1%; top:40%"><b>Email</b></label>
                        <input class=" form-control" type="text" name="email" style="left: 30%; position: relative;">
                        <span class="alert alert-danger position1"><?php echo $erroruid; ?></span>
                    </div>



                    <div class="form-group col-md-7">
                        <label style="letter-spacing: 2px; font-family: 'Segou UI', Tahoma, Geneva, Verdana, sans-serif; color: white; position:relative; left:1%; top:60%"><b>Password</b></label>
                        <input class=" form-control" type="password" name="password" style="left: 30%; position: relative;">
                        <span class="alert alert-danger position1"><?php echo $errorpwd; ?></span>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label style="letter-spacing: 2px; font-family: 'Segou UI', Tahoma, Geneva, Verdana, sans-serif; color: white; position:relative; left:1%; top:80%"><b>User Role</b></label>
                        <select name=" role" class="form-control" style="left: 53%; position: relative;">
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group col-md-4">
                        <input class="btn btn-light" type="submit" value="Create User" name="submit" style="left: 410%; position: relative;">
                    </div>
                </form>
            </div>
        </div>
    </nav>
</body>


<?php require("footer.php"); ?>