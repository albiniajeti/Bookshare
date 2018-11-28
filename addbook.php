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
                        <h1>Add Book</h1>
                    </div>
                    <div class="panel-body">

                    <form action = "" method="post">

                    <label>Name of book owner: </label>
                    <input class="form-control" name="ownername" /><br />

                    <label>Book Author: </label>
                    <input class="form-control" name="author"  /><br />
                    
                    <label>Book Title: </label>
                    <input class="form-control" name="booktitle"   /><br />

                    <label>Description of the book: </label>
                    <textarea class="form-control" name="text" placeholder="It can be a quick description about the book!" style="height:150px;"></textarea><br />

                    <input  type='file' class="btn btn-primary" onchange="readURL(this);"/><br />
                    <br />
                    
                    <input class="btn btn-primary" type="submit" value="Upload" />
                    
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