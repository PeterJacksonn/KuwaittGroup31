<?php
function documentSQL (){
    $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    $sql = "INSERT INTO documents (owner, criticality) VALUES (:name, :criticality)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $_SESSION['name'] , SQLITE3_TEXT);


    $stmt->bindParam(':owner', $_POST['name'], SQLITE3_TEXT);
    $stmt->bindParam(':criticality', $_POST['criticality'], SQLITE3_TEXT);


    //execute the sql statement
    $stmt->execute();

    //the logic
    if($stmt){
        $added = true;
    }

    return $added;
}
?>