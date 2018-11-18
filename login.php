<?php include "includes/header.php"; ?>
<body>

<?php include "includes/menu.php"; ?>    
    
<?php 

    $emailErr = $passwordErr = "";
    $emailValid = $passwordValid = true;    
    
    if(isset($_POST['login'])){
        global $connection;

        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $emailErr = $passwordErr = "";
        $emailValid = $passwordValid = true;  
        
                //Validate Username
        if(empty($email)){
            $emailErr = 'Email is required';
            $emailValid = false;
        }else{
            $query = "SELECT count(*) as count FROM users where email = '{$email}'";
            $result = mysqli_query($connection, $query);

            $row = mysqli_fetch_assoc($result);
            $count = $row['count'];
          
            if ($count == 0){
                $emailErr = 'Sorry, this email does not exist';
                $emailValid = false;
            }
        }
            //Validate password
        if (empty($password)) {
            $passwordErr = "Password is required";
            $passwordValid = false;
        }
        
         if($emailValid == true && $passwordValid == true){
            $query = "SELECT * FROM users WHERE email = '{$email}' ";
            $selectQuery = mysqli_query($connection, $query);
      
            while($row = mysqli_fetch_array($selectQuery)){
            
                 $dbUserId = $row['user_id'];
                 $dbEmail = $row['email'];
                 $dbPassword = $row['password'];
                 $dbFirstname = $row['first_name'];
                 $dbLastname = $row['last_name'];
                
                header("Location: success.php");

//                if(password_verify($password, $dbPassword)){
//
//                    $_SESSION['username'] = $dbUsername;
//                    $_SESSION['user_firstname'] = $dbFirstname;
//                    $_SESSION['user_lastname'] = $dbLastname;
//                    $_SESSION['user_role'] = $dbUserRole;
//                    
//                    if ($_SESSION['user_role'] == 'Admin'){
//                        header("Location: admin/adminIndex.php");
//                    }else{
//                        header("Location: index.php");
//                    }
//                }
            }
        }
    }
    ?>    
    
    
    
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">USER LOGIN</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h1>LOGIN FORM</h1>
                    </div>
                    <div class="panel-body">

                    <form action = "" method="post">

                        <div class="form-group">
                            <label>Email :</label>
                            <input class="form-control" type="text" name="email" required autocomplete="off" />
                            <span class="error"> <?php echo $emailErr;?></span>
                        </div>

                        <div class="form-group">
                            <label>Password :</label>
                            <input class="form-control" type="password" name="password" required autocomplete="off"  />
                            <p class="help-block"><a href="user-forgot-password.php">Forgot Password</a></p>
                            <span class="error"> <?php echo $passwordErr;?></span>
                        </div>



                        <button type="submit" name="login" class="btn btn-info">LOGIN</button> | 
                        <a href="signup.php">Not Register Yet</a>
                    </form>

                    </div>
                </div>
            </div>
        </div>  

    </div>
</div>
 

</body>
</html>
