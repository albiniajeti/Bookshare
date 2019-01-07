<?php include "includes/header.php"; ?>
<?php include "includes/menu.php"; ?>    
  
<?php
    if(isset($_GET['message'])){
        echo "<p class='alert alert-success' style = 'text-align: center';>Your book was added.</p>";
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
                        <h1>Add Book</h1>
                    </div>
                    <div class="panel-body">

                    <form action = "includes/functions.php" method="post" enctype="multipart/form-data">
                        <label>Book Author: </label>
                        <input class="form-control" name="author"  /><br />

                        <label>Book Title: </label>
                        <input class="form-control" name="title"   /><br />

                        <label>Description of the book: </label>
                        <textarea class="form-control" name="description" placeholder="Please enter some details about the book!" style="height:150px;"></textarea><br />

                        <label>Book availability</label><br/>
                        <select name="available" class="form-group">
                            <option value="1">Available</option>
                            <option value="0">Unavailable</option>
                        </select><br/>
                        
                        <input  type='file' class="btn btn-primary" name="image"/><br />
                        <br />

                        <input class="btn btn-primary" type="submit" value="Upload" name="newBook"/>                    
                    </form>

                    </div>
                </div>
            </div>
        </div>  

    </div>
</div>

<?php include "includes/footer.php"; ?>