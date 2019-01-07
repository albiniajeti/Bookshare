<?php include "includes/header.php"; ?>
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
        <br><br>
        <div class="w3-row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 container-fluid" >
                <ul>
                    <?php
                        $giver = $_SESSION['userId'];
                        $query = "select * from requests where giver = '{$giver}' and status='pending'";
                        $result = mysqli_query($connection, $query);
                    
                        if(mysqli_num_rows($result) == 0){
                            echo "<h1 class='text-center'>No requests at the moment</h1>";
                        }
                        while($row = mysqli_fetch_assoc($result)){
                            $requestId = $row['id'];
                            $asker = $row['asker'];
                            $book = $row['book'];
                            
                            $userQuery = "select concat(first_name, ' ',last_name) as user from users where id = '{$asker}'";
                            $userResult = mysqli_query($connection, $userQuery);
                            
                            while($userRow = mysqli_fetch_assoc($userResult)){
                                $user = $userRow['user'];
                            }
                            
                            $bookQuery = "select book_name as book from books where id = '{$book}'";
                            $bookResult = mysqli_query($connection, $bookQuery);
                            
                            while($bookRow = mysqli_fetch_assoc($bookResult)){
                                $bookN = $bookRow['book'];
                            }
                    ?>
                            <li><!--Start of First Request--> 
                                <div class="request">
                                    <div class="user-pic" ;><img src="images/login-user-icon.png" alt="userpic ">
                                        <div class="user"><a><?= $user; ?> has requested to borrow the book "<?= $bookN; ?>"</a><br> <br>
                                            <form action="includes/functions.php" method="post">
                                                <input type="hidden" value="<?= $requestId; ?>" name="request">
                                                <input type="hidden" value="<?= $book; ?>" name="bookId">
                                                <input type="hidden" value="<?= $asker; ?>" name="renter">
                                                <input class="btn btn-primary" name="acceptRequest" type="submit" value="Accept" />
                                                <input class="btn btn-danger"  name="refuseRequest" type="submit" value="Refuse" />
                                            </form>
                                        </div>                   
                                    </div>
                                </div>
                            </li><!--End of Frist Request-->
                            <br/>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>  

 <?php include "includes/footer.php"; ?>