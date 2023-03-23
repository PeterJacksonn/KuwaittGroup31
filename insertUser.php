<?php

function createUser(){

    $created = false;//this variable is used to indicate the creation is successfull or not
    $db = new SQLite3('..\\Database\\Kuwaitt.db'); // db connection - get your db file here. Its strongly advised to place your db file outside htdocs. 
    $sql = 'INSERT INTO credentials(fname, lname, email, password, role) VALUES (:fname, :lname, :email, :password, :role)';
    $stmt = $db->prepare($sql); //prepare the sql statement

    //give the values for the parameters
    $stmt->bindParam(':fname', $_POST['fname'], SQLITE3_TEXT); 
    $stmt->bindParam(':lname', $_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);
    $stmt->bindParam(':role', $_POST['role'], SQLITE3_TEXT);


    //execute the sql statement
    $stmt->execute();

    //the logic
    if($stmt){
        $created = true;
    }

    return $created;
}
