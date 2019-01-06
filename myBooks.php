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

        while($row = mysqli_fetch_assoc($results)){
             $bookId = $row ['id'];
             $bookTitle = $row ['book_name'];
             $owner = $row['book_owner'];    
             $bookOwner = $row['book_owner'];
             $bookImage = $row['book_image'];
             $bookAuthor = $row['book_author'];
             $available = $row['available'];
             $bookDescription = substr($row['book_description'], 0, 200);
        ?>
        <div class="row" >
            <div class="col-md-7">
              <a href="#">
                <img class="img-thumbnail" style="max-width:300px;" src="images/<?= $bookImage; ?>" alt="">
              </a>
            </div>
            <div class="col-md-5" style="position: relative;">
              <h3><?= $bookTitle; ?></h3>
                <div style="position:absolute; bottom: 0;">
                    <form action="includes/functions.php" method="post">
                        <input type="hidden" name="bookToDelete" value="<?= $bookId; ?>">
                        <input type="hidden" name="bookStatus" value="<?= $available; ?>">
                        <?php 
                            if($available == 1){
                                echo "<button class='btn btn-secondary btn-block' name='changeAvailability' type='submit'>Make Unavailable</button>";
                            }else{
                                echo "<button class='btn btn-secondary btn-block' name='changeAvailability' type='submit'>Make Available</button>";
                            }
                        ?>
                        <button class="btn btn-danger btn-block" name="deleteBook" type='submit'>Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <hr/>  
        <?php
        }
        ?>
    </div>

<?php include "includes/footer.php"; ?>  