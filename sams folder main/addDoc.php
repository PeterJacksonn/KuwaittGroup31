<?php require("adminNav.php"); 
include_once("docSQL.php");
include("session.php");

$path = "Login.php"; //this path is to pass to checkSession function from session.php

session_start(); //must start a session in order to use session in this page.

if (!isset($_SESSION['id'])){

    session_unset();
    session_destroy();
    header("Location:".$path);//return to the login page

}

$name = $_SESSION['name']; //this value is obtained from the login page when the user is verified
checkSession ($path); //calling the function from session.php

$message = "";

if(isset($_POST["submit"])) {
    documentSQL();
    $doc = $_POST['doc'];
    $criticality = $_POST['criticality'];
    $target_dir = "userDocuments\\"; //to specify the directory 
    $target_file = $target_dir.basename($_FILES["file"]["name"]); //fileToUpload - is from the form -input name
    $uploadOk = 1;
    //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


 
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message .= "Sorry, your file was not uploaded.";
    
    } else {
        //changing the file name according to the student ID
        $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION); //getting the file extension
        $fileName = $doc.".".$extension; //joining the new file name with the extension
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$fileName)) {
            $message .="The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
            //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            $message .="Sorry, there was an error uploading your file.";
            //echo "Sorry, there was an error uploading your file.";
        }
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>PDF UPLOADER</h1>
<div class="row">
    <form method="post" enctype="multipart/form-data">
            <div class="col-10">
                <div class="form-group">
                <input type="text" class="form-control" name="doc"
                 placeholder="Document name..." required>
                 <select name="criticality" class="form-control">
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                        <input type="file" name="file">
                        <input type="submit" name="submit" value="Upload" class="btn btn-primary">
                        
                    </form>
                </div>
            </div>
        </div>

        <div>
            <?php echo ($message!="") ? $message : ""; ?>
</div>




</body>
</html>
