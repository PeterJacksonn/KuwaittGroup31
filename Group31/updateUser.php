<?php
require("adminNav.php");
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
            $path = "viewUser.php?uid=".$pkvalue;
            header("Location:".$path);
        }
    }
    else{
        $error = "data cannot be left blank ";
    }
}

?>

<div>
  <h1 class="tableHeader"><u>Update user page:  ID <?php echo $pkvalue; ?></u></h1>
</div>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col">
                <table class="table table-hover">
                    <thead class="theadColour">
                        <?php for($i=0;$i<$noOfColumns;$i++):?>
                        <td style="text-align: center;"><?php $$i = TableNames($tableName,$i); echo $$i;?></td>
                        <?php endfor;?>
                    </thead>

                    <?php
                        for ($i=0; $i<count($table); $i++):
                        if($table[0][$i]==$pkvalue):
                    ?>
                    <tr>
                        <?php for($j=0;$j<$noOfColumns;$j++):?>
                        <td class="tbContents"><?php echo $table[$i][$j]?></td>

                        <?php endfor;?>


                    </tr>

                    <?php endif;endfor;?>
                </table>    
                <div>
                    <form method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="column">Update</label>
                            </div>
                            <select class="custom-select" id="column" name="column">
                                <?php for($i=0;$i<$noOfColumns;$i++):?>
                                    <option value = "<?php echo $$i ?>"><?php echo $$i; ?></option>
                                <?php endfor;?>
                            </select>
                            <input type="text" class="form-control" name="update">
                            <div class="input-group-append">
                                <button class="btn btn-action" type="button" name="submit">Submit</button>
                            </div>
                            <input type="hidden" name = "uid" value = "<?php echo $pkvalue ?>"></input>
                            <span class="text-danger"><?php echo $error; ?></span>
                        </div>
                    <form>
                </div>
            </div>
        </div>
    </main>
</div>


<?php require("footer.php"); ?>