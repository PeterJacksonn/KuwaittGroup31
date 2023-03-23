<?php

function getUsers (){
    $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    $sql = "SELECT * FROM credentials";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();
    

    while ($row = $result->fetchArray()){ // use fetchArray(SQLITE3_NUM) - another approach
        $arrayResult [] = $row; //adding a record until end of records
    }
    return $arrayResult;
}

function UpdateDb($table,$column,$value,$pk,$pkvalue){

    $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    $sql = 'UPDATE '.$table.' SET '.$column.' = :value WHERE '.$pk.' = :pkvalue';
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':value', $value, SQLITE3_TEXT);
    $stmt->bindParam(':pkvalue', $pkvalue, SQLITE3_INTEGER);
    
    //echo $stmt->getSQL(true); //debug: displays a string of sql statemnt being executed
    return $stmt->execute(); //returns boolean based on the success of the statement

}

function TableNames($table,$index){ // returns the column name of the given index

    $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    $sql = "SELECT * FROM ".$table;
    $stmt = $db->prepare($sql);
    
    $result = $stmt->execute();

    return $result->columnName($index);


}

function TableColumns($table){   // returns the number of columns in the table with the name 'string $table'

    $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    $sql = "SELECT * FROM ".$table;
    $stmt = $db->prepare($sql);
    
    $result = $stmt->execute();

    return $result->numColumns();
}


function InsertData($table,$data){ // inserts data into the given table: InsertData(string $table, array $data)
    //echo var_dump($data);
    $values = "";
    for($i=0;$i<count($data);$i++){
        $values = $values.'"'.$data[$i].'"';
        if($i != (count($data)-1)){
            $values = $values.",";
        }
    }
    $values = "VALUES(".$values.")";

    $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    $sql = "INSERT INTO ".$table." ".$values;
    $stmt = $db->prepare($sql);
    //echo $sql;
    $result = $stmt->execute();

    return $result;

}