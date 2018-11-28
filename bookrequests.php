<?php include "includes/header.php"; ?>
<body>
<?php include "includes/menu.php"; ?>    
    
    <style> 
ul {
  list-style-type: none;
}
.request {
    box-sizing: content-box;     
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 15px;
    padding-top: 15px;
    background-color: #e6e8ed;
    border-radius: 10px;   
}
</style>

<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">        </h4>
            </div>
        </div>
        <br>
        <br>

        <div class="w3-row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 container-fluid" >

    <ul>
        <li><!--Start of First Request--> 
            <div class="request">
                <div class="user-pic" ;"><img src="images/login-user-icon.png" alt="userpic "> </a>

                <div class="user"><a>Tom Smith has requested to borrow the book "Wildfire at Midnight"</a><br> <br>

                    <input class="btn btn-primary" type="submit" value="Accept" />
                    <input class="btn btn-danger"  type="submit" value="Cancel" />
                </div>                   
                </div>
            </div>
        </li><!--End of Frist Request-->
    </ul>

                    </div>
                </div>
            </div>
        </div>  

    </div>
</div>
 
 <?php include "includes/footer.php"; ?>

</body>
</html>