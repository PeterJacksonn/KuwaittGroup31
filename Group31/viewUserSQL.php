<?php
include("getOS.php");

function getUsers (){
    $os = getOS();
    if($os === "Mac"){
        $db = new SQLITE3('../Database/Kuwaitt.db');
    }
    else{
        $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    }
    $sql = "SELECT * FROM credentials";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();
    

    while ($row = $result->fetchArray()){ // use fetchArray(SQLITE3_NUM) - another approach
        $arrayResult [] = $row; //adding a record until end of records
    }
    return $arrayResult;
}

function UpdateDb($table,$column,$value,$pk,$pkvalue){
    $os = getOS();
    if($os === "Mac"){
        $db = new SQLITE3('../Database/Kuwaitt.db');
    }
    else{
        $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    }
    $sql = 'UPDATE '.$table.' SET '.$column.' = :value WHERE '.$pk.' = :pkvalue';
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':value', $value, SQLITE3_TEXT);
    $stmt->bindParam(':pkvalue', $pkvalue, SQLITE3_INTEGER);
    
    //echo $stmt->getSQL(true); //debug: displays a string of sql statemnt being executed
    return $stmt->execute(); //returns boolean based on the success of the statement

}

function TableNames($table,$index){
    $os = getOS();
    if($os === "Mac"){
        $db = new SQLITE3('../Database/Kuwaitt.db');
    }
    else{
        $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    }
    $sql = "SELECT * FROM ".$table;
    $stmt = $db->prepare($sql);
    
    $result = $stmt->execute();

    return $result->columnName($index);


}

function TableColumns($table){

    $os = getOS();
    if($os === "Mac"){
        $db = new SQLITE3('../Database/Kuwaitt.db');
    }
    else{
        $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    }
    $sql = "SELECT * FROM ".$table;
    $stmt = $db->prepare($sql);
    
    $result = $stmt->execute();

    return $result->numColumns();
}
