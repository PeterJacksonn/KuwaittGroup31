<?php

function getDoc (){
    $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    $sql = "SELECT * FROM documents";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_SESSION['id'] , SQLITE3_TEXT);
    $result = $stmt->execute();
    

    while ($row = $result->fetchArray()){ // use fetchArray(SQLITE3_NUM) - another approach
        $arrayResult [] = $row; //adding a record until end of records
    }
    return $arrayResult;
}
