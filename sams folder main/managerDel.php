<?php require("managerNAV.php");
include("session.php");
$path = "adminLogin.php"; //this path is to pass to checkSession function from session.php

session_start(); //must start a session in order to use session in this page.

if (!isset($_SESSION['id'])) {

    session_unset();
    session_destroy();
    header("Location:" . $path); //return to the login page

}

$name = $_SESSION['name']; //this value is obtained from the login page when the user is verified

checkSession($path); //calling the function from session.php

function getDoc (){
    $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    $sql = "SELECT * FROM documents WHERE deleted = 'yes'";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_SESSION['id'] , SQLITE3_TEXT);
    $result = $stmt->execute();
    

    while ($row = $result->fetchArray()){ // use fetchArray(SQLITE3_NUM) - another approach
        $arrayResult [] = $row; //adding a record until end of records
    }
    return $arrayResult;
}


$document = getDoc();
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
    <h1 class="pagefont"><u>Manager Home Page</u></h1>

    <h2 class="greetingUser">Hello Manager, <?php echo $name ?></h2>

    <nav class="box3">
        <h2 class="documentfont">Deleted Documents</h2>
        <div class="column1">
            <ul>
                <li><a class="sideBarfont" href="managerIndex.php"><b>My Documents</b></a></li>
                <li><a class="sideBarfont" href="managerUpload.php"><b>Scan / Upload File</b></a></li>
                <li><a class="sideBarfont" href="managerArch.php"><b>View Archived Files</b></a></li>
                <li><a class="sideBarfont" href="managerDel.php"><b>View Deleted Files</b></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-hover">
                    <thead class="theadColour">
                        <td style="text-align: center;">Document ID</td>
                        <td style="text-align: center;">Document Owner</td>
                        <td style="text-align: center;">Criticality</td>
                        <td style="text-align: center;">View</td>
                        <td style="text-align: center;">Actions</td>

                    </thead>

                    <?php
                    for ($i = 0; $i < count($document); $i++) :
                    ?>
                        <tr>
                            <td class="tbContents"><?php echo $document[$i]['docID'] ?></td>
                            <td class="tbContents"><?php echo $document[$i]['owner'] ?></td>
                            <td class="tbContents"><?php echo $document[$i]['criticality'] ?></td>
                            <td class="tbContents"><a href="adminViewdoc.php?uid=<?php echo $document[$i]['docID']; ?>" class="btn btn-action">View</a></td>
                            <td class="tbContents"><a href="recover.php?uid=<?php echo $document[$i]['docID']; ?>" class="btn btn-action">Recover</a></td>

                        </tr>
                    <?php endfor; ?>
                </table>
            </div>
        </div>
    </nav>
</body>

</html>


<?php require("footer.php"); ?>