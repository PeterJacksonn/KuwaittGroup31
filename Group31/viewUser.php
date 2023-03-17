<?php 
require("adminNav.php");
include_once("viewUserSQL.php");

$user = getUsers();
?>
  <?php if(isset($_GET['deleted'])): ?>
            <div class="alert alert-danger alert-dismissible fade show col-10" role="alert" style="font-weight: bold;">
                The user has been deleted
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>


<div class="container bgColor">
        <main role="main" class="pb-3">
                <h1>View Users</h1>
        
                <div class="row">
                <div class="col-10">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>User ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Password</td>
                        <td>Document ID</td>
                        <td>Action</td>
                        <td></td>
                    </thead>

                    <?php
                        for ($i=0; $i<count($user); $i++):
                    ?>
                    <tr>
                        <td><?php echo $user[$i]['id']?></td>
                        <td><?php echo $user[$i]['fname']?></td>
                        <td><?php echo $user[$i]['lname']?></td>
                        <td><?php echo $user[$i]['email']?></td>
                        <td><?php echo $user[$i]['password']?></td>
                        <td><?php echo $user[$i]['docID']?></td>
                        <td><a href="UpdateUser.php?uid=<?php echo $user[$i]['id']; ?>" class="btn btn-info">Update</a></td>
                        <td><a href="DeleteUser.php?uid=<?php echo $user[$i]['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php endfor;?>
                </table>    
            </div>
        </div>


        </main>
</div>

<?php require("Footer.php");?>
