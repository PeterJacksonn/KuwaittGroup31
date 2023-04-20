<?php require("managerNAV.php");
include("session.php");

include("getOS.php");


$path = "adminLogin.php";
session_start(); //must start a session in order to use session in this page.
if (!isset($_SESSION['id'])) {

    session_unset();
    session_destroy();
    header("Location:" . $path); //return to the login page
}
$fname = $_SESSION['name'];
$lname = $_SESSION['lname'];
$name = $fname . ' ' . $lname; //this value is obtained from the login page when the user is verified

checkSession($path); //calling the function from session.php

function getDocument()
{
    $os = getOS();
    if ($os === "Mac") {
        $db = new SQLITE3('../Database/Kuwaitt.db');
    } else {
        $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    }
    $sql = "SELECT * FROM documents";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();


    while ($row = $result->fetchArray()) { // use fetchArray(SQLITE3_NUM) - another approach
        $arrayResult[] = $row; //adding a record until end of records
    }
    return $arrayResult;
}

$document = getDocument();
?>


<div>
    <h1 class="tableHeader"><u>View Documents</u></h1>
</div>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h5>View all information about each document, or select a document to view.</h5>


        <div class="row">
            <div class="col">
                <table class="table table-hover">
                    <thead class="theadColour">
                        <td style="text-align: center;">Document ID</td>
                        <td style="text-align: center;">Document Owner</td>
                        <td style="text-align: center;">Criticality</td>
                        <td style="text-align: center;">Recently Viewed</td>
                        <td style="text-align: center;">View</td>
                    </thead>

                    <?php
                    for ($i = 0; $i < count($document); $i++) :
                    ?>
                        <tr>
                            <td class="tbContents"><?php echo $document[$i]['docID'] ?></td>
                            <td class="tbContents"><?php echo $document[$i]['owner'] ?></td>
                            <td class="tbContents"><?php echo $document[$i]['criticality'] ?></td>
                            <td class="tbContents"><button type="button" class="btn btn-action" data-bs-toggle="modal" data-bs-target="#viewersModal<?php echo $i ?>">View</button></td>
                            <td class="tbContents"><a href="adminViewdoc.php?uid=<?php echo $document[$i]['docID']; ?>" class="btn btn-action">View</a></td>
                        </tr>
                    <?php endfor; ?>
                </table>
            <!-- Modal -->
            <?php
                for ($i=0; $i<count($document); $i++):
            ?>
            <div class="modal fade" id="viewersModal<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="viewersModalLabel<?php echo $i ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewersModalLabel<?php echo $i ?>">Viewers for Document <?php echo $document[$i]['docID']?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><?php echo $document[$i]['viewers']?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endfor;?>
        </div>
    </main>
</div>



<?php require("Footer.php"); ?>