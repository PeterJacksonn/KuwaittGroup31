<?php
require("navBar.php");
require("viewUserSQL.php");
$pkvalue = $_GET['uid'];
$tableName = 'credentials';
$pk = 'id';
$error = "";
$success = "";
//$debugerror = "";
$table = getUsers();

$noOfColumns = TableColumns($tableName);


if(isset($_POST['submit'])){
    //$debugerror =  "debug1 ";
    if(isset($_POST['update'])){
        //$debugerror = "debug2 ";
        $success = UpdateDb($tableName,$_POST['column'],$_POST['update'],TableNames($tableName,0),$pkvalue);
        if($success == false){
            $error = "sql statement failed to execute";
        }
        else{
            //echo "sql statement successful?? if nothing changed f"; // debug: used this cos the statement was successful but nothing changed
            $path = "updateUser.php?uid=".$pkvalue;
            header("Location:".$path);
        }
    }
    else{
        $error = "data cannot be left blank ";
    }
}

?>

<h1><u>Update user page:  ID <?php echo $pkvalue; ?></u></h1>



        <div class="row">
            <div class="col-10">
                <table class="table table-hover">
                    <thead class="theadColour">
                        <?php for($i=0;$i<$noOfColumns;$i++):?>
                        <td><?php $$i = TableNames($tableName,$i); echo $$i;?></td>
                        <?php endfor;?>
                    </thead>

                    <?php
                        for ($i=0; $i<count($table); $i++):
                        if($table[0][$i]==$pkvalue):
                    ?>
                    <tr>
                        <?php for($j=0;$j<$noOfColumns;$j++):?>
                        <td><?php echo $table[$i][$j]?></td>

                        <?php endfor;?>


                    </tr>

                    <?php endif;endfor;?>
                </table>    
            </div>
        </div>

        <div>
        <form method="post">
            <div>
                <select name="column">
                    <?php for($i=0;$i<$noOfColumns;$i++):?>
                    <option value = "<?php echo $$i ?>"><?php echo $$i; ?></option>
                    <?php endfor;?>
                </select>
            </div>
            <div>
                <input type="text" name="update"></input>
            </div>
            <div>
                <input type="submit" name="submit"></input>
            </div>
            <input type="hidden" name = "uid" value = "<?php echo $pkvalue ?>"></input>
            <span class="text-danger"><?php echo $error; ?></span>
        <form>
        </div>

        



<?php require("footer.php"); ?>