<?php
require("navBar.php");
require("viewUserSQL.php");
$pkvalue = $_GET['uid'];
$tableName = 'bankUser';
$pk = 'id';

$table = getUsers();

$noOfColumns = TableColumns();
?>


<h1><u>Update user page</u></h1>



                <div class="row">
                <div class="col-10">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <?php for($i=0;$i<$noOfColumns;$i++):?>
                        <td><?php echo TableNames($tableName,$i)?></td>
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



<?php require("footer.php"); ?>