<?php

include_once("adminNav.php");
require("footer.php");
require("viewUserSQL.php");

//include("getOS.php");


$tablename = "credentials";
$data = array();


function createUser(){
    $created = false;//this variable is used to indicate the creation is successfull or not
    $os = getOS();
    if($os === "Mac"){
        $db = new SQLITE3('../Database/Kuwaitt.db');
    }
    else{
        $db = new SQLITE3('..\\Database\\Kuwaitt.db');
    }// db connection - get your db file here. Its strongly advised to place your db file outside htdocs. 
    $sql = 'INSERT INTO credentials(fname, lname, email, password, role) VALUES (:fname, :lname, :email, :password, :role)';
    $stmt = $db->prepare($sql); //prepare the sql statement
}




?>