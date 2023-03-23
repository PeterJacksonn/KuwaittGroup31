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


        <div>
  <h1 class="tableHeader"><u>View Users</u></h1>
</div>

<div class="container bgColor">
        <main role="main" class="pb-3">
            <h5>View all infomation about our users, update their data, or delete their records.</h5>
        
                <div class="row">
                <div class="col">
                <table class="table table-hover">
                    <thead class="theadColour" >
                        <td style="text-align: center;">User ID</td>
                        <td style="text-align: center;">First Name</td>
                        <td style="text-align: center;">Last Name</td>
                        <td style="text-align: center;">Email</td>
                        <td style="text-align: center;">Password</td>
                        <td style="text-align: center;">Role</td>
                        <td style="text-align: center;">Action</td>
                    </thead>

                    <?php
                        for ($i=0; $i<count($user); $i++):
                    ?>
                    <tr>
                        <td class="tbContents"><?php echo $user[$i]['id']?></td>
                        <td class="tbContents"><?php echo $user[$i]['fname']?></td>
                        <td class="tbContents"><?php echo $user[$i]['lname']?></td>
                        <td class="tbContents"><?php echo $user[$i]['email']?></td>
                        <td class="tbContents"><?php echo $user[$i]['password']?></td>

                        <td class="tbContents"><?php echo $user[$i]['role']?></td>
                        <td style="text-align: center;"><a href="updateUser.php?id=<?php echo $user[$i]['id']; ?>" class="btn btn-action">Update</a>
                        <a href="deleteUser.php?id=<?php echo $user[$i]['id']; ?>" class="btn btn-negative">Delete</a></td>

                    </tr>
                    <?php endfor;?>
                </table>    
            </div>
        </div>


        </main>
</div>

<?php require("Footer.php");?>
