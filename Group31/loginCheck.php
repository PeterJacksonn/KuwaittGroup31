<?php 
include("getOS.php");
function verifyUser () {

        if (!isset($_POST['email']) or !isset($_POST['password'])) {
            return;  // <-- return null;  
        }
        $os = getOS();
        if($os === "Mac")
        {
            $db = new SQLITE3('/Applications/XAMPP/xamppfiles/htdocs/KuwaittGroup31copy/Database/Kuwaitt.db');
        }
        else{
            $db = new SQLITE3('..\\Database\\Kuwaitt.db');
        }
        $stmt = $db->prepare('SELECT * FROM credentials WHERE email=:email AND password=:password');
        $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
        $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);

        $result = $stmt->execute();

        $rows_array = [];
        while ($row=$result->fetchArray())
        {
            $rows_array[]=$row;
        }
        return $rows_array;
    }
