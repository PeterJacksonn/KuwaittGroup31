<?php 
function verifyStaff () {

        if (!isset($_POST['id']) or !isset($_POST['password'])) {
            return;  // <-- return null;  
        }

        $db = new SQLite3('C:\\Users\\Public\\data\\Kuwaitt.db');
        $stmt = $db->prepare('SELECT id, password, fname FROM Admin WHERE id=:id AND password=:password');
        $stmt->bindParam(':id', $_POST['id'], SQLITE3_TEXT);
        $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);

        $result = $stmt->execute();

        $rows_array = [];
        while ($row=$result->fetchArray())
        {
            $rows_array[]=$row;
        }
        return $rows_array;
    }
