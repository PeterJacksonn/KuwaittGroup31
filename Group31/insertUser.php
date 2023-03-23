<?php
require("adminNav.php");
require("footer.php");
require("viewUserSQL.php");

$tablename = "credentials";
$data = array();


if(isset($_POST['submit'])){
    

    for($i=0;$i<TableColumns($tablename);$i++){
        array_push($data,$_POST[TableNames($tablename,$i)]);
        
    }
    InsertData($tablename,$data);
}


?>
<style>
    .formelement {    
        background: rgb(255, 255, 255);
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 4px solid #128754;
        padding: 14px 10px;
        height: 50px;
        width: 500px;
        outline: none;
        color: #000000;
        transition: 0.25s;
        font-family: monospace;
        font-size: 20px;
        }
</style>

<div class="container bgColor">
    <main role="main" class="pb-3">
    <h1> CREATE NEW USER: </h1>

        <form method = "post">

        <?php
            for($i = 0;$i<(TableColumns($tablename)+1);$i++):

                $columnname = TableNames($tablename,$i);
                if($columnname == "role"){
                    echo "
                    <div>
                    ".$columnname.":
                    <select  name='".$columnname."'>
                    <option value='admin'>admin</option>
                    <option value='manager'>manager</option>
                    <option value='active'>active</option>
                    <option value='staff'>staff</option>
                    </div>";
                }
                elseif($i==TableColumns($tablename)){
                    echo "
            
                    <div>
                    <input type='submit' name='submit'>
                    </div>
                    ";
                }
                else{
                    echo "
                    <div>
                    ".$columnname.":
                    <input class='formelement' type='text' name='".$columnname."'>
                    </div>
                    ";
                }

            endfor;
            
        ?>

        </form>

        <?php //echo var_dump($data);  //debug    ?> 
    </main>
</div>