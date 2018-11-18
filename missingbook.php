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
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 container-fluid" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h1>Report Missing Book</h1>
                    </div>
                    <div class="panel-body">

                    <form action = "" method="post">

                    <label>Name: </label>
                    <input class="form-control" name="name"  /><br />
                    
                    <label>Phone/Tel Number: </label>
                    <input class="form-control" name="phone"  /><br />

                    <label>E-Mail: </label>
                    <input class="form-control" name="email"  /><br />
        
                    <label>What's Wrong: </label>
                    <textarea class="form-control" name="text" placeholder="How can we help you?" style="height:150px;"></textarea><br />
                    <input class="btn btn-primary" type="submit" value="Send" /><br /><br />
                    
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