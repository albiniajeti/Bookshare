<?php include "includes/header.php"; ?>
<?php include "includes/menu.php"; ?>  

<?php 


    if(isset($_GET['bookId'])){

        $id = $_GET['bookId'];

        $query = "select * from books where id = '{$id}'";
        $results = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($results)){
                $id = $row['id'];
                $title = $row['book_name'];
                $owner = $row['book_owner'];
                $image = $row['book_image'];
                $description = $row['book_description'];
                $author = $row['book_author'];
                $available = $row['available'];
            }
    }

?>
    <div class="container">


      <!-- Portfolio Item Heading -->
      <h1 class="my-4"><?= $title; ?>
        <small>by <?= $author; ?></small>
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8" >
          <img class="img-fluid" src="images/<?= $image; ?>" alt="" style="max-height: 500px;">
        </div>

        <div class="col-md-4" style="position: relative;">
          <h3 class="my-3">Book Description</h3>
          <p><?= $description; ?></p>
            <div style="position: absolute; bottom: 0;">
            <?php   
                if(isset($_SESSION['userId'])){
                    $user = $_SESSION['userId'];
                }else{
                    $user = 0;
                }
                
                if(!isset($_SESSION['userId'])){   
                    echo "<a href='login.php'><button class='btn btn-primary btn-block'>Login to request book</button></a>";
                }else if($user == $owner){
                    echo "<button class='btn btn-secondary btn-block' disabled>This is one of your books</button>";
                }else{
                    //check if already requested
                    $user = $_SESSION['userId'];
                    $querry = "SELECT COUNT(*) as count FROM `requests` WHERE book ='{$id}' and asker = '{$user}'";
                    $count = mysqli_query($connection, $querry);
                    
                    while($roww = mysqli_fetch_assoc($count)){
                        $num = $roww['count'];
                    }
                    if($num > 0){
                        echo "<button class='btn btn-secondary btn-block' disabled>Already requested</button>";
                    }else{?>
                        <form action="includes/functions.php" method="post">
                        <input type="hidden" value="<?= $id; ?>" name="book">
                        <input type="hidden" value="<?= $owner; ?>" name="owner">
                        <?php if($available){
                            echo "<button class='btn btn-success btn-block' name='requestBook'>Request Book</button>";
                        }else{
                            echo "<button class='btn btn-secondary btn-block' disabled>Unavailable</button>";
                        }
                        ?>
                        </form> 
                <?php
                    }                              
                }               
            ?>
            </div>
        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Other books you might like</h3>
        
      <div class="row">
        <?php
            if(isset($_SESSION['userId'])){
                $query2 = "SELECT * FROM books where book_owner != '{$user}' ORDER BY id DESC LIMIT 4";
            }else{
                $query2 = "SELECT * FROM books ORDER BY id DESC LIMIT 4";
            }
            
            $results2 = mysqli_query($connection, $query2);
    
            while($row2 = mysqli_fetch_assoc($results2)){
                $id2 = $row2['id'];
                $title2 = $row2['book_name'];
                $owner2 = $row2['book_owner'];
                $image2 = $row2['book_image'];
                $description2 = $row2['book_description'];
                $author2 = $row2['book_author'];
                $available2 = $row2['available']; ?>
                
                <div class="col-md-3 col-sm-6 mb-4">
                  <a href="book.php?bookId=<?= $id2; ?>">
                    <img class="img-fluid" src="images/<?= $image2?>" alt="">
                  </a>
                </div>
        <?php
            }
        ?>

      </div>
      <!-- /.row -->

    </div>

   <!-- Footer -->
<?php include "includes/footer.php"; ?>
