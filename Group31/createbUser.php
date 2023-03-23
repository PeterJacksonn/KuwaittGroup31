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

</div>
<h1>Create User Form</h1>
<div class="row">
    <div class="col-6">
        <form method="post">
            <div class="form-group col-md-6">
                <label class="control-label labelFont">First Name</label>
                <input class="form-control" type="text" name="fname">
                <span class="text-danger"><?php echo $errorfname; ?></span>
            </div>

            <div class="form-group col-md-6">
                <label class="control-label labelFont">Last Name</label>
                <input class="form-control" type="text" name="lname">
                <span class="text-danger"><?php echo $errorlname; ?></span>
            </div>


            <div class="form-group col-md-6">
                <label class="control-label labelFont">Email</label>
                <input class="form-control" type="text" name="email">
                <span class="text-danger"><?php echo $erroruid; ?></span>
            </div>



            <div class="form-group col-md-4">
                <label class="control-label labelFont">Password</label>
                <input class="form-control" type="password" name="password">
                <span class="text-danger"><?php echo $errorpwd; ?></span>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label class="control-label labelFont">User Role</label>
                <select name="role" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="staff">Staff</option>
                </select>
            </div>
            <br>
            <div class="form-group col-md-4">
                <input class="btn btn-primary" type="submit" value="Create User" name="submit">
            </div>
        </form>
    </div>
</div>
<?php require("footer.php"); ?>