<?php include "includes/header.php"; ?>
<body>

<?php include "includes/menu.php"; ?> 
    
<?php

    $firstNameErr = $lastNameErr = $emailErr = $passwordErr = "";
    $firstNameValid = $lastNameValid = $emailValid = $passwordValid = true;

    if(isset($_POST['signup'])){
        global $connection;
        

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmPassword'];
        
    
        $firstName = mysqli_real_escape_string($connection, $firstName);
        $lastName = mysqli_real_escape_string($connection, $lastName);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);
        $confirmpassword = mysqli_real_escape_string($connection, $confirmpassword);

        //Validate First Name   
        if(empty($firstName)){
            $firstNameErr = 'Name is required';
            $firstNameValid = false;
        }else {
            if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
            $firstNameErr = "Not a valid name"; 
            $firstNameValid = false;
            }
        }
            
        //Validate Last Name   
        if(empty($lastName)){
            $lastNameErr = 'Last name is required';
            $lastNameValid = false;
        }else {
            // check if last name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
            $lastNameErr = "Not a valid name"; 
            $lastNameValid = false;
            }
        }
            

        //Validate email
        if (empty($email)) {
            $emailErr = "Email is required";
            $emailValid = false;
        }else{
            $query = "SELECT * from users where email = '{$email}'";
            $result = mysqli_query($connection, $query);
            
             if(!$result ) {

              die("QUERY FAILED ." . mysqli_error($connection));


          }
            
            $row = mysqli_fetch_assoc($result);
            $count = $row['count'];
          
            if ($count == 1){
                $emailErr = 'Sorry, this email already belongs to an account';
                $emailValid = false;
            } else {
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email"; 
              $emailValid = false;
            }
        }
        }
            
        
        //Validate password
        if (empty($password) || empty($confirmpassword)) {
            $passwordErr = "Password is required and has to be confirmed";
            $passwordValid = false;
        } else {
            if($password != $confirmpassword){
                $passwordErr = "Passwords don't match, please check again";
                $passwordValid = false;                
            }
            // check if password is strong enough
            if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/", $password)) {
            $passwordErr = "Password should have minimum eight characters, have at least one letter and one number"; 
            $passwordValid = false;
            }     
        }
        
//        $password = password_hash ($password, PASSWORD_BCRYPT, array('cost' => 12));
        
        if($firstNameValid == true && $lastNameValid  == true && $emailValid  == true && $passwordValid == true){
        $query = "insert into users (password, email, first_name, last_name)  
                            values('{$password}', '{$email}', '{$firstName}', '{$lastName}')";
        $addUser = mysqli_query($connection, $query);
        
        if(!$addUser){
            die ("Error".mysqli_error($connection));
        }else{
            echo "<p class='alert alert-success' style = 'text-align: center'>Account created. <a href = 'login.php' >Login</a></p>";
        }
        }
   
  }

?>    


<!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
           
                <div class="col-md-9 col-md-offset-1 container-fluid" >
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <br / >
                            <br / >
                            <h1>SINGUP FORM</h1>
                        </div>
                        <div class="panel-body">
                            <form name="signup" method="post" onSubmit="return valid();">
                                <div class="form-group">
                                    <label>Enter First Name</label>
                                    <input class="form-control" type="text" name="firstName"/>
                                    <span class="error"> <?php echo $firstNameErr;?></span>
                                </div>
                                <div class="form-group">
                                    <label>Enter Last name</label>
                                    <input class="form-control" type="text" name="lastName"/>
                                    <span class="error"> <?php echo $lastNameErr;?></span>
                                </div>

                                <div class="form-group">
                                    <label>Enter Email</label>
                                    <input class="form-control" type="email" name="email"/>
                                    <span id="user-availability-status" style="font-size:12px;"></span> 
                                    <span class="error"> <?php echo $emailErr;?></span>
                                </div>

                                <div class="form-group">
                                    <label>Enter Password</label>
                                    <input class="form-control" type="password" name="password"/>
                                    <span class="error"> <?php echo $passwordErr;?></span>
                                    </div>

                                <div class="form-group">
                                    <label>Confirm Password </label>
                                    <input class="form-control"  type="password" name="confirmPassword"/>
                                </div>

                                <button type="submit" name="signup" class="btn btn-danger" id="submit">Register</button>
                                | 
                                <a href="login.php">Already a user</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php"; ?>
 
</body>
</html>
