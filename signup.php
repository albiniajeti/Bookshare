
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Book Store| Signup</title>
  
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/4-col-portfolio.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>

    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                        

                            <li><a href="signup.php">User Signup</a></li>
                             <li><a href="index.php">User Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



<!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">User Signup</h4>
                </div>
            </div>
            <div class="row">
           
        <div class="col-md-9 col-md-offset-1">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h1>SINGUP FORM</h1>
                </div>
                <div class="panel-body">
                    <form name="signup" method="post" onSubmit="return valid();">
                        <div class="form-group">
                            <label>Enter Full Name</label>
                            <input class="form-control" type="text" name="fullanme" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <label>Mobile Number :</label>
                            <input class="form-control" type="text" name="mobileno" maxlength="10" autocomplete="off" required />
                        </div>
                                                                        
                        <div class="form-group">
                            <label>Enter Email</label>
                            <input class="form-control" type="email" name="email" id="emailid" onBlur="checkAvailability()"  autocomplete="off" required  />
                            <span id="user-availability-status" style="font-size:12px;"></span> 
                        </div>

                        <div class="form-group">
                            <label>Enter Password</label>
                            <input class="form-control" type="password" name="password" autocomplete="off" required  />
                            </div>

                        <div class="form-group">
                            <label>Confirm Password </label>
                            <input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
                        </div>
                                                  
                        <button type="submit" name="signup" class="btn btn-danger" id="submit">Register Now </button>

                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
 
</body>
</html>
