<?php include "includes/header.php"; ?>
<body>

<?php include "includes/menu.php"; ?>    
    
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
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h1>User Profile</h1>
                    </div>
                    <div class="panel-body">

                    <form action = "" method="post">
                    <fieldset>
                    
                    <label>First Name: </label>
                        <input class="form-control" name="firstname" /><br />

                    <label>Last Name: </label>
                        <input class="form-control" name="lastname"  /><br />

                    <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value=""></option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="O">Other</option>
                        </select><br />
                    
                    <label>E-Mail: </label>
                        <input class="form-control" name="email"   /><br />

                    <label>Phone/Tel Number: </label>
                        <input class="form-control" name="number"   /><br />

                    <label>Street Address: </label>
                        <input class="form-control" name="address"   /><br />

                    <label>City</label>
                        <select name="city" class="form-control">
                            <option value=""></option>
                            <option value="PR">Prishtina</option>
                            <option value="MI">Mitrovice</option>
                            <option value="PRI">Prizen</option>
                            <option value="PE">Peje</option>
                            <option value="FE">Ferizaj</option>
                            <option value="GJI">Gjilan</option>
                            <option value="GJA">Gjakove</option>
                        </select><br />
                    
                    <label>Password: </label>
                        <input class="form-control" name="number" placeholder="Please enter password to save changes"  /><br />
                   
                    <input class="btn btn-primary" type="submit" value="SAVE" />
                    <input class="btn btn-danger"  type="submit" value="CANCEL" />
                    
                    </fieldset>
                    </form>

                    </div>
                </div>
            </div>
        </div>  

    </div>
</div>
 

</body>
</html>