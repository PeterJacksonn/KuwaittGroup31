<?php require("adminNav.php");
include("session.php");


$path = "adminLogin.php";
session_start(); //must start a session in order to use session in this page.
if (!isset($_SESSION['id'])) {

    session_unset();
    session_destroy();
    header("Location:" . $path); //return to the login page
}
$fname = $_SESSION['name'];
$lname = $_SESSION['lname'];
$name = $fname.' '.$lname; //this value is obtained from the login page when the user is verified

checkSession($path); //calling the function from session.php

function getDocument (){
    $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    $sql = "SELECT * FROM documents";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();
    

    while ($row = $result->fetchArray()){ // use fetchArray(SQLITE3_NUM) - another approach
        $arrayResult [] = $row; //adding a record until end of records
    }
    return $arrayResult;
}

$document = getDocument();









?>


<div class="container bgColor">
        <main role="main" class="pb-3">
                <h1>View Documents</h1>
        
                <div class="row">
                <div class="col-10">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>Document ID</td>
                        <td>Document Owner</td>
                        <td>Criticality</td>
                        <td>Recently Viewed</td>
                        <td>View</td>
                    </thead>

                    <?php
                        for ($i=0; $i<count($document); $i++):
                    ?>
                    <tr>
                        <td><?php echo $document[$i]['docID']?></td>
                        <td><?php echo $document[$i]['owner']?></td>
                        <td><?php echo $document[$i]['criticality']?></td>
                        <td><?php echo $document[$i]['viewers']?></td>
                        <td><a href="adminViewdoc.php?uid=<?php echo $document[$i]['docID']; ?>">View</a></td>
                    </tr>
                    <?php endfor;?>
                </table>
            </div>
        </div>


        </main>
</div>



<?php require("Footer.php");?>
