<?php include "includes/header.php"; ?>
<?php include "includes/menu.php"; ?>  


    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
<!--      <h1 class="text-center">My books</h1>-->
        <br/>

    <?php
        
        $user = $_SESSION['userId'];
        $query = "select * from books where book_owner = '{$user}'";
        $results = mysqli_query($connection, $query);

        if(mysqli_num_rows($results) == 0){
            echo "<h1 class='text-center'>You don't have any books at the moment</h1>";
        }
        
        while($row = mysqli_fetch_assoc($results)){
             $bookId = $row ['id'];
             $bookTitle = $row ['book_name'];
             $owner = $row['book_owner'];    
             $bookOwner = $row['book_owner'];
             $bookImage = $row['book_image'];
             $bookAuthor = $row['book_author'];
             $available = $row['available'];
             $expectedAt = $row['expected_at'];
             $rented = $row['rented'];
             $missing = $row['missing'];
             $bookDescription = substr($row['book_description'], 0, 200);
        ?>
        <div class="row" >
            <div class="col-md-7">
<!--              <a href="#" >-->
                <img class="img-thumbnail rounded mx-auto d-block" style="max-width:200px;" src="images/<?= $bookImage; ?>" style="float: center;">
<!--              </a>-->
            </div>
            <div class="col-md-5" style="position: relative;">
              <h3><?= $bookTitle; ?></h3>
                <div style="position:absolute; bottom: 0;">
                    <?php
                        if($rented == 1){
                            $today = date('Y-m-d');
                            if(($expectedAt < $today) && ($expectedAt != "0000-00-00")){
                                if($missing == 1){
                                    echo "<button class='btn btn-danger btn-block' disabled>Book reported missing</button>";
                                }else{?>
                                   <form action="includes/functions.php" method="post">
                                    <input type="hidden" name="bookToDelete" value="<?= $bookId; ?>">
                                    <button class='btn btn-danger btn-block' name='reportMissing' type='submit'>Book delayed. Report Missing!!!</button>
                                   </form>  
                             <?php  
                                     }
                            }else{
                                echo "<button class='btn btn-secondary btn-block' disabled>Book rented and in time</button>";
                            }
                        }else{?>
                             <form action="includes/functions.php" method="post">
                                <input type="hidden" name="bookToDelete" value="<?= $bookId; ?>">
                                <input type="hidden" name="bookStatus" value="<?= $available; ?>">
                                <?php

                                ?>
                                <?php 
                                    if($available == 1){
                                        echo "<button class='btn btn-secondary btn-block' name='changeAvailability' type='submit'>Make Book Unavailable</button>";
                                    }else{
                                        echo "<button class='btn btn-success btn-block' name='changeAvailability' type='submit'>Make Book Available</button>";
                                    }
                                ?>
                                <button class="btn btn-danger btn-block" name="deleteBook" type='submit'>Delete Book</button>
                            </form> 
                    <?php
                        }
                    ?>

                </div>
            </div>
        </div>
        <hr/>  
        <?php
        }
        ?>
    </div>

<?php include "includes/footer.php"; ?>  