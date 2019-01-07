<?php include "includes/header.php"; ?>
<?php include "includes/menu.php"; ?>    
   
<?php
    
        $userId = $_SESSION['userId'];        
        $query = "select * from users where id = '{$userId}'";
        $selectUser = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_assoc($selectUser)){       
            $password = $row['password'];
            $usersFirstname = $row['first_name'];
            $usersLastname = $row['last_name'];
            $usersEmail= $row['email'];        
        }
?>

<?php

    if(isset($_POST['submit'])){
        
        $dataValid = true;
            
        $newFirstname = $_POST['firstname'];
        $newLastname = $_POST['lastname'];
        $newEmail= $_POST['email'];
        $newPassword = $_POST['password'];
        
        if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)){
            $dataValid = false;            
        }
              
        if($newEmail != $usersEmail){
            $emailQuery = "SELECT count(*) as count from users where email = '{$newEmail}'";
            $emailResult = mysqli_query($connection, $emailQuery);

            $row = mysqli_fetch_assoc($emailResult);
            $count = $row['count'];

            if ($count == 1){
                $dataValid = false;            
            }            
        }              
        $newFirstname = mysqli_real_escape_string($connection, $newFirstname);
        $newLastname = mysqli_real_escape_string($connection, $newLastname);
        $newEmail = mysqli_real_escape_string($connection, $newEmail);
        $newPassword = mysqli_real_escape_string($connection, $newPassword);

        
        if(empty($newFirstname) || empty($newLastname) || empty($newEmail)){
            $dataValid = false;
        }   
        
        if(empty($newPassword)){        
            $dataValid = false;
            
            echo "<p class='alert alert-danger' style = 'text-align: center';>Please fill in all the fields and make sure you enter a valid email and password.</p>";
        }else{
            $newPassword = password_hash($newPassword, PASSWORD_BCRYPT, array('cost' => 12));
            if($dataValid == true){

                $query = "update users set first_name = '{$newFirstname}', last_name = '{$newLastname}', email = '{$newEmail}', password = '{$newPassword}' where id = '{$userId}'";

                $postUpdate = mysqli_query($connection, $query);

                if($postUpdate){
                    echo "<p class='alert alert-success' style = 'text-align: center';>Your changes have been saved.</p>";
                }else{
                    echo "<p class='alert alert-danger' style = 'text-align: center';>Something went wrong.</p>";
                }
            }else{
                    echo "<p class='alert alert-danger' style = 'text-align: center';>Please fill in all the fields and make sure you enter a valid email and password.</p>";
            }            
        }    
    }
?>

<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">        </h4>
            </div>
        </div>

        <br / >
        <br / >


        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 container-fluid" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h1>User Profile</h1>
                    </div>
                    <div class="panel-body">

                    <form action = "" method="post">
                    <fieldset>
                    
                    <label>First Name: </label>
                        <input class="form-control" name="firstname" value="<?= $usersFirstname ?>"/><br />

                    <label>Last Name: </label>
                        <input class="form-control" name="lastname"  value="<?= $usersLastname; ?>"/><br />
                    
                    <label>E-Mail: </label>
                        <input class="form-control" name="email"   value="<?= $usersEmail ?>"/><br />

                    <label>Password: </label>
                        <input class="form-control" type="password" name="password" placeholder="Please enter password to save changes"  /><br />
                   
                    <input class="btn btn-primary" type="submit" name="submit" value="SAVE" />                    
                    </fieldset>
                    </form>

                    </div>
                </div>
            </div>
        </div>  

    </div>
</div>
<?php include "includes/footer.php"; ?>
