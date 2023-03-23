<?php require("adminNav.php");
include("getOS.php");



function getDocument (){
    $os = getOS();
    if($os === "Mac")
    {
      $db = new SQLITE3('/Applications/XAMPP/xamppfiles/htdocs/KuwaittGroup31copy/Database/Kuwaitt.db');
    }
    else{
      $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    }
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
                        <td style="text-align: center;">Document Viewer</td>
                        <td style="text-align: center;">View</td>
                    </thead>

                    <?php
                        for ($i=0; $i<count($document); $i++):
                    ?>
                    <tr>
                        <td class="tbContents"><?php echo $document[$i]['docID']?></td>
                        <td class="tbContents"><?php echo $document[$i]['owner']?></td>
                        <td class="tbContents"><?php echo $document[$i]['criticality']?></td>
                        <td class="tbContents"><?php echo $document[$i]['viewers']?></td>
                        <td class="tbContents"><a href="adminViewdoc.php?uid=<?php echo $document[$i]['docID']; ?>" class="btn btn-action">View</a></td>
                    </tr>
                    <?php endfor;?>
                </table>
            </div>
        </div>


        </main>
</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <!DOCTYPE html>
<html>
  <head>
    <title>Title of the document</title>
  </head>
  <body>
    <h1>PDF Example with iframe</h1>
    <iframe src="1.pdf#toolbar=0" width="100%" height="500px">
    </iframe>
  </body>
</html>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php require("Footer.php");?>
