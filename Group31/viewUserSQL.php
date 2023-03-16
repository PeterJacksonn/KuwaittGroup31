<?php

function getUsers (){
    $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    $sql = "SELECT * FROM bankUser";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();
    

    while ($row = $result->fetchArray()){ // use fetchArray(SQLITE3_NUM) - another approach
        $arrayResult [] = $row; //adding a record until end of records
    }
    return $arrayResult;
}

function UpdateDb($table,$column,$value,$pk,$pkvalue){

    $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    $sql = "UPDATE :table SET :column = :value WHERE :pk == :pkvalue";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':table',$table,SQLITE3_TEXT);
    $stmt->bindParam(':column',$column,SQLITE3_TEXT);
    $stmt->bindParam(':value',$value,SQLITE3_TEXT);
    $stmt->bindParam(':pk',$pk,SQLITE3_TEXT);
    $stmt->bindParam(':pkvalue',$pkvalue,SQLITE3_TEXT);
    
    $result = $stmt->execute();

}

function TableNames($table,$index){

    $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    $sql = "SELECT * FROM bankUser ";
    $stmt = $db->prepare($sql);
    //$stmt->bindParam(':table',$table,SQLITE3_TEXT); //trying to bindparam to generalise this but it just breaks lmao
    $result = $stmt->execute();

    return $result->columnName($index);


}

function TableColumns(){

    $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    $sql = "SELECT * FROM bankUser ";
    $stmt = $db->prepare($sql);
    //$stmt->bindParam(':table',$table,SQLITE3_TEXT); //same here
    $result = $stmt->execute();

    return $result->numColumns();
}
